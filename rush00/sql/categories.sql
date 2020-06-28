CREATE TABLE IF NOT EXISTS CATEGORIES
(
	CATEGORY_ID INT(10) AUTO_INCREMENT,
	NAME VARCHAR(10) NOT NULL,
	IS_ROOT BOOLEAN DEFAULT '0', 	
	PARENT_ID INT(10),
	CONSTRAINT CATEGORY_PK PRIMARY KEY (CATEGORY_ID)
);