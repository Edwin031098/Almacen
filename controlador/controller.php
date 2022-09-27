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
					<td><?php echo $datos['pk_persona']; ?></td>
					<td><?php echo $datos['nombrep']; ?></td>
					<td><?php echo $datos['apellidop']; ?></td>
					<td><?php echo $datos['apellidom']; ?></td>
					
					<td><?php echo $datos['sexo']; ?></td>
					<td><?php echo $datos['cel']; ?></td>
					<td><?php echo $datos['direccion']; ?></td>
					<td><?php echo $datos['tipo']; ?></td>
					
				
					<td><?php echo '<img src="'.$datos['foto'].'" width="150px;">'; ?></td>
					<td><button id="btn-editar" class="btn btn-warning" onclick="window.location='index.php?action=editar_persona&pk_persona=<?php echo $datos['pk_almacen']; ?>&almacen=<?php echo $datos['almacen']; ?>&ubicacion=<?php echo $datos['ubicacion']; ?>'">Editar</button></td>
					<td> <button class="btn btn-danger" onclick="confirmar0('<?php echo $datos['pk_persona']; ?>')">🗑️</button></td>
		


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
			$comentariop=$nombre_archivo;

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
			$datosController = array("b"=>$_POST["nombre"], "c"=>$_POST["appa"], "d"=>$_POST["apma"], "e"=>$ruta, "f"=>$comentariop, "g"=>$_POST["tel"],"k"=>$_POST["sexo"],"l"=>$_POST["dom"],"ti"=>$_POST["tip"]);

			$respuesta = Datos::registrosEmpleadoModel($datosController, "persona");

			if($respuesta = "success")
			{
				
						echo '<script>
							(async () => {
					
							const a = await Swal.fire({
                          position: "top-end",
                          icon: "success",
                         title: "Guardado Exitosamente 😄👍",
                         showConfirmButton: false,
                          timer: 1500
                             })
							
							if(a){
								window.location="index.php?action=mostrar_persona";
							}

							})()


							</script>';

			}
			else
			{
				header("location:index.php?action=error");
			}


		}

			
	}
	// Método que recibe los valores de eliminar_marca.php
		static public function eliminarPersonaController($pk_persona){

			if(isset($pk_persona)){

				if(!empty($pk_persona)){

					$respuesta = Datos::eliminarPersonaModelo($pk_persona, "persona");

					if($respuesta == "ok"){

						echo '<script>
							(async () => {
					
							const a = await Swal.fire({
								icon: "success",
								title: "La persona fue eliminada con éxito 😄👍",
								html: "La persona <b>'.$pk_persona.'</b>, fue eliminada",
								footer: "Presiona OK para continuar."
							});
							
							if(a){
								window.location="index.php?action=mostrar_persona";
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
								title: "La persona: '.$pk_persona.', no existe",
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
								html: "<b>'.$pk_persona.'</b>"
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
								title: "Porfavor ingrese una persona"
							});
						</script>
						';
					
				}

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
			$ruta2 =$nombre_archivo;

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
			$datosController = array("pro"=>$_POST["producto"], "cod"=>$_POST["codigo"], "e"=>$ruta, "des"=>$_POST["descripcion"],"pz"=>$_POST["pieza"],"ma"=>$_POST["marca"],"a"=>$ruta2);

			$respuesta = Datos::registrosProductoModel($datosController, "producto");

			if($respuesta = "success")
			{
				
						echo '<script>
							(async () => {
					
							const a = await Swal.fire({
                          position: "top-end",
                          icon: "success",
                         title: "Guardado Exitosamente 😄👍",
                         showConfirmButton: false,
                          timer: 1500
                             })
							
							if(a){
								window.location="index.php?action=mostrar_producto";
							}

							})()


							</script>';

			}
			else
			{
				header("location:index.php?action=error");
			}


		}

			
	}
	// Método que recibe los valores de eliminar_marca.php
		static public function eliminarProductoController($pk_producto){

			if(isset($pk_producto)){

				if(!empty($pk_producto)){

					$respuesta = Datos::eliminarProductoModelo($pk_producto, "producto");

					if($respuesta == "ok"){

						echo '<script>
							(async () => {
					
							const a = await Swal.fire({
								icon: "success",
								title: "El producto fue eliminada con éxito 😄👍",
								html: "El producto <b>'.$pk_producto.'</b>, fue eliminada",
								footer: "Presiona OK para continuar."
							});
							
							if(a){
								window.location="index.php?action=mostrar_producto";
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
								title: "El producto: '.$pk_producto.', no existe",
								text: "Ingrese un producto existente",
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
								title: "Ups!😢<br> Ocurrió un error al eliminar el producto:",
								html: "<b>'.$pk_producto.'</b>"
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
								title: "Porfavor ingrese un producto"
							});
						</script>
						';
					
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
							(async () => {
					
							const a = await Swal.fire({
                          position: "top-end",
                          icon: "success",
                         title: "Guardado Exitosamente 😄👍",
                         showConfirmButton: false,
                          timer: 1500
                             })
							
							if(a){
								window.location="index.php?action=mostrar_marca";
							}

							})()


							</script>';

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
     public static function consultaCargo()
     {
     	$tabla1 = "cargo";
     	$respuesta1 = Datos::listadoDeCargo($tabla1);
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

					
				    <td><button id="btn-editar" class="btn btn-warning" onclick="window.location='index.php?action=editar_proveedor&pk_persona=<?php echo $datos['pk_persona']; ?>&persona=<?php echo $datos['nombrep']; ?>&marca=<?php echo $datos['nombre']; ?>&paterno=<?php echo $datos['apellidop']; ?>&materno=<?php echo $datos['apellidom']; ?>&pk_proveedor=<?php echo $datos['pk_proveedor']; ?>&pk_marca=<?php echo $datos['pk_marca']; ?>'">Editar</button></td>
					
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
								title: "El Almacen fue modificado con éxito 😄👍",
								html: "El Almacen <b>'.$pk_almacen.' '.$almacen.'</b>, fue modificado correctamente</b>",
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
								html: "<b>'.$almacen.'</b>"
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
		static public function editarProveedorController($pk_persona, $pk_marca, $pk_proveedor){

			if(isset($_POST['nvoPersona']) || isset($_POST['nvoMarca'])){

				if(!empty($_POST['nvoPersona']) || !empty($_POST['nvoMarca'])){

					$datos = array('valor_idProveedor'=>$pk_proveedor, 'valor_nombreProveedor'=>$pk_persona, 'valor_marcaProveedor'=>$pk_marca, 'valor_nvoNombre'=>$_POST['nvoPersona'], 'valor_nvoMarca'=>$_POST['nvoMarca']);
					

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
     public static function consultaPersona2()
     {
     	$tabla1 = "persona";
     	$respuesta1 = Datos::listadoDePersona2($tabla1);
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
							(async () => {
					
							const a = await Swal.fire({
                          position: "top-end",
                          icon: "success",
                         title: "Guardado Exitosamente 😄👍",
                         showConfirmButton: false,
                          timer: 1500
                             })
							
							if(a){
								window.location="index.php?action=mostrar_proveedor";
							}

							})()


							</script>';

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
		$tablac="cargo";
		$tablap="persona";
		$respuesta = Datos::vistaTrabajadorModel("empleado",$tablac,$tablap);
		foreach($respuesta as $row => $datos)
		{
			?>
				<tr>
					<td><?php echo $datos['pk_empleado']; ?></td>
					<td><?php echo $datos['nombrep']; ?>
					<?php echo $datos['apellidop']; ?>
					<?php echo $datos['apellidom']; ?></td>
						<td><?php echo $datos['cargo']; ?></td>

					
				
					
					<td><button id="btn-editar" class="btn btn-warning" onclick="window.location='index.php?action=editar_trabajador&pk_empleado=<?php echo $datos['pk_empleado']; ?>&persona=<?php echo $datos['nombrep']; ?>&paterno=<?php echo $datos['apellidop']; ?>&materno=<?php echo $datos['apellidom']; ?>&pk_cargo=<?php echo $datos['pk_cargo']; ?>&cargo=<?php echo $datos['cargo']; ?>&pk_persona=<?php echo $datos['pk_persona']; ?>'">Editar</button></td>
					<td> <button class="btn btn-danger" onclick="confirmar1('<?php echo $datos['pk_empleado']; ?>')">🗑️</button></td>
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
							(async () => {
					
							const a = await Swal.fire({
                          position: "top-end",
                          icon: "success",
                         title: "Guardado Exitosamente 😄👍",
                         showConfirmButton: false,
                          timer: 1500
                             })
							
							if(a){
								window.location="index.php?action=mostrar_trabajador";
							}

							})()


							</script>';

			}
			else
			{
				header("location:index.php?action=error");
			}


		}

			
	}
	// Método que recibe los valores de eliminar_marca.php
		static public function eliminarTrabajadorController($pk_empleado){

			if(isset($pk_empleado)){

				if(!empty($pk_empleado)){

					$respuesta = Datos::eliminarTrabajadorModelo($pk_empleado, "empleado");

					if($respuesta == "ok"){

						echo '<script>
							(async () => {
					
							const a = await Swal.fire({
								icon: "success",
								title: "El Trabajador fue eliminada con éxito 😄👍",
								html: "El Trabajador <b>'.$pk_empleado.'</b>, fue eliminada",
								footer: "Presiona OK para continuar."
							});
							
							if(a){
								window.location="index.php?action=mostrar_trabajador";
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
								title: "El Trabajador: '.$pk_empleado.', no existe",
								text: "Ingrese un producto existente",
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
								title: "Ups!😢<br> Ocurrió un error al eliminar el producto:",
								html: "<b>'.$pk_empleado.'</b>"
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
								title: "Porfavor ingrese el trabajador"
							});
						</script>
						';
					
				}

			}
		}
		// Método que recibe los valores de editar_proveedor.php
		static public function editarTrabajadorController($pk_persona, $pk_cargo, $pk_empleado){

			if(isset($_POST['nvoPersona'])||isset($_POST['nvoCargo'])){

				if(!empty($_POST['nvoPersona']) || !empty($_POST['nvoCargo'])){

					$datos = array('valor_idem'=>$pk_empleado, 'valor_nomem'=>$pk_persona, 'valor_caem'=>$pk_cargo, 'valor_nvoNombre'=>$_POST['nvoPersona'], 'valor_nvoCargo'=>$_POST['nvoCargo']);
					

					$respuesta = Datos::editarTrabajadorModelo($datos, "empleado");

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
							(async () => {
					
							const a = await Swal.fire({
                          position: "top-end",
                          icon: "success",
                         title: "Guardado Exitosamente 😄👍",
                         showConfirmButton: false,
                          timer: 1500
                             })
							
							if(a){
								window.location="index.php?action=mostrar_almacen";
							}

							})()


							</script>';

			}
			else
			{
				header("location:index.php?action=error");
			}


		}

			
	}
	static public function vistaProductoController()
	{
		$marca="marca";
		$respuesta = Datos::mostrarProductoModel("producto", 6,$marca);
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
        <span class="product-title">
               <b> <?php echo $datos['codigo']; ?></b>
                <span class="badge">
                  Codigo
                </span>
        </span>
        <span class="product-title">
               <b> <?php echo $datos['nombre']; ?></b>
                <span class="badge">
                  Marca
                </span>
        </span>
        
        </span>
        <span class="product-rating">
                <i class="fa fa-star"></i>
                <b> <?php echo $datos['pieza']; ?></b>
                <i class="fa fa-star"></i>
                
              </span>
        <span class="product-caption">

                <span class="badge">
                  Pieza
                </span>
              </span>
        
      </div>

      
    </div>

                    <button id="btn-editar" class="btn btn-warning" onclick="window.location='index.php?action=editar_producto&pk_producto=<?php echo $datos['pk_producto']; ?>&producto=<?php echo $datos['producto']; ?>&codigo=<?php echo $datos['codigo']; ?>&fotop=<?php echo $datos['fotop']; ?>&descripcion=<?php echo $datos['descripcion']; ?>&pieza=<?php echo $datos['pieza']; ?>&pk_marca=<?php echo $datos['pk_marca']; ?>&comentario=<?php echo $datos['comentario']; ?>'">Editar</button>

					
					  <button class="btn btn-danger" onclick="confirmar2('<?php echo $datos['pk_producto']; ?>')">🗑️</button>

				</div>
			</div>
				</div>
				<script type="text/javascript">
          function confirmar2(pk_producto){
            Swal.fire({
              title: 'Estás seguro?',
              html: "Se eliminará el producto: <b>"+pk_producto+"</b>",
              icon: 'warning',
              showCancelButton: true,
              cancelButtonText: "Cancelar",
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, eliminar!'
            }).then((result) => {
              if (result.value) {
                window.location="index.php?action=eliminar_producto&pk_producto="+pk_producto;
              }
            })
          };
        </script>

				
			<?php
		}
	}
	static public function paginacionProductoController()
	{
		
		$respuesta = Datos::paginacionProductoModel("producto", 6);
		
			if($_GET['pagina']>$respuesta['valor_paginas']){
					echo '<script>
					window.location="index.php?action=mostrar_producto&pagina=1";
					</script>';
			}
			?> 
				<nav aria-label="">
			  	<ul class="pagination justify-content-center">
				    <li class="page-item
				    <?php echo $_GET['pagina']<=1 ? 'disabled' : '' ?>">
				      <a class="page-link" href="<?php echo 'index.php?action=mostrar_producto&pagina='.($_GET['pagina']-1) ?>" tabindex="-1">Anterior</a>
				    </li>

					<?php for($i=0; $i<$respuesta['valor_paginas']; $i++): ?>
				    <li class="page-item
				    <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?>">
				    	<a class="page-link" href="<?php echo 'index.php?action=mostrar_producto&pagina='.($i+1) ?>"><?php echo ($i+1); ?></a>
				    </li>
					<?php endfor ?>

				    <li class="page-item
				    <?php echo $_GET['pagina']>=$respuesta['valor_paginas'] ? 'disabled' : '' ?>">
				      <a class="page-link" href="<?php echo 'index.php?action=mostrar_producto&pagina'.($_GET['pagina']+1) ?>">Siguiente</a>
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
		// Método que recibe los valores de eliminar_marca.php
		static public function editarProductoController($pk_producto,$producto,$codigo,$fotop,$descripcion,$pieza,$pk_marca,$comentario){

			if(isset($_POST['nproducto'])){

				if(!empty($_POST['nproducto'])){
					$archivo = $_FILES['nfotop']['tmp_name'];
			$nombre_archivo = $_FILES['nfotop']['name'];
			$tipo = $_FILES['nfotop']['type'];
			$tamanio = $_FILES['nfotop']['size'];

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

			$rutan = "controlador/fotos/".$nombre_archivo;
			$ruta2n =$nombre_archivo;

			if(move_uploaded_file($archivo, $rutan))
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
					$tablam="marca";
					$datos = array('valor_idp'=>$pk_producto, 'valor_p'=>$producto, 'valor_c'=>$codigo,'valor_nf'=>$fotop,'valor_d'=>$descripcion,'valor_pi'=>$pieza,'valor_m'=>$pk_marca,'valor_co'=>$comentario, 'valor_np'=>$_POST['nproducto'], 'valor_nc'=>$_POST['ncodigo'],'f'=>$rutan,'e'=>$ruta2n,  'valor_nd'=>$_POST['ndescripcion'], 'valor_npi'=>$_POST['npieza'], 'valor_nma'=>$_POST['nmarca']);

					$respuesta = Datos::editarProductoModelo($datos, "producto",$tablam);

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
			

}

