
<meta charset="utf-8">
<div class="col-md-12">
        <h1> Editar Empleado</h1>
        
    </div>
    <div clase="col-md-12">
   <div class="pull-right">
    <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Mostar Empleados" href="index.php?action=mostrar_trabajador"> 
       <i class='fas fa-arrow-alt-circle-left'></i>
     </a>
   </div>
 </div> 
<div class="container">
  <form method="POST" accept_charset="utf-8">
   
    
    <div class="form-group">
        <label for="marca"><b>Persona:</b></label>
         <select class="js-example-basic-single"  id="nvoPersona"  name="nvoPersona" style="width: 100%" required >
            <option selected >Modificar....</option>
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
        <label for="marca"><b>Cargo:</b></label>
         <select class="js-example-basic-single"  id="nvoCargo" placeholder="cargo" name="nvoCargo" style="width: 100%" required >
            <option selected>Modificar....</option>
            <?php
              $cargo = Controller::consultaCargo();
              foreach ($cargo as $datos1 =>$valor1)
              {
                echo '<option value="'.$valor1["pk_cargo"].'">'.$valor1["cargo"].'</option>';
              }
            ?>
          </select>
    </div>
       <div class="form-group">
        <label for="marca"><b>Almacen:</b></label>
         <select class="js-example-basic-single"  id="nvoAlmacen" placeholder="cargo" name="nvoAlmacen" style="width: 100%" required >
            <option selected>Modificar....</option>
            <?php
              $cargo = Controller::consultaAlmacen();
              foreach ($cargo as $datos1 =>$valor1)
              {
                echo '<option value="'.$valor1["pk_almacen"].'">'.$valor1["almacen"].'</option>';
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

  if(isset($_GET['pk_empleado'])&&isset($_GET['pk_persona']) && isset($_GET['pk_cargo'])&& isset($_GET['pk_almacen'])){

  $calcular = new Controller();
  $calcular -> editarTrabajadorController($_GET['pk_persona'], $_GET['pk_cargo'], $_GET['pk_empleado'], $_GET['pk_almacen']);

  }

?>