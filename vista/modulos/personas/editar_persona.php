<meta charset="utf-8">
<div class="col-md-12">
        <h1> Editar Persona</h1>
        
    </div>
    <div clase="col-md-12">
   <div class="pull-right">
     <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Mostar Personas" href="index.php?action=mostrar_persona"> 
       <i class='fas fa-arrow-alt-circle-left'></i>
     </a>
   </div>
 </div> 
<div class="container">
  <form method="POST" enctype="multipart/form-data" accept_charset="utf-8">
   
    
    <div class="form-group" >
      <label for="nombre">Escriba el nombre</label>
      <input type="text" class="form-control" id="nvnombre" placeholder="" name="nvnombre" value="<?php echo $_GET['nombre'];?>">
    </div>

    <div class="form-group">
      <label for="appa">Escriba el apellido paterno</label>
      <input type="text" class="form-control" id="nvappa" placeholder="" name="nvappa"value="<?php echo $_GET['apellidop'];?>">
    </div>

    <div class="form-group">
      <label for="apma">Escriba el apellido materno</label>
      <input type="text" class="form-control" id="nvapma" placeholder="" name="nvapma"value="<?php echo $_GET['apellidom'];?>">
    </div>

    <div class="form-group">
      <label for="foto">Seleccione la foto</label>
      <input type="file" class="form-control" id="nvfoto" name="nvfoto">
      <?php echo $_GET['comentario'];?>
    </div>

    

    <div class="form-group">
      <label for="tel">Escriba el telefono celular</label>
      <input type="number" class="form-control" id="nvtel" placeholder="" name="nvtel"value="<?php echo $_GET['cel'];?>">
    </div>

   


      <div class="form-group">
      <label for="sexo">Escriba el sexo</label>
      <input type="text" class="form-control" id="nvsexo" placeholder="Hombre/Mujer" name="nvsexo"value="<?php echo $_GET['sexo'];?>">
           
    
  </div>
  <div class="form-group">
      <label for="dom">Escriba el domicilio</label>
      <input type="text" class="form-control" id="nvdom" placeholder="" name="nvdom"value="<?php echo $_GET['direccion'];?>">
           
    
  </div>
   <div class="form-group">
      <label for="dom">Seleccione el rol</label>
      
      <select class="form-select" aria-label="Default select example" id="nvtip" placeholder="" name="nvtip" value="<?php echo $_GET['tipo'];?>">
  <option selected>Selecciona el tipo</option>
  <option value="1">Empleado</option>
  <option value="2">Proveedor</option>
  
</select>
           
    
  </div>
  
  <button type="submit" class="btn btn-primary btn-lg ">Guardar</button>
  </form>

</div>
<br>
<br>
 

  <?php 
   if(isset($_GET['nombre'])&isset($_GET['apellidop'])&isset($_GET['apellidom'])&isset($_GET['foto'])&isset($_GET['cel'])&isset($_GET['sexo'])&isset($_GET['direccion'])&isset($_GET['tipo'])&isset($_GET['comentario'])){
    $registro = new Controller();
    $registro -> editarPersonaController($_GET['pk_persona'],$_GET['nombre'],$_GET['apellidop'],$_GET['apellidom'],$_GET['foto'],$_GET['cel'],$_GET['sexo'],$_GET['direccion'],$_GET['tipo'],$_GET['comentario']);
   

  }
   ?>
