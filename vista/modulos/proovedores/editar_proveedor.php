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
            <option selected > <?php echo $_GET['persona']; ?> <?php echo $_GET['paterno']; ?> <?php echo $_GET['materno']; ?></option>
            <?php
              $proveedor = Controller::consultaProveedor();
              foreach ($proveedor as $datos1 =>$valor1)
              {
                echo '<option value="'.$valor1["fk_persona"].'">'.$valor1["nombrep"].' '.$valor1["apellidop"].' '.$valor1["apellidom"].'</option>';
              }
            ?>
          </select>
           
    
  </div>
   <div class="form-group">
        <label for="marca"><b>Marca:</b></label>
         <select class="js-example-basic-single"  id="nvoMmarca" placeholder="" name="nvoMarca" style="width: 100%" required >
            <option selected ><?php echo $_GET['marca']; ?></option>
            <?php
              $marca = Controller::consultaProveedor();
              foreach ($marca as $datos2 =>$valor2)
              {
                echo '<option value="'.$valor2["fk_marca"].'">'.$valor2["nombre"].'</option>';
              }
            ?>
          </select>
           
    
  </div>

   
    
  
  <button type="submit" class="btn btn-primary btn-lg ">Guardar</button>
  </form>

</div>

<?php

  if(isset($_GET['pk_proveedor'])&&isset($_GET['fk_persona']) && isset($_GET['fk_marca'])){

  $calcular = new Controller();
  $calcular -> editarProveedorController($_GET['fk_persona'], $_GET['fk_marca'], $_GET['pk_proveedor'], $_GET['persona']);

  }

?>