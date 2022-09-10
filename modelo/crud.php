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
		$ejecucion = Conexion::getConection()->prepare("INSERT INTO $tabla (nombre, apellidop, apellidom, foto, telefono_cel,sexo,domicilio,email) VALUES (:nom, :appa, :apma, :foto, :tel, :sexo, :dom, :email)");

		
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
	static public function vistaProductoModel($tabla)
	{
		$consulta = Conexion::getConection()->prepare("SELECT * FROM $tabla ORDER BY pk_producto ASC");

		$consulta->execute();

		return $consulta->fetchALL();

		$consulta->close();
	}
	static public function vistaProveedorModel($tabla)
	{
		$consulta = Conexion::getConection()->prepare("SELECT * FROM $tabla ORDER BY pk_proveedor");

		$consulta->execute();

		return $consulta->fetchALL();

		$consulta->close();
	}
	public static function listadoDePersona($tabla1)
	{
		$consulta1 = Conexion::getConection()->prepare("SELECT pk_persona, nombre, apellidop,apellidom FROM $tabla1 ORDER BY nombre");

		$consulta1->execute();

		return $consulta1->fetchAll();

		$consulta1->close();
	}
	static public function vistaTrabajadorModel($tabla)
	{
		$consulta = Conexion::getConection()->prepare("SELECT * FROM $tabla ORDER BY pk_empleado");

		$consulta->execute();

		return $consulta->fetchALL();

		$consulta->close();
	}
	static public function registrosTrabajadorModel($DatosModel, $tabla)
	{
		$ejecucionmarca = Conexion::getConection()->prepare("INSERT INTO $tabla (cargo,fk_persona) VALUES (:cargo,:persona)");

		
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