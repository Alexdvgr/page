<?php
/**
 * Clase para la conexión a la base de datos
 * Proporciona el método para establecer conexión PDO
 */
class Conexion {
    // Constructor y destructor
    public function __construct() {}
    public function __destruct() {}
    
    /**
     * Establece conexión a la base de datos utilizando PDO
     * @return PDO|null Objeto de conexión o null si falla
     */
    public function conectar() {
        include_once "Configuracion.php";
        $con = null;
        
        try {
            // Crear conexión PDO con MySQL
            $con = new PDO("mysql:host=".HOST.";dbname=".DB.";charset=utf8", USUARIO, CLAVE);
            // Configurar el manejo de errores PDO
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            // Capturar y mostrar errores de conexión
            echo "Error de conexión a la base de datos: " . $ex->getMessage();
        }

        return $con;
    }
}
?>