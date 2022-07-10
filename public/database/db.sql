CREATE DATABASE BQ;

USE BQ;

CREATE TABLE USER(
	ID_USER INT(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	USER VARCHAR(50) NOT NULL UNIQUE,
	PASSWORD VARCHAR(32) NOT NULL,
    ROL VARCHAR(50) NOT NULL
);

CREATE TABLE CLIENT(
	ID_CLIENT INT(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	IDENTITY VARCHAR(13) NOT NULL,
	NAME VARCHAR(50) NOT NULL,
	SECOND_NAME VARCHAR(50),
	LAST_NAME VARCHAR(50) NOT NULL,
	SECOND_LAST_NAME VARCHAR(50),
	EMAIL VARCHAR(70) NOT NULL,
	PHONE VARCHAR(13) NOT NULL,
	ALTER_PHONE VARCHAR(13),
	ADDRESS VARCHAR(250) NOT NULL
);

CREATE TABLE METER(
	ID_METER INT(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	ID_CLIENT INT(4) NOT NULL,
	METER_NUMBER VARCHAR(100),
	OLD_MEASURE VARCHAR(200),
	NEW_MEASURE VARCHAR(200) NOT NULL,
    OLD_AMOUNT DECIMAL(10, 2) NOT NULL,
    NEW_AMOUNT DECIMAL(10, 2) NOT NULL,
	FOREIGN KEY (ID_CLIENT) REFERENCES CLIENT(ID_CLIENT)
);

CREATE TABLE FILES(
	ID_FILE INT(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	NAME VARCHAR(75) NOT NULL,
	DIR VARCHAR(75) NOT NULL
);