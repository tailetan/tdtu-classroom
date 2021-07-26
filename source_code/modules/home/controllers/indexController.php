<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('home');
    load('lib', 'validation'); // load file validation.php trong lib
    load('lib', 'pagging');
}



function indexAction()
{


    $list_class = get_class_by_user_id();
    //    show_array($_SESSION);
    $data['list_class'] = $list_class;
    if (isset($_GET['btn-search'])) {
        if (isset($_GET["search-value"]) && !empty($_GET["search-value"])) {
            $list_class = get_class_by_search($_GET["search-value"]);
            $data['list_class'] = $list_class;
        }
    }
    load_view('index', $data);
}

// =======ADD COURSE========
function addAction()
{
    global $error, $subject, $class_name, $room, $total_period, $class_img, $is_add_course;

    if (isset($_POST['btn-add-course'])) {
        $error = array();
        # Subject
        if (empty($_POST['subject'])) {
            $error['subject'] = "Subject is a required field";
        } else {
            $subject = $_POST['subject'];
        }
        # Class ID
        if (empty($_POST['class_name'])) {
            $error['class_name'] = "Class name is a required field";
        } else {
            $class_name = $_POST['class_name'];
        }

        #Room
        if (empty($_POST['room'])) {
            $error['room'] = 'Room is a required field';
        } else {
            $room = $_POST['room'];
        }

        #Total lesson
        if (empty($_POST['total_period'])) {
            $error['total_period'] = 'Total lesson is a required field';
        } else {
            $total_period = $_POST['total_period'];
        }

        // show_array($_FILES);
        # Class image

        if (isset($_FILES['class_img'])) {
            $img_path = 'public/images/';
            // Đường dẫn của file sau khi upload
            $class_img = $img_path . $_FILES['class_img']['name'];
            // echo $class_img;
            #xử lý upload đúng file ảnh
            $type_allow = array('png', 'jpg', 'jpeg', 'gif');
            $type = pathinfo($_FILES['class_img']['name'], PATHINFO_EXTENSION);


            if ($_FILES['class_img']['size'] == 0 && $_FILES['class_img']['name'] == "") {
                $error['class_img'] = "Class image is a required field";
            }

            if ($type != null && !in_array(strtolower($type), $type_allow)) {
                $error['class_img'] = "Your file is not an image format";
            }
        }

        if (empty($error)) {
            if (move_uploaded_file($_FILES['class_img']['tmp_name'], $class_img)) {
                if (!course_exists($subject, $room)) {
                    $data = array(
                        'subject' => $subject,
                        'class_name' => $class_name,
                        'room' => $room,
                        // 'shift' => $shift,
                        // 'day_study' => $day_study,
                        'total_period' => $total_period,
                        'class_img' => $class_img,
                        'user_id' => user_infor('user_id')

                    );
                    add_course($data);
                    $is_add_course = 1;
                    // echo $add;
                    //Thông báo
                    // redirect_to("?mod=users&action=login");
                } else {
                    $error['add_course'] = "This course is already exist!";
                }
            }
        }
    }
    $data = array(
        'class_img' => $class_img
    );
    load_view('add', $data);
}

//=======EDIT COURSE=======

function editAction()
{
    global $error, $subject, $class_name, $room, $total_period, $class_img;

    if (isset($_POST['btn-update-course'])) {
        $error = array();
        # Subject
        if (empty($_POST['subject'])) {
            $error['subject'] = "Subject is a required field";
        } else {
            $subject = $_POST['subject'];
        }
        # Class ID
        if (empty($_POST['class_name'])) {
            $error['class_name'] = "Class name is a required field";
        } else {
            $class_name = $_POST['class_name'];
        }

        #Room
        if (empty($_POST['room'])) {
            $error['room'] = 'Room is a required field';
        } else {
            $room = $_POST['room'];
        }

        #Total lesson
        if (empty($_POST['total_period'])) {
            $error['total_period'] = 'Total period is a required field';
        } else {
            $total_period = $_POST['total_period'];
        }

        // show_array($_FILES);
        # Class image

        if (isset($_FILES['class_img'])) {
            $img_path = 'public/images/';
            // Đường dẫn của file sau khi upload
            $class_img = $img_path . $_FILES['class_img']['name'];
            // echo $class_img;
            #xử lý upload đúng file ảnh
            $type_allow = array('png', 'jpg', 'jpeg', 'gif');
            $type = pathinfo($_FILES['class_img']['name'], PATHINFO_EXTENSION);


            if ($_FILES['class_img']['size'] == 0 && $_FILES['class_img']['name'] == "") {
                $error['class_img'] = "Class image is a required field";
            }

            if ($type != null && !in_array(strtolower($type), $type_allow)) {
                $error['class_img'] = "Your file is not an image format";
            }
        }

        if (empty($error)) {
            if (move_uploaded_file($_FILES['class_img']['tmp_name'], $class_img)) {
                $data = array(
                    'subject' => $subject,
                    'class_name' => $class_name,
                    'room' => $room,
                    'total_period' => $total_period,
                    'class_img' => $class_img,
                );
                update_course($data);
                global $is_update;
                $is_update = 1;
            }
        }
    }

    load_view('edit');
}

//=======DELETE COURSE======

function deleteAction()
{
    if (isset($_POST['btn-exist']) or isset($_POST['btn-cancel'])) {
        redirect_to('?mod=home&action=index');
    }
    if (isset($_POST['btn-remove-course'])) {
        delete_course();
        redirect_to('?mod=home&action=index');
    }
    // delete_course();

    load_view('delete');
}
function adminAction()
{

    $list_all_users = get_list_users();
    $data['list_all_users'] = $list_all_users;

    $list_all_class = get_all_class();
    $data['list_all_class'] = $list_all_class;
    if (isset($_GET["admin-btn-search"])) {
        if (isset($_GET["admin-search-value"])) {
            $num_per_page = 6;
            $data['num_per_page'] = $num_per_page;
            
            // input value
            $search_data = $_GET["admin-search-value"];
            // tổng số bản ghi mỗi trang
            $total_classes = get_num_row_classes_by_search($search_data);
            $data['total_classes'] =  $total_classes;
            // tổng số trang
            $num_page = ceil($total_classes / $num_per_page);
            $data['num_page'] = $num_page;
            // //nếu $GET có page r thì gán page = số đó còn nếu chưa thì gán =1
            $page =  isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $data['page'] = $page;
            // //start là điểm xuất phát mỗi trang
            $start = ($page - 1) * $num_per_page;
            $list_all_class_per_page = get_class_by_adminSearch($start, $num_per_page, $search_data);
            $data['list_all_class_per_page'] = $list_all_class_per_page;
        }
    } else {
        //Tổng số bản ghi mỗi trang
        $num_per_page = 6;
        $data['num_per_page'] = $num_per_page;

        $total_classes = get_num_row_classes();
        $data['total_classes'] =  $total_classes;
        // // => Tính tổng số trang: 
        $num_page = ceil($total_classes / $num_per_page);
        $data['num_page'] = $num_page;

        // //nếu $GET có page r thì gán page = số đó còn nếu chưa thì gán =1
        $page =  isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $data['page'] = $page;
        // //start là điểm xuất phát mỗi trang
        $start = ($page - 1) * $num_per_page;

        $list_all_class_per_page = get_all_class_per_page($start, $num_per_page);
        $data['list_all_class_per_page'] = $list_all_class_per_page;
    }


    if (isset($_POST['btn-add-admin'])) {
        $data_admin = array(
            'role' => 'admin'
        );
        set_admin_role($data_admin);
        header("Refresh:0");
    }
    load_view('admin', $data);
}
