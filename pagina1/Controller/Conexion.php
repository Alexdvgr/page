<?php
class conexion {
    public function _construct() {}
    public function _destruct() {}
    
    public function conectar() {
        include_once "configuracion.php";
        $con=null;
        try{
            $con=new PDO("mysql:localhost=".HOST.":81;dbname=".DB.";charset=utf8",USUARIO,CLAVE);
				$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $ex){
            echo "BASE DE DATOS INCORRECTA".$ex ->get_Message();
        }

        return $con; 



    }
    
}



?>