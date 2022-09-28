<?php
require_once "Conexion.php";

class Datos
{
static public function vistaPersonaModel($tabla)
	{
		$consulta = Conexion::getConection()->prepare("SELECT * FROM $tabla ORDER BY pk_persona");

		$consulta->execute();

		return $consulta->fetchALL();

		$consulta->close();
	}
	
	static public function eliminarPersonaModelo($pk_persona, $tabla){


		$datos = Conexion::getConection()->prepare("SELECT pk_persona FROM $tabla WHERE pk_persona=:pk_persona");
		$datos->bindParam(':pk_persona', $pk_persona);
		$datos -> execute();
		$resultados = $datos->fetch(PDO::FETCH_ASSOC);

		if(empty($resultados)){

			return "noexiste";
		}
		else{
			
			$datos2 = Conexion::getConection()->prepare("DELETE  FROM $tabla WHERE pk_persona=:pk_persona");
			$datos2 -> bindParam(':pk_persona', $pk_persona);
			$datos2->execute();

			if($datos2->execute()){

				return "ok";
			}
			else{

				return "error";
			}

			$datos2->close();
		}

		$resultados->closeCursor();
		$datos->close();
		
	}
	//Tablas EMPLEADOS
static public function registrosEmpleadoModel($DatosModel, $tabla)
	{
		$ejecucion = Conexion::getConection()->prepare("INSERT INTO $tabla (nombrep, apellidop, apellidom, foto, cel,sexo,direccion,tipo,comentariop) VALUES (:nom, :appa, :apma, :foto, :tel, :sexo, :dom, :tip,:com)");

		
		$ejecucion ->bindParam(":nom", $DatosModel["b"], PDO::PARAM_STR);
		$ejecucion ->bindParam(":appa", $DatosModel["c"], PDO::PARAM_STR);
		$ejecucion ->bindParam(":apma", $DatosModel["d"], PDO::PARAM_STR);
		$ejecucion ->bindParam(":foto", $DatosModel["e"], PDO::PARAM_STR);

		$ejecucion ->bindParam(":tel", $DatosModel["g"], PDO::PARAM_STR);
		$ejecucion ->bindParam(":sexo", $DatosModel["k"], PDO::PARAM_STR);
		$ejecucion ->bindParam(":dom", $DatosModel["l"], PDO::PARAM_STR);
		$ejecucion ->bindParam(":tip", $DatosModel["ti"], PDO::PARAM_STR);
		$ejecucion ->bindParam(":com", $DatosModel["f"], PDO::PARAM_STR);
		


		if($ejecucion ->execute())
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$ejecucion ->close();
	}
	// Método que cambia todos los campos de un proveedor
	static public function editarPersonaModelo($datos, $tabla){

		

		// Información actual del proveedor
		$pk_persona = $datos['valor_idp'];
		$nombrep= $datos['vnom'];
		$apellidop= $datos['vap'];
		$apellidom = $datos['vam'];
		$fotop = $datos['vfoto'];
		$cel = $datos['vcel'];
		$sexo = $datos['vse'];
		$direccion = $datos['vdi'];
		$tipo = $datos['vti'];
		$comentario = $datos['vcom'];
		

		// Nuevos valores que se establecerán
		$nvnombrep = $datos['nvnom'];
		$nvapellidop = $datos['nvapep'];
		$nvapellidom = $datos['nvapem'];
		$nvfotop = $datos['nvfoto'];
		$nvcel = $datos['nvcel'];
		$nvsexo = $datos['nvsex'];
		$nvdireccion = $datos['nvdir'];
		$nvtipo = $datos['nvti'];
		$nvcomentario = $datos['nvcomentario'];
		
		

		// Verificar que almenos se modificó un campo
		if(($nombrep != $nvnombrep) || ($apellidop != $nvapellidop) || ($apellidom != $nvapellidom) || ($fotop != $nvfotop) ||($cel != $nvcel) || ($sexo != $nvsexo)|| ($direccion != $nvdireccion)|| ($tipo != $nvtipo) ||  ($comentario != $nvcomentario)){
			
			

			$datos = Conexion::getConection()->prepare("SELECT nombrep,apellidop,apellidom,foto,cel,sexo,direccion,tipo,comentariop FROM $tabla WHERE pk_persona=:pk_persona  ");
			$datos -> bindParam(':pk_persona', $pk_persona);
			
			$datos -> execute();
			$resultados = $datos->fetch(PDO::FETCH_ASSOC);

			if(empty($resultados)){

				return "noexiste";
			}
			else{
                 
                 
			
				$datos2 = Conexion::getConection()->prepare("UPDATE $tabla SET nombrep=:nvnombrep, apellidop=:nvapellidop, apellidom=:nvapellidom,foto=:nvfotop, cel=:nvcel,sexo=:nvsexo, direccion=:nvdireccion, tipo=:nvtipo,comentariop=:nvcomentario WHERE pk_persona=:pk_persona");
				$datos2 -> bindParam(':pk_persona', $pk_persona);
				$datos2 -> bindParam(':nvnombrep', $nvnombrep);
				$datos2-> bindParam(':nvapellidop', $nvapellidop);
				$datos2 -> bindParam(':nvapellidom', $nvapellidom);
				$datos2 -> bindParam(':nvfotop', $nvfotop);
				$datos2 -> bindParam(':nvcel', $nvcel);
				$datos2 -> bindParam(':nvsexo', $nvsexo);
				$datos2 -> bindParam(':nvdireccion', $nvdireccion);
				$datos2 -> bindParam(':nvtipo', $nvtipo);
				$datos2 -> bindParam(':nvcomentario', $nvcomentario);
				
				
				$datos2->execute();


				if($datos2->execute()){

					return "ok";
				}
				else{

					return "error";
				}

				$datos2->close();
			}

			$resultados->closeCursor();
			$datos->close();
			
		}
		else{

			return "esigual";
		}
		
	}
	// Método que elimina una marca con el nombre de la marca
	
	static public function registrosMarcaModel($DatosModel, $tabla)
	{
		$ejecucionmarca = Conexion::getConection()->prepare("INSERT INTO $tabla (nombre) VALUES (:marca)");

		
		$ejecucionmarca ->bindParam(":marca", $DatosModel["ma"], PDO::PARAM_STR);
		

		if($ejecucionmarca ->execute())
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$ejecucionmarca ->close();
	}
	static public function registrosProveedorModel($DatosModel, $tabla)
	{
		$ejecucionmarca = Conexion::getConection()->prepare("INSERT INTO $tabla (fk_marca,fk_persona) VALUES (:marca,:persona)");

		
		$ejecucionmarca ->bindParam(":marca", $DatosModel["fm"], PDO::PARAM_STR);
		$ejecucionmarca ->bindParam(":persona", $DatosModel["fp"], PDO::PARAM_STR);
		

		if($ejecucionmarca ->execute())
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$ejecucionmarca ->close();
	}
	static public function vistaMarcaModel($tabla)
	{
		$consulta = Conexion::getConection()->prepare("SELECT * FROM $tabla ORDER BY pk_marca");

		$consulta->execute();

		return $consulta->fetchALL();

		$consulta->close();
	}
	// Método que consulta a la bd las categorías para ordenarlas por órden alfabético y mostrarlas en el select
	static public function vistaMarcasSelectModelo($tabla){
		$consulta = Conexion::conectar()->prepare("SELECT nombre FROM $tabla ORDER BY nombre ASC");

		$consulta -> execute();
		return $consulta -> fetchAll();
		$consulta -> close();
	}

	//metodo para consultar las categorias
	public static function listadoDeMarca($tabla1)
	{
		$consulta1 = Conexion::getConection()->prepare("SELECT pk_marca, nombre FROM $tabla1 ORDER BY nombre");

		$consulta1->execute();

		return $consulta1->fetchAll();

		$consulta1->close();
	}
	public static function listadoDeEmpleadoe($tabla1)
	{
		$consulta1 = Conexion::getConection()->prepare("SELECT pk_empleado,fk_persona,fk_cargo FROM $tabla1 WHERE fk_cargo=1; ORDER BY nombre");

		$consulta1->execute();

		return $consulta1->fetchAll();

		$consulta1->close();
	}
	public static function listadoDeEmpleadoa($tabla1)
	{
		$consulta1 = Conexion::getConection()->prepare("SELECT pk_empleado,fk_persona,fk_cargo FROM $tabla1 WHERE fk_cargo=2; ORDER BY nombre");

		$consulta1->execute();

		return $consulta1->fetchAll();

		$consulta1->close();
	}
	// Método que elimina una marca con el nombre de la marca
	static public function eliminarMarcaModelo($pk_marca, $tabla){


		$datos = Conexion::getConection()->prepare("SELECT pk_marca FROM $tabla WHERE pk_marca=:pk_marca");
		$datos->bindParam(':pk_marca', $pk_marca);
		$datos -> execute();
		$resultados = $datos->fetch(PDO::FETCH_ASSOC);

		if(empty($resultados)){

			return "noexiste";
		}
		else{
			$datos2 = Conexion::getConection()->prepare("DELETE FROM $tabla WHERE pk_marca=:pk_marca");
			$datos2 -> bindParam(':pk_marca', $pk_marca);
			$datos2->execute();

			if($datos2->execute()){

				return "ok";
			}
			else{

				return "error";
			}

			$datos2->close();
		}

		$resultados->closeCursor();
		$datos->close();
		
	}
	// Método que elimina una marca con el nombre de la marca
	static public function eliminarProductoModelo($pk_producto, $tabla){


		$datos = Conexion::getConection()->prepare("SELECT pk_producto FROM $tabla WHERE pk_producto=:pk_producto");
		$datos->bindParam(':pk_producto', $pk_producto);
		$datos -> execute();
		$resultados = $datos->fetch(PDO::FETCH_ASSOC);

		if(empty($resultados)){

			return "noexiste";
		}
		else{
			$datos2 = Conexion::getConection()->prepare("DELETE FROM $tabla WHERE pk_producto=:pk_producto");
			$datos2 -> bindParam(':pk_producto', $pk_producto);
			$datos2->execute();

			if($datos2->execute()){

				return "ok";
			}
			else{

				return "error";
			}

			$datos2->close();
		}

		$resultados->closeCursor();
		$datos->close();
		
	}
	// Método que elimina una marca con el nombre de la marca
	static public function eliminarAlmacenModelo($pk_almacen,$tabla){


		$datos = Conexion::getConection()->prepare("SELECT pk_almacen FROM $tabla WHERE pk_almacen=:pk_almacen");
		$datos->bindParam(':pk_almacen', $pk_almacen);
		$datos -> execute();
		$resultados = $datos->fetch(PDO::FETCH_ASSOC);

		if(empty($resultados)){

			return "noexiste";
		}
		else{
			$datos2 = Conexion::getConection()->prepare("DELETE FROM $tabla WHERE pk_almacen=:pk_almacen");
			$datos2 -> bindParam(':pk_almacen', $pk_almacen);
			$datos2->execute();

			if($datos2->execute()){

				return "ok";
			}
			else{

				return "error";
			}

			$datos2->close();
		}

		$resultados->closeCursor();
		$datos->close();
		
	}
	static public function editarMarcaModelo($datos, $tabla){

		

		$marca = $datos['valor_marca'];
		$nvoNombre = $datos['valor_nvoNombre'];

		if($marca == $nvoNombre){

			return "esigual";
		}

		$datos = Conexion::getConection()->prepare("SELECT nombre FROM $tabla WHERE nombre=:marca");
		$datos->bindParam(':marca', $marca);
		$datos -> execute();
		$resultados = $datos->fetch(PDO::FETCH_ASSOC);

		if(empty($resultados)){

			return "noexiste";
		}
		else{
			$datos2 = Conexion::getConection()->prepare("UPDATE $tabla SET nombre=:nuevoNombre WHERE nombre=:marca");
			$datos2 -> bindParam(':marca', $marca);
			$datos2 -> bindParam(':nuevoNombre', $nvoNombre);
			
			$datos2->execute();

			if($datos2->execute()){

				return "ok";
			}
			else{

				return "error";
			}

			$datos2->close();
		}

		$resultados->closeCursor();
		$datos->close();
		
	}
	static public function editarAlmacenModelo($datos, $tabla){

		

		$pk_almacen = $datos['valor_idAlmacen'];
		$almacen = $datos['valor_nombreAlmacen'];
		$ubicacion = $datos['valor_ubicacionAlmacen'];

		$nvoAlmacen= $datos['valor_nvoAlmacen'];
		$nvoUbicacion= $datos['valor_nvoUbicacion'];

		if(($almacen != $nvoAlmacen) || ($ubicacion != $nvoUbicacion)){

			$datos = Conexion::getConection()->prepare("SELECT almacen,ubicacion FROM $tabla WHERE pk_almacen=:pk_almacen AND almacen=:almacen AND ubicacion=:ubicacion");
			$datos -> bindParam(':pk_almacen', $pk_almacen);
			$datos -> bindParam(':almacen', $almacen);
			$datos -> bindParam(':ubicacion', $ubicacion);
			$datos -> execute();
			$resultados = $datos->fetch(PDO::FETCH_ASSOC);

			if(empty($resultados)){

				return "noexiste";
			}
			else{
				$datos2 = Conexion::getConection()->prepare("UPDATE $tabla SET almacen=:nvoAlmacen, ubicacion=:nvoUbicacion WHERE pk_almacen=:pk_almacen AND almacen=:almacen AND ubicacion=:ubicacion");
				$datos2 -> bindParam(':pk_almacen', $pk_almacen);
				$datos2 -> bindParam(':almacen', $almacen);
				$datos2 -> bindParam(':ubicacion', $ubicacion);
				$datos2 -> bindParam(':nvoAlmacen', $nvoAlmacen);
				$datos2 -> bindParam(':nvoUbicacion', $nvoUbicacion);
				
				$datos2->execute();


				if($datos2->execute()){

					return "ok";
				}
				else{

					return "error";
				}

				$datos2->close();
			}

			$resultados->closeCursor();
			$datos->close();
			
		}
		else{

			return "esigual";
		}

		
	}
	static public function registrosProductoModel($DatosModel, $tabla)
	{
		$ejecucion = Conexion::getConection()->prepare("INSERT INTO $tabla (producto, codigo, fotop, descripcion, pieza,fk_marca,comentario,fk_almacen) VALUES (:producto, :codigo, :fotop, :descripcion, :pieza, :marca, :com, :alm)");

		
		$ejecucion ->bindParam(":producto", $DatosModel["pro"], PDO::PARAM_STR);
		$ejecucion ->bindParam(":codigo", $DatosModel["cod"], PDO::PARAM_STR);
		$ejecucion ->bindParam(":fotop", $DatosModel["e"], PDO::PARAM_STR);
		$ejecucion ->bindParam(":descripcion", $DatosModel["des"], PDO::PARAM_STR);
        $ejecucion ->bindParam(":pieza", $DatosModel["pz"], PDO::PARAM_STR);
		$ejecucion ->bindParam(":marca", $DatosModel["ma"], PDO::PARAM_STR);
		$ejecucion ->bindParam("com",$DatosModel["a"],PDO::PARAM_STR);
		$ejecucion ->bindParam("alm",$DatosModel["al"],PDO::PARAM_STR);

		if($ejecucion ->execute())
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$ejecucion ->close();
	}
	
	
	static public function mostrarProductoModel($tabla, $articulosXPagina,$marca)
	{
		$tablaa="almacen";
		$iniciar = ($_GET['pagina']-1)*$articulosXPagina;
		$consulta = Conexion::getConection()->prepare("SELECT COUNT(producto),pk_producto,producto,codigo,fotop,descripcion,pieza,fk_marca,pk_marca,nombre,comentario,pk_almacen,almacen FROM $tabla,$marca,$tablaa WHERE $tabla.fk_marca=$marca.pk_marca AND  $tabla.fk_almacen=$tablaa.pk_almacen GROUP BY producto ORDER BY nombre LIMIT :iniciar, :articulosXPagina;");
		$consulta -> bindParam(':iniciar', $iniciar, PDO::PARAM_INT);
		$consulta -> bindParam(':articulosXPagina', $articulosXPagina, PDO::PARAM_INT);
		

		$consulta->execute();

		return $consulta->fetchALL();

		$consulta->close();
	}
	static public function paginacionProductoModel($tabla, $articulosXPagina)
	{
		
		$consulta = Conexion::getConection()->prepare("SELECT COUNT(producto),pk_producto,producto,codigo,fotop,descripcion,pieza,fk_marca FROM $tabla  GROUP BY producto");
		

		$consulta->execute();
		// Contar filas de la consulta
		$totalArticulosBD = $consulta->rowCount();

		// Contar el número de páginas
		$paginas = ($totalArticulosBD / $articulosXPagina);
		$paginas = ceil($paginas);
		//echo '<br>&nbsp;&nbsp;<b>Total de páginas: </b>'.$paginas;

		// Comprobar si está vacía la tabla producto
		if($paginas == 0){
			$paginas = 1;
		}

		$datos = array('valor_totalArticulosBD' => $totalArticulosBD, 'valor_articulosXPagina' => $articulosXPagina, 'valor_paginas' => $paginas);

		return $datos;
		$consulta -> close();

	}
	// Método que cambia todos los campos de un proveedor
	static public function editarProductoModelo($datos, $tabla,$tablam){

		

		// Información actual del proveedor
		$pk_producto = $datos['valor_idp'];
		$producto = $datos['valor_p'];
		$codigo = $datos['valor_c'];
		$fotop = $datos['valor_nf'];
		$descripcion = $datos['valor_d'];
		$pieza = $datos['valor_pi'];
		$marca = $datos['valor_m'];
		$comentario = $datos['valor_co'];
		$almacen = $datos['valor_al'];
		

		// Nuevos valores que se establecerán
		$nproducto = $datos['valor_np'];
		$ncodigo = $datos['valor_nc'];
		$nfotop = $datos['f'];
		$ndescripcion = $datos['valor_nd'];
		$npieza = $datos['valor_npi'];
		$nmarca = $datos['valor_nma'];
		$ncomentario = $datos['e'];
		$nalmacen = $datos['valor_nal'];
		
		

		// Verificar que almenos se modificó un campo
		if(($producto != $nproducto) || ($codigo != $ncodigo) || ($fotop != $nfotop) || ($descripcion != $ndescripcion) ||($pieza != $npieza) || ($marca != $nmarca) ||  ($comentario != $ncomentario)||  ($almacen != $nalmacen)){
			
			
              $tablaa="almacen";
			$datos = Conexion::getConection()->prepare("SELECT producto,codigo,fotop,descripcion,pieza,fk_marca,comentario,fk_almacen FROM $tabla,$tablam,$tablaa WHERE pk_producto=:pk_producto  AND  $tabla.fk_marca=$tablam.pk_marca AND  $tabla.fk_almacen=$tablaa.pk_almacen");
			$datos -> bindParam(':pk_producto', $pk_producto);
			
			$datos -> execute();
			$resultados = $datos->fetch(PDO::FETCH_ASSOC);

			if(empty($resultados)){

				return "noexiste";
			}
			else{
                 
                 
			$tablam="marca";
				$datos2 = Conexion::getConection()->prepare("UPDATE $tabla SET producto=:nproducto, codigo=:ncodigo,fotop=:nfotop, descripcion=:ndescripcion,pieza=:npieza, fk_marca=:nmarca,comentario=:ncomentario ,fk_almacen=:nalmacen WHERE pk_producto=:pk_producto AND fk_marca=fk_marca AND fk_almacen=fk_almacen");
				$datos2 -> bindParam(':pk_producto', $pk_producto);
				$datos2 -> bindParam(':nproducto', $nproducto);
				$datos2-> bindParam(':ncodigo', $ncodigo);
				$datos2 -> bindParam(':nfotop', $nfotop);
				$datos2 -> bindParam(':ndescripcion', $ndescripcion);
				$datos2 -> bindParam(':npieza', $npieza);
				$datos2 -> bindParam(':nmarca', $nmarca);
				$datos2 -> bindParam(':ncomentario', $ncomentario);
				$datos2 -> bindParam(':nalmacen', $nalmacen);
				
				$datos2->execute();


				if($datos2->execute()){

					return "ok";
				}
				else{

					return "error";
				}

				$datos2->close();
			}

			$resultados->closeCursor();
			$datos->close();
			
		}
		else{

			return "esigual";
		}
		
	}
	
	static public function vistaProveedorModel($tablap,$tablam,$tabla)
	{
		$consulta = Conexion::getConection()->prepare("SELECT pk_proveedor,fk_persona,fk_marca,nombrep,apellidop,apellidom,nombre,pk_marca,pk_persona FROM $tablap,$tablam,$tabla WHERE ($tablap.pk_persona = $tabla.fk_persona)&($tablam.pk_marca = $tabla.fk_marca)  ORDER BY pk_proveedor");

		$consulta->execute();

		return $consulta->fetchALL();

		$consulta->close();
	}
	// Método que elimina una marca con el nombre de la marca
	static public function eliminarProveedorModelo($pk_proveedor, $tabla){


		$datos = Conexion::getConection()->prepare("SELECT pk_proveedor FROM $tabla WHERE pk_proveedor=:pk_proveedor");
		$datos->bindParam(':pk_proveedor', $pk_proveedor);
		$datos -> execute();
		$resultados = $datos->fetch(PDO::FETCH_ASSOC);

		if(empty($resultados)){

			return "noexiste";
		}
		else{
			$datos2 = Conexion::getConection()->prepare("DELETE FROM $tabla WHERE pk_proveedor=:pk_proveedor");
			$datos2 -> bindParam(':pk_proveedor', $pk_proveedor);
			$datos2->execute();

			if($datos2->execute()){

				return "ok";
			}
			else{

				return "error";
			}

			$datos2->close();
		}

		$resultados->closeCursor();
		$datos->close();
		
	}
	// Método que cambia todos los campos de un proveedor
	static public function editarProveedorModelo($datos, $tabla){

		

		// Información actual del proveedor
		$pk_proveedor = $datos['valor_idProveedor'];
		$pk_persona = $datos['valor_nombreProveedor'];
		$pk_marca = $datos['valor_marcaProveedor'];
		

		// Nuevos valores que se establecerán
		$nvoPersona = $datos['valor_nvoNombre'];
		$nvoMarca = $datos['valor_nvoMarca'];
		

		// Verificar que almenos se modificó un campo
		if(($pk_persona != $nvoPersona) || ($pk_marca != $nvoMarca)){
			$tablap="persona";
			$tablam="marca";

			$datos = Conexion::getConection()->prepare("SELECT fk_persona,fk_marca FROM $tabla,$tablam,$tablap WHERE pk_proveedor=:pk_proveedor  AND $tabla.fk_persona=$tablap.pk_persona AND $tabla.fk_marca=$tablam.pk_marca");
			$datos -> bindParam(':pk_proveedor', $pk_proveedor);
			
			$datos -> execute();
			$resultados = $datos->fetch(PDO::FETCH_ASSOC);

			if(empty($resultados)){

				return "noexiste";
			}
			else{
                 
                 $tablap="persona";
			$tablam="marca";
				$datos2 = Conexion::getConection()->prepare("UPDATE $tabla SET fk_persona=:nvoPersona, fk_marca=:nvoMarca WHERE pk_proveedor=:pk_proveedor  AND fk_persona=fk_persona AND fk_marca=fk_marca");
				$datos2 -> bindParam(':pk_proveedor', $pk_proveedor);
				
				$datos2 -> bindParam(':nvoPersona', $nvoPersona);
				$datos2 -> bindParam(':nvoMarca', $nvoMarca);
				
				$datos2->execute();


				if($datos2->execute()){

					return "ok";
				}
				else{

					return "error";
				}

				$datos2->close();
			}

			$resultados->closeCursor();
			$datos->close();
			
		}
		else{

			return "esigual";
		}
		
	}
	public static function listadoDePersona($tabla1)
	{
		$consulta1 = Conexion::getConection()->prepare("SELECT pk_persona, nombrep, apellidop,apellidom,tipo FROM $tabla1 WHERE tipo=1   ORDER BY nombrep");

		$consulta1->execute();

		return $consulta1->fetchAll();

		$consulta1->close();
	}
	public static function listadoDePersona2($tabla1)
	{
		$consulta1 = Conexion::getConection()->prepare("SELECT pk_persona, nombrep, apellidop,apellidom,tipo FROM $tabla1 WHERE tipo=2   ORDER BY nombrep");

		$consulta1->execute();

		return $consulta1->fetchAll();

		$consulta1->close();
	}
	public static function listadoDeCargo($tabla1)
	{
		$consulta1 = Conexion::getConection()->prepare("SELECT * FROM $tabla1 ORDER BY pk_cargo");

		$consulta1->execute();

		return $consulta1->fetchAll();

		$consulta1->close();
	}
	public static function listadoDeAlmacen($tabla1)
	{
		$consulta1 = Conexion::getConection()->prepare("SELECT * FROM $tabla1 ORDER BY pk_almacen");

		$consulta1->execute();

		return $consulta1->fetchAll();

		$consulta1->close();
	}
	public static function listadoDeProveedor($tabla1,$tabla2,$tabla3)
	{
		$consulta1 = Conexion::getConection()->prepare("SELECT pk_proveedor,fk_persona,fk_marca,nombrep,apellidop,apellidom,nombre FROM $tabla1,$tabla2,$tabla3 WHERE ($tabla2.pk_persona = $tabla1.fk_persona)&($tabla3.pk_marca = $tabla1.fk_marca)  ORDER BY pk_proveedor");

		$consulta1->execute();

		return $consulta1->fetchAll();

		$consulta1->close();
	}
	static public function vistaTrabajadorModel($tabla,$tablac,$tablap,$tablaa)
	{
		$consulta = Conexion::getConection()->prepare("SELECT pk_empleado,fk_persona,fk_cargo,pk_cargo,cargo,pk_persona,nombrep,apellidop,apellidom,pk_almacen,almacen FROM $tabla,$tablac,$tablap,$tablaa WHERE ($tabla.fk_cargo=$tablac.pk_cargo)&($tabla.fk_persona=$tablap.pk_persona)&($tabla.fk_almacen=$tablaa.pk_almacen)  ORDER BY pk_empleado");

		$consulta->execute();

		return $consulta->fetchALL();

		$consulta->close();
	}
	static public function registrosTrabajadorModel($DatosModel, $tabla)
	{
		$ejecucionmarca = Conexion::getConection()->prepare("INSERT INTO $tabla (fk_cargo,fk_persona,fk_almacen) VALUES (:cargo,:persona,:almacen)");

		
		$ejecucionmarca ->bindParam(":cargo", $DatosModel["ca"], PDO::PARAM_STR);
		$ejecucionmarca ->bindParam(":persona", $DatosModel["fp"], PDO::PARAM_STR);
		$ejecucionmarca ->bindParam(":almacen", $DatosModel["al"], PDO::PARAM_STR);
		

		if($ejecucionmarca ->execute())
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$ejecucionmarca ->close();
	}
	static public function eliminarTrabajadorModelo($pk_empleado, $tabla)
	{
		$ejecucionmarca = Conexion::getConection()->prepare("SELECT pk_empleado	 FROM $tabla WHERE pk_empleado=:pk_empleado ");

		
		$ejecucionmarca ->bindParam(":pk_empleado",$pk_empleado);
		
		
           $ejecucionmarca -> execute();
		$resultados = $ejecucionmarca->fetch(PDO::FETCH_ASSOC);

		if(empty($resultados)){

			return "noexiste";
		}
		else{
			$datos2 = Conexion::getConection()->prepare("DELETE FROM $tabla WHERE pk_empleado=:pk_empleado");
			$datos2 -> bindParam(':pk_empleado', $pk_empleado);
			$datos2->execute();

			if($datos2->execute()){

				return "ok";
			}
			else{

				return "error";
			}

			$datos2->close();
		}

		$resultados->closeCursor();
		$ejecucionmarca->close();
		
	}
	// Método que cambia todos los campos de un proveedor
	static public function editarTrabajadorModelo($datos, $tabla){

		

		// Información actual del proveedor
		$pk_empleado = $datos['valor_idem'];
		$pk_persona = $datos['valor_nomem'];
		$pk_cargo = $datos['valor_caem'];
		$pk_almacen=$datos['valor_alem'];
		

		// Nuevos valores que se establecerán
		$nvoPersona = $datos['valor_nvoNombre'];
		$nvoCargo = $datos['valor_nvoCargo'];
		$nvoAlmacen=$datos['valor_nvoAlmacen'];
		

		// Verificar que almenos se modificó un campo
		if(($pk_persona != $nvoPersona) || ($pk_cargo != $nvoCargo)|| ($pk_almacen != $nvoAlmacen)){
			$tablap="persona";
			$tablac="cargo";
			$tablaa="almacen";

			$datos = Conexion::getConection()->prepare("SELECT fk_persona,fk_cargo,fk_almacen FROM $tabla,$tablac,$tablap,$tablaa WHERE pk_empleado=:pk_empleado AND $tabla.fk_persona=$tablap.pk_persona AND $tabla.fk_cargo=$tablac.pk_cargo AND $tabla.fk_almacen=$tablaa.pk_almacen");
			$datos -> bindParam(':pk_empleado', $pk_empleado);
			
			$datos -> execute();
			$resultados = $datos->fetch(PDO::FETCH_ASSOC);

			if(empty($resultados)){

				return "noexiste";
			}
			else{


				$datos2 = Conexion::getConection()->prepare("UPDATE $tabla SET fk_persona=:nvoPersona, fk_cargo=:nvoCargo, fk_almacen=:nvoAlmacen WHERE pk_empleado=:pk_empleado AND fk_persona=fk_persona AND fk_cargo=fk_cargo AND fk_almacen=fk_almacen ");
				$datos2 -> bindParam(':pk_empleado', $pk_empleado);
				
				$datos2 -> bindParam(':nvoPersona', $nvoPersona);
				$datos2 -> bindParam(':nvoCargo', $nvoCargo);
				$datos2 -> bindParam(':nvoAlmacen', $nvoAlmacen);
				
				$datos2->execute();


				if($datos2->execute()){

					return "ok";
				}
				else{

					return "error";
				}

				$datos2->close();
			}

			$resultados->closeCursor();
			$datos->close();
			
		}
		else{

			return "esigual";
		}
		
	}
	static public function vistaAlmacenModel($tabla)
	{
		$consulta = Conexion::getConection()->prepare("SELECT * FROM $tabla ORDER BY pk_almacen");

		$consulta->execute();

		return $consulta->fetchALL();

		$consulta->close();
	}
	static public function vistaInventarioModel($tabla,$datos)
	{
		
		$pk_almacen = $datos['pk_al'];
		$tablap="producto";
		$tablam="marca";
		$consulta = Conexion::getConection()->prepare("SELECT pk_almacen,almacen,pk_producto,producto,pieza,fk_marca,codigo,pk_marca,nombre FROM $tabla,$tablap,$tablam WHERE pk_almacen=$pk_almacen AND $tablap.fk_almacen=$tabla.pk_almacen AND $tablap.fk_marca=$tablam.pk_marca ORDER BY pk_marca");
		
		

		$consulta->execute();

		return $consulta->fetchALL();

		$consulta->close();
	}
	static public function registrosAlmacenModel($DatosModel, $tabla)
	{
		$ejecucionmarca = Conexion::getConection()->prepare("INSERT INTO $tabla (almacen,ubicacion) VALUES (:almacen,:ubicacion)");

		
		$ejecucionmarca ->bindParam(":almacen", $DatosModel["al"], PDO::PARAM_STR);
		$ejecucionmarca ->bindParam(":ubicacion", $DatosModel["ub"], PDO::PARAM_STR);
		

		if($ejecucionmarca ->execute())
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$ejecucionmarca ->close();
	}
}
?>