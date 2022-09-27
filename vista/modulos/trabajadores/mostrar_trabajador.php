<div class="col-md-12">
        <h1> Empleados Activos </h1>
        
    </div>
    <div clase="col-md-12">
	 <div class="pull-right">
		 <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Agregar Proveedores" href="index.php?action=agregar_trabajador"> 
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
					<th>Cargo</th>
					<th>Almacen</th>


					
					<th>Editar</th>
					
					<th>Desactivar</th>
				</tr>
				</thead>
				<tbody>
					<?php
						$vistaProv = new Controller();
						$vistaProv -> vistaTrabajadorController();
					?>
				</tbody>
			</table>
				
		<script type="text/javascript">
          function confirmar1(pk_empleado){
            Swal.fire({
              title: 'Estás seguro?',
              html: "Se eliminará el empleado: <b>"+pk_empleado+"</b>",
              icon: 'warning',
              showCancelButton: true,
              cancelButtonText: "Cancelar",
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, eliminar!'
            }).then((result) => {
              if (result.value) {
                window.location="index.php?action=eliminar_trabajador&pk_empleado="+pk_empleado;
              }
            })
          };
        </script>

		</div>

	</div>

</div>

