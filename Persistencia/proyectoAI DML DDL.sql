create database ProyectoAI;

use ProyectoAI;

create table administrador(
    idAdministrador int not null auto_increment,
    nombre varchar(45) not null,
    apellidos varchar(45) not null,
    correo varchar(45) not null,
    clave varchar(45) not null,
    PRIMARY KEY(idAdministrador)
);

create table profesor(
    idProfesor int not null,
    nombre VARCHAR(45) not null,
    apellido VARCHAR(45) not null,
    correo varchar(45) not null,
    clave varchar(45) not null,
    PRIMARY KEY(idProfesor)
);

create table estado(
    idEstado int not null,
    descripcion varchar(45), 
    PRIMARY KEY(idEstado)
);

CREATE table proyecto(
    idProyecto int not null auto_increment,
    titulo VARCHAR(65) not null,
    Plantamiento text,
    objetivoGeneral text,
    objetivosEspecificos text,
    solucionTecnologica text,
    documento varchar(100) not null,
    tutor int null,
    jurado int null,
    estado int not null DEFAULT 1,
    random int not null,
    PRIMARY KEY(idProyecto),
    FOREIGN KEY(tutor) references profesor(idProfesor),
    FOREIGN KEY(jurado) references profesor(idProfesor),
    FOREIGN KEY(estado) REFERENCES estado(idEstado)
);

create table estudiante(
    codigo bigint not null,
    nombre varchar(45) not null,
    apellido varchar(45) not null,
    correo varchar(45) not null UNIQUE,
    clave varchar(45) not null,
    proyecto int null,
    PRIMARY KEY(codigo),
    FOREIGN KEY(proyecto) REFERENCES proyecto(idProyecto)
);

insert into administrador(nombre, apellidos, correo, clave) values ("Juan", "Perez", "Juan@gmail.com", sha1('123'));

insert into estudiante(codigo, nombre, apellido, correo, clave) values ("20162578005", "Brayan", "Moreno Cupitra", "brayanguitar000@gmail.com", sha1('123'));

insert into estado() values (1, "Creado por Estudiante");

insert into profesor(idProfesor, nombre, apellido, correo, clave) values (1000, "Hector", "Florez", "hector@gmail.com", sha1('123'));

insert into profesor(idProfesor, nombre, apellido, correo, clave) values (2000, "Sonia", "mmm", "Sonia@gmail.com", sha1('123'));

insert into Proyecto(titulo, Plantamiento, objetivoGeneral, objetivosEspecificos, solucionTecnologica, documento, tutor)  values ("Proyecto 1", "asdasdasd" , "Objetivo 1", "objetivo 2 y 3", "Aplicacion web", "proyecto.pdf", 1000);

update proyecto set jurado = 2000 where idproyecto = 1;


create FUNCTION consultarTutores(id int)
RETURNS INT
BEGIN
    DECLARE idJurado int;

  select jurado into idJurado from proyecto where idProyecto = id;

  if idJurado is null then 
  set idJurado = 0;
  end if;

  return idJurado;
END//

create FUNCTION consultarJurados(id int)
RETURNS INT
BEGIN
    DECLARE idTutor int;

  select tutor into idTutor from proyecto where idProyecto = id;

  if idTutor is null then 
  set idTutor = 0;
  end if;

  return idTutor;
END//


/* Tutores disponibles */
select idProfesor from profesor where idProfesor  not in (select consultarJurados(435))//

/* Jurados disponibles */
select idProfesor from profesor where idProfesor  not in (select tutores(434))//