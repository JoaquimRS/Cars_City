<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/tema5_ximo/ximo_coche_lite/';
    include($path . "model/connect.php");

    class DAO_car{

        function select_all_car() {
            $sql = "SELECT c.*, a.nombre_marca, m.nombre_modelo FROM coches AS c INNER JOIN modelos as m ON c.id_modelo=m.id_modelo INNER JOIN marcas AS a ON m.id_marca=a.id_marca ORDER BY a.nombre_marca;";
            //$sql = "SELECT * FROM clientes";
            $conection = php_mysql::DBconect();
            $res = mysqli_query($conection, $sql);
            php_mysql::close($conection);
            return $res;
        }
        function read_car($id_car){
            $sql = "SELECT c.*, a.nombre_marca, m.nombre_modelo FROM coches AS c INNER JOIN modelos as m ON c.id_modelo=m.id_modelo INNER JOIN marcas AS a ON m.id_marca=a.id_marca WHERE id_coche = '$id_car';";
            $conection = php_mysql::DBconect();
            $res = mysqli_query($conection, $sql);
            php_mysql::close($conection);
            return $res;
            
        }
        function read_car_modal($id_car){
            $sql = "SELECT c.*, a.nombre_marca, m.nombre_modelo FROM coches AS c INNER JOIN modelos as m ON c.id_modelo=m.id_modelo INNER JOIN marcas AS a ON m.id_marca=a.id_marca WHERE id_coche = '$id_car';";
            $conection = php_mysql::DBconect();
            $res = mysqli_query($conection, $sql)->fetch_object();
            php_mysql::close($conection);
            return $res;
            
        }

        function create_car($car_info) {
            $img = $car_info['img'];
            $bastidor = $car_info['bastidor'];
            $matricula = $car_info['matricula'];
            $idmodelo = $car_info['modelo'];
            $kms = $car_info['kms'];
            $color = $car_info['color'];
            $puertas = $car_info['puertas'];
            $plazas = $car_info['plazas'];
            $motor = $car_info['motor'];
            $combustible = $car_info['combustible'];
            $fecha = $car_info['fmatri'];
            $categoria = $car_info['categoria'];
            $cambio = $car_info['cambio'];
            $precio = $car_info['precio'];
            $ciudad = $car_info['ciudad'];
            $descripcion = $car_info['descripcion'];
            $sql = "INSERT INTO `coches` 
                    (`id_coche`, `IMG`, `bastidor`, `matricula`, `id_modelo`, `kms`, `color`, `puertas`, `plazas`, `motor`, `combustible`, `fecha`, `categoria`, `cambio`, `precio`, `ciudad`, `descripcion`) 
                    VALUES (NULL, '', '$bastidor', '$matricula', '$idmodelo', '$kms', '$color', '$puertas', '$plazas', '$motor', '$combustible', '$fecha', '', '$cambio', '$precio', '$ciudad', '$descripcion');";
            echo $sql;
            $conection = php_mysql::DBconect();
            $res = mysqli_query($conection, $sql);
            php_mysql::close($conection); 
            return $res;
            
            
        }
        function update_car($car_info) {
            $matricula = $car_info['matricula'];
            $idmodelo = $car_info['modelo'];
            $kms = $car_info['kms'];
            $color = $car_info['color'];
            $puertas = $car_info['puertas'];
            $motor = $car_info['motor'];
            $combustible = $car_info['combustible'];
            $cambio = $car_info['cambio'];
            
            $sql = "UPDATE coches "
                .  "SET matricula='$matricula',id_modelo='$idmodelo',kms='$kms',color='$color',puertas='$puertas',motor='$motor',combustible='$combustible',cambio='$cambio' " 
                .  "WHERE matricula='$matricula';";
            
            $conection = php_mysql::DBconect();
            $res = mysqli_query($conection, $sql);
            php_mysql::close($conection); 
            return $res;
            
            
        }

        function select_models() {
            $sql = "SELECT modelos.id_modelo, modelos.nombre_modelo, marcas.nombre_marca FROM modelos INNER JOIN marcas ON modelos.id_marca=marcas.id_marca ORDER BY marcas.nombre_marca;";
            //$sql = "SELECT * FROM clientes";
            $conection = php_mysql::DBconect();
            $res = mysqli_query($conection, $sql);
            php_mysql::close($conection);
            return $res;
        }

        function delete_car($matricula) {
            $sql = "DELETE FROM coches WHERE matricula='$matricula';";
            $conection = php_mysql::DBconect();
            $res = mysqli_query($conection, $sql);
            php_mysql::close($conection);
            return $res;
        }
    }
?>