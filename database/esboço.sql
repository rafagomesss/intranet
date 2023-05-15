# genders
-- id [INT] >PK
-- gender VARCHAR(200)

# persons
-- id [INT] >PK
-- first_name [VARCHAR(200)]
-- last_name [VARCHAR(200)]
-- birthdate DATE
-- gender
-- cpf VARCHAR(15)
-- rg VARCHAR(15)

# user_profiles
-- id [INT] >PK
-- profile [VARCHAR(255)]

# users
-- id [BIGINT] >PK
-- email [VARCHAR(255)]
-- password [VARCHAR(255)]
-- email_verified_at [DATETIME]
-- remember_token [VARCHAR(100)]
-- created_at [DATETIME] {DEFAULT CURRENT_TIMESTAMP}
-- updated_at [DATETIME] {ON UPDATE CURRENT_TIMESTAMP}
-- deleted_at [DATETIME] *SOFT DELETE*
-- user_profile_id [INT UNSIGNED] - REFERENCES: user_profile
-- user_person_id [INT UNSIGNED] - REFERENCES: user_person

# modules
-- id [INT]
-- module [VARCHAR(200)]

# users_modules
-- user_id [BIGINT UNSIGNED] >PK
-- module_id [INT UNSIGNED] >PK
-- CONSTRAINT users_modules_user
-- CONSTRAINT users_modules_modules



