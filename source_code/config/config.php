<?php
session_start();
ob_start();
/*
 * ---------------------------------------------------------
 * BASE URL
 * ---------------------------------------------------------
 * Cấu hình đường dẫn gốc của ứng dụng
 * Ví dụ: 
 * http://hocweb123.com đường dẫn chạy online 
 * http://localhost/yourproject.com đường dẫn dự án ở local
 * 
 */


if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {
    
    $config['base_url'] = "http://localhost/source_code/";
    $config['default_module'] = 'home';
    $config['default_controller'] = 'index';
    $config['default_action'] = 'admin';
}else{
    $config['base_url'] = "http://localhost/source_code/";
    $config['default_module'] = 'home';
    $config['default_controller'] = 'index';
    $config['default_action'] = 'index';
    
}



