CREATE DATABASE seven_eleven;

USE seven_eleven;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
     password VARCHAR(255) NOT NULL,
    mobile_number VARCHAR(20) NOT NULL,
    date_of_birth DATE NOT NULL,
    gender ENUM('Female', 'Male') NOT NULL,
    terms_agreed BOOLEAN NOT NULL
);
