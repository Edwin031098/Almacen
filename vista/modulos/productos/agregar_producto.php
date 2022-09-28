<meta charset="utf-8">
<div class="col-md-12">
        <h1> Agregar Producto</h1>
        
    </div>
    <div clase="col-md-12">
   <div class="pull-right">
     <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Mostar Productos" href="index.php?action=mostar_producto"> 
       <i class="fa fa-plus"></i>
     </a>
   </div>
 </div> 
<div class="container">
  <form method="POST" enctype="multipart/form-data" accept_charset="utf-8">
   
    
    <div class="form-group" >
      <label for="nombre">Escriba el nombre del producto</label>
      <input type="text" class="form-control" id="nombre" placeholder="" name="producto">
    </div>

    <div class="form-group">
      <label for="appa">Escriba el codigo </label>
      <input type="text" class="form-control" id="appa" placeholder="" name="codigo">
    </div>

    

    <div class="form-group">
      <label for="foto">Seleccione la foto</label>
      <input type="file" class="form-control" id="fotop" name="fotop">
    </div>

    

    <div class="form-group">
      <label for="tel">Escriba la descripcion</label>
      <input type="text" class="form-control" id="descripcion" placeholder="" name="descripcion">
    </div>

   


      <div class="form-group">
      <label for="pieza">Numero de piezas</label>
      <input type="number" class="form-control" id="pieza" placeholder="" name="pieza">

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
  <div class="form-group">
        <label for="marca"><b>Almacen:</b></label>
         <select class="js-example-basic-single"  id="almacen" placeholder="" name="almacen" style="width: 100%" required >
            <option selected>Almacen...</option>
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

 

  <?php 
    $registro = new Controller();
    $registro -> registroProductoController();
   ?>

