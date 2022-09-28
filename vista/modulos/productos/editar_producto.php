<meta charset="utf-8">
<div class="col-md-12">
        <h1> Editar Producto</h1>
        
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
      <input type="text" class="form-control" id="nproducto" placeholder="" name="nproducto" value="<?php echo $_GET['producto']; ?>">
    </div>

    <div class="form-group">
      <label for="appa">Escriba el codigo </label>
      <input type="text" class="form-control" id="ncodigo" placeholder="" name="ncodigo" value="<?php echo $_GET['codigo']; ?>">
    </div>

    

    <div class="form-group" >
      <label for="foto">Seleccione la foto</label>
      <input type="file" class="form-control" id="nfotop" name="nfotop" ><?php echo $_GET['comentario']; ?>
    </div>

    

    <div class="form-group">
      <label for="tel">Escriba la descripcion</label>
      <input type="text" class="form-control" id="ndescripcion" placeholder="" name="ndescripcion" value="<?php echo $_GET['descripcion']; ?>">
    </div>

   


      <div class="form-group">
      <label for="pieza">Numero de piezas</label>
      <input type="number" class="form-control" id="npieza" placeholder="" name="npieza" value="<?php echo $_GET['pieza']; ?>">

       <div class="form-group">
        <label for="marca"><b>Marca:</b></label>
         <select class="js-example-basic-single"  id="nmarca" placeholder="marca" name="nmarca" style="width: 100%" required >
            <option selected>Modificar...</option>
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
         <select class="js-example-basic-single"  id="nalmacen" placeholder="" name="nalmacen" style="width: 100%" required >
            <option selected>Modificar...</option>
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
  if(isset($_GET['producto'])&isset($_GET['codigo'])&isset($_GET['fotop'])&isset($_GET['descripcion'])&isset($_GET['pieza'])&isset($_GET['pk_marca'])&isset($_GET['comentario'])&isset($_GET['pk_almacen'])){
    $registro = new Controller();
    $registro -> editarProductoController($_GET['pk_producto'],$_GET['producto'],$_GET['codigo'],$_GET['fotop'],$_GET['descripcion'],$_GET['pieza'],$_GET['pk_marca'],$_GET['comentario'],$_GET['pk_almacen']);
   

  }
   ?> 
