<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/tema5_ximo/ximo_coche_lite/';
    include($path . "module/search/model/DAO_search.php");
    $dao_search=new DAO_search();
    switch($_GET['op']){
        case 'list_brands':
            $brands = $dao_search->select_all_brands();
            echo json_encode ($brands);
            break;
        case 'list_categories':
            $brands = $dao_search->select_all_categories();
            echo json_encode ($brands);
            break;
        case 'list_cities':
            $cities = $dao_search->select_all_cities();
            echo json_encode ($cities);
            break;
        case 'list_filter_cities';
            $filter_cities = $dao_search->select_filter_cities($_POST);

            echo json_encode($filter_cities);
            break;
    }
?>