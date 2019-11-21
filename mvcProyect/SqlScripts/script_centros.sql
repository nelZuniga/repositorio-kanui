create table centros (
id_centro int(11) auto_increment primary key not null,
descripcion varchar(30) not null
);

create table centrosusuario (
id_centro int(11) not null,
id_usr int(11) not null
);

alter table usuario add column id_centro int(11) after chkTC;

alter table centrosusuario add foreign key (id_centro) references centros(id_centro);
alter table centrosusuario add foreign key (id_usr) references usuario(id_usr);
