<meta charset="utf-8">
<div class="col-md-12">
        <h1> Agregar Marca</h1>
        
    </div>
    <div clase="col-md-12">
   <div class="pull-right">
    <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Mostar Personas" href="index.php?action=mostrar_marca"> 
       <i class='fas fa-arrow-alt-circle-left'></i>
     </a>
   </div>
 </div> 
<div class="container">
  <form method="POST" accept_charset="utf-8">
   
    
    <div class="form-group" >
      <label for="marca">Escriba el nombre de la marca</label>
      <input type="text" class="form-control" id="marca" placeholder="" name="marca">
    </div>

   
    
  </div>
  <button type="submit" class="btn btn-primary btn-lg ">Guardar</button>
  </form>

</div>
<br>
<br>
 

  <?php 
    $registroM = new Controller();
    $registroM -> registroMarcaController();
   ?>
