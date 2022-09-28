CREATE TABLE persona(
pk_persona INT PRIMARY KEY NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria de la tabla empleados',
nombre VARCHAR(50) NOT NULL COMMENT 'nombre del empleado',
apellidop VARCHAR(50) NOT NULL COMMENT 'apellido paterno del empleado',
apellidom VARCHAR(50) COMMENT 'apellido materno del empleado',
foto VARCHAR(100) NOT NULL COMMENT 'imagen del empleado', 
direccion TEXT COMMENT 'dirección del empleado', 
cel VARCHAR(20) COMMENT 'Telefono celular del empleado a diez digitos',
sexo VARCHAR(10) COMMENT 'masculino y femenino'
);
CREATE TABLE marca(
	pk_marca INT PRIMARY KEY NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria de la tabla empleados',
	nombre VARCHAR(50) NOT NULL COMMENT 'nombre del empleado'
);
CREATE TABLE producto(
pk_producto INT PRIMARY KEY NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria de la tabla empleados',
producto VARCHAR(50) NOT NULL COMMENT 'nombre del empleado',
codigo VARCHAR(50) NOT NULL COMMENT 'apellido paterno del empleado',
fotop VARCHAR(100) NOT NULL COMMENT 'imagen del empleado', 
descipcion TEXT COMMENT 'dirección del empleado', 
pieza INT(60) COMMENT 'Telefono celular del empleado a diez digitos',
tipo INT(3)COMMENT 'Empleado / Proveedor',
fk_marca INT COMMENT 'marca',
comentario VARCHAR(100) NOT NULL COMMENT 'imagen del empleado',
FOREIGN KEY (fk_marca) REFERENCES marca(pk_marca)ON DELETE CASCADE ON UPDATE CASCADE

);
CREATE TABLE almacen(
pk_almacen INT PRIMARY KEY NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria de la tabla empleados',
almacen VARCHAR(50) NOT NULL COMMENT 'nombre del empleado',
ubicacion  VARCHAR(50) NOT NULL COMMENT 'apellido paterno del empleado'
);
CREATE TABLE empleado(
	pk_empleado INT PRIMARY KEY NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria de la tabla empleados',
	fk_persona INT NOT NULL COMMENT 'nombre del empleado',
	fk_cargo INT NOT NULL COMMENT 'nombre del empleado',
	FOREIGN KEY (fk_persona) REFERENCES persona(pk_persona)ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (fk_cargo) REFERENCES cargo(pk_cargo) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE proveedor(
	pk_proveedor INT PRIMARY KEY NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria de la tabla empleados',
	fk_persona INT NOT NULL COMMENT'',
	fk_marca INT NOT NULL COMMENT '',
	FOREIGN KEY (fk_persona) REFERENCES persona(pk_persona)ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (fk_marca) REFERENCES marca(pk_marca) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE inventario(
	pk_inventario INT PRIMARY KEY NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria de la tabla empleados',
	fk_empleado INT NOT NULL COMMENT'empleado',
	fk_producto INT NOT NULL COMMENT'producto',
	fk_proveedor INT NOT NULL COMMENT'proveedor',
	fecha_inventario DATE NOT NULL COMMENT'',
	FOREIGN KEY (fk_almacen) REFERENCES almacen(pk_almacen)ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (fk_empleado) REFERENCES empleado(pk_empleado)ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (fk_producto) REFERENCES producto(pk_producto)ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (fk_proveedor)REFERENCES proveedor(pk_proveedor)ON DELETE CASCADE ON UPDATE CASCADE

);
CREATE TABLE cargo(
pk_cargo INT PRIMARY KEY NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria de la tabla cargo',
cargo VARCHAR(50) NOT NULL COMMENT 'cargo del empleado'
);
ALTER TABLE producto ADD CONSTRAINT fk_almacen_almacen FOREIGN KEY(fk_almacen)REFERENCES almacen(pk_almacen);
