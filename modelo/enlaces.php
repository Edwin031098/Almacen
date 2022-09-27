<?php

class Paginas
{
	static public function enlacesPaginaModel($enlaces)
	{
		if($enlaces == "inicio")
		{
			$module = "vista/modulos/inicio.php";
		}
		else if($enlaces == "mostrar_persona"){
			$module = "vista/modulos/personas/mostrar_persona.php";

		}
		else if($enlaces == "agregar_persona"){
			$module = "vista/modulos/personas/agregar_persona.php";

		}
		else if($enlaces == "editar_persona"){
			$module = "vista/modulos/personas/editar_persona.php";

		}
		else if($enlaces == "eliminar_persona"){
			$module = "vista/modulos/personas/eliminar_persona.php";

		}
		else if($enlaces == "mostrar_producto"){
			$module = "vista/modulos/productos/mostrar_producto.php";

		}
		else if($enlaces == "agregar_producto"){
			$module = "vista/modulos/productos/agregar_producto.php";

		}
		else if($enlaces == "editar_producto"){
			$module = "vista/modulos/productos/editar_producto.php";

		}
		else if($enlaces == "eliminar_producto"){
			$module = "vista/modulos/productos/eliminar_producto.php";

		}
		else if($enlaces == "agregar_marca"){
			$module = "vista/modulos/marcas/agregar_marca.php";

		}
		else if($enlaces == "mostrar_marca"){
			$module = "vista/modulos/marcas/mostrar_marca.php";

		}
		else if($enlaces == "eliminar_marca"){
			$module = "vista/modulos/marcas/eliminar_marca.php";

		}
		else if($enlaces == "editar_marca"){
			$module = "vista/modulos/marcas/editar_marca.php";

		}


		else if($enlaces == "agregar_proveedor"){
			$module = "vista/modulos/proovedores/agregar_proveedor.php";

		}
		else if($enlaces == "mostrar_proveedor"){
			$module = "vista/modulos/proovedores/mostrar_proveedor.php";

		}
		else if($enlaces == "eliminar_proveedor"){
			$module = "vista/modulos/proovedores/eliminar_proveedor.php";

		}
		else if($enlaces == "editar_proveedor"){
			$module = "vista/modulos/proovedores/editar_proveedor.php";

		}
		else if($enlaces == "agregar_trabajador"){
			$module = "vista/modulos/trabajadores/agregar_trabajador.php";

		}
		else if($enlaces == "mostrar_trabajador"){
			$module = "vista/modulos/trabajadores/mostrar_trabajador.php";

		}
		else if($enlaces == "eliminar_trabajador"){
			$module = "vista/modulos/trabajadores/eliminar_trabajador.php";

		}
		else if($enlaces == "editar_trabajador"){
			$module = "vista/modulos/trabajadores/editar_trabajador.php";

		}
		
		else if($enlaces == "agregar_almacen"){
			$module = "vista/modulos/almacenes/agregar_almacen.php";

		}
		else if($enlaces == "mostrar_almacen"){
			$module = "vista/modulos/almacenes/mostrar_almacen.php";

		}
		else if($enlaces == "eliminar_almacen"){
			$module = "vista/modulos/almacenes/eliminar_almacen.php";

		}
		else if($enlaces == "editar_almacen"){
			$module = "vista/modulos/almacenes/editar_almacen.php";

		}
		else if($enlaces == "mostrar_alpro"){
			$module = "vista/modulos/almacen_producto/mostrar_alpro.php";

		}
		else 
		{
			$module = "vista/modulos/inicio.php";
		}
		return $module;
	}
}