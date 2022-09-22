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
	//Tablas EMPLEADOS
static public function registrosEmpleadoModel($DatosModel, $tabla)
	{
		$ejecucion = Conexion::getConection()->prepare("INSERT INTO $tabla (nombrep, apellidop, apellidom, foto, telefono_cel,sexo,domicilio,email) VALUES (:nom, :appa, :apma, :foto, :tel, :sexo, :dom, :email)");

		
		$ejecucion ->bindParam(":nom", $DatosModel["b"], PDO::PARAM_STR);
		$ejecucion ->bindParam(":appa", $DatosModel["c"], PDO::PARAM_STR);
		$ejecucion ->bindParam(":apma", $DatosModel["d"], PDO::PARAM_STR);
		$ejecucion ->bindParam(":foto", $DatosModel["e"], PDO::PARAM_STR);

		$ejecucion ->bindParam(":tel", $DatosModel["g"], PDO::PARAM_STR);
		$ejecucion ->bindParam(":sexo", $DatosModel["k"], PDO::PARAM_STR);
		$ejecucion ->bindParam(":dom", $DatosModel["l"], PDO::PARAM_STR);
		$ejecucion ->bindParam(":email", $DatosModel["m"], PDO::PARAM_STR);


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
		$ejecucion = Conexion::getConection()->prepare("INSERT INTO $tabla (producto, codigo, fotop, descripcion, pieza,fk_marca) VALUES (:producto, :codigo, :fotop, :descripcion, :pieza, :marca)");

		
		$ejecucion ->bindParam(":producto", $DatosModel["pro"], PDO::PARAM_STR);
		$ejecucion ->bindParam(":codigo", $DatosModel["cod"], PDO::PARAM_STR);
		$ejecucion ->bindParam(":fotop", $DatosModel["e"], PDO::PARAM_STR);
		$ejecucion ->bindParam(":descripcion", $DatosModel["des"], PDO::PARAM_STR);
        $ejecucion ->bindParam(":pieza", $DatosModel["pz"], PDO::PARAM_STR);
		$ejecucion ->bindParam(":marca", $DatosModel["ma"], PDO::PARAM_STR);
		

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
		$iniciar = ($_GET['pagina']-1)*$articulosXPagina;
		$consulta = Conexion::getConection()->prepare("SELECT COUNT(producto),pk_producto,producto,codigo,fotop,descripcion,pieza,fk_marca,pk_marca,nombre FROM $tabla,$marca WHERE $tabla.fk_marca=$marca.pk_marca GROUP BY producto ORDER BY nombre LIMIT :iniciar, :articulosXPagina;");
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
		$consulta1 = Conexion::getConection()->prepare("SELECT pk_persona, nombrep, apellidop,apellidom FROM $tabla1 ORDER BY nombrep");

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
	public static function listadoDeProveedor($tabla1,$tabla2,$tabla3)
	{
		$consulta1 = Conexion::getConection()->prepare("SELECT pk_proveedor,fk_persona,fk_marca,nombrep,apellidop,apellidom,nombre FROM $tabla1,$tabla2,$tabla3 WHERE ($tabla2.pk_persona = $tabla1.fk_persona)&($tabla3.pk_marca = $tabla1.fk_marca)  ORDER BY pk_proveedor");

		$consulta1->execute();

		return $consulta1->fetchAll();

		$consulta1->close();
	}
	static public function vistaTrabajadorModel($tabla,$tablac,$tablap)
	{
		$consulta = Conexion::getConection()->prepare("SELECT pk_empleado,fk_persona,fk_cargo,pk_cargo,cargo,pk_persona,nombrep,apellidop,apellidom FROM $tabla,$tablac,$tablap WHERE ($tabla.fk_cargo=$tablac.pk_cargo)&($tabla.fk_persona=$tablap.pk_persona) ORDER BY pk_empleado");

		$consulta->execute();

		return $consulta->fetchALL();

		$consulta->close();
	}
	static public function registrosTrabajadorModel($DatosModel, $tabla)
	{
		$ejecucionmarca = Conexion::getConection()->prepare("INSERT INTO $tabla (fk_cargo,fk_persona) VALUES (:cargo,:persona)");

		
		$ejecucionmarca ->bindParam(":cargo", $DatosModel["ca"], PDO::PARAM_STR);
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
		

		// Nuevos valores que se establecerán
		$nvoPersona = $datos['valor_nvoNombre'];
		$nvoCargo = $datos['valor_nvoCargo'];
		

		// Verificar que almenos se modificó un campo
		if(($pk_persona != $nvoPersona) || ($pk_cargo != $nvoCargo)){
			$tablap="persona";
			$tablac="cargo";

			$datos = Conexion::getConection()->prepare("SELECT fk_persona,fk_cargo FROM $tabla,$tablac,$tablap WHERE pk_empleado=:pk_empleado AND $tabla.fk_persona=$tablap.pk_persona AND $tabla.fk_cargo=$tablac.pk_cargo");
			$datos -> bindParam(':pk_empleado', $pk_empleado);
			
			$datos -> execute();
			$resultados = $datos->fetch(PDO::FETCH_ASSOC);

			if(empty($resultados)){

				return "noexiste";
			}
			else{


				$datos2 = Conexion::getConection()->prepare("UPDATE $tabla SET fk_persona=:nvoPersona, fk_cargo=:nvoCargo WHERE pk_empleado=:pk_empleado AND fk_persona=fk_persona AND fk_cargo=fk_cargo ");
				$datos2 -> bindParam(':pk_empleado', $pk_empleado);
				
				$datos2 -> bindParam(':nvoPersona', $nvoPersona);
				$datos2 -> bindParam(':nvoCargo', $nvoCargo);
				
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