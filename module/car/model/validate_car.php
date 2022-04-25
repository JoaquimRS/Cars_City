<?php
    function validate_matricula($matricula){
        $sql = "SELECT * FROM coches WHERE matricula = '$matricula';";
        $conection = php_mysql::DBconect();
        $res = mysqli_query($conection, $sql);
        php_mysql::close($conection);
        if($res->num_rows === 0){
            return false;
        }
        return true;
        
    }
    function validate_bastidor($bastidor){
        $sql = "SELECT * FROM coches WHERE bastidor = '$bastidor';";
        $conection = php_mysql::DBconect();
        $res = mysqli_query($conection, $sql);
        php_mysql::close($conection);
        if($res->num_rows === 0){
            return false;
        }
        return true;
        
    }
    


    function validate_car($car){
        $check=true;
        $error_msg="";
        $matricula=validate_matricula($car['matricula']);
        $bastidor=validate_bastidor($car['bastidor']);
        if($matricula) {
            $check=false;
            $error_msg="La matricula " . $car['matricula'] . " ya existe";
            echo "<script>toastr.warning('".$error_msg."');</script>";
        }
        if($bastidor) {
            $check=false;
            $error_msg="El nº bastidor " . $car['bastidor'] . " ya existe";
            echo "<script>toastr.warning('".$error_msg."');</script>";
        }
        
        return $check;
    }

?>