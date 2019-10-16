create table controles (
id_control int(11) auto_increment primary key not null,
descripcion varchar(30) not null
);
alter table procedimiento change tipo_prod id_vac int(11);
alter table procedimiento add foreign key (id_vac) references vacunas(id_vac);
alter table procedimiento add column id_control int(11) after id_vac;
alter table procedimiento add foreign key (id_control) references controles(id_control);
alter table procedimiento change fecha_prod fecha_atencion date;
alter table procedimiento change Tipo peso varchar(50);
alter table procedimiento modify column fecha_prox date;