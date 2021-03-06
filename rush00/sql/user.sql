CREATE TABLE IF NOT EXISTS USER
(
	USER_ID INT(10) NOT NULL AUTO_INCREMENT,
	USERNAME VARCHAR(10) NOT NULL,
	REALNAME VARCHAR(40) NOT NULL,
	IS_ADMIN BOOLEAN DEFAULT '0', 
	PASSWORD VARCHAR(128) NOT NULL,
	EMAIL VARCHAR(20) NOT NULL,
	CONSTRAINT USER_PK PRIMARY KEY (USER_ID)
);