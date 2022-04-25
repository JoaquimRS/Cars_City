<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/tema5_ximo/ximo_coche_lite/';
    include($path . "model/connect.php");
    class DAO_home{
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
        function select_3_fuels() {
            $sql = "SELECT * FROM combustible WHERE id_combustible IN(1,2,3,11) ORDER BY id_combustible;";
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
        function select_4_categories() {
            $sql = "SELECT * FROM categoria LIMIT 4";
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
    }
?>