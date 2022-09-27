<?php
  if(isset($_GET['pagina']) && $_GET['pagina']>=1){
?>
<div class="col-md-12">
        <h1>  Inventarios </h1>
        
    </div>
    <div clase="col-md-12">
   <div class="pull-right">
     <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Agregar Productos" href="index.php?action=agregar_producto"> 
       <i class="fa fa-plus"></i>
     </a>
   </div>
 </div> 
<div class="col-mo-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      
    </div>
    <div class="x_content"  >
      <div class="row row-cols-1 row-cols-md-4 g-4">
        
        
  
     <?php
            $vistaPuesto = new Controller();
            $vistaPuesto -> vistaProductoController();
             
          ?>
          

  


</div>


      
        
    

    </div>


  </div>

<br>

<br>
<br>
<br>
<?php
$paginacionPuesto = new Controller();
            $paginacionPuesto -> paginacionProductoController();
          
 ?>
</div>
<?php
  }else{

    echo '<script>
          window.location="index.php?action=mostrar_inventario&pagina=1";
        </script>';
    echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';

  }
?>

