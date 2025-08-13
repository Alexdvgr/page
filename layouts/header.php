<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo isset($pageTitle) ? $pageTitle : 'PHP Curso'; ?></title>
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
  <div class="content-wrapper">
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
