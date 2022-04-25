<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/tema5_ximo/ximo_coche_lite/';
    include($path . "model/connect.php");
    include($path . "model/JWT.php");
    class DAO_login{
        function register($infoRegister) {
            $check = true;
            $user = $infoRegister['reg_username'];
            $email = $infoRegister['reg_email'];
            $password = $infoRegister['reg_password'];
            $avatar = $infoRegister['avatar'];
            $password_hash = password_hash($password,PASSWORD_DEFAULT);
            $sql_user = "SELECT * FROM usuarios WHERE usuario LIKE BINARY '$user';";
            $sql_email = "SELECT * FROM usuarios WHERE email='$email';";
            $sql_insert = "INSERT INTO usuarios(usuario,contrasena, email, tipo, avatar) VALUES('$user', '$password_hash', '$email','client','$avatar');";
            $conection = php_mysql::DBconect();
            $res_user = mysqli_query($conection, $sql_user);
            $res_email = mysqli_query($conection, $sql_email);
               
            if(mysqli_num_rows($res_user)>0){ 
                $check = false;
                $error = array('error'=>'Usuario no disponible',
                                'src'=>'error_reg_username');
                return $error;
            }
            if (mysqli_num_rows($res_email)>0){
                $check = false;
                $error = array('error'=>'Email no disponible',
                                'src'=>'error_reg_email');
                return $error;
            }
            if ($check==true){
                $res_insert = mysqli_query($conection, $sql_insert);
                php_mysql::close($conection);
                if ($res_insert){
                    $jwt = parse_ini_file("../../../model/jwt.ini");
                    $header = $jwt['header'];
                    $secret = $jwt['secret'];
                    $payload = '{"iat":"'.time().'","exp":"'.(time()+(60*60)).'","name":"'.$user.'"}';
                    $JWT = new JWT;
                    $token = $JWT->encode($header, $payload, $secret);
                    return $token;
                }
                else {
                    $error = array('error'=>'Algo ha ido mal al crear el token',
                                'src'=>'error_reg');
                    return $error;
                }
            }else {
                php_mysql::close($conection);
                $error = array('error'=>'Algo ha ido mal al registrarse',
                                'src'=>'error_reg');
                return $error;
            }
        }
        function login($infoLogin) {
            $check = true;
            $user = $infoLogin['log_username'];
            $password = $infoLogin['log_password'];
            $sql_user = "SELECT usuario, contrasena FROM usuarios WHERE usuario LIKE BINARY'$user';";
            $conection = php_mysql::DBconect();
            $res_user = mysqli_query($conection, $sql_user);
            php_mysql::close($conection);

            if (mysqli_num_rows($res_user)==0){
                $check = false;
                $error = array('error'=>'Usuario o contraseña incorrectos',
                                'src'=>'error_login');
                return $error;
            }
            $password_hash = $res_user->fetch_object()->contrasena;
            if (password_verify($password, $password_hash)) {
                $jwt = parse_ini_file("../../../model/jwt.ini");
                $header = $jwt['header'];
                $secret = $jwt['secret'];
                $payload = '{"iat":"'.time().'","exp":"'.(time()+(10*60)).'","name":"'.$user.'"}';
                // $payload = '{"iat":"'.time().'","exp":"'.(time()+1).'","name":"'.$user.'"}';
                $JWT = new JWT;
                $token = $JWT->encode($header, $payload, $secret);
                // return $JWT->decode($token,$secret);
                $_SESSION['user'] = $user;
                $_SESSION['time'] = time();
                return $token;
            } else {
                $check = false;
                $error = array('error'=>'Usuario o contraseña incorrectos',
                                'src'=>'error_login');
                return $error;
            }
        }
        function token_decode($tokenObj) {
            // $jwt = parse_ini_file("../../../model/jwt.ini");
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

        function select_user($token) {
            $dao_login=new DAO_login();
            $name = $dao_login->token_decode($token);
            if ($name==false){
                return false;
            }
            $sql = "SELECT * FROM usuarios WHERE usuario LIKE BINARY '$name';";
            $conection = php_mysql::DBconect();
            $res = mysqli_query($conection, $sql);
            php_mysql::close($conection);
            return $res->fetch_object();
        }
        
        function logout($token) {
            $_SESSION['user'] = "";
            $_SESSION['time'] = "";
            session_destroy();
            return $_SESSION['user'];
            
        }

        function activity() {
            if (!isset($_SESSION["time"])){
                return "inactivo";
            } else {
                if ((time() - $_SESSION["time"])>=300){
                    return "inactivo";
                } else {
                    // return "activo";
                    return time() - $_SESSION["time"];
                }
            }

        }

        function control_user($token) {
            if (!isset($_SESSION['user'])){
                return false;
            } else {
                $dao_login=new DAO_login();
                $name = $dao_login->token_decode($token);
                if ($name==false){
                    return false;
                }
                if ($name == $_SESSION['user']){
                    return true;
                } else {
                    return false;
                }
            }

        }

        function refresh_cookie() {
            session_regenerate_id();
            $_SESSION["time"] = time();
            return $_SESSION["time"];
        }

        function refresh_token($token) {
            $dao_login=new DAO_login();
            $user = $dao_login->token_decode($token);
            if ($user==false){
                return false;
            }
            
            if ($user == $_SESSION['user']) {
                $jwt = parse_ini_file("../../../model/jwt.ini");
                $header = $jwt['header'];
                $secret = $jwt['secret'];
                $payload = '{"iat":"'.time().'","exp":"'.(time()+(10*60)).'","name":"'.$user.'"}';
                $JWT = new JWT;
                $token = $JWT->encode($header, $payload, $secret);
                return $token;

            } else {
                return false;
            }
        }
        
        
    }
?>
