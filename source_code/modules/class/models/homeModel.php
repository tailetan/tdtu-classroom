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
function get_current_class(){
    $class_id =$_GET['classid'];
    $item = db_fetch_row("SELECT c.*, u.fullname, u.email, u.phone_number, u.department FROM `table_class` c JOIN table_users u ON c.user_id = u.user_id WHERE c.class_id = {$class_id}");
    return $item;
}
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
function get_num_row_students(){
    $class_id = $_GET['classid'];
    $num_row = db_num_rows("SELECT * FROM `table_student` WHERE `class_id` = {$class_id}");
    return $num_row;
}


//Hàm Update course
function update_course($data)
{
    $class_id = (int)$_GET['classid'];
    return db_update("table_class", $data, "`class_id` ={$class_id}");
}
//Hàm Delete course
function delete_course()
{
    $class_id = (int)$_GET['classid'];
    return db_delete("table_class", "`class_id` ={$class_id}");
}


// Hàm kiểm tra xem lớp có bị trùng hay không
function course_exists($subject, $room)
{
    $check_class = db_num_rows("SELECT * FROM `table_class` WHERE `subject` = '{$subject}' AND `room` = '{$room}'");
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
    $class_id = (int)$_GET['classid'];
    $item = db_fetch_row("SELECT * FROM `table_class` WHERE `class_id` = $class_id");
    return $item;
}
//Hàm kiểm tra STUDENT tồn tại chưa
function student_exists($student_id,$email){
    $class_id = (int)$_GET['classid'];
    $check_student = db_num_rows("SELECT * FROM `table_student` WHERE (`student_id` = '{$student_id}'  OR `email` = '{$email}')  AND `class_id` = '{$class_id}'");
    // echo $check_user;
    if($check_student > 0){
        return true;
    }
    return false;
}
// Hàm thêm sinh viên
function add_student($data){
    return db_insert('table_student',$data);

}

// Hàm xóa sinh viên
function delete_student()
{
    $class_id = (int)$_GET['classid'];
    if(!empty($_POST['delete'])){
        foreach($_POST['delete'] as $deleteid){
            db_delete("table_student", "`table_student`.`student_id` = '{$deleteid}' AND `table_student`.`class_id` = '{$class_id}'");       
      
        }
    }
    
}

function get_lessons_by_class_id(){
    $class_id = (int)$_GET['classid'];
    $item = db_fetch_array("SELECT * FROM `table_lesson` WHERE `class_id` = $class_id");
    return $item;
}
// show_array(get_lessons_by_class_id());
// Format lại định dạng ngày tháng
function date_study_format(){
    $class_id = (int)$_GET['classid'];
    $item =db_fetch_array("SELECT DATE_FORMAT(date_study, '%d/%m/%Y') AS `date_study` FROM `table_lesson` WHERE `class_id` = $class_id");
    return $item;
}
function add_lesson($data)
{
    return db_insert('table_lesson', $data);
}

function get_lessons_by_id($lesson_id){
   
    $item = db_fetch_row("SELECT * FROM `table_lesson` WHERE `lesson_id` = {$lesson_id}");
    return $item;;
}
// show_array(get_lessons_by_id($id));

function add_attendance($data_attendance){
    
    return db_insert('table_attendance',$data_attendance);

}

function create_lesson_id(){
    $temp= db_fetch_array("SELECT count(*) AS lesson_id FROM `table_lesson`") ;
    $lesson_id = $temp[0]['lesson_id'] +1;
    return $lesson_id;
}
// Hàm tính tổng số tiết sv có mặt
function get_day_absent(){
    $class_id = $_GET['classid'];
    return db_fetch_array("SELECT s.student_id, s.last_name, s.first_name, SUM(CASE WHEN a.status ='absent' THEN l.num_of_period ELSE 0 END) sum_period_absent FROM `table_attendance` a JOIN `table_lesson` l ON a.lesson_id = l.lesson_id JOIN `table_class` c ON c.class_id = l.class_id JOIN `table_student` s ON s.id = a.student_id WHERE c.class_id = {$class_id} GROUP BY s.student_id, s.last_name, s.first_name");
}

function get_sum_period_taught(){
    $class_id = $_GET['classid'];
    return db_fetch_row("SELECT SUM(`num_of_period`) as sum_period_taught FROM `table_lesson` WHERE `class_id` = {$class_id}");
}
// show_array(get_sum_period_taught());
function get_total_period(){
    $class_id = $_GET['classid'];
    return db_fetch_row("SELECT `total_period` FROM `table_class` WHERE `class_id` = {$class_id}");

}
// echo get_total_period()['total_period'];
function get_percent_absent(){
    $list_day_absent = get_day_absent();
    $total_period = get_total_period()['total_period'];
    $t=0;
    $temp[] = array();
    foreach($list_day_absent as $day_absent){
        $temp[$t]['full_name']= $day_absent['last_name'].' '.$day_absent['first_name'];
        $temp[$t]['student_id']= $day_absent['student_id'];
        $temp[$t]['percent_absent'] = round((($day_absent['sum_period_absent'])/$total_period)*100,1) ;
        $t++;
    }
    return $temp;
    
}
// Danh sánh sinh viên nghĩ lố 20% => cấm thi
function get_banned_list(){
    $list_percent_absent=get_percent_absent();
    $t=0;
    $list_banned = array();
    foreach($list_percent_absent as $percent_absent){
        if(!empty($percent_absent['percent_absent']) && $percent_absent['percent_absent'] >20){
            $list_banned[$t] = $percent_absent;
            $t++;
        }
    }
    return $list_banned;

}
function get_all_class()
{
    
    $item = db_fetch_array("SELECT c.*, u.fullname, u.email FROM `table_class` c JOIN table_users u ON c.user_id = u.user_id ORDER BY `fullname` ");
    return $item;
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