create database pdv CHARACTER SET utf8mb4 COLLATE = utf8mb4_bin;
use pdv;
create table marca (
    id int(11) unsigned primary key auto_increment,
    nome char(250)
);
create table categoria (
    id int(11) unsigned primary key auto_increment,
    nome char(250)
);
create table produtos (
    id int(11) unsigned primary key auto_increment, nome char(150),
    quantidade smallint(5) unsigned, marca_id int(11) unsigned,
    categoria_id int(11) unsigned,
    foreign key (marca_id) references marca(id),
    foreign key (categoria_id) references categoria(id)
);
create table validade (
    id int(11) unsigned primary key auto_increment,
    produto_id int(11) unsigned, lote char(250),
    validade date
);