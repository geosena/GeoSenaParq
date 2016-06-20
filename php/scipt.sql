CREATE DATABASE GeoCeet;

USE GeoCeet;

CREATE TABLE tipo_ubicacion(
	id_ubic INTEGER,
	nombre VARCHAR(80)	
);

ALTER TABLE ADD CONSTRAINT PRIMARY KEY PK_tipo_ubicacion 

CREATE TABLE sede(
	id_sede INTEGER auto_increment primary key,
	nombre  VARCHAR(80),
	descrip VARCHAR(200)
);

CREATE TABLE ubicacion(
	id_ubic INTEGER auto_increment primary key,
	id_tipo_ubicacion INTEGER,
	id_sede INTEGER,
	direccion VARCHAR(80),
	latitud DOUBLE,
	longitud DOUBLE	
);

CREATE TABLE tipo_telefono(

	id_tipoTel INTEGER,
	descripcion VARCHAR(45)

);


CREATE TABLE telefono(

	id_telef INTEGER auto_increment primary key,
	id_tipoTel INTEGER,
	id_ubic 	INTEGER,
	telefono    INTEGER(45)

);

create table usuario(
	cod_usuario integer auto_increment primary key,
	txt_apellido1 varchar(20),
	txt_apellido2 varchar(20),
	txt_nombre varchar(20),
	txt_nick varchar(20),
	txt_password varchar(20),
	nro_doc integer,
	txt_correo varchar(20),
	txt_telefono varchar(20),
	sn_habilitado integer
);


INSERT INTO usuario (txt_apellido1,txt_apellido2,txt_nombre,txt_nick,txt_password,nro_doc,txt_correo,txt_telefono,sn_habilitado)
VALUES('Moreno', 'Muñoz', 'Gustavo Adolfo', 'Zetman', 'polo123', 1022961238, 'gusadolfo123@hotmail.com', 3194318964, 1);

INSERT INTO tipo_telefono VALUES(1, "Celular");
INSERT INTO tipo_telefono VALUES(2, "Local");

INSERT INTO tipo_ubicacion VALUES(1, "Centro");
INSERT INTO tipo_ubicacion VALUES(2, "Parqueadero");


SELECT 	s.id_sede, s.nombre, u.direccion FROM 	sede s JOIN ubicacion u ON s.id_sede = u.id_sede
		

