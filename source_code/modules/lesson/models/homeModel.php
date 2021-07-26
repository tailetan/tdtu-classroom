<?php

function get_list_users()
{
    $result = db_fetch_array("SELECT * FROM `table_users`");
    return $result;
}

function get_user_by_id($id)
{
    $item = db_fetch_row("SELECT * FROM `table_users` WHERE `user_id` = {$id}");
    return $item;
}

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
get_class_by_user_id();
//Hàm Thêm course
function add_course($data)
{
    return db_insert('table_class', $data);
}
// // hàm lấy các lớp của user hiện tại đang đăng nhập
function get_students_by_class_id()
{
    $class_id = $_GET['classid'];
    $list_students = db_fetch_array("SELECT * FROM `table_student` WHERE `class_id` = {$class_id}");
    return $list_students;
}
// // hàm lấy các lớp của user hiện tại đang đăng nhập
function get_students_by_id($id)
{
    $item = db_fetch_row("SELECT * FROM `table_student` WHERE `id` = {$id}");
    return $item;
}

function get_num_row_students()
{
    $class_id = $_GET['classid'];
    $num_row = db_num_rows("SELECT * FROM `table_student` WHERE `class_id` = {$class_id}");
    return $num_row;
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

//Hàm kiểm tra STUDENT tồn tại chưa
function student_exists($email)
{
    $class_id = (int)$_GET['id'];
    global $conn;
    $check_student = db_num_rows("SELECT * FROM `table_student` WHERE `email` = '" . mysqli_real_escape_string($conn, $email) . "' AND `class_id` = '" . mysqli_real_escape_string($conn, $class_id) . "'");
    // echo $check_user;
    if ($check_student > 0) {
        return true;
    }
    return false;
}
// Hàm thêm sinh viên
function add_student($data)
{
    return db_insert('table_student', $data);
}

// Hàm xóa sinh viên
function delete_student()
{
    $class_id = (int)$_GET['id'];
    foreach ($_POST['delete'] as $deleteid) {
        db_delete("table_student", "`table_student`.`student_id` = '{$deleteid}' AND `table_student`.`class_id` = '{$class_id}'");
    }
}

function get_lesson_by_id()
{
    $lesson_id = (int)$_GET['lessonid'];
    $item = db_fetch_row("SELECT * FROM `table_lesson` WHERE `lesson_id` = $lesson_id");
    return $item;
}
// show_array(get_lessons_by_class_id());
// Format lại định dạng ngày tháng
function date_study_format()
{
    $class_id = (int)$_GET['id'];
    $item = db_fetch_array("SELECT DATE_FORMAT(date_study, '%d/%m/%Y') AS `date_study` FROM `table_lesson` WHERE `class_id` = $class_id");
    return $item;
}
function add_lesson($data)
{
    return db_insert('table_lesson', $data);
}

function get_lessons_by_id($id)
{
    $id = (int)$_GET['lessonid'];
    $item = db_fetch_row("SELECT * FROM `table_lesson` WHERE `lesson_id` = {$id}");
    return $item;
}
// show_array(get_lessons_by_id($id));




function add_attendance($data_attendance)
{

    return db_insert('table_attendance', $data_attendance);
}


function get_studdent_absent()
{
    $lesson_id = (int)$_GET['lessonid'];
    $item = db_fetch_array("SELECT * FROM `table_attendance` a JOIN `table_student` s ON a.student_id = s.id WHERE `lesson_id` = {$lesson_id} AND `status` ='absent'");
    return $item;
}
// show_array(get_studdent_absent());
function get_num_row_students_absent()
{
    $lesson_id = (int)$_GET['lessonid'];
    $num_row = db_num_rows("SELECT * FROM `table_attendance` WHERE `lesson_id` = {$lesson_id} AND `status` = 'absent'");
    return $num_row;
}

function create_lesson_id()
{
    $temp = db_fetch_array("SELECT count(*) AS lesson_id FROM `table_lesson`");
    $lesson_id = $temp['lesson_id'] + 1;
    return $lesson_id;
}
function get_all_class()
{

    $item = db_fetch_array("SELECT c.*, u.fullname, u.email FROM `table_class` c JOIN table_users u ON c.user_id = u.user_id ORDER BY `fullname` ");
    return $item;
}