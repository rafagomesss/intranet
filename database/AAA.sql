CREATE DATABASE IF NOT EXISTS intranet COLLATE utf8mb4_general_ci;
USE intranet;

CREATE TABLE IF NOT EXISTS genders(
	id INT UNSIGNED AUTO_INCREMENT NOT NULL,
	gender VARCHAR(200),
	PRIMARY KEY(id)
);
    
CREATE TABLE IF NOT EXISTS persons(
	id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL,
	first_name VARCHAR(200) NOT NULL,
	last_name VARCHAR(200) NOT NULL,
	birthdate DATE,
	cpf VARCHAR(15) NOT NULL,
	rg VARCHAR(15),
	gender_id INT UNSIGNED,
	created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
	updated_at DATETIME ON UPDATE CURRENT_TIMESTAMP,
	CONSTRAINT persons_genders_fk
		FOREIGN KEY (gender_id)
		REFERENCES genders(id),
	PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS user_profiles(
	id INT UNSIGNED AUTO_INCREMENT NOT NULL,
	profile VARCHAR(200) NOT NULL,
	PRIMARY KEY(id)
) ENGINE = InnoDB;

 CREATE TABLE IF NOT EXISTS users(
	id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL,
	email VARCHAR(200) UNIQUE NOT NULL,
	password VARCHAR(250) NOT NULL,
	email_verified_at DATETIME,
	remember_token VARCHAR(100),
	created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
	updated_at DATETIME,
	deleted_at DATETIME,
	user_profiles_id INT UNSIGNED,
	persons_id BIGINT UNSIGNED,
	CONSTRAINT users_user_profiles_fk
		FOREIGN KEY (user_profiles_id)
		REFERENCES user_profiles(id),
	CONSTRAINT users_persons_fk
		FOREIGN KEY (persons_id)
		REFERENCES persons(id),
	PRIMARY KEY (id)
) ENGINE = InnoDB;
   
CREATE TABLE IF NOT EXISTS modules(
	id INT UNSIGNED AUTO_INCREMENT NOT NULL,
	module VARCHAR(200) NOT NULL,
	PRIMARY KEY(id)
);
    
CREATE TABLE IF NOT EXISTS user_profiles_modules(
	user_profile_id INT UNSIGNED NOT NULL,
	module_id INT UNSIGNED NOT NULL,
	PRIMARY KEY(user_profile_id, module_id),
	CONSTRAINT user_profiles_modules_profiles_fk
		FOREIGN KEY(user_profile_id)
		REFERENCES user_profiles(id),
	CONSTRAINT user_profiles_modules_modules_fk
		FOREIGN KEY(module_id)
		REFERENCES modules(id)
);

SHOW TABLES;
DESC persons;
DESC users;
    

