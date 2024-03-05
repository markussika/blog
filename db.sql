-- CREATE DATABASE blog_Sika;


/*CREATE TABLE posts(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(255) NOT NULL 
);*/



/*INSERT INTO posts
(title)
VALUES 
("My First Blog Post "), 
( "My Second Blog Post");
*/


-- SELECT * FROM posts;
/*
CREATE TABLE categories (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255),
description TEXT 
);*/
/*
INSERT INTO categories
(NAME)
VALUES 
("sport"),
("music"),
("food");
*/



/*
ALTER TABLE posts
ADD category_id INT ;
*/

/*
ALTER TABLE posts
ADD FOREIGN KEY (category_id) REFERENCES categories(id);
*/

-- SELECT * FROM categories;

/*
UPDATE posts
SET category_id = 3
WHERE id = 2;
*/


-- SELECT * FROM posts;


