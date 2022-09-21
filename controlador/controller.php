<?php
class Controller 
{
	static public function pagina()
	{
		include "vista/principal.php";
	}

	static public function enlacespagina()
	{
		if(isset($_GET['action']))
		{
			$enlaces = $_GET['action'];
		}
		else
		{
			$enlaces = "index";
		}

		$respuesta = Paginas::enlacesPaginaModel($enlaces);
		include $respuesta;
	}
	static public function vistaPersonaController()
	{
		$respuesta = Datos::vistaPersonaModel("persona");
		foreach($respuesta as $row => $datos)
		{
			?>
				<tr>
					<td><?php echo $datos['nombrep']; ?></td>
					<td><?php echo $datos['apellidop']; ?></td>
					<td><?php echo $datos['apellidom']; ?></td>
					
					<td><?php echo $datos['sexo']; ?></td>
					<td><?php echo $datos['domicilio']; ?></td>
					<td><?php echo $datos['email']; ?></td>
				
					<td><?php echo '<img src="'.$datos['foto'].'" width="150px;">'; ?></td>
					<td><button  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#eliminarpersona<?php echo $datos['pk_persona'] ?>" data-bs-whatever="@mdo">Desea eliminar esta persona?</button></td><td> <button class="btn btn-danger">🗑️</button></td>
		


				</tr>
				

			<?php

		}
		
       

	}
	//consultas de EMPLEADOS
	static public function registroPersonaController()
	{
		if (isset($_POST['nombre']))
		{
			$archivo = $_FILES['foto']['tmp_name'];
			$nombre_archivo = $_FILES['foto']['name'];
			$tipo = $_FILES['foto']['type'];
			$tamanio = $_FILES['foto']['size'];

			echo'<script>
					var archivo = "'.$archivo.'"
					alert("El nombre temporal es: "+archivo)
					</script>
			';
			echo'<script>
					var nombre = "'.$nombre_archivo.'"
					alert("El nombre real es: "+nombre)
					</script>
			';
			echo'<script>
					var tipo = "'.$tipo.'"
					alert("El tipo del archivo es: "+tipo)
					</script>
			';
			echo'<script>
					var tamanio = "'.$tamanio.'"
					alert("El el tamanio del archivo es: "+tamanio)
					</script>
			';

			$ruta = "controlador/fotos/".$nombre_archivo;

			if(move_uploaded_file($archivo, $ruta))
			{
				echo '<script>
					alert("archivo copiado exitosamnte")
					</script>
				';
			}
			else
			{
				'<script>
					alert("archivo NO copiado")
					</script>
				';
			}
			$datosController = array("b"=>$_POST["nombre"], "c"=>$_POST["appa"], "d"=>$_POST["apma"], "e"=>$ruta, "g"=>$_POST["tel"],"k"=>$_POST["sexo"],"l"=>$_POST["dom"],"m"=>$_POST["email"]);

			$respuesta = Datos::registrosEmpleadoModel($datosController, "persona");

			if($respuesta = "success")
			{
				echo '<script>
				alert ("Datos guardados correctamente");
				window.location="index.php?action=empleados&guardar=ok"</script>';
			}
			else
			{
				header("location:index.php?action=error");
			}
		}
	}
	
	
	static public function vistaProductoController()
	{
		$respuesta = Datos::vistaProductoModel("producto");
		foreach($respuesta as $row => $datos)
		{
			?>
				<tr>
					<td><?php echo '<img src="'.$datos['fotop'].'" width="150px;">'; ?></td>
					<td><?php echo $datos['codigo']; ?></td>
					<td><?php echo $datos['producto']; ?></td>
					<td><?php echo $datos['pieza']; ?></td>
					
					<td><?php echo $datos['fk_marca']; ?></td>
					
				
					<td><button id="btn-editar" class="btn btn-warning" >Editar</button></td>
					<td> <button class="btn btn-danger" >🗑️</button></td>

				</tr>
				
			<?php
		}
	}
		//consultas de EMPLEADOS
	static public function registroProductoController()
	{
		if (isset($_POST['producto']))
		{
			$archivo = $_FILES['fotop']['tmp_name'];
			$nombre_archivo = $_FILES['fotop']['name'];
			$tipo = $_FILES['fotop']['type'];
			$tamanio = $_FILES['fotop']['size'];

			echo'<script>
					var archivo = "'.$archivo.'"
					alert("El nombre temporal es: "+archivo)
					</script>
			';
			echo'<script>
					var nombre = "'.$nombre_archivo.'"
					alert("El nombre real es: "+nombre)
					</script>
			';
			echo'<script>
					var tipo = "'.$tipo.'"
					alert("El tipo del archivo es: "+tipo)
					</script>
			';
			echo'<script>
					var tamanio = "'.$tamanio.'"
					alert("El el tamanio del archivo es: "+tamanio)
					</script>
			';

			$ruta = "controlador/fotos/".$nombre_archivo;

			if(move_uploaded_file($archivo, $ruta))
			{
				echo '<script>
					alert("archivo copiado exitosamnte")
					</script>
				';
			}
			else
			{
				'<script>
					alert("archivo NO copiado")
					</script>
				';
			}
			$datosController = array("pro"=>$_POST["producto"], "cod"=>$_POST["codigo"], "e"=>$ruta, "des"=>$_POST["descripcion"],"pz"=>$_POST["pieza"],"ma"=>$_POST["marca"]);

			$respuesta = Datos::registrosProductoModel($datosController, "producto");

			if($respuesta = "success")
			{
				echo '<script>
				alert ("Datos guardados correctamente");
				window.location="index.php?action=productos&guardar=ok"</script>';
			}
			else
			{
				header("location:index.php?action=error");
			}
		}
	}
	static public function registroMarcaController(){

if (isset($_POST['marca']))
		{
			$datosControllerm = array("ma"=>$_POST["marca"]);

			$respuestam = Datos::registrosMarcaModel($datosControllerm, "marca");

			if($respuestam = "success")
			{
				echo '<script>
				alert ("Datos guardados correctamente");
				window.location="index.php?action=mostrar_marca&guardar=ok"</script>';
			}
			else
			{
				header("location:index.php?action=error");
			}


		}

			
	}
	static public function vistaMarcaController()
	{
		$respuesta = Datos::vistaMarcaModel("marca");
		foreach($respuesta as $row => $datos)
		{
			?>
				<tr>
					<td><?php echo $datos['pk_marca']; ?></td>
					<td><?php echo $datos['nombre']; ?></td>
					
				
					
					<td><button id="btn-editar" class="btn btn-warning" onclick="window.location='index.php?action=editar_marca&marca=<?php echo $datos['nombre']; ?>'">Editar</button></td>
					<td> <button class="btn btn-danger" onclick="confirmar6('<?php echo $datos['pk_marca']; ?>')">🗑️</button></td>
			
						<!--<a class="btn btn-warning" href="index.php?action=eliminar_marca&pk_marca=<?php echo $datos['pk_marca']; ?>">Eliminar</a></td>si jala -->
				</tr>

			<?php
		}

	}
	static public function editarMarcaController($marca){

			if(isset($_POST['nvoNombre'])){

				if(!empty($_POST['nvoNombre'])){

					$datos = array('valor_marca'=>$marca, 'valor_nvoNombre'=>$_POST['nvoNombre']);

					$respuesta = Datos::editarMarcaModelo($datos, "marca");

					if($respuesta == "ok"){

						echo '<script>
							(async () => {
							var notificacion = new Audio("vistas/audio/notificacion_ok.mp3");
							notificacion.play();
							const a = await Swal.fire({
								icon: "success",
								title: "La marca fue modificada con éxito 😄👍",
								html: "La marca <b>'.$marca.'</b>, fue renombrada como: <b>'.$_POST['nvoNombre'].'</b>",
								footer: "Presiona OK para continuar."
							});
							
							if(a){
								window.location="index.php?action=mostrar_marca";
							}

							})()

							</script>';

					}
					else if($respuesta == "noexiste"){

						echo '<script>
						Swal.fire({
								icon: "info",
								timer: 5000,
								timerProgressBar: true,
								title: "La marca: '.$marca.', no existe",
								text: "Ingrese una marca existe",
								footer: "Este mensaje cerrará automáticamente en 5s."
							});
						</script>
						';

					}
					else if($respuesta == "esigual"){

						echo '<script>
						Swal.fire({
								icon: "info",
								timer: 5000,
								timerProgressBar: true,
								title: "La marca ya tiene ese nombre",
								text: "Ingrese un nuevo nombre para la marca",
								footer: "Este mensaje cerrará automáticamente en 5s."
							});
						</script>
						';

					}
					else{

						echo '<script>
						Swal.fire({
								icon: "error",
								timer: 5000,
								timerProgressBar: true,
								title: "Ups!😢<br> Ocurrió un error al modificar la marca:",
								html: "<b>'.$marca.'</b>"
							});
						</script>
						';

					}

				}else{

					echo '<script>
							Swal.fire({
								icon: "warning",
								timer: 5000,
								timerProgressBar: true,
								title: "Porfavor llene todos los campos del formulario"
							});
						</script>
						';
					
				}

			}
		}
	// Método que recibe los valores de eliminar_marca.php
		static public function eliminarMarcaController($pk_marca){

			if(isset($pk_marca)){

				if(!empty($pk_marca)){

					$respuesta = Datos::eliminarMarcaModelo($pk_marca, "marca");

					if($respuesta == "ok"){

						echo '<script>
							(async () => {
					
							const a = await Swal.fire({
								icon: "success",
								title: "La marca fue eliminada con éxito 😄👍",
								html: "La marca <b>'.$pk_marca.'</b>, fue eliminada",
								footer: "Presiona OK para continuar."
							});
							
							if(a){
								window.location="index.php?action=mostrar_marca";
							}

							})()

							</script>';

					}
					else if($respuesta == "noexiste"){

						echo '<script>
						Swal.fire({
								icon: "info",
								timer: 5000,
								timerProgressBar: true,
								title: "La marca: '.$pk_marca.', no existe",
								text: "Ingrese una marca existente",
								footer: "Este mensaje cerrará automáticamente en 5s."
							});
						</script>
						';

					}
					else{

						echo '<script>
						Swal.fire({
								icon: "error",
								timer: 5000,
								timerProgressBar: true,
								title: "Ups!😢<br> Ocurrió un error al eliminar la marca:",
								html: "<b>'.$pk_marca.'</b>"
							});
						</script>
						';

					}

				}else{

					echo '<script>
							Swal.fire({
								icon: "warning",
								timer: 5000,
								timerProgressBar: true,
								title: "Porfavor ingrese una marca"
							});
						</script>
						';
					
				}

			}
		}
		// Método que recibe los valores de eliminar_marca.php
		static public function eliminarAlmacenController($pk_almacen){

			if(isset($pk_almacen)){

				if(!empty($pk_almacen)){

					$respuesta = Datos::eliminarAlmacenModelo($pk_almacen, "almacen");

					if($respuesta == "ok"){

						echo '<script>
							(async () => {
					
							const a = await Swal.fire({
								icon: "success",
								title: "El almacen fue eliminada con éxito 😄👍",
								html: "La marca <b>'.$pk_almacen.'</b>, fue eliminada",
								footer: "Presiona OK para continuar."
							});
							
							if(a){
								window.location="index.php?action=mostrar_almacen";
							}

							})()

							</script>';

					}
					else if($respuesta == "noexiste"){

						echo '<script>
						Swal.fire({
								icon: "info",
								timer: 5000,
								timerProgressBar: true,
								title: "El almacen: '.$pk_almacen.', no existe",
								text: "Ingrese una marca existente",
								footer: "Este mensaje cerrará automáticamente en 5s."
							});
						</script>
						';

					}
					else{

						echo '<script>
						Swal.fire({
								icon: "error",
								timer: 5000,
								timerProgressBar: true,
								title: "Ups!😢<br> Ocurrió un error al eliminar la marca:",
								html: "<b>'.$pk_almacen.'</b>"
							});
						</script>
						';

					}

				}else{

					echo '<script>
							Swal.fire({
								icon: "warning",
								timer: 5000,
								timerProgressBar: true,
								title: "Porfavor ingrese una marca"
							});
						</script>
						';
					
				}

			}
		}
	
     public static function consultaMarca()
     {
     	$tabla1 = "marca";
     	$respuesta1 = Datos::listadoDeMarca($tabla1);
     	return $respuesta1;
     }
		
		static public function vistaProveedorController()
	{
		$tablap="persona";
		$tablam="marca";
		$respuesta = Datos::vistaProveedorModel($tablap,$tablam,"proveedor");
		foreach($respuesta as $row => $datos)
		{
			?>
				<tr>
					<td><?php echo $datos['pk_proveedor']; ?></td>
					<td><?php echo $datos['nombrep']; ?>
					<?php echo $datos['apellidop']; ?>
					<?php echo $datos['apellidom']; ?>
						</td>
						<td><?php echo $datos['nombre']; ?></td>

					
				    <td><button id="btn-editar" class="btn btn-warning" onclick="window.location='index.php?action=editar_proveedor&fk_persona=<?php echo $datos['fk_persona']; ?>&persona=<?php echo $datos['nombrep']; ?>&marca=<?php echo $datos['nombre']; ?>&paterno=<?php echo $datos['apellidop']; ?>&materno=<?php echo $datos['apellidom']; ?>&pk_proveedor=<?php echo $datos['pk_proveedor']; ?>&fk_marca=<?php echo $datos['fk_marca']; ?>'">Editar</button></td>
					
					<td> <button class="btn btn-danger" onclick="confirmar5('<?php echo $datos['pk_proveedor']; ?>')">🗑️</button></td>
				</tr>
			<?php
		}
	}
	// Método que recibe los valores de editar_proveedor.php
		static public function editarAlmacenController($almacen,$ubicacion, $pk_almacen){

			if(isset($_POST['nvoAlmacen'])){

				if(!empty($_POST['nvoAlmacen'])){

					$datos = array('valor_idAlmacen'=>$pk_almacen, 'valor_nombreAlmacen'=>$almacen, 'valor_ubicacionAlmacen'=>$ubicacion, 'valor_nvoAlmacen'=>$_POST['nvoAlmacen'], 'valor_nvoUbicacion'=>$_POST['nvoUbicacion']);
					

					$respuesta = Datos::editarAlmacenModelo($datos, "almacen");

					if($respuesta == "ok"){

						echo '<script>
							(async () => {
							var notificacion = new Audio("vistas/audio/notificacion_ok.mp3");
							notificacion.play();
							const a = await Swal.fire({
								icon: "success",
								title: "El proveedor fue modificado con éxito 😄👍",
								html: "El proveedor <b>'.$pk_persona.' '.$pk_marca.'</b>, fue modificado correctamente</b>",
								footer: "Presiona OK para continuar."
							});
							
							if(a){
								window.location="index.php?opcion=ver_proveedores";
							}

							})()

							</script>';

					}
					else if($respuesta == "noexiste"){

						echo '<script>
						Swal.fire({
								icon: "info",
								timer: 5000,
								timerProgressBar: true,
								title: "El proveedor con el #ID: '.$pk_almacen.', no existe",
								text: "Ingrese un proveedor existente",
								footer: "Este mensaje cerrará automáticamente en 5s."
							});
						</script>
						';

					}
					else if($respuesta == "esigual"){

						echo '<script>
						Swal.fire({
								icon: "info",
								timer: 5000,
								timerProgressBar: true,
								title: "Modifique almenos un campo del proveedor",
								text: "Ingrese nueva información del proveedor",
								footer: "Este mensaje cerrará automáticamente en 5s."
							});
						</script>
						';

					}
					else{

						echo '<script>
						Swal.fire({
								icon: "error",
								timer: 5000,
								timerProgressBar: true,
								title: "Ups!😢<br> Ocurrió un error al modificar al proveedor:",
								html: "<b>'.$nombreProveedor.'</b>"
							});
						</script>
						';

					}

				}else{

					echo '<script>
							Swal.fire({
								icon: "warning",
								timer: 5000,
								timerProgressBar: true,
								title: "Porfavor llene todos los campos del formulario"
							});
						</script>
						';
					
				}

			}
		}
	// Método que recibe los valores de editar_proveedor.php
		static public function editarProveedorController($fk_persona, $fk_marca, $pk_proveedor, $nombre){

			if(isset($_POST['nvoPersona'])){

				if(!empty($_POST['nvoPersona'])){

					$datos = array('valor_idProveedor'=>$pk_proveedor, 'valor_nombreProveedor'=>$fk_persona, 'valor_marcaProveedor'=>$fk_marca, 'valor_nvoNombre'=>$_POST['nvoPersona'], 'valor_nvoMarca'=>$_POST['nvoMarca']);
					

					$respuesta = Datos::editarProveedorModelo($datos, "proveedor");

					if($respuesta == "ok"){

						echo '<script>
							(async () => {
							var notificacion = new Audio("vistas/audio/notificacion_ok.mp3");
							notificacion.play();
							const a = await Swal.fire({
								icon: "success",
								title: "El proveedor fue modificado con éxito 😄👍",
								html: "El proveedor <b>'.$pk_proveedor.' '.$nombre.'</b>, fue modificado correctamente</b>",
								footer: "Presiona OK para continuar."
							});
							
							if(a){
								window.location="index.php?opcion=ver_proveedores";
							}

							})()

							</script>';

					}
					else if($respuesta == "noexiste"){

						echo '<script>
						Swal.fire({
								icon: "info",
								timer: 5000,
								timerProgressBar: true,
								title: "El proveedor con el #ID: '.$pk_proveedor.', no existe",
								text: "Ingrese un proveedor existente",
								footer: "Este mensaje cerrará automáticamente en 5s."
							});
						</script>
						';

					}
					else if($respuesta == "esigual"){

						echo '<script>
						Swal.fire({
								icon: "info",
								timer: 5000,
								timerProgressBar: true,
								title: "Modifique almenos un campo del proveedor",
								text: "Ingrese nueva información del proveedor",
								footer: "Este mensaje cerrará automáticamente en 5s."
							});
						</script>
						';

					}
					else{

						echo '<script>
						Swal.fire({
								icon: "error",
								timer: 5000,
								timerProgressBar: true,
								title: "Ups!😢<br> Ocurrió un error al modificar al proveedor:",
								html: "<b>'.$nombreProveedor.'</b>"
							});
						</script>
						';

					}

				}else{

					echo '<script>
							Swal.fire({
								icon: "warning",
								timer: 5000,
								timerProgressBar: true,
								title: "Porfavor llene todos los campos del formulario"
							});
						</script>
						';
					
				}

			}
		}
	 public static function consultaPersona()
     {
     	$tabla1 = "persona";
     	$respuesta1 = Datos::listadoDePersona($tabla1);
     	return $respuesta1;
     }
     public static function consultaProveedor()
     {
     	$tabla1 = "proveedor";
     	$tabla2="persona";
     	$tabla3="marca";
     	$respuesta1 = Datos::listadoDeProveedor($tabla1,$tabla2,$tabla3);
     	return $respuesta1;
     }
     static public function registroProveedorController(){

if (isset($_POST['marca']))
		{
			$datosControllerm = array("fp"=>$_POST["persona"],"fm"=>$_POST["marca"]);

			$respuestam = Datos::registrosProveedorModel($datosControllerm, "proveedor");

			if($respuestam = "success")
			{
				echo '<script>
				alert ("Datos guardados correctamente");
				window.location="index.php?action=mostrar_proveedor&guardar=ok"</script>';
			}
			else
			{
				header("location:index.php?action=error");
			}


		}

			
	}
	
	// Método que recibe los valores de eliminar_proveedor.php
		static public function eliminarProveedorController($pk_proveedor){
                  if(isset($pk_proveedor)){

				if(!empty($pk_proveedor)){

					$respuesta = Datos::eliminarProveedorModelo($pk_proveedor, "proveedor");

					if($respuesta == "ok"){

						echo '<script>
							(async () => {
					
							const a = await Swal.fire({
								icon: "success",
								title: "El proveedor fue eliminado con éxito 😄👍",
								html: "El proveedor <b>'.$pk_proveedor.'</b>, fue eliminado",
								footer: "Presiona OK para continuar."
							});
							
							if(a){
								window.location="index.php?action=mostrar_proveedor";
							}

							})()

							</script>';

					}
					else if($respuesta == "noexiste"){

						echo '<script>
						Swal.fire({
								icon: "info",
								timer: 5000,
								timerProgressBar: true,
								title: "El proveedor: '.$pk_proveedor.', no existe",
								text: "Ingrese una marca existente",
								footer: "Este mensaje cerrará automáticamente en 5s."
							});
						</script>
						';

					}
					else{

						echo '<script>
						Swal.fire({
								icon: "error",
								timer: 5000,
								timerProgressBar: true,
								title: "Ups!😢<br> Ocurrió un error al eliminar el proveedor:",
								html: "<b>'.$pk_proveedor.'</b>"
							});
						</script>
						';

					}

				}else{

					echo '<script>
							Swal.fire({
								icon: "warning",
								timer: 5000,
								timerProgressBar: true,
								title: "Porfavor ingrese un proveedor"
							});
						</script>
						';
					
				}

			}
		

			}
	static public function vistaTrabajadorController()
	{
		$respuesta = Datos::vistaTrabajadorModel("empleado");
		foreach($respuesta as $row => $datos)
		{
			?>
				<tr>
					<td><?php echo $datos['pk_empleado']; ?></td>
					<td><?php echo $datos['fk_persona']; ?></td>
						<td><?php echo $datos['cargo']; ?></td>

					
				
					
					<td><button id="btn-editar" class="btn btn-warning" >Editar</button></td><td> <a class="btn btn-danger" href="index.php?action=eliminar_marca=<?php echo $dato['pk_marca']; ?>'">🗑️</a></td>
				</tr>
			<?php
		}
	}
	 static public function registroTrabajadorController(){

if (isset($_POST['cargo']))
		{
			$datosControllerm = array("fp"=>$_POST["persona"],"ca"=>$_POST["cargo"]);

			$respuestam = Datos::registrosTrabajadorModel($datosControllerm, "empleado");

			if($respuestam = "success")
			{
				echo '<script>
				alert ("Datos guardados correctamente");
				window.location="index.php?action=marcas&guardar=ok"</script>';
			}
			else
			{
				header("location:index.php?action=error");
			}


		}

			
	}
	static public function vistaAlmacenController()
	{
		$respuesta = Datos::vistaAlmacenModel("almacen");
		foreach($respuesta as $row => $datos)
		{
			?>
				<tr>
					<td><?php echo $datos['pk_almacen']; ?></td>
					<td><?php echo $datos['almacen']; ?></td>
						<td><?php echo $datos['ubicacion']; ?></td>

					
				
					<td><button id="btn-editar" class="btn btn-warning" onclick="window.location='index.php?action=editar_almacen&pk_almacen=<?php echo $datos['pk_almacen']; ?>&almacen=<?php echo $datos['almacen']; ?>&ubicacion=<?php echo $datos['ubicacion']; ?>'">Editar</button></td>
					<td> <button class="btn btn-danger" onclick="confirmar3('<?php echo $datos['pk_almacen']; ?>','<?php echo $datos['almacen']; ?>')">🗑️</button></td>
				</tr>
			<?php
		}
	}
	 static public function registroUbicacionController(){

if (isset($_POST['almacen']))
		{
			$datosControllerm = array("al"=>$_POST["almacen"],"ub"=>$_POST["ubicacion"]);

			$respuestam = Datos::registrosAlmacenModel($datosControllerm, "almacen");

			if($respuestam = "success")
			{
				echo '<script>
				alert ("Datos guardados correctamente");
				window.location="index.php?action=marcas&guardar=ok"</script>';
			}
			else
			{
				header("location:index.php?action=error");
			}


		}

			
	}
	static public function vistaInventarioController()
	{
		
		$respuesta = Datos::mostrarProductoModel("producto", 5);
		foreach($respuesta as $row => $datos)
		{
			?>
			
  <div class="col">
			<div class="container1" >
              <div class="card">
			
  
				
					  <div class="card-head">
      <img src="vista/imagenes/dulce.jpg" width="50px;" margin="20px;" > 
      <?php echo '<img src="'.$datos['fotop'].'"class="product-img" >'; ?>
      <div class="product-detail">
        <h2><?php echo $datos['producto']; ?></h2>
      </div>
      <span class="back-text">
              DA
            </span>
    </div>
    <div class="card-body">
      <div class="product-desc">
        <span class="product-title">
               <b> <?php echo $datos['descripcion']; ?></b>
                <span class="badge">
                  Descripcion
                </span>
        </span>
        <span class="product-caption">
                Basket Ball Collection
              </span>
        <span class="product-rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star grey"></i>
              </span>
      </div>
      <div class="product-properties">
        <span class="product-size">
                <h4>Size</h4>
                <ul class="ul-size">
                  <li><a href="#">7</a></li>
                  <li><a href="#">8</a></li>
                  <li><a href="#">9</a></li>
                  <li><a href="#" class="active">10</a></li>
                  <li><a href="#">11</a></li>
                </ul>
              </span>
        
        
      </div>
    </div>

				
					<button id="btn-editar" class="btn btn-warning" >Editar</button>
					 <button class="btn btn-danger" >🗑️</button>
					
				</div>
			</div>
				</div>

				
			<?php
		}
	}
	static public function paginacionInventarioController()
	{
		
		$respuesta = Datos::paginacionProductoModel("producto", 5);
		
			if($_GET['pagina']>$respuesta['valor_paginas']){
					echo '<script>
					window.location="index.php?action=mostrar_inventario&pagina=1";
					</script>';
			}
			?> 
				<nav aria-label="">
			  	<ul class="pagination justify-content-center">
				    <li class="page-item
				    <?php echo $_GET['pagina']<=1 ? 'disabled' : '' ?>">
				      <a class="page-link" href="<?php echo 'index.php?action=mostrar_inventario&pagina='.($_GET['pagina']-1) ?>" tabindex="-1">Anterior</a>
				    </li>

					<?php for($i=0; $i<$respuesta['valor_paginas']; $i++): ?>
				    <li class="page-item
				    <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?>">
				    	<a class="page-link" href="<?php echo 'index.php?action=mostrar_inventario&pagina='.($i+1) ?>"><?php echo ($i+1); ?></a>
				    </li>
					<?php endfor ?>

				    <li class="page-item
				    <?php echo $_GET['pagina']>=$respuesta['valor_paginas'] ? 'disabled' : '' ?>">
				      <a class="page-link" href="<?php echo 'index.php?action=mostrar_inventario&pagina'.($_GET['pagina']+1) ?>">Siguiente</a>
					</li>
				</ul>
				</nav>
			<?php
				echo '&nbsp;&nbsp;<b>Total de productos: </b>'.$respuesta['valor_totalArticulosBD'].'<br>';

				if(($_GET['pagina']*$respuesta['valor_articulosXPagina']) < $respuesta['valor_totalArticulosBD']){
					echo '&nbsp;&nbsp;<b>Mostrando </b>'.($_GET['pagina']*$respuesta['valor_articulosXPagina']).'<b> de </b>'.$respuesta['valor_totalArticulosBD'];
				}
				else{
					echo '&nbsp;&nbsp;<b>Mostrando </b>'.$respuesta['valor_totalArticulosBD'].'<b> de </b>'.$respuesta['valor_totalArticulosBD'];
				}

		}	
			

}

