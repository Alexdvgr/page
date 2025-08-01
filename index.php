<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PHP Curso - Registro</title>
    <meta name="description" content="Sistema de registro de personas para proyecto académico">
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
    <link rel="stylesheet" href="css/modal.css">
</head>
<body>
  <!-- Barra de navegación -->
  <header>
    <nav class="navbar navbar-expand-lg mb-4">
      <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#"><i class="bi bi-code-slash"></i> PHP CURSO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" href="#">Inicio</a>
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

  <!-- Sección Hero -->
  <section class="hero-section">
    <h1 class="hero-title">Sistema de Registro PHP</h1>
    <p class="hero-subtitle">Un proyecto académico moderno y minimalista para gestionar registros de personas.</p>
    <a href="#registro" class="hero-btn">Comenzar</a>
  </section>

  <!-- Sección de características -->
  <section class="container my-5">
    <h2 class="section-title">¿Qué puedes hacer?</h2>
    <div class="row g-4 justify-content-center">
      <div class="col-md-4">
        <div class="card p-4 text-center h-100">
          <i class="bi bi-person-plus display-4 mb-3"></i>
          <h3 class="mb-2">Registrar Personas</h3>
          <p>Agrega nuevos usuarios de forma sencilla y rápida.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card p-4 text-center h-100">
          <i class="bi bi-table display-4 mb-3"></i>
          <h3 class="mb-2">Ver Registros</h3>
          <p>Consulta y administra los datos registrados en una tabla clara.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card p-4 text-center h-100">
          <i class="bi bi-shield-check display-4 mb-3"></i>
          <h3 class="mb-2">Seguro y Fácil</h3>
          <p>Interfaz intuitiva y segura, ideal para prácticas académicas.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Sección de formulario de registro -->
  <section id="registro" class="container my-5 position-relative">
    <h2 class="section-title">Registro de Persona</h2>
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="card p-4 register-card">
          <h3 class="mb-3 text-center fw-bold">Registrar</h3>
          <p class="mb-4 text-center" style="color:var(--mint-dark);">Completa el formulario para registrarte en el sistema.</p>
          <form action="Controller/Registro.php" method="POST">
            <div class="mb-3">
              <input type="text" class="form-control" placeholder="Nombre" name="nombre" required>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" placeholder="Apellido" name="apellido" required>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" placeholder="Documento" name="id" required>
            </div>
            <div class="mb-3">
              <input type="email" class="form-control" placeholder="Correo" name="correo" required>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" placeholder="Edad" name="edad" pattern="[0-9]{1,3}" maxlength="3" required>
            </div>
            <div class="mb-4">
              <input type="text" class="form-control" placeholder="Teléfono" name="tel" required>
            </div>
            <button class="btn btn-success w-100 fw-bold" type="submit">
              <i class="bi bi-person-check"></i> Registrarse
            </button>
          </form>
        </div>
      </div>
    </div>
    <!-- Botón para mostrar registros -->
    <div style="position: absolute; right: 15px; bottom: 15px; z-index: 10;">
      <button id="fabRegistros" type="button" class="btn btn-info fab-registros fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="bi bi-table"></i> Mostrar registros
      </button>
    </div>
  </section>

  <!-- Modal para mostrar registros -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-table"></i> Lista de Personas Registradas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <table class="table table-custom align-middle">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Editar</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // Cargar conexión y obtener datos
              include_once "Controller/Conexion.php";
              $conexion = new Conexion();
              $conexion = $conexion->conectar();
              
              if ($conexion) {
                // Consulta para obtener registros
                $sql = "SELECT * FROM registropersonas";
                $consulta = $conexion->prepare($sql);
                $consulta->execute();
                $i = 0;
                
                // Mostrar cada registro en la tabla
                while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
                  $i += 1;
              ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo htmlspecialchars($fila["Nombre"], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($fila["Apellido"], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($fila["Edad"], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($fila["Correo"], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($fila["Telefono"], ENT_QUOTES, 'UTF-8'); ?></td>
                <td>
                  <a href="#" class="btn btn-success btn-sm" title="Editar"><i class="bi bi-pencil-square"></i></a>
                </td>
                <td>
                  <a href="#" class="btn btn-danger btn-sm" title="Eliminar"><i class="bi bi-trash"></i></a>
                </td>
              </tr>
              <?php
                }
              } else {
                echo '<tr><td colspan="8" class="text-center text-danger">No existe la conexión</td></tr>';
              }
              ?>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button id="modalClose" type="button" class="btn" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Toast de notificación de registro exitoso -->
  <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1100">
    <div id="registroToast" class="toast align-items-center registro-toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body">
          <i class="bi bi-check-circle-fill"></i> Registro exitoso
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Cerrar"></button>
      </div>
    </div>
  </div>

  <!-- Pie de página -->
  <footer>
    <small>© <?php echo date('Y'); ?> PHP Curso - Proyecto de Registro</small>
  </footer>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/modal.js"></script>
  <script>
  // Mostrar toast cuando el registro es exitoso
  window.addEventListener('DOMContentLoaded', function() {
    const params = new URLSearchParams(window.location.search);
    if (params.get('success') === '1') {
      const toast = new bootstrap.Toast(document.getElementById('registroToast'));
      toast.show();
      // Eliminar parámetro de URL sin recargar la página
      params.delete('success');
      const newUrl = window.location.pathname + (params.toString() ? '?' + params.toString() : '');
      window.history.replaceState({}, '', newUrl);
    }
  });
  </script>
</body>
</html>