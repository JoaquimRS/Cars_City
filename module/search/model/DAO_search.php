<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/tema5_ximo/ximo_coche_lite/';
    include($path . "model/connect.php");
    class DAO_search{
        function select_all_brands() {
            $sql = "SELECT * FROM marcas ORDER BY nombre_marca;";
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
            $sql = "SELECT * FROM categoria ORDER BY nombre_categoria;";
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
        
        function select_filter_cities($filters) {
            $sql = "SELECT DISTINCT c.ciudad
            FROM coches AS c 
            LEFT JOIN modelos m 
            ON m.id_modelo=c.id_modelo
            INNER JOIN marcas AS a
            ON a.id_marca=m.id_marca
            INNER JOIN combustible AS o
            ON o.id_combustible=c.id_combustible
            INNER JOIN categoria AS t 
            ON t.id_categoria=c.id_categoria";
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
                    
                    default:
                        break;
                }
            }
            $mainsql = $sql . $filter . " ORDER BY c.ciudad;";

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
    }
?>