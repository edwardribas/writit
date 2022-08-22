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
    foto mediumblob not null,
    PRIMARY KEY(id_curr),
    FOREIGN KEY (cpf_user) REFERENCES usuarios(cpf)
);

create table educacao(
	instituicao varchar(255) not null,
    curso varchar(255) not null,
    inicio date not null,
    conclusao date not null,
	id_curr int not null,
    foreign key (id_curr) references curriculo(id_curr)
);

create table habilidades(
	habilidade varchar(255) not null,
    tempo int not null,
	id_curr int not null,
    foreign key (id_curr) references curriculo(id_curr)
);

create table competencias(
	competencia varchar(255) not null,
	id_curr int not null,
    foreign key (id_curr) references curriculo(id_curr)
);

create table experiencia(
	empresa varchar(255) not null,
	funcao varchar(255) not null,
	inicio date not null,
	conclusao date null,
	id_curr int not null,
    foreign key (id_curr) references curriculo(id_curr)
);