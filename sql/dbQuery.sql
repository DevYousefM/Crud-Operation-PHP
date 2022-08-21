CREATE DATABASE crud_operation;
USE crud_operation;
CREATE TABLE `users`(
  `id` INT(60) PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(20) NOT NULL,
  `age` INT NOT NULL,
  `email` VARCHAR(60) NOT NULL
);