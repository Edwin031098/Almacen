
<div class="col-md-12">
        <h1> Lista del  <?php echo $_GET['almacen']; ?> </h1>
        
    </div>
    <div clase="col-md-12">
   <div class="pull-right">
    <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Mostar Personas" href="index.php?action=mostrar_inventario"> 
       <i class='fas fa-arrow-alt-circle-left'></i>
     </a>
   </div>
 </div> 
<div class="col-mo-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			
		</div>
		<div class="x_content">
			<table class="table table-hover">
				<thead>
				<tr>
					<th>Codigo</th>
					<th>Producto</th>
					<th>Marca</th>
					<th>Proveedor</th>
					
				</tr>
				</thead>
				<tbody>
					<?php
						$vistaPuesto = new Controller();
						$vistaPuesto -> vistaAlmacenController3($_GET['pk_almacen']);
					?>
				</tbody>
			</table>
			
				
		

		</div>

	</div>

</div>

