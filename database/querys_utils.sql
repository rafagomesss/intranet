SHOW TABLES;

SELECT * FROM users;
DESC users;

SELECT * FROM genders;
SELECT * FROM roles;

SELECT VERSION();

INSERT INTO roles (role, slug) VALUES ('Super User', 'suser'),('Administrador', 'admin'),('User', 'user');