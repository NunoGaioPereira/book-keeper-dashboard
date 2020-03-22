-- DROP TABLE if exists employee;

CREATE TABLE users (
	id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
	userid tinytext NOT NULL,
	pwd VARCHAR(255) NOT NULL
);

CREATE TABLE genders (
	id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    userid int(11) NOT NULL,
	gender VARCHAR(255) NOT NULL,
    FOREIGN KEY (userid) REFERENCES users(id)
	ON DELETE CASCADE
);

CREATE TABLE books (
	id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
	userid int(11) NOT NULL,
	title VARCHAR(255) NOT NULL,
	author VARCHAR(255) NOT NULL,
	nationality VARCHAR(255) NOT NULL,
	gender VARCHAR(255) NOT NULL,
	date_ DATETIME NOT NULL, 
	notes TEXT NOT NULL,
	FOREIGN KEY (userid) REFERENCES users(id)
	ON DELETE CASCADE
);