<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/tema5_ximo/ximo_coche_lite/';
    include($path . "module/home/model/DAO_home.php");
    include("module/home/view/home.html");
    $dao_home=new DAO_home();
    switch($_GET['op']){
        case 'list_brands':
            $brands = $dao_home->select_all_brands();
            echo json_encode ($brands);
            break;
        case 'list_fuels':
            $fuels = $dao_home->select_3_fuels();
            echo json_encode ($fuels);
            break;
        case 'list_categories':
            $categories = $dao_home->select_4_categories();
            echo json_encode ($categories);
            break;
        
    }
?>