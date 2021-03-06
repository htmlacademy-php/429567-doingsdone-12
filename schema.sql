CREATE DATABASE IF NOT EXISTS doingsdone DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;
USE doingsdone;
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    userName VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    dateRegistration TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE IF NOT EXISTS projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT(3),
    project VARCHAR (255),
    FOREIGN KEY (user_id) REFERENCES users (id)
);
CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    task CHAR(64),
    date_start TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    date_end TIMESTAMP,
    fileDir VARCHAR(255),
    project_id INT(3),
    user_id INT(3),
    status TINYINT(1) not null default '0',
    FOREIGN KEY (project_id) REFERENCES projects (id),
    FOREIGN KEY (user_id) REFERENCES users (id)
);
