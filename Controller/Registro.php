<?php
/**
 * Procesamiento del formulario de registro
 * Inserta nuevos registros en la base de datos
 */

// Importar la clase de conexión
include_once "Conexion.php";
$conexion = new Conexion();
$conexion = $conexion->conectar();

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$cedula = $_POST['id'];
$correo = $_POST['correo'];
$edad = $_POST['edad'];
$tel = $_POST['tel'];

// Verificar la conexión antes de procesar
if ($conexion) {
    try {
        // Preparar la consulta SQL con parámetros para prevenir inyección SQL
        $consulta = "INSERT INTO registropersonas(Id, Nombre, Apellido, Edad, Correo, Telefono) 
                     VALUES (:id, :nombre, :apellido, :edad, :correo, :telefono)";
        
        // Preparar y ejecutar la consulta con los datos
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(':id', $cedula);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':edad', $edad);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':telefono', $tel);
        $stmt->execute();

        // Redirigir con mensaje de éxito
        header("Location: ../index.php?success=1");
        exit;
        
    } catch (PDOException $e) {
        // Manejar errores específicos
        if ($e->getCode() == 23000) {
            // Error por duplicado (violación de clave única)
            header("Location: ../index.php?mensaje=Duplicado");
        } else {
            // Otros errores de base de datos
            header("Location: ../index.php?mensaje=Error");
        }
        exit();
    }
} else {
    // Error de conexión a la base de datos
    header("Location: ../index.php?mensaje=SinConexion");
    exit();
}
?>
