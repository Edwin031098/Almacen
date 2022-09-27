<meta charset="utf-8">
<div class="col-md-12">
        <h1> Agregar Persona</h1>
        
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
      <input type="text" class="form-control" id="nombre" placeholder="" name="nombre">
    </div>

    <div class="form-group">
      <label for="appa">Escriba el apellido paterno</label>
      <input type="text" class="form-control" id="appa" placeholder="" name="appa">
    </div>

    <div class="form-group">
      <label for="apma">Escriba el apellido materno</label>
      <input type="text" class="form-control" id="apma" placeholder="" name="apma">
    </div>

    <div class="form-group">
      <label for="foto">Seleccione la foto</label>
      <input type="file" class="form-control" id="foto" name="foto">
    </div>

    

    <div class="form-group">
      <label for="tel">Escriba el telefono celular</label>
      <input type="number" class="form-control" id="tel" placeholder="" name="tel">
    </div>

   


      <div class="form-group">
      <label for="sexo">Escriba el sexo</label>
      <input type="text" class="form-control" id="sexo" placeholder="Hombre/Mujer" name="sexo">
           
    
  </div>
  <div class="form-group">
      <label for="dom">Escriba el domicilio</label>
      <input type="text" class="form-control" id="dom" placeholder="" name="dom">
           
    
  </div>
   <div class="form-group">
      <label for="dom">Seleccione el rol</label>
      
      <select class="form-select" aria-label="Default select example" id="tip" placeholder="" name="tip">
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
