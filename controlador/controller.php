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
					<td><?php echo $datos['nombre']; ?></td>
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
					
				
					
					<td><button id="btn-editar" class="btn btn-warning" onclick="window.location='index.php?action=editar_marca&marca=<?php echo $datos['nombre']; ?>'">Editar</button></td><td> <button class="btn btn-danger" onclick="confirmar6('<?php echo $datos['pk_marca']; ?>')">🗑️</button></td>
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
	
     public static function consultaMarca()
     {
     	$tabla1 = "marca";
     	$respuesta1 = Datos::listadoDeMarca($tabla1);
     	return $respuesta1;
     }
		
		static public function vistaProveedorController()
	{
		$respuesta = Datos::vistaProveedorModel("proveedor");
		foreach($respuesta as $row => $datos)
		{
			?>
				<tr>
					<td><?php echo $datos['pk_proveedor']; ?></td>
					<td><?php echo $datos['fk_persona']; ?></td>
						<td><?php echo $datos['fk_marca']; ?></td>

					
				
					
					<td><button id="btn-editar" class="btn btn-warning" >Editar</button></td><td> <a class="btn btn-danger" href="index.php??action=eliminar_marca.php=<?php echo $dato['pk_marca']; ?>'">🗑️</a></td>
				</tr>
			<?php
		}
	}
	 public static function consultaPersona()
     {
     	$tabla1 = "persona";
     	$respuesta1 = Datos::listadoDePersona($tabla1);
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
				window.location="index.php?action=marcas&guardar=ok"</script>';
			}
			else
			{
				header("location:index.php?action=error");
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

					
				
					
					<td><button id="btn-editar" class="btn btn-warning" >Editar</button></td><td> <a class="btn btn-danger" href="index.php?action=eliminar_marca=<?php echo $dato['pk_marca']; ?>'">🗑️</a></td>
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

}

