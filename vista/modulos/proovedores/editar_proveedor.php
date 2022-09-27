<meta charset="utf-8">
<div class="col-md-12">
        <h1> Editar Proveedor</h1>
        
    </div>
    <div clase="col-md-12">
   <div class="pull-right">
    <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Mostar Personas" href="index.php?action=mostrar_proveedor"> 
       <i class='fas fa-arrow-alt-circle-left'></i>
     </a>
   </div>
 </div> 
<div class="container">
  <form method="POST" accept_charset="utf-8">
   
    
    <div class="form-group">
        <label for="marca"><b>Persona:</b></label>
         <select class="js-example-basic-single"  id="nvoPersona" placeholder="" name="nvoPersona" style="width: 100%" required >
            <option selected > Modificar....</option>
            <?php
              $proveedor = Controller::consultaPersona2();
              foreach ($proveedor as $datos1 =>$valor1)
              {
                echo '<option value="'.$valor1["pk_persona"].'">'.$valor1["nombrep"].' '.$valor1["apellidop"].' '.$valor1["apellidom"].'</option>';
              }
            ?>
          </select>
           
    
  </div>
   <div class="form-group">
        <label for="marca"><b>Marca:</b></label>
         <select class="js-example-basic-single"  id="nvoMarca" placeholder="" name="nvoMarca" style="width: 100%" required >
            <option selected >Modificar...</option>
            <?php
              $marca = Controller::consultaMarca();
              foreach ($marca as $datos2 =>$valor2)
              {
                echo '<option value="'.$valor2["pk_marca"].'">'.$valor2["nombre"].'</option>';
              }
            ?>
          </select>
           
    
  </div>

   
    
  
  <button type="submit" class="btn btn-primary btn-lg ">Guardar</button>
  </form>

</div>

<?php

  if(isset($_GET['pk_proveedor'])&&isset($_GET['pk_persona']) && isset($_GET['pk_marca'])){

  $calcular = new Controller();
  $calcular -> editarProveedorController($_GET['pk_persona'], $_GET['pk_marca'], $_GET['pk_proveedor']);

  }

?>