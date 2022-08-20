create database project;
use project;

create table usuarios(
	cpf varchar(14) not null,
    nome varchar(255) not null,
    email varchar(255) not null,
    senha varchar(255) not null,
    tipo char not null,
    PRIMARY KEY(cpf)
);

create table curriculo(
	id_curr int not null auto_increment,
    telefone varchar(15) not null,
    cidade varchar(100) not null,
    email varchar(255) not null,
	cpf_user varchar(14) not null,
    nome varchar(255) not null,
    PRIMARY KEY(id_curr),
    FOREIGN KEY (cpf_user) REFERENCES usuarios(cpf)
);