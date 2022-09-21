

<meta charset="utf-8">
<div class="col-md-12">
        <h1> Agregar Empleado</h1>
        
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
              <div class="form-group">
      <label for="appa">Escriba el Cargo </label>
      <input type="text" class="form-control" id="Cargo" placeholder="Ayudante ó Encargado" name="cargo">
    </div>
    
  </div>


   
    
  </div>
  <button type="submit" class="btn btn-primary btn-lg ">Guardar</button>
  </form>

</div>
<br>
<br>
 

  <?php 
    $registroM = new Controller();
    $registroM -> registroTrabajadorController();
   ?>
