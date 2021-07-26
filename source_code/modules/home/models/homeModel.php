<?php

function get_list_users()
{
    $result = db_fetch_array("SELECT * FROM `table_users` ORDER BY `department`");
    return $result;
}
// show_array(get_list_users());
function get_user_by_id($id)
{
    $item = db_fetch_row("SELECT * FROM `table_users` WHERE `user_id` = {$id}");
    return $item;
}


// Hàm lấy infor của user

function user_infor($field)
{
    $list_users = db_fetch_array("SELECT * FROM `table_users`");

    if (isset($_SESSION['is_login'])) {

        foreach ($list_users as $user) {
            if ($_SESSION['user_email'] == $user['email']) {
                if (array_key_exists($field, $user)) { // kiểm tra 1 key ($field) có tồn tại trong mảng hay không
                    return $user[$field];
                }
            }
        }
    }
    return false;
}

// // hàm lấy các lớp của user hiện tại đang đăng nhập
function get_class_by_user_id()
{
    if (isset($_SESSION['is_login'])) {
        $user_id = user_infor('user_id');
        $list_class = db_fetch_array("SELECT * FROM `table_class` WHERE `user_id` = {$user_id}");
        return $list_class;
    }
}
// function get_class_by_user_id()
// {
//     if (isset($_SESSION['is_login'])) {
//         $user_id = user_infor('user_id');
//         $list_class = db_fetch_array("SELECT * FROM `table_class` WHERE `user_id` = {$user_id}");
//         return $list_class;
//     }
// }

// get_class_by_user_id();
//Hàm Thêm course
function add_course($data)
{
    return db_insert('table_class', $data);
}

//Hàm Update course
function update_course($data)
{
    $class_id = (int)$_GET['id'];
    return db_update("table_class", $data, "`class_id` ={$class_id}");
}
//Hàm Delete course
function delete_course()
{
    $class_id = (int)$_GET['id'];
    return db_delete("table_class", "`class_id` ={$class_id}");
}


// Hàm kiểm tra xem lớp có bị trùng hay không
function course_exists($subject, $room)
{
    global $conn;
    $check_class = db_num_rows("SELECT * FROM `table_class` WHERE `subject` = '" . mysqli_real_escape_string($conn, $subject) . "' AND `room` = '" . mysqli_real_escape_string($conn, $room) . "'");
    // echo $check_class;
    if ($check_class > 0) {
        return true;
    }
    return false;
}

//Hàm lấy danh sách class
function get_list_courses()
{
    $result = db_fetch_array("SELECT * FROM `table_class`");
    return $result;
}
// show_array(get_list_courses());

function get_course_id()
{
    $list_course = get_list_courses();
    $course_id = $list_course['class_id'];
    show_array($course_id);
}

function get_edit_class_url()
{
    $list_courses = get_list_courses();
    foreach ($list_courses as $class) {
        return "?mod=home&action=edit&id={$class['class_id']}";
    }
}
// // show_array(get_edit_class_url());
function get_delete_class_url()
{
    $list_courses = get_list_courses();
    foreach ($list_courses as &$class) {
        return "?mod=home&action=delete&id={$class['class_id']}";
    }
}

function get_class_by_id()
{
    $class_id = (int)$_GET['id'];
    $item = db_fetch_row("SELECT * FROM `table_class` WHERE `class_id` = $class_id");
    return $item;
}

//Hàm search class của GV
function get_class_by_search($data)
{
    global $conn;
    if (isset($_SESSION['is_login'])) {
        $user_id = user_infor('user_id');
        $list_search_classes = db_fetch_array("SELECT * FROM table_class where (user_id = {$user_id} AND class_name LIKE '" . '%' . mysqli_real_escape_string($conn,  $data) . '%' . "') OR (user_id = {$user_id} AND `subject` LIKE '" . '%' .  mysqli_real_escape_string($conn,  $data) . '%' . "') OR (user_id = {$user_id} AND room LIKE '" . '%' . mysqli_real_escape_string($conn,  $data) . '%' . "')");
        return $list_search_classes;
    }
}


function get_num_row_lecturers()
{
    $num_row = db_num_rows("SELECT * FROM `table_users` ");
    return $num_row;
}
function get_num_row_classes()
{

    $num_row = db_num_rows("SELECT * FROM `table_class` ");
    return $num_row;
}

#====== PHÂN TRANG CÁC LỚP TRONG ADMIN========
function get_all_class()
{

    $item = db_fetch_array("SELECT c.*, u.fullname, u.email FROM `table_class` c JOIN table_users u ON c.user_id = u.user_id ORDER BY `fullname` ");
    return $item;
}

function get_all_class_per_page($start, $num_per_page)
{

    $item = db_fetch_array("SELECT c.*, u.fullname, u.email FROM `table_class` c JOIN table_users u ON c.user_id = u.user_id ORDER BY `fullname` LIMIT {$start},{$num_per_page}");
    return $item;
}

function get_class_by_adminSearch($start, $num_per_page, $data)
{
    global $conn;
    $item = db_fetch_array("SELECT c.*, u.fullname, u.email FROM `table_class` c JOIN table_users u ON c.user_id = u.user_id where c.subject like '" . '%' . mysqli_real_escape_string($conn,  $data) . '%' . "' or c.class_name like '" . '%' . mysqli_real_escape_string($conn, $data) . '%' . "' or c.room like '" . '%' . mysqli_real_escape_string($conn,  $data) . '%' . "' or u.fullname like '" . '%' . mysqli_real_escape_string($conn,  $data) . '%' . "' ORDER BY `fullname` LIMIT {$start},{$num_per_page}");
    return $item;
}

function get_num_row_classes_by_search($data)
{
    global $conn;
    $num_row = db_num_rows("SELECT c.*, u.fullname, u.email FROM `table_class` c JOIN table_users u ON c.user_id = u.user_id where c.subject like '" . mysqli_real_escape_string($conn, '%' . $data . '%') . "' or c.class_name like '" . mysqli_real_escape_string($conn, '%' . $data . '%') . "' or c.room like '" . mysqli_real_escape_string($conn, '%' . $data . '%') . "' or u.fullname like '" . mysqli_real_escape_string($conn, '%' . $data . '%') . "' ORDER BY `fullname`");
    return $num_row;
}
//  set admin
function set_admin_role($data)
{
    $user_id = $_POST['btn-add-admin'];
    $item = db_update("table_users", $data, "`user_id` ={$user_id}");
}
