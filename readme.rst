###################
Información
###################

Si al restaurar la base de datos de Postgres no le funciona.. Solo tiene que modificar el nombre del archivo de base de datos db_empleados.sql -> empleados.sql

Esto es por si no funciona la conectividad

## Proposito del proyecto

Fue con el simple hecho de hacer un proyecto funcinal y sencillo el cual estuviera presente un CRUD conectado a Postgres SQL

###################
PL PGSQL
###################

* Como crear una tabla auto incrementable en PGSQL
	Es sencillo, Asi como creamos tablas en SQL con Create table, y se le agrega en el caso de MySQL
	-> Auto_increment <- en PGSQL seria -> Serial <-
	Aqui un ejemplo

create table tb_productos (
	id serial primary key not null,
	nombre varchar(50),
	costo int,
	descripcion varchar(255)
)

select * from tb_productos;

insert into tb_productos(nombre, costo, descripcion) values
('Manzana',59,'Frutas');

-------------------------
TRUNCATE TABLE tb_productos RESTART IDENTITY;
-------------------------
https://carto.com/help/working-with-data/sql-stored-procedures/#dynamic-plpgsql-functions
-------------------------

* Recomendación: Cree table con sintaxis de codigo SQL.. No lo hagá por medio de la interfaz para que se le resulte mas facil.
