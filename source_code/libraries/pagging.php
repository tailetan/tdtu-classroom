<?php
function get_pagging($num_page, $page, $base_url = "")
{
    $str_pagging = "<ul class='pagination mt-4 justify-content-center'>";
    // previous
    if ($page > 1) {
        $page_previous =$page-1;
        $str_pagging .= "<li class=\"page-item\"><a class=\"page-link\" href=\"{$base_url}&page={$page_previous}\"><i class=\"fas fa-angle-double-left\"></i></a></li>";
    }else{
        $str_pagging .= "<li class=\"page-item disabled\"><a class=\"page-link\" href=\"\"><i class=\"fas fa-angle-double-left\"></i></a></li>";

    }
    for ($i = 1; $i <= $num_page; $i++) {
        if ($i == $page ){
            $active = 'active';
            $str_pagging .= "<li class=\"page-item {$active}\"><a class=\"page-link\" href=\"{$base_url}&page={$i}\">{$i}</a></li>";
            unset($active);
        }else{
            $str_pagging .= "<li class=\"page-item \"><a class=\"page-link\" href=\"{$base_url}&page={$i}\">{$i}</a></li>";

        }
        
    }
    //next
    if ($page < $num_page) {
        $page_next =$page+1;
        $str_pagging .= "<li class=\"page-item\"><a class=\"page-link\" href=\"{$base_url}&page={$page_next}\"><i class=\"fas fa-angle-double-right\"></i></a></li>";
    }else{
        $str_pagging .= "<li class=\"page-item disabled\"><a class=\"page-link\" href=\"\"><i class=\"fas fa-angle-double-right\"></i></a></li>";

    }
    $str_pagging .= "</ul>";
    echo $str_pagging;
}
