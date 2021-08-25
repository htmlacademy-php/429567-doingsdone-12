CREATE DATABASE doingsdone DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;
USE doingsdone;
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(128),
    password CHAR(64)
);
CREATE TABLE projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    project CHAR(64)
);
CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    task CHAR(64),
    date_start TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    project_id INT(3),
    user_id INT(3),
    status TINYINT(1) not null default '0'
);
