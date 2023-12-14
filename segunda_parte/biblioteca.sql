create database biblioteca;
use biblioteca;

create table livros(
titulo varchar(50) not null,
autor varchar(50) not null,
ano char(4) not null
);

select * from livros;