-- create and select the database
DROP DATABASE IF EXISTS login_db;
CREATE DATABASE login_db;
USE login_db;  

-- drop table if already exist --
DROP TABLE IF EXISTS users;

CREATE TABLE users (
  username         VARCHAR(20)         NOT NULL,
  user_password         VARCHAR(255)        NOT NULL,
PRIMARY KEY (username)  
);
