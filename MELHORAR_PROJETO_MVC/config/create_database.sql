create database project_mvc;
use project_mvc;

create table users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(60) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(30) NOT NULL
);

create table tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    task_name VARCHAR(60) NOT NULL,
    prazo VARCHAR(100) NOT NULL
);

INSERT INTO users(NAME, EMAIL, SENHA) VALUES ('ADMINISTRADOR', 'ADM@GMAIL.COM', 'ADMIN');