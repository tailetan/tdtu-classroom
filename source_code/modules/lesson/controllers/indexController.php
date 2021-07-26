<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('home');
    load('lib', 'validation'); // load file validation.php trong lib
}

function indexAction()
{
    $list_class = get_class_by_user_id();
    $data['list_class'] = $list_class;

    $list_students = get_students_by_class_id();
    $data['list_students'] = $list_students;

    $list_student_absent = get_studdent_absent();
    $data['list_student_absent'] = $list_student_absent;
    // show_array($list_students);
    $list_all_class = get_all_class();
    $data['list_all_class'] = $list_all_class;
    
    $lesson = get_lesson_by_id();
    $data['lesson'] = $lesson;
// show_array();
    global $is_check_attendance;
    if (isset($_POST['btn-attendance'])) {


            $status='';
            foreach (($_POST['attendance']) as $id => $attendances_status) {
                if ($attendances_status==1){
                    $status = 'present';
                }else{
                    $status ='absent';
                }
                $data_attendance = array(
                    'status' => $status
                );
                db_update("table_attendance", $data_attendance, "`lesson_id` = {$lesson['lesson_id']} AND `student_id` = {$id}");
                header("Refresh:0");
                // $is_check_attendance =1;
            }
       
        $is_check_attendance = 1;
        
        // show_array($_POST['attendance']);
    }
    load_view('index', $data);
}