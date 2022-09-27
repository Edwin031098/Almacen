
<div class="col-md-12">
        <h1> Seccion de Personas </h1>
        
    </div>
    <div clase="col-md-12">
	 <div class="pull-right">
		 <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Agregar Personas" href="index.php?action=agregar_persona"> 
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
					<th>Nombre</th>
					<th>Apellido Paterno</th>
					<th>Apellido Materno</th>
					<th>Sexo</th>
					<th>Telefono</th>
					<th>Direccion</th>
					<th>Tipo</th>
					<th>Foto</th>
					<th>Editar</th>
					<th>Borrar</th>
				</tr>
				</thead>
				<tbody>
					<?php
						$vistaPuesto = new Controller();
						$vistaPuesto -> vistaPersonaController();
					?>
				</tbody>
			</table>
				<script type="text/javascript">
					function confirmar0(pk_persona){
						Swal.fire({
						  title: 'Estás seguro?',
						  html: "Se eliminará la persona: <b>"+pk_persona+"</b>",
						  icon: 'warning',
						  showCancelButton: true,
						  cancelButtonText: "Cancelar",
						  confirmButtonColor: '#3085d6',
						  cancelButtonColor: '#d33',
						  confirmButtonText: 'Si, eliminar!'
						}).then((result) => {
						  if (result.value) {
						    window.location="index.php?action=eliminar_persona&pk_persona="+pk_persona;
						  }
						})
					};
	</script>
		

		</div>

	</div>

</div>

