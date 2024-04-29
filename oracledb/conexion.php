<?php
    
    class Conexion{
        public function Conectar(){
            define('HOST', "LAPTOP-I5AH9HJ2");
            define('PORT', 1521);
            define('NAME', 'xe');
            define('USER', "HR");
            define('PASS', 'hrpass');

            $bd_settings = "
            (DESCRIPTION =
                (ADDRESS = (PROTOCOL = TCP)(HOST = ". HOST .")(PORT = ". PORT ."))
                (CONNECT_DATA =
                    (SERVER = DEDICATED)
                    (SERVICE_NAME = ". NAME .")
                )
            )
            ";

            try{
                $bd = new PDO('oci:dbname='. $bd_settings ,USER, PASS);
                $bd -> setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
                $bd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $bd;
            }
            catch(Exception $e){
                echo "ERROR DE CONEXION " . $e->getMessage();
            }
        }
    }
    
