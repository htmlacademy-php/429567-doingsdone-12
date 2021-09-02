INSERT INTO users (userName, email, password) VALUES ('test1','test1@mail.ru','password1'); /* Добавление пользователя test1*/
INSERT INTO users (userName, email, password) VALUES ('test2','test2@mail.ru','password2'); /* Добавление пользователя test2*/
INSERT INTO projects (project, user_id) VALUES ('Входящие', '1');/* Добавление задачи Входящие для юзера test1*/
INSERT INTO projects (project, user_id) VALUES ('Учеба', '1');/* Добавление задачи Учеба для юзера test1*/
INSERT INTO projects (project, user_id) VALUES ('Работа', '1'); /* Добавление задачи Работа для юзера test1*/
INSERT INTO projects (project, user_id) VALUES ('Работа', '2'); /* Добавление задачи Работа для юзера test1*/
INSERT INTO projects (project, user_id) VALUES ('Домашние дела', '2'); /* Добавление задачи Домашние дела для юзера test2*/
INSERT INTO projects (project, user_id) VALUES ('Авто', '2'); /* Добавление задачи Авто для юзера test2*/
INSERT INTO tasks (task, date_end, project_id, user_id) VALUES ('Собеседование в IT компании', '18.12.2021', '3', '1'); /*Добавление задачи для проекта Работа юзеру test1*/
INSERT INTO tasks (task, date_end, project_id, user_id) VALUES ('Выполнить тестовое задание', '10.09.2021', '3', '2'); /*Добавление задачи для проекта Работа юзеру test2*/
INSERT INTO tasks (task, date_end, project_id, user_id, status) VALUES ('Сделать задание первого раздела', '10.09.2021', '2', '1', '1'); /*Добавление задачи для проекта Учеба юзеру test1*/
INSERT INTO tasks (task, date_end, project_id, user_id) VALUES ('Встреча с другом', '10.09.2021', '1', '1'); /*Добавление задачи для проекта Входящие  юзеру test1*/
INSERT INTO tasks (task, date_end, project_id, user_id) VALUES ('Купить корм для кота', '10.09.2021', '5', '2'); /*Добавление задачи для проекта Домашние дела юзеру test2*/
INSERT INTO tasks (task, date_end, project_id, user_id) VALUES ('Заказать пиццу', '10.09.2021', '5', '2'); /*Добавление задачи для проекта Домашние дела юзеру test2*/

SELECT project FROM projects WHERE user_id = '1'; /*Выбрать все проекты которые принадлежат пользователю с ID = 1 из таблицы users*/
SELECT task FROM tasks WHERE project_id = '1'; /* предполагаю, что в таблице проекты все таки не нужна строка user_id*/

UPDATE tasks SET status = 'true' WHERE id = "3"; /* Задача с ID 3 выполнена*/
UPDATE tasks SET task = 'Заказать 2 пиццы' WHERE id = "6"; /* Обновление название задачи с ID =6*/
