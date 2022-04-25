<?php
    class php_mysql{
        public static function DBconect() {
            $host = 'localhost';
            $user = "root";
            $pass = "1234";
            $db = "coches_ximo";
            $port = 3306;

            $connect = mysqli_connect($host, $user, $pass, $db, $port)or die("Mysql error :" . mysqli_error($connect));
            return $connect;
        }
        public static function close($connect) {
            mysqli_close($connect);
        }
    }
    
?>