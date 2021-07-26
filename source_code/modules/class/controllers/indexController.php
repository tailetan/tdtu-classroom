<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('home');
    load('lib', 'validation'); // load file validation.php trong lib
}

function indexAction()
{
    $list_students = get_students_by_class_id();
    //    show_array($_SESSION);

    $data['list_students'] = $list_students;

    $current_class = get_current_class();
    $data['current_class'] = $current_class;


    //Delete student

    if (isset($_POST['btn-delete-student'])) {
        delete_student();
        header("Refresh:0");
        // redirect_to('?mod=class&action=deleteStudent');
        // show_array($_POST);
    }
    // buổi học
    $list_lesson = get_lessons_by_class_id();
    $data['list_lesson'] = $list_lesson;
    // định dạng ngày tháng
    $list_date_study_format = date_study_format();
    $data['list_date_study_format'] = $list_date_study_format;
    $list_banned = get_banned_list();
    $data['list_banned'] = $list_banned;

    $list_class = get_class_by_user_id();
    $data['list_class'] = $list_class;

    $list_all_class = get_all_class();
    $data['list_all_class'] = $list_all_class;
    // show_array($list_banned);

    load_view('index', $data);
}


// =======ADD STUDENT========
function addStudentAction()
{
    global $error, $last_name, $first_name, $student_id, $email, $csv_file, $fileName, $file, $is_add_student;
    $error = array();
    if (isset($_POST['btn-add-student'])) {

        # LAST NAME
        if (empty($_POST['last_name'])) {
            $error['last_name'] = "Lastname is a required field";
        } else {
            $last_name = $_POST['last_name'];
        }
        # FIRST NAME
        if (empty($_POST['first_name'])) {
            $error['first_name'] = "Firstname is a required field";
        } else {
            $first_name = $_POST['first_name'];
        }

        # STUDENT ID
        if (empty($_POST['student_id'])) {
            $error['student_id'] = "Student ID is a required field";
        } else {
            $student_id = $_POST['student_id'];
        }

        #EMAIL
        if (empty($_POST['email'])) {
            $error['email'] = 'Your email is in the wrong format!';
        } else {
            // SỬ DỤNG THƯ VIỆN 
            if (!is_email($_POST['email']))
                $error['email'] = 'Email must have tdtu format (Ex: 518H0114@student.tdtu.edu.vn) ';
            else {
                $email = $_POST['email'];
            }
        }

        if (empty($error)) {

            if (!student_exists($student_id, $email)) {
                $data = array(
                    'last_name' => $last_name,
                    'first_name' => $first_name,
                    'student_id' => $student_id,
                    'email' => $email,
                    'class_id' => $_GET['classid']
                );
                add_student($data);
                $is_add_student = 1;
            } else {
                $error['add_student'] = "Student already exist";
            }
        }
    }
    if (isset($_POST['btn-add-student-csv'])) {
        if (empty($_POST['csv_file'])) {
            if (isset($_FILES['csv_file'])) {

                #xử lý upload đúng file csv
                $type_allow = array('csv');
                $type = pathinfo($_FILES['csv_file']['name'], PATHINFO_EXTENSION);

                if ($type != null && !in_array(strtolower($type), $type_allow)) {
                    $error['csv_file'] = "Your file is not a csv format";
                }
                if ($_FILES['csv_file']['size'] == 0 && $_FILES['csv_file']['name'] == "") {
                    $error['csv_file'] = "Please import a csv file";
                }
                $fileName = $_FILES["csv_file"]["tmp_name"];
                if ($_FILES["csv_file"]["size"] > 0) {
                    $file = fopen($fileName, "r");
                    while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {


                        if (isset($column[0])) {
                            $student_id =  $column[0];
                        }
                        if (isset($column[1])) {
                            $last_name =  $column[1];
                        }
                        if (isset($column[2])) {
                            $first_name =  $column[2];
                        }
                        if (isset($column[3])) {
                            $email =  $column[3];
                        }

                        if (empty($error)) {

                            if (!student_exists($student_id, $email)) {
                                $data = array(
                                    'last_name' => $last_name,
                                    'first_name' => $first_name,
                                    'student_id' => $student_id,
                                    'email' => $email,
                                    'class_id' => $_GET['classid']
                                );
                                add_student($data);
                                $is_add_student = 1;
                            }
                        }
                    }
                }
            }
        }
        // show_array($_FILES);
    }
    load_view('addStudent');
}

//=======ADD LESSON======

function addLessonAction()
{
    global $error, $room, $num_of_period, $date_study, $lesson_id, $class_id, $is_add_lesson;

    if (isset($_POST['btn-add-lesson'])) {
        #Phòng học
        if (empty($_POST['room'])) {
            $error['room'] = 'Please enter the room';
        } else {
            $room = $_POST['room'];
        }
        #Số tiết
        if (empty($_POST['num_of_period'])) {
            $error['num_of_period'] = 'Please enter the number of period';
        } else {
            $num_of_period = $_POST['num_of_period'];
        }
        #Ngày học
        if (empty($_POST['date_study'])) {
            $error['date_study'] = 'Please select the date study';
        } else {
            $date_study = $_POST['date_study'];
        }
        if (empty($error)) {
            $class_id = $_GET['classid'];
            $lesson_id = create_lesson_id();
            $data = array(
                'lesson_id' => $lesson_id,
                'room' => $room,
                'num_of_period' => $num_of_period,
                'date_study' => $date_study,


                'class_id' => $class_id

            );
            add_lesson($data);
            $is_add_lesson = 1;

            $list_students = get_students_by_class_id();

            foreach ($list_students as $student) {
                $data_attendance = array(
                    'lesson_id' => $lesson_id,
                    'student_id' => $student['id'],

                );
                add_attendance($data_attendance);
            }
        }
    }

    load_view('addLesson');
}
