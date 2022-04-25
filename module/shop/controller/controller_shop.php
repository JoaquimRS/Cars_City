    <?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/tema5_ximo/ximo_coche_lite/';
    include($path . "module/shop/model/DAO_shop.php");
    include("module/shop/view/shop.html");
    $dao_shop=new DAO_shop();
    switch($_GET['op']){
        case 'list_cars':
            $cars = $dao_shop->select_all_cars();
            
            echo json_encode($cars);
            break;
        case 'list_related_cars':
                $related_cars = $dao_shop->select_related_cars($_POST);
                
                echo json_encode($related_cars);
                break;
        case 'list_carImages':
            $carImages = $dao_shop->select_all_carImages($_GET['id']);
            
            echo json_encode($carImages);
            break;
        case 'list_brands_models':
            $brands_models = $dao_shop->select_all_brands_models();

            echo json_encode($brands_models);
            break;
        case 'list_fuels':
            $fuels = $dao_shop->select_all_fuels();
        
            echo json_encode($fuels);
            break;    
        case 'list_categories':
            $categories = $dao_shop->select_all_categories();
            echo json_encode($categories);
            break;
        case 'list_cities':
            $cities = $dao_shop->select_all_cities();
            echo json_encode($cities);
            break;
        case 'list_car':
            $car = $dao_shop->select_car($_GET['id']);

            echo json_encode($car);
            break;
        case 'list_filter_cars':
            $filter_cars = $dao_shop->select_filter_cars($_POST);

            echo json_encode($filter_cars);
            break;
        case 'increment_views':
            $sql = $dao_shop->increment_views($_POST);

            echo json_encode($sql);
            break;
        case 'select_likes':
            $user_likes = $dao_shop->select_user_likes(apache_request_headers()["token"]);
            
            echo json_encode($user_likes);
            break;
        case 'mod_user_like':
            $like = $dao_shop->mod_user_like(apache_request_headers()["token"],$_GET["id_car"]);
            
            echo json_encode($like);
            break;

    }
?>