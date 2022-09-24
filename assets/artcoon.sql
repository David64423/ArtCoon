create database artcoon;
use artcoon;

#drop database artcoon;

create table roles(
	rol_id tinyint auto_increment,
    rol_desc varchar(30),
    primary key (rol_id)
);

insert into roles (rol_desc) values ('admin'),('cliente');

create table idioma(
	idioma_id tinyint auto_increment,
    idioma_desc varchar (30),
    primary key (idioma_id)
);

insert into idioma (idioma_desc) values ('ingles'),('español');
# hola tgbbb
create table usuarios(
	usu_id int auto_increment,
    usu_nick varchar (30) unique key,
    idioma_id tinyint,
    usu_email varchar (50) unique key,
    usu_pass varchar (30),
    rol_id tinyint,
    primary key (usu_id),
    foreign key (idioma_id) references idioma(idioma_id),
    foreign key (rol_id) references roles(rol_id)
);

insert into usuarios (usu_nick,idioma_id,usu_email,usu_pass,rol_id) values ('galo',1,'galo@gmail.com','abc',1);

create table tipos(
	tipo_id int (1) auto_increment,
    tipo_nombre varchar (20), -- sketch , simple , full
    tipo_precio float (4,2), -- sketch = 1 , simple = 2, full = 3 
    primary key (tipo_id)
);
-- tipos y tamaño si tenemos sketch = 1 y cara = 1 mediante programacion el precio es = 4 etc.

create table tamanio(
	tam_id tinyint auto_increment,
    tam_pedido varchar (20), -- cara, medio cuerpo, cuerpo completo
    tam_precio float (4,2), -- cara = 1 , medio cuerpo = 2, cuerpo completo = 3
    primary key (tam_id)
);

create table personaje(
	personaje_id int (1) auto_increment,
    personaje_desc int (1), -- 1 personajes , 2 personajes , 3 personajes
    personaje_aumento int (3), -- 1 personajes = 0 , 2 personajes = 50%, 3 personajes = 100%
    primary key (personaje_id)
);

create table fondo(
	fond_id int (1) auto_increment,
    fond_tipo varchar (20), -- plano, simple, complejo
    fond_precio int (2), -- plano = 0 simple = 0 complejo = 15usd
    primary key (fond_id)
);

create table estados(
	est_id int (1) auto_increment,
    est_desc varchar (20), -- pendiente, en proceso, terminado, cancelado 
    primary key (est_id)
);

create table pedidos(
	ped_id int auto_increment,
    usu_id int,
    ped_precioTotal float (4,2),
    ped_fecha_ped date,
    ped_fecha_ent date, -- null
    ped_fecha_pago date, -- null
    ped_link bool,
    ped_pago bool,
    est_id int (1),
	tipo_id int (1),
    tam_id tinyint,
    personaje_id int (1),
    fond_id int (1),
    com_publi bool,
    desc_id int,
    

    foreign key (tipo_id) references tipos(tipo_id),
    foreign key (tam_id) references tamanio(tam_id),
    foreign key (personaje_id) references personaje(personaje_id),
    foreign key (fond_id) references fondo(fond_id),
    foreign key (usu_id) references usuarios(usu_id),
    foreign key (est_id) references estados(est_id),
    primary key (ped_id, usu_id)
);

create table chat(
    chat_id int auto_increment,
    usu_id int, #emisor
    receptor_id int,
    chat_texto varchar(255),
    chat_fecha date,
    foreign key (usu_id) references usuarios(usu_id),
    primary key (chat_id)
);



