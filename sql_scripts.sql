CREATE DATABASE the_company;

CREATE TABLE users (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `first_name` varchar(50) NOT NULL,
    `last_name` varchar(50) NOT NULL,
    `username` varchar(15) NOT NULL,
    `password` varchar(255) NOT NULL,
    `photo` varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);   