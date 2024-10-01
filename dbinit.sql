DROP DATABASE g3kovalev;

CREATE DATABASE IF NOT EXISTS g3kovalev;

USE g3kovalev;

CREATE TABLE IF NOT EXISTS electives(
	elective_id INT AUTO_INCREMENT PRIMARY KEY,
	elective_name VARCHAR(40) NOT NULL
);

CREATE TABLE IF NOT EXISTS student_groups(
	group_id INT AUTO_INCREMENT PRIMARY KEY,
	group_name VARCHAR(20) NOT NULL,
	faculty VARCHAR(40) NOT NULL,
	leader_id INT
);

CREATE TABLE IF NOT EXISTS students(
	student_id INT AUTO_INCREMENT PRIMARY KEY,
	student_name VARCHAR(80) NOT NULL,
	birth_place VARCHAR(80),
	birth_date DATE,
	phone_number CHAR(10),
	average_grade DECIMAL(3,2) CHECK(average_grade >= 2 AND average_grade <= 5),
	group_id INT,
	FOREIGN KEY(group_id) REFERENCES student_groups(group_id)
);

CREATE TABLE IF NOT EXISTS elective_records(
	record_id INT AUTO_INCREMENT PRIMARY KEY,
	elective_id INT,
	student_id INT,
	FOREIGN KEY(elective_id) REFERENCES electives(elective_id),
	FOREIGN KEY(student_id) REFERENCES students(student_id)
);

ALTER TABLE student_groups
ADD CONSTRAINT leader_id_fk
FOREIGN KEY(leader_id) REFERENCES students(student_id);

INSERT INTO electives(elective_name)
VALUES("Компьютерная графика"),
		 ("Современные компиляторы"),
		 ("Нейронные сети"),
		 ("Основы DevOps");
INSERT INTO student_groups(group_name, faculty, leader_id)
VALUES("МУГ-1", "Фалькутет математики", NULL),
		 ("ИУГ-1", "Фалькутет информатики", NULL),
		 ("ФУГ-1", "Фалькутет физики", NULL);
INSERT INTO students (student_name, birth_place, birth_date, phone_number, average_grade, group_id) VALUES
('Иван Иванов', 'Иркутск', '2003-05-15', '8925551234', 4.50, 1),
('Мария Петрова', 'Новосибирск', '2002-03-22', '8925555678', 3.75, 1),
('Алексей Сидоров', 'Москва', '2002-06-14', '8925559867', NULL, 2),
('Елена Смирнова', 'Алматы', '2003-12-30', '8925554312', NULL, 2),
('Анна Кузнецова', 'Тверь', '2001-11-05', '8925557890', 3.40, 3),
('Дмитрий Николаев', 'Тула', '2004-07-23', '8925551357', 4.70, 1),
('Светлана Морозова', 'Новосибирск', '2003-01-29', '8925552468', 2.90, 1),
('Владимир Васильев', 'Москва', '2000-09-15', '8925553579', NULL, 2),
('Марина Зайцева', 'Уфа', '2004-05-17', '8925554680', 3.95, 3),
('Константин Федоров', 'Краснодар', '2002-08-12', '8925555791', 4.10, 3),
('Татьяна Григорьева', 'Красноярск', '2003-10-01', '8925556802', 4.95, 1),
('Никита Павлов', 'Грозный', '2001-04-19', '8925557913', 3.30, 3),
('Полина Леонова', 'Владивосток', '2002-02-26', '8925558024', NULL, 2),
('Игорь Соловьев', 'Санкт-Петербург', '2004-03-08', '8925559135', NULL, 2),
('Ольга Кравцова', 'Ташкент', '2003-12-14', '8925550246', 4.60, 3);
UPDATE student_groups
SET leader_id = (SELECT student_id
					  FROM students 
					  WHERE students.group_id = student_groups.group_id 
					  ORDER BY RAND() 
					  LIMIT 1);
INSERT INTO elective_records(elective_id, student_id) VALUES
(3, 12),
(1, 7),
(4, 1),
(2, 5),
(3, 9),
(1, 3),
(4, 12),
(2, 9),
(1, 14),
(3, 2),
(4, 6),
(2, 8),
(1, 12),
(3, 13),
(2, 4);

CREATE TRIGGER set_leader_id_to_null
AFTER UPDATE ON students
FOR EACH ROW
BEGIN
    IF NEW.group_id != OLD.group_id THEN
        UPDATE student_groups
        SET leader_id = NULL
        WHERE leader_id = OLD.student_id;
    END IF;
END;