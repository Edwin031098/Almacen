<div class="col-md-12">
        <h1> Seccion de Proveedores </h1>
        
    </div>
    <div clase="col-md-12">
	 <div class="pull-right">
		 <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Agregar Proveedores" href="index.php?action=agregar_proveedor"> 
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
					<th>Persona</th>
					<th>Marca</th>

					
					<th>Editar</th>
					<th>Borrar</th>
				</tr>
				</thead>
				<tbody>
					<?php
						$vistaProv = new Controller();
						$vistaProv -> vistaProveedorController();
					?>
				</tbody>
			</table>
				
		

		</div>

	</div>

</div>

