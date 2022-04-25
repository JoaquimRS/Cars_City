<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/tema5_ximo/ximo_coche_lite/';
    include($path . "model/connect.php");
    include($path . "../login/module/login/model/DAO_login.php");
    include($path . "model/JWT.php");
    
    class DAO_shop{
        function select_all_cars() {
            $sql = "SELECT * FROM all_info_cars";
            $conection = php_mysql::DBconect();
            $res = mysqli_query($conection, $sql);
            php_mysql::close($conection);
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $retrArray[] = $row;
                }// end_while
            }// end_if
            return $retrArray;
        }
        function token_decode($tokenObj) {
            $jwt = parse_ini_file("../../../model/jwt.ini");
            $secret = $jwt['secret'];
            $JWT = new JWT;
            $token = $tokenObj;
            $payload = json_decode($JWT->decode($token,$secret),true);
            if ($payload["exp"]<time()){
                return false; 
            }
            return $payload["name"];
        }
        function select_related_cars($carInfo) {
            $sql = "SELECT c.*, a.id_marca, a.nombre_marca, m.nombre_modelo, o.nombre_combustible, t.nombre_categoria
            FROM coches AS c 
            LEFT JOIN modelos m 
            ON m.id_modelo=c.id_modelo
            INNER JOIN marcas AS a
            ON a.id_marca=m.id_marca
            INNER JOIN combustible AS o
            ON o.id_combustible=c.id_combustible
            INNER JOIN categoria AS t 
            ON t.id_categoria=c.id_categoria";
            $query = "";
            $where = false;
            foreach ($carInfo as $key => $value) {
                switch ($key) {
                    // case 'cambio':
                        
                    //         if ($where==false){
                    //             $query=" WHERE c.cambio='" . $value ."'";
                    //             $where=true;
                    //         }else {
                    //             $query.=" OR c.cambio='" . $value ."'";
                    //         }
                        
                    //     break;
                    case 'id_combustible':
                            
                                if ($where==false){
                                    $query=" WHERE c.id_combustible='" . $value ."'";
                                    $where=true;
                                }else {
                                    $query.=" OR c.id_combustible='" . $value ."'";
                                }
                            
                            break;
                    case 'id_categoria':
                            
                                if ($where==false){
                                    $query=" WHERE c.id_categoria='" . $value ."'";
                                    $where=true;
                                }else {
                                    $query.=" OR c.id_categoria='" . $value ."'";
                                }
                            
                            break;
                    case 'id_marca':
                            
                                if ($where==false){
                                    $query=" WHERE a.id_marca='" . $value ."'";
                                    $where=true;
                                }else {
                                    $query.=" OR a.id_marca='" . $value ."'";
                                }
                            
                            break;
                }
            }
            $mainsql = $sql . $query . ";";
            
            
            $conection = php_mysql::DBconect();
            $res = mysqli_query($conection, $mainsql);
            php_mysql::close($conection);
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $retrArray[] = $row;
                }// end_while
            }// end_if
            return $retrArray;
        }
        function select_all_carImages($idCar) {
            $sql = "SELECT * FROM coches_img WHERE id_coche='$idCar';";
            $conection = php_mysql::DBconect();
            $res = mysqli_query($conection, $sql);
            php_mysql::close($conection);
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $retrArray[] = $row;
                }// end_while
            }// end_if
            return $retrArray;
        }
        function select_all_brands_models() {
            $sql1 = "SELECT * FROM marcas ORDER BY nombre_marca;";
            $sql2 = "SELECT * FROM modelos ORDER BY nombre_modelo;";
            $conection = php_mysql::DBconect();
            $res1 = mysqli_query($conection, $sql1);
            $res2 = mysqli_query($conection, $sql2);
            php_mysql::close($conection);
            if (mysqli_num_rows($res1) > 0) {
                while ($row = mysqli_fetch_assoc($res1)) {
                    $retrArray[0][] = $row;
                }// end_while
            }// end_if
            if (mysqli_num_rows($res2) > 0) {
                while ($row = mysqli_fetch_assoc($res2)) {
                    $retrArray[1][] = $row;
                }// end_while
            }// end_if

            return $retrArray;
        }
        function select_all_fuels() {
            $sql = "SELECT * FROM combustible;";
            $conection = php_mysql::DBconect();
            $res = mysqli_query($conection, $sql);
            php_mysql::close($conection);
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $retrArray[] = $row;
                }// end_while
            }// end_if
            return $retrArray;
        }
        function select_all_categories() {
            $sql = "SELECT * FROM categoria;";
            $conection = php_mysql::DBconect();
            $res = mysqli_query($conection, $sql);
            php_mysql::close($conection);
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $retrArray[] = $row;
                }// end_while
            }// end_if
            return $retrArray;
        }
        function select_all_cities() {
            $sql = "SELECT DISTINCT ciudad FROM coches ORDER BY ciudad;";
            $conection = php_mysql::DBconect();
            $res = mysqli_query($conection, $sql);
            php_mysql::close($conection);
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $retrArray[] = $row;
                }// end_while
            }// end_if
            return $retrArray;
        }
        function select_car($idCar) {
            $sql = "SELECT c.*, a.id_marca, a.nombre_marca, m.nombre_modelo, o.nombre_combustible, t.nombre_categoria
            FROM coches AS c 
            LEFT JOIN modelos m 
            ON m.id_modelo=c.id_modelo
            INNER JOIN marcas AS a
            ON a.id_marca=m.id_marca
            INNER JOIN combustible AS o
            ON o.id_combustible=c.id_combustible
            INNER JOIN categoria AS t 
            ON t.id_categoria=c.id_categoria 
            WHERE id_coche='$idCar';";
            $conection = php_mysql::DBconect();
            $res = mysqli_query($conection, $sql);
            php_mysql::close($conection);
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $retrArray[] = $row;
                }// end_while
            }// end_if
            return $retrArray;
        }

        function select_filter_cars($filters) {
            $order = "ORDER BY ";
            $sql = "SELECT c.*, a.nombre_marca, m.nombre_modelo, o.nombre_combustible, t.nombre_categoria, n.n_visitas
            FROM coches AS c 
            LEFT JOIN modelos m 
            ON m.id_modelo=c.id_modelo
            INNER JOIN marcas AS a
            ON a.id_marca=m.id_marca
            INNER JOIN combustible AS o
            ON o.id_combustible=c.id_combustible
            INNER JOIN categoria AS t 
            ON t.id_categoria=c.id_categoria
            LEFT JOIN `n_visitas_coche` AS n
            ON c.id_coche=n.id_coche ";
            $filter = "";
            $where = false;

            foreach ($filters as $key => $value) {
                switch ($key) {
                    case 'brand':
                        if(strlen($value)>1){
                            if ($where==false){
                                $filter=" WHERE a.nombre_marca='" . $value ."'";
                                $where=true;
                            }else {
                            $filter.=" AND a.nombre_marca='" . $value ."'";
                            }
                        }
                        break;
                    case 'model':
                        if(strlen($value)>1){
                            if ($where==false){
                                $filter=" WHERE m.nombre_modelo='" . $value ."'";
                                $where=true;
                            } else {
                                $filter.=" AND m.nombre_modelo='" . $value ."'";
                            }
                        }

                        break;
                    case 'price':
                        if($value!=0){
                            if ($where==false){
                                $filter=" WHERE precio=" . $value;
                                $where=true;
                            } else {
                                $filter.=" AND precio=" . $value;
                            }
                        }

                        break;
                        case 'fuel':
                            if(strlen($value)>1){
                                if ($where==false){
                                    $filter=" WHERE nombre_combustible='" . $value ."'";
                                    $where=true;
                                } else {
                                    $filter.=" AND nombre_combustible='" . $value ."'";
                                }
                            }
    
                            break;
                        case 'category':
                                if(strlen($value)>1){
                                    if ($where==false){
                                        $filter=" WHERE nombre_categoria='" . $value ."'";
                                        $where=true;
                                    } else {
                                        $filter.=" AND nombre_categoria='" . $value ."'";
                                    }
                                }
        
                                break;
                        case 'city':
                                if(strlen($value)>1){
                                    if ($where==false){
                                        $filter=" WHERE ciudad='" . $value ."'";
                                        $where=true;
                                    } else {
                                        $filter.=" AND ciudad='" . $value ."'";
                                    }
                                }
        
                                break;
                        case 'order':
                            if(strlen($value)>1){
                                $order.=" " . $value . " DESC";
                            }
                            else {
                                $order.="n.n_visitas DESC , a.nombre_marca";  
                            }
                            break;
                    default:
                        break;
                }
            }
            $mainsql = $sql . $filter . $order .";";

            $conection = php_mysql::DBconect();
            $res = mysqli_query($conection, $mainsql);
            php_mysql::close($conection);
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $retrArray[] = $row;
                }// end_while
            }// end_if
            return $retrArray;
        }
        function increment_views($idCar) {
            foreach ($idCar as $key => $value) {

                $set = "INSERT INTO n_visitas_coche(id_coche,n_visitas) SELECT id_coche,0 FROM coches;";
                $update_views = "UPDATE n_visitas_coche SET n_visitas=(n_visitas+1) WHERE id_coche=".$key.";";
            }
            
            $conection = php_mysql::DBconect();
            $res_set = mysqli_query($conection, $set);
            $res_update = mysqli_query($conection, $update_views);
            php_mysql::close($conection);
            
            return $res_update;
        }

        function select_user_likes($token) {
            $dao_shop=new DAO_shop();
            $user = $dao_shop->token_decode($token);
            if ($user==false){
                return false;
            }
            $sql = "SELECT id_coche FROM favoritos AS f 
            INNER JOIN usuarios AS u 
            ON f.id_usuario=u.id
            WHERE usuario LIKE BINARY '$user';";
            $conection = php_mysql::DBconect();
            $res = mysqli_query($conection, $sql);
            php_mysql::close($conection);
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $retrArray[] = $row;
                }// end_while
            }// end_if
            return $retrArray;

        }
        function mod_user_like($token,$car) {
            $dao_shop=new DAO_shop();
            $user = $dao_shop->token_decode($token);
            if ($user==false){
                return false;
            }
            $sql_user_id = "SELECT id FROM usuarios WHERE usuario LIKE BINARY '$user';";
            $conection = php_mysql::DBconect();
            $user_id = (mysqli_query($conection, $sql_user_id)->fetch_object())->id;
            $sql = "CALL likes($user_id,$car);";
            $res = mysqli_query($conection, $sql)->fetch_object();
            php_mysql::close($conection);
            return $res;
        }
    }
?>
