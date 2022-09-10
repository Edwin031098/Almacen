<div class="col-md-12">
        <h1> Seccion de Almacenes </h1>
        
    </div>
    <div clase="col-md-12">
	 <div class="pull-right">
		 <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Agregar Almacenes" href="index.php?action=agregar_almacen"> 
			 <i class="fa fa-plus"></i>
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
					<th>#</th>
					<th>Almacen</th>
					<th>Ubicacion</th>
					
					<th>Editar</th>
					<th>Borrar</th>
				</tr>
				</thead>
				<tbody>
					<?php
						$vistaPuesto = new Controller();
						$vistaPuesto -> vistaAlmacenController();
					?>
				</tbody>
			</table>
				
		

		</div>

	</div>

</div>

