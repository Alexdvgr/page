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

<<<<<<< HEAD
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Editar Registro - PHP Curso</title>
    <meta name="description" content="Edición de registros en el sistema">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap y fuentes -->
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/flatly/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/cards.css">
    
    <!-- Estilos adicionales para el diseño de página -->
    <style>
      body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
      }
      
      .content-wrapper {
        flex: 1;
      }
      
      footer {
        margin-top: auto;
      }
    </style>
</head>
<body>
  <!-- Envuelve todo el contenido principal en un div con clase content-wrapper -->
  <div class="content-wrapper">
    <!-- Barra de navegación -->
    <header>
      <nav class="navbar navbar-expand-lg mb-4">
        <div class="container-fluid">
          <a class="navbar-brand fw-bold" href="index.php"><i class="bi bi-code-slash"></i> PHP CURSO</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Sobre</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contacto</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
=======

<?php $pageTitle = 'Editar Registro - PHP Curso'; include 'layouts/header.php'; ?>
>>>>>>> f2eb8cf (Refactorización: mover el layout compartido a la carpeta layouts y actualizar las páginas para usar includes)

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
<<<<<<< HEAD
              <!-- Campo oculto para el ID -->
              <input type="hidden" name="id" value="<?php echo htmlspecialchars($registro['Id']); ?>">
=======

              <div class="mb-3">
                <label for="Id" class="form-label">ID</label>
                <input type="text" class="form-control" id="Id" name="Id" 
                        placeholder="<?php echo htmlspecialchars($registro['Id']); ?>" disabled>
>>>>>>> f2eb8cf (Refactorización: mover el layout compartido a la carpeta layouts y actualizar las páginas para usar includes)
              
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

<<<<<<< HEAD
  <!-- Pie de página -->
  <footer>
    <small>© <?php echo date('Y'); ?> PHP Curso - Proyecto de Registro</small>
  </footer>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
=======
  <?php include 'layouts/footer.php'; ?>
>>>>>>> f2eb8cf (Refactorización: mover el layout compartido a la carpeta layouts y actualizar las páginas para usar includes)
