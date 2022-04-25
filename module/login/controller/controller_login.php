<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/tema5_ximo/ximo_coche_lite/';
    include($path . "module/login/model/DAO_login.php");
    include("module/login/view/login.html");
    session_start();
    $dao_login=new DAO_login();
    switch($_GET['op']){
        case 'register':
            $register = $dao_login->register($_POST);
            echo json_encode ($register);
            break;
        case 'login':
            $login = $dao_login->login($_POST);
            echo json_encode($login);
            break;
        case 'select_user':
            $user = $dao_login->select_user(apache_request_headers()["token"]);
            echo json_encode($user);
            break;
        case 'logout':
            $user = $dao_login->logout(apache_request_headers()["token"]);
            echo json_encode($user);
            break;
        case 'activity':
            $activity = $dao_login->activity();
            echo json_encode($activity);
            break;
        case 'control_user':
            $user = $dao_login->control_user(apache_request_headers()["token"]);
            echo json_encode($user);
            break;
        case 'refresh_cookie':
            $cookie = $dao_login->refresh_cookie();
            echo json_encode($cookie);
            break;
        case 'refresh_token':
            $token = $dao_login->refresh_token(apache_request_headers()["token"]);
            echo json_encode($token);
            break;
    }
?>