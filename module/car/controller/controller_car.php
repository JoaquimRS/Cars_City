<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/tema5_ximo/ximo_coche_lite/';
    include($path . "module/car/model/DAO_car.php");

    switch($_GET['op']){
        case 'list';
            $dao_car=new DAO_car();
            $res_dao = $dao_car->select_all_car();
            include("module/car/view/list_car.php");
            break;

        case 'list_datatable';
            $dao_car=new DAO_car();
            $res_dao = $dao_car->select_all_car();
            include("module/car/view/list_car_datatable.php");
            break;
        case 'read';
            $dao_car=new DAO_car();
            $res_dao = $dao_car->read_car($_GET['id']);
            include("module/car/view/read_car.php");
            break;
        case 'read_modal';
            $dao_car=new DAO_car();
            $res_dao = $dao_car->read_car_modal($_GET['id']); 
            $car=get_object_vars($res_dao);                       
            echo json_encode($car);
            exit;
            break;

        case 'create';
            
            include("module/car/model/validate_car.php");
            
            
            if (isset($_POST['submit_car'])){
                
                if (validate_car($_POST)){
                    $dao_car=new DAO_car();
                    $res_dao = $dao_car->create_car($_POST);
                    
                    if ($res_dao){
                        
                        $callback = 'index.php?module=controller_car&op=list';
                        echo '<script>window.location.href="'.$callback .'"; </script>';
                        echo "<script>toastr.success('Nuevo coche registrado en la base de datos correctamente');</script>";
                        die();
                    }
                    else {
                        echo '<script language="javascript">alert("Algo ha ido mal al registrar el coche")</script>';
                    }
                }
            }
            
            $dao_car=new DAO_car();
            $res_dao = $dao_car->select_models();
            include("module/car/view/create_car.php");
            break;
        case 'update';
            include("module/car/model/validate_car.php");
            if (isset($_POST['submit_car'])){
                
                    $dao_car=new DAO_car();
                    $res_dao = $dao_car->update_car($_POST);
                    
                    if ($res_dao){
                        
                        $callback = 'index.php?module=controller_car&op=list';
                        
                        //echo '<script>window.location.href="'.$callback .'"</script>';
                        
                        die("<script>toastr.success('Coche modificado de la base de datos correctamente');</script>");
                        
                    }
                    else {
                        echo '<script language="javascript">alert("Algo ha ido mal al modificar el coche")</script>';
                    }
                
            }
            $dao_car=new DAO_car();
            $res_dao_models = $dao_car->select_models();
            $res_dao_car_info = $dao_car->read_car($_GET['id']);
            include("module/car/view/update_car.php");
            break;
        case 'delete';
            $dao_car=new DAO_car();
            // $res_dao = $dao_car->delete_car($_GET['id']);
            if ($res_dao){
                echo '<script language="javascript">alert("Coche borrado de la base de datos correctamente")</script>';
                $callback = 'index.php?module=controller_car&op=list';
                die('<script>window.location.href="'.$callback .'";</script>');
            }
            else {
                echo '<script language="javascript">alert("Algo ha ido mal al borrar el coche")</script>';
            }
            break;
    }
?>