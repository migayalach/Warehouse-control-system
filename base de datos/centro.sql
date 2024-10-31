create table nivel(
	id_nivel int auto_increment not null,
	tipo varchar(13) not null,
	primary key (id_nivel)
);

create table usuario(
	id_usuario int auto_increment not null,
	nombre varchar(100) not null,
	apellido varchar(100) not null,
	carnet varchar(15) not null,
	direccion varchar(250) not null,
	celular varchar(20) not null,	
	telefono varchar(20) not null,
	usuario varchar(50) not null,
	contraseña text(50) not null,
	id_nivel int not null,
	primary key(id_usuario),
	foreign key(id_nivel) references nivel(id_nivel)
);

create table cliente(
	id_cliente int auto_increment not null,
	nombre varchar(100) not null,
	apellido varchar(100) not null,
	carnet varchar(15) not null,
	direccion varchar(250) not null,
	celular varchar(20) not null,
	primary key(id_cliente)
);

create table producto(
	id_producto int auto_increment not null,
    nombre_producto varchar(250) not null,
	tamaño varchar(250) not null,
	stock float not null,
	primary key(id_producto)
);

create table cantidad(
	id_cantidad int auto_increment not null,
	id_producto int not null,
    stockNuevo float not null,
	fecha_entrada date null,
	primary key(id_cantidad),
	foreign key(id_producto) references producto(id_producto)
);

create table venta(
	id_venta int not null,
	id_cliente int not null,
	id_producto int not null,
	cantidad float not null,
	fechaCompra date not null,
	foreign key (id_cliente) references cliente(id_cliente),
	foreign key (id_producto) references producto(id_producto)
);

INSERT INTO `nivel` (`id_nivel`, `tipo`) VALUES (NULL, 'Administrador'), 
												(NULL, 'Estandar');