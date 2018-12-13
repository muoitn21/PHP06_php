CREATE TABLE products (
	id INTEGER(11) NOT NULL AUTO_INCREMENT,
	name VARCHAR(255) UNIQUE DEFAULT NULL,
	description TEXT NOT NULL,
	image VARCHAR(255) DEFAULT NULL,
	price INTEGER(11) DEFAULT NULL,
	datecreate DATETIME DEFAULT NULL,
	PRIMARY KEY ('id')
);
INSERT INTO products (id, name, description, image, price, daycreate) 
VALUES (1,"oppo find x1", "smartphone cheap","oppofindx1.jpg", 500, 2018-8-14);

INSERT INTO products (id, name, description, image, price, daycreate) 
VALUES (2,"iphone 7 black", "smartphone expensive","iphone7black.jpg", 1000, 2018-8-14);

INSERT INTO products (id, name, description, image, price, daycreate) 
VALUES (3,"isamsung galaxy s9", "smartphone expensive","samsunggalaxys9.jpg", 1200, 2018-8-14);

UPDATE products SET name = "iphone6s" WHERE price > 1000;

SELECT * FROM products WHERE name LIKE '%ng%' OR (YEAR(datecreate) = 2018 AND MONTH(datecreate) = 11);

DELETE FROM products WHERE description LIKE '%s%' AND price > 2000;