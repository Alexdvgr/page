<?php include "Layout/Layout.php" ?>
      
        <div class="container"> 
          <div class="row">
            <div class="col-9">
              
              <div class="row">
                <h1 class="col-6">
                  hola mundo
                </h1>
  
                <img src="https://cdn.pixabay.com/photo/2023/03/16/08/42/camping-7856198_640.jpg" alt="" width="300" class="col-6">
        

              </div> 
             
          </div>
          <div class="col-3">
            <h1>
              historia del paisaje
            </h1>
            <img src="https://cdn.pixabay.com/photo/2023/03/16/08/42/camping-7856198_640.jpg" alt="" width="300">

          
          </div>
            
        </div>


        


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

   <form action="Controller/Registro.php" method="POST">

    <div class="row">
      <div class="col">
          <input type="text" class="form-control" placeholder="Ingrese tu nombre" name="nombre">
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="Ingrese tu Apellido" name="apellido">

      </div>

      <div class="row">
            <div class="col">
          <input type="text" class="form-control" placeholder="Ingrese tu documento" name=id>
      </div>
      <div class="col">
        <input type="email" class="form-control" placeholder="Ingrese tu correo" name="correo">
    </div>
    <div class="row">
      <div class="col">
          <input type="text" class="form-control" placeholder="Ingrese tu edad" name="edad">
      </div>
       <div class="col">
        <input type="text" class="form-control" placeholder="Ingrese tu telefono" name="tel">
    </div>
    </div>
    <button>registrarse<button>
   </form>

    <!-- Modal genérico -->
<div class="modal fade" id="mensajeModal" tabindex="-1" aria-labelledby="mensajeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mensajeModalLabel">Resultado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body" id="mensajeTexto">
        <!-- Aquí va el mensaje dinámico -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<br>
<br>

    
   <script src ="js/modal.js"></script>







   <!-- Button trigger modal -->
    <div class ="col text-center">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<table class="table table-dark table-striped">
  
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Edad</th>
      <th scope="col">Correo</th>
      <th scope="col">Telefono</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>


    </tr>
  </thead>
      <?php
      include_once "Controller/Conexion.php";
      $conexion = new Conexion();
      $conexion = $conexion->conectar();
      if ($conexion) {
        $sql = "SELECT * FROM registropersonas";
        $consulta=$conexion->prepare($sql);
        $consulta->execute();
        $i = 0;
        while($fila=$consulta-> fetch(PDO:: FETCH_ASSOC)){
          $i += 1;
        
      ?>
        

  <tbody>
    <tr>
      <th scope="row"><?php $i?></th>
      <td><?php echo $fila["Nombre"];?></td>
      <td><?php echo $fila["Apellido"];?></td>
      <td><?php echo $fila["Edad"];?></td>
      <td><?php echo $fila["Correo"];?></td>
      <td><?php echo $fila["Telefono"];?></td>
      <td><a href="Update.php" type="button" class="btn btn-success">Editar</a></td>
      <td></td>
      


    </tr>

   
  </tbody>
<?php
}}
else {
  echo "No exixte la conexion";
}
?>




</table>



      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



    </body>

    



</html>