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
      <input type="text" class="form-control" id="nvnombre" placeholder="" name="nvnombre">
    </div>

    <div class="form-group">
      <label for="appa">Escriba el apellido paterno</label>
      <input type="text" class="form-control" id="nvappa" placeholder="" name="nvappa">
    </div>

    <div class="form-group">
      <label for="apma">Escriba el apellido materno</label>
      <input type="text" class="form-control" id="nvapma" placeholder="" name="nvapma">
    </div>

    <div class="form-group">
      <label for="foto">Seleccione la foto</label>
      <input type="file" class="form-control" id="nvfoto" name="nvfoto">
    </div>

    

    <div class="form-group">
      <label for="tel">Escriba el telefono celular</label>
      <input type="number" class="form-control" id="nvtel" placeholder="" name="nvtel">
    </div>

   


      <div class="form-group">
      <label for="sexo">Escriba el sexo</label>
      <input type="text" class="form-control" id="nvsexo" placeholder="Hombre/Mujer" name="nvsexo">
           
    
  </div>
  <div class="form-group">
      <label for="dom">Escriba el domicilio</label>
      <input type="text" class="form-control" id="nvdom" placeholder="" name="nvdom">
           
    
  </div>
   <div class="form-group">
      <label for="dom">Seleccione el rol</label>
      
      <select class="form-select" aria-label="Default select example" id="nvtip" placeholder="" name="nvtip">
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
    $registro = new Controller();
    $registro -> registroPersonaController();
   ?>
