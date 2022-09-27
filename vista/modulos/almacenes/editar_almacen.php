<meta charset="utf-8">
<div class="col-md-12">
        <h1> Editar Almacen</h1>
        
    </div>
    <div clase="col-md-12">
   <div class="pull-right">
    <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Mostar Personas" href="index.php?action=mostrar_marca"> 
       <i class='fas fa-arrow-alt-circle-left'></i>
     </a>
   </div>
 </div> 

<div class="col-sm-6 offset-sm-3 offset-md-4 col-md-4">
  <div class="px-4 py-3">
    <div></div>
    <form method="POST" accept="UTF-8" class="needs-validation" novalidate>

      <div class="form-group">
        <label for="nvoAlmacen">Almacen:</label>
        <input type="text" class="form-control" id="nvoAlmacen" name="nvoAlmacen" value="<?php echo $_GET['almacen']; ?>"required="" minlength="3" maxlength="30" >
        <div class="invalid-feedback">
        Porfavor ingrese el nuevo nombre del Almacen (almenos 3 caracteres).
        </div>
      </div>
       <div class="form-group">
        <label for="nvoUbicacion">Ubicacion:</label>
        <input type="text" class="form-control" id="nvoUbicacion" name="nvoUbicacion" value="<?php echo $_GET['ubicacion']; ?>" >
        <div class="invalid-feedback">
        Porfavor ingrese el nuevo nombre de la Ubicacion (almenos 3 caracteres).
        </div>
      </div>

      <button type="submit" class="btn btn-outline-success btn-lg btn-block">Aplicar cambio</button>
      <div style="font-size: 1.08em;">
      ¿Ya modificaste la marca?&nbsp; <a href="index.php?action=mostrar_marca">Ver Marcas</a>
      </div>
    </form>
  </div>
</div>
<br><br>
<?php

  $calcular = new Controller();
  $calcular -> editarAlmacenController($_GET['almacen'],$_GET['ubicacion'],$_GET['pk_almacen']); 

?>