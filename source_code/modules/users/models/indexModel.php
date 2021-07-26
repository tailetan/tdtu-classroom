<?php
// Hàm check xem email có tồn tại trên hệ thống không để gửi mail reset password
function check_email($email){
    $check_email = db_num_rows("SELECT * FROM `table_users` WHERE `email`='{$email}'");
    if($check_email > 0){
        return true;
    }
    return false;
}
// Hàm update token cho user cần reset password
function update_reset_token($data,$email){
    db_update("table_users",$data,"`email` = '{$email}'");
}

function check_reset_token($reset_token){
    $check_email = db_num_rows("SELECT * FROM `table_users` WHERE `reset_token`='{$reset_token}'");
    if($check_email > 0){
        return true;
    }
    return false;
}
function update_pass($data, $reset_token){
    db_update('table_users',$data,"`reset_token`= '{$reset_token}'");
}

#########################
function get_list_users() {
    $result = db_fetch_array("SELECT * FROM `table_users`");
    return $result;
}

function get_user_by_id($id) {
    $item = db_fetch_row("SELECT * FROM `table_users` WHERE `user_id` = {$id}");
    return $item;
}


function check_login($email,$password){
    global $conn;
    $check_user = db_num_rows("SELECT * FROM `table_users` WHERE `email`='" . mysqli_real_escape_string($conn, $email) . "' AND `password` = '" . mysqli_real_escape_string($conn, $password) . "'");
    // echo $check_user;
    if($check_user > 0){
        return true;
    }
    return false;
}
// function check_login($email,$password){
//     $check_user = db_num_rows("SELECT * FROM `table_users` WHERE `email`='{$email}' AND `password` = '{$password}'");
//     // echo $check_user;
//     if($check_user > 0){
//         return true;
//     }
//     return false;
// }

function add_user($data){
    
    return db_insert('table_users',$data);

}


function user_exists($email){
    
    $check_user = db_num_rows("SELECT * FROM `table_users` WHERE `email`='{$email}'");
    // echo $check_user;
    if($check_user > 0){
        return true;
    }
    return false;
}

// Hàm lấy infor của user

function user_infor($field)
{
    $list_users= db_fetch_array("SELECT * FROM `table_users`");
    
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


function student_exist($email,$id){
    $check_student = db_num_rows("SELECT * FROM `table_users` WHERE `email` = '{$email}' OR 'id' = '{$id}'");
    echo $check_student;
    if($check_student >0){
        return true;
    }
    return false;
}