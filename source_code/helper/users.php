<?php


// function check_login($email, $password)
// {
//     global $list_users;

//     foreach ($list_users as $user) {
//         if (strtolower($email) == strtolower($user['email']) && md5($password) == $user['password']) {
//             return TRUE;
//         }
//     }
//     return FALSE;
// }


// Hàm trả về true nếu đã login

function is_login()
{
    if (isset($_SESSION['is_login'])) {
        return true;
    } else {
        return false;
    }
}
// Hàm trả về true nếu đã đăng ký

function is_reg()
{
    global $data;
    if (!empty($data)) {
        return true;
    } else {
        return false;
    }
}

//Hàm in ra alert thành công khi đăng ký

function show_alert_success(){
    if(is_reg()){
        return "<div class='alert alert-success text-center'>
        Sign up successfully! <a href='?mod=users&action=login' class='font-weight-bold'>Click here</a> to login
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button>
    </div>";
    }
}

// Hàm trả về username của người login

function user_email()
{
    if (!empty($_SESSION['user_email'])) {
        return $_SESSION['user_email'];
    }
    return false;
}


