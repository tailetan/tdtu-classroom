<?php
//Triệu gọi đến file xử lý thông qua request

$request_path = MODULESPATH . DIRECTORY_SEPARATOR . get_module() . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . get_controller() . 'Controller.php';

if (file_exists($request_path)) {
    require $request_path;
} else {
    echo "Không tìm thấy:$request_path ";
}

$action_name = get_action() . 'Action';

call_function(array('construct', $action_name));


//KIỂM TRA NẾU CHƯA LOGIN MÀ CỐ TÌNH VÀO TRANG CHỦ THÌ CŨNG KHUM ĐƯỢC AHIHI
if (!is_login() && get_action() != 'login' && get_action() != 'reg' && get_action() != 'active' && get_action() != 'reset' && get_action() != 'resetSuccess') {
    redirect_to("?mod=users&action=login");
}
// KIỂM TRA NẾU ADMIN MÀ VÔ ĐƯỜNG DẪN LỚP HỌC THÌ KO ĐC
if(isset($_SESSION['user_role']) && $_SESSION['user_role']=='admin'){
    if(get_module()=='home' && get_action() == 'index'){
        redirect_to("?mod=home&action=admin");
    }
}
