<?php
function is_username($username)
{
    $partten = "/^[A-Za-z0-9_\.]{6,32}$/";
    if (!preg_match($partten, $username, $matchs)) {
        return false;
    }
    return true;
}

function is_password($password)
{
    $partten = "/^([\w_\.!@#$%^&*()]+){6,32}$/";
    if (!preg_match($partten, $password, $matchs)) {
        return false;
    }
    return true;
}


function is_email($email)
{
    $partten = "/^[A-Za-z0-9_\.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
    if (!preg_match($partten, $email, $matchs)) {
        return false;
    }
    return true;
}
// function is_email($email) #TDTU mail
// {
//     $partten = "/^[A-Za-z0-9_.]{6,32}@[tdtu.edu.vn]|[student.tdtu.edu.vn]+$/";
//     if (!preg_match($partten, $email, $matchs)) {
//         return false;
//     }
//     return true;
// }


function is_phone_number($phone_number){
    $partten = "/^\+?(0|[+]84)\d{9}$/";
    if (!preg_match($partten, $phone_number, $matchs)) {
        return false;
    }
    return true;

    
}

//is_email
//is_phone_number



// Hàm để in lỗi trong form 
function form_error($label_field)
{
    global $error;
    if (!empty($error[$label_field])) {
        return "<p class='error mt-2 pl-2 text-danger font-italic'> {$error[$label_field]}</p>";
    }
}

//Hàm để ghi nhận dữ liệu sau khi đã submit
function set_value($label_field)
{
    global $$label_field;
    if (!empty($$label_field))
        return $$label_field;
}
