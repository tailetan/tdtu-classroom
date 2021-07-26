
<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
    load('lib', 'validation'); // load file validation.php trong lib
    load('lib', 'email'); // load file email.php trong lib
}

function indexAction()
{
    $list_users = get_list_users();
    $data['list_users'] = $list_users;
    load_view('index', $data);
}
##########################################################
function regAction()
{
    global $error, $fullname, $password, $email, $department, $phone_number,$is_reg;

    if (isset($_POST['btn-reg'])) {
        $error = array();
        # FULLNAME
        if (empty($_POST['fullname'])) {
            $error['fullname'] = "Fullname is a required field";
        } else {
            $fullname =$_POST['fullname'];
        }

        #EMAIL
        if (empty($_POST['email'])) {
            $error['email'] = 'Email is a required field';
        } else {
            // SỬ DỤNG THƯ VIỆN 
            if (!is_email($_POST['email']))
                $error['email'] = 'Please enter the correct format!';
            else {
                $email =$_POST['email'];
            }
        }
        #PASSWORD
        if (empty($_POST['password'])) {
            $error['password'] = 'Password is a required field';
        } else {
            //Kiểm tra số ký tự password
            if (!(strlen($_POST['password']) >= 6 && strlen($_POST['password']) <= 32)) {
                $error['password'] = "Password yêu cầu từ 6 đến 32 ký tự";
            } else {

                if (!is_password($_POST['password']))
                    $error['password'] = 'Password cho phép sử dụng ký tự, số, dấu chấm, ký tự đặc biệt và bắt đầu ký tự in hoa, từ 6-32 kỹ tự ';
                else {
                    $password = md5($_POST['password']); // md5 là để mã hóa password
                }
            }
        }
        # DEPARTMENT
        if (empty($_POST['department'])) {
            $error['department'] = "Department is a required field";
        } else {
            $department =$_POST['department'];
        }

        #PHONE NUMBER
        if (empty($_POST['phone_number'])) {
            $error['phone_number'] = 'Phone number is a required field';
        } else {
            // SỬ DỤNG THƯ VIỆN 
            if (!is_phone_number($_POST['phone_number']))
                $error['phone_number'] = 'Phone number is invalid ';
            else {
                $phone_number =$_POST['phone_number'];
            }
        }

        if (empty($error)) {

            if (!user_exists($email)) {
                $data = array(
                    'fullname' => $fullname,
                    'email' => $email,
                    'password' => $password,
                    'department' => $department,
                    'phone_number' => $phone_number
                );
                add_user($data);
                $is_reg = true;
                // echo $add;
                //Thông báo
                // redirect_to("?mod=users&action=login");
            } else {
                $error['account'] = "Email already exist";
            }
        }
    }

    load_view('reg');
}

###################################################################
function loginAction()
{
    global $error, $password, $email;
    if (isset($_POST['btn-login'])) {
        $error = array();
        if (empty($_POST['email'])) {
            $error['email'] = 'Email is a required field';
        } else {
            // SỬ DỤNG THƯ VIỆN 
            if (!is_email($_POST['email']))
                $error['email'] = 'Your email is in the wrong format!';
            else {
                $email =$_POST['email'];
            }
        }
        #PASSWORD
        if (empty($_POST['password'])) {
            $error['password'] = 'Password is a required field';
        } else {
            //Kiểm tra số ký tự password
            if (!(strlen($_POST['password']) >= 6 && strlen($_POST['password']) <= 32)) {
                $error['password'] = "Password yêu cầu từ 6 đến 32 ký tự";
            } else {

                if (!is_password($_POST['password']))
                    $error['password'] = 'Password cho phép sử dụng ký tự, số, dấu chấm, ký tự đặc biệt và bắt đầu ký tự in hoa, từ 6-32 kỹ tự ';
                else {
                    $password = md5($_POST['password']); // md5 là để mã hóa password
                }
            }
        }
        if (empty($error)) {
            if (check_login($email, $password)) {
                // Lưu trữ phiên đăng nhập
                $_SESSION['is_login'] = true;
                $_SESSION['user_email'] = $email;
                $_SESSION['user_role'] = user_infor('role');
                // Chuyển hướng vào trong hệ thống
                if ($_SESSION['user_role'] == 'teacher') {
                    redirect_to("?");
                } else {
                    redirect_to("?mod=home&action=admin");
                }
            } else {
                $error['login'] = 'Account is not exist!';
            }
        }
    }
    load_view('login');
}
##################################
// Đăng xuất
function logoutAction()
{
    unset($_SESSION['is_login']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_role']);
    redirect_to("?mod=users&action=login");
}
#################################
// Reset password
function resetAction()
{
    global $error, $email, $password;
    if (!empty($_GET['reset_token'])) {
        $reset_token = $_GET['reset_token'];
        if (check_reset_token($reset_token)) {
            if (isset($_POST['btn-new-pass'])) {
                $error = array();
                #PASSWORD
                if (empty($_POST['password'])) {
                    $error['password'] = 'Password is a required field';
                } else {
                    //Kiểm tra số ký tự password
                    if (!(strlen($_POST['password']) >= 6 && strlen($_POST['password']) <= 32)) {
                        $error['password'] = "Password yêu cầu từ 6 đến 32 ký tự";
                    } else {

                        if (!is_password($_POST['password']))
                            $error['password'] = 'Password cho phép sử dụng ký tự, số, dấu chấm, ký tự đặc biệt và bắt đầu ký tự in hoa, từ 6-32 kỹ tự ';
                        else {
                            $password = md5($_POST['password']); // md5 là để mã hóa password
                        }
                    }
                }
                if (empty($error)) {
                    $data = array(
                        'password' => $password,
                    );
                    update_pass($data, $reset_token);
                    redirect_to('?mod=users&action=resetSuccess');
                }
            }

            load_view('newPass');
        } else {
            echo "Yêu cầu lấy lại mật khẩu không hợp lệ";
        }
    } else {
        if (isset($_POST['btn-reset'])) {
            $error = array();
            if (empty($_POST['email'])) {
                $error['email'] = 'Email is a required field';
            } else {

                $email = htmlentities($_POST['email']);
            }
            if (empty($error)) {
                if (check_email($email)) {
                    $reset_token = md5($email . time());
                    $data = array(
                        'reset_token' => $reset_token
                    );
                    // Cập nhật mã reset pass cho user cần reset pass
                    update_reset_token($data, $email);

                    // Gửi link khôi phục vào email người dùng
                    $link = base_url("?mod=users&action=reset&reset_token={$reset_token}");

                    $content = "<p>Vui lòng click vào link sau để khôi phục mật khẩu: {$link}</p>
                <p>Nếu không phải yêu cầu của bạn, vui lòng bỏ qua email này</p>
                <p>From Taideptrai with love ^^ </p>";

                    send_mail($email, '', 'Khôi phục mật khẩu Classroom', $content);
                } else {
                    $error['email'] = "Email is not exist!";
                }
            }
        }
        load_view('reset');
    }
}

function resetSuccessAction()
{


    load_view('resetSuccess');
}
