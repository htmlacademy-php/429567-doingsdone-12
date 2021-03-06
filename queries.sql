INSERT INTO users (userName, email, password) VALUES ('test1','test1@mail.ru','password1'); /* Добавление пользователя test1*/
INSERT INTO users (userName, email, password) VALUES ('test2','test2@mail.ru','password2'); /* Добавление пользователя test2*/
INSERT INTO projects (project, user_id) VALUES ('Входящие', (SELECT u.id FROM users u WHERE u.userName = 'test1'));/* Добавление задачи Входящие для юзера test1*/
INSERT INTO projects (project, user_id) VALUES ('Учеба', (SELECT u.id FROM users u WHERE u.userName = 'test1'));/* Добавление задачи Учеба для юзера test1*/
INSERT INTO projects (project, user_id) VALUES ('Работа', (SELECT u.id FROM users u WHERE u.userName = 'test1')); /* Добавление задачи Работа для юзера test1*/
INSERT INTO projects (project, user_id) VALUES ('Работа', (SELECT u.id FROM users u WHERE u.userName = 'test2')); /* Добавление задачи Работа для юзера test1*/
INSERT INTO projects (project, user_id) VALUES ('Домашние дела', (SELECT u.id FROM users u WHERE u.userName = 'test2')); /* Добавление задачи Домашние дела для юзера test2*/
INSERT INTO projects (project, user_id) VALUES ('Авто', (SELECT u.id FROM users u WHERE u.userName = 'test2')); /* Добавление задачи Авто для юзера test2*/
INSERT INTO tasks (task, date_end, project_id, user_id) VALUES ('Собеседование в IT компании', '2021-12-18', (SELECT p.id FROM projects p JOIN users u ON user_id = u.id WHERE project = 'Работа' AND user_id = (SELECT u.id FROM users u WHERE u.userName = 'test1')), (SELECT u.id FROM users u WHERE u.userName = 'test1')); /*Добавление задачи для проекта Работа юзеру test1*/
INSERT INTO tasks (task, date_end, project_id, user_id) VALUES ('Выполнить тестовое задание', '2021-09-10', (SELECT p.id FROM projects p JOIN users u ON user_id = u.id WHERE project = 'Работа' AND user_id = (SELECT u.id FROM users u WHERE u.userName = 'test2')), (SELECT u.id FROM users u WHERE u.userName = 'test2')); /*Добавление задачи для проекта Работа юзеру test2*/
INSERT INTO tasks (task, date_end, project_id, user_id, status) VALUES ('Сделать задание первого раздела', '2021-09-10', (SELECT p.id FROM projects p JOIN users u ON user_id = u.id WHERE project = 'Учеба' AND user_id = (SELECT u.id FROM users u WHERE u.userName = 'test1')), (SELECT u.id FROM users u WHERE u.userName = 'test1'), '1'); /*Добавление задачи для проекта Учеба юзеру test1*/
INSERT INTO tasks (task, date_end, project_id, user_id) VALUES ('Встреча с другом', '2021-09-10', (SELECT p.id FROM projects p JOIN users u ON user_id = u.id WHERE project = 'Входящие' AND user_id = (SELECT u.id FROM users u WHERE u.userName = 'test1')), (SELECT u.id FROM users u WHERE u.userName = 'test1')); /*Добавление задачи для проекта Входящие  юзеру test1*/
INSERT INTO tasks (task, date_end, project_id, user_id) VALUES ('Купить корм для кота', '2021-09-10', (SELECT p.id FROM projects p JOIN users u ON user_id = u.id WHERE project = 'Домашние дела' AND user_id = (SELECT u.id FROM users u WHERE u.userName = 'test2')), (SELECT u.id FROM users u WHERE u.userName = 'test2')); /*Добавление задачи для проекта Домашние дела юзеру test2*/
INSERT INTO tasks (task, date_end, project_id, user_id) VALUES ('Заказать пиццу', '2021-09-10', (SELECT p.id FROM projects p JOIN users u ON user_id = u.id WHERE project = 'Домашние дела' AND user_id = (SELECT u.id FROM users u WHERE u.userName = 'test2')), (SELECT u.id FROM users u WHERE u.userName = 'test2')); /*Добавление задачи для проекта Домашние дела юзеру test2*/

SELECT project FROM projects WHERE user_id = (SELECT u.id FROM users u WHERE u.userName = 'test1'); /*Выбрать все проекты которые принадлежат пользователю с ID = 1 из таблицы users*/
SELECT task FROM tasks WHERE project_id = '1'; /* предполагаю, что в таблице проекты все таки не нужна строка user_id*/

UPDATE tasks SET status = 'true' WHERE id = "3"; /* Задача с ID 3 выполнена*/
UPDATE tasks SET task = 'Заказать 2 пиццы' WHERE id = "6"; /* Обновление название задачи с ID =6*/
