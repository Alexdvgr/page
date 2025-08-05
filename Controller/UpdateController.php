<?php
// filepath: c:\xampp\htdocs\pagina1\Controller\UpdateController.php
/**
 * Controlador para actualizar registros
 * Recibe los datos del formulario y actualiza la base de datos
 */

// Verificar si la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../index.php");
    exit;
}

// Obtener datos del formulario
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = $_POST['edad'];
$correo = $_POST['correo'];
$tel = $_POST['tel'];

// Validar datos (podrías añadir validaciones más específicas)
if (empty($id) || empty($nombre) || empty($apellido) || empty($edad) || empty($correo) || empty($tel)) {
    header("Location: ../update.php?id=$id&mensaje=Incompleto");
    exit;
}

// Importar la clase de conexión
include_once "Conexion.php";
$conexion = new Conexion();
$conexion = $conexion->conectar();

// Verificar la conexión antes de procesar
if ($conexion) {
    try {
        // Preparar la consulta SQL para actualizar el registro
        $sql = "UPDATE registropersonas 
                SET Nombre = :nombre, Apellido = :apellido, Edad = :edad, 
                    Correo = :correo, Telefono = :telefono 
                WHERE Id = :id";
        
        // Preparar y ejecutar la consulta con los datos
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':edad', $edad);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':telefono', $tel);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        // Verificar si se actualizó correctamente
        if ($stmt->rowCount() > 0) {
            // Redirigir con mensaje de éxito
            header("Location: ../index.php?success=2");
            exit;
        } else {
            // Sin cambios o registro no encontrado
            header("Location: ../index.php?mensaje=SinCambios");
            exit;
        }
        
    } catch (PDOException $e) {
        // Manejar errores de base de datos
        header("Location: ../index.php?mensaje=Error");
        exit;
    }
} else {
    // Error de conexión a la base de datos
    header("Location: ../index.php?mensaje=SinConexion");
    exit;
}
?>