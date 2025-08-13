<?php
/**
 * Formulario de edición de registros
 * Muestra un formulario con los datos del registro seleccionado
 */

// Verificar si se recibió un ID
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php?mensaje=NoID");
    exit;
}

$id = $_GET['id'];

// Cargar conexión
include_once "Controller/Conexion.php";
$conexion = new Conexion();
$conexion = $conexion->conectar();

if (!$conexion) {
    header("Location: index.php?mensaje=SinConexion");
    exit;
}

// Consultar los datos del registro
$sql = "SELECT * FROM registropersonas WHERE Id = :id";
$consulta = $conexion->prepare($sql);
$consulta->bindParam(':id', $id);
$consulta->execute();

// Verificar si se encontró el registro
if ($consulta->rowCount() == 0) {
    header("Location: index.php?mensaje=NoExiste");
    exit;
}

// Obtener los datos del registro
$registro = $consulta->fetch(PDO::FETCH_ASSOC);
?>



<?php $pageTitle = 'Editar Registro - PHP Curso'; include 'layouts/header.php'; ?>

    <!-- Sección de formulario de edición -->
    <section class="container my-5">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="card p-4 register-card">
            <h3 class="mb-3 text-center fw-bold">
              <i class="bi bi-pencil-square me-2"></i>Editar Registro
            </h3>
            <p class="mb-4 text-center" style="color:var(--mint-dark);">
              Modifica los datos del registro seleccionado.
            </p>
            
            <!-- Formulario de edición -->
            <form action="Controller/UpdateController.php" method="POST">
              <input type="hidden" name="id" value="<?php echo htmlspecialchars($registro['Id']); ?>">
              <div class="mb-3">
                <label for="Id" class="form-label">ID</label>
                <input type="text" class="form-control" id="Id" name="Id" 
                       value="<?php echo htmlspecialchars($registro['Id']); ?>" disabled>
              </div>
              <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" 
                       value="<?php echo htmlspecialchars($registro['Nombre']); ?>" required>
              </div>
              <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" 
                       value="<?php echo htmlspecialchars($registro['Apellido']); ?>" required>
              </div>
              <div class="mb-3">
                <label for="edad" class="form-label">Edad</label>
                <input type="text" class="form-control" id="edad" name="edad" 
                       value="<?php echo htmlspecialchars($registro['Edad']); ?>" 
                       pattern="[0-9]{1,3}" maxlength="3" required>
              </div>
              
              <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" class="form-control" id="correo" name="correo" 
                       value="<?php echo htmlspecialchars($registro['Correo']); ?>" required>
              </div>
              
              <div class="mb-4">
                <label for="tel" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="tel" name="tel" 
                       value="<?php echo htmlspecialchars($registro['Telefono']); ?>" required>
              </div>
              
              <div class="d-flex gap-2">
                <button class="btn btn-success flex-grow-1 fw-bold" type="submit">
                  <i class="bi bi-save"></i> Guardar Cambios
                </button>
                <a href="index.php" class="btn btn-secondary fw-bold">
                  <i class="bi bi-x-circle"></i> Cancelar
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php include 'layouts/footer.php'; ?>