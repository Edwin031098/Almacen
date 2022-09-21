<meta charset="utf-8">
<div class="col-md-12">
        <h1> Agregar Proveedor</h1>
        
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
         <select class="js-example-basic-single"  id="persona" placeholder="persona" name="persona" style="width: 100%" required >
            <option selected>Persona...</option>
            <?php
              $persona = Controller::consultaPersona();
              foreach ($persona as $datos1 =>$valor1)
              {
                echo '<option value="'.$valor1["pk_persona"].'">'.$valor1["nombrep"].' '.$valor1["apellidop"].' '.$valor1["apellidom"].'</option>';
              }
            ?>
          </select>
           
    
  </div>
   <div class="form-group">
        <label for="marca"><b>Marca:</b></label>
         <select class="js-example-basic-single"  id="marca" placeholder="marca" name="marca" style="width: 100%" required >
            <option selected>Marca...</option>
            <?php
              $marca = Controller::consultaMarca();
              foreach ($marca as $datos1 =>$valor1)
              {
                echo '<option value="'.$valor1["pk_marca"].'">'.$valor1["nombre"].'</option>';
              }
            ?>
          </select>
           
    
  </div>

   
    
  
  <button type="submit" class="btn btn-primary btn-lg ">Guardar</button>
  </form>

</div>
<br>
<br>
 

  <?php 
    $registroM = new Controller();
    $registroM -> registroProveedorController();
   ?>
