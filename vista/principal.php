


<!--<a href="controlador/CtrlSalir.php">Salir</a>-->

<header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="https://scontent.ftpq2-1.fna.fbcdn.net/v/t39.30808-6/293016732_416430833856818_649140442853860777_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=2TdqhjPHZWUAX8WEBAB&_nc_ht=scontent.ftpq2-1.fna&oh=00_AT_WUG30f64uWeKqVWud1ZurKUW2RTcJQBNbDhIrfTd-Tw&oe=631C8B07" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="index.php?action=inicio" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Inicio</span> </a>
                <div class="nav_list"> <a href="index.php?action=mostrar_producto" class="nav_link active"> <i class='fas fa-cheese'></i> <span class="nav_name">Productos</span> </a> 
                	<a href="index.php?action=mostrar_persona" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Personas</span> </a>
                	 <a href="index.php?action=mostrar_proveedor" class="nav_link"> <i class='fas fa-male'></i> <span class="nav_name">Proveedores</span> </a> <a  href="index.php?action=mostrar_trabajador" class="nav_link"> <i class='fas fa-user-tie'></i> <span class="nav_name">Trabajadores</span> </a> <a href="#" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Inventario</span> </a> <a href="index.php?action=mostrar_marca" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Marca</span> </a> 
                	 <a href="index.php?action=mostrar_almacen" class="nav_link"> <i class='fas fa-archive'></i><span class="nav_name">Almacen</span> </a>
                	
                	</div>
            </div> <a href="controlador/CtrlSalir.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Cerrar Sesion</span> </a>
        </nav>
    </div>

   
<h1 style="color:#ffffff" >Bienvenido</h1>
    
	<?php
	require_once("modelo/enlaces.php");
	//require_once("modelo/validar.php");
require_once("modelo/crud.php");
require_once("controlador/controller.php");
		$f2 =new Controller();
		$f2 -> enlacespagina();
	?>


    <!--Container Main end-->
	<div>

		<?php
			require "vista/componentes/footer.php";
		?>
	</div>

	
