--  Drop table if exists

drop table if exists users;
drop table if exists books;
drop table if exists forum;
drop table if exists comments;
drop table if exists cart;

-- Create users table

CREATE TABLE users (
    id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    is_admin BOOLEAN NOT NULL DEFAULT 0,
    balance DECIMAL(15, 2) NOT NULL DEFAULT 150.99
);

-- Create forum table

CREATE TABLE forum (
    poster_id INT(10) NOT NULL,
    poster_name VARCHAR(50) NOT NULL,
    post VARCHAR(250) NOT NULL
);

-- Create books table

CREATE TABLE books (
    seller_id INT(10) NOT NULL,
    isbn10 VARCHAR(10) NOT NULL,
    title VARCHAR(100) NULL,
    author VARCHAR(50) NOT NULL,
    price DECIMAL(15, 2) NOT NULL,
    description VARCHAR(500) NULL,
    post_time DATETIME NULL,
    pic_path VARCHAR(100) NULL,
    toc_path VARCHAR(100) NULL,
    rating DOUBLE DEFAULT 0.0
);

-- Create comments table

CREATE TABLE comments (
    commenter_id INT(10) NOT NULL,
    commenter_name VARCHAR(50) NOT NULL,
    comment VARCHAR(250) NOT NULL,
    parent_isbn10 VARCHAR(10) NOT NULL,
    comment_rating INT(1)
);

-- Create a temporary cart table which gets deleted once the user logs out

create table cart (
    isbn10 VARCHAR(10) NOT NULL
);

-- Populate users table

INSERT INTO users (name, email, is_admin, balance) VALUES ('Kevin Crespin', 'kcrespi@calstatela.edu', 1, 20.55);
INSERT INTO users (name, email, is_admin) VALUES ('Admin', 'admin@calstatela.edu', 1);
INSERT INTO users (name, email) VALUES ('Jose Rosa', 'jrosa@calstatela.edu');
INSERT INTO users (name, email) VALUES ('Manuel Herrera', 'mherrer@calstatela.edu');
INSERT INTO users (name, email) VALUES ('John Jackson', 'jjackson@calstatela.edu');
INSERT INTO users (name, email) VALUES ('Sandip Hodkhasa', 'shodkha@calstatela.edu');
INSERT INTO users (name, email, balance) VALUES ('test', 'test@test.edu', 10.99);

-- Populate forum table

INSERT INTO forum (poster_id, poster_name, post) VALUES (1, 'Kevin Crespin', 'Hello, everyone! I was looking to sell my ''Java Introduction''. I made it available in the BookExchange market.');
INSERT INTO forum (poster_id, poster_name, post) VALUES (2, 'Jose Rosa', 'I''m looking to donate my University Physics book, if interested check the BookExchange market');
INSERT INTO forum (poster_id, poster_name, post) VALUES (4, 'John Jackson', 'Goodafternoon, I need this book <a href="https:///www.amazon.com/History-Empires-Rise-Fall-Greatest/dp/1547021241/ref=tmm_pap_swatch_0?_encoding=UTF8&qid=1556238372&sr=8-2-spons">History of Empires</a> for tomorrow, HELP!');
INSERT INTO forum (poster_id, poster_name, post) VALUES (3, 'Manuel Herrera', 'Nice website!');

-- Populate books table

INSERT INTO books (seller_id, isbn10, title, author, price, description, post_time, pic_path, toc_path, rating) VALUES (1, '0321954351', 'Calculus 2nd Edition', 'William L. Briggs, Lyle Cochran, Bernard Gillett', 40.00, 'Excellent condition, used only for a semester', '2019-03-10', 'images\\calculus2ndedition.jpg', 'images\\tocCalculus.jpg', 5);
INSERT INTO books (seller_id, isbn10, title, author, price, description, post_time, pic_path, toc_path, rating) VALUES (2, '0133813460', 'Introduction to Java Programming Comprehensive Version 10th ', 'Y. Daniel Liang', 14.00, 'Fair condition', '2019-03-10', 'images\\javaprogramming10thedition.jpg', 'images\\TOCJavaProgramming.jpg', 5);
INSERT INTO books (seller_id, isbn10, title, author, price, description, post_time, pic_path, toc_path, rating) VALUES (4, '1118290275', 'Data Structures and Algorithms in Python 1st Edition', 'Michael T. Goodrich', 50.99, 'Mint condition, needs to go now!', '2019-03-10', 'images\\datastructurespython1stedition.jpg', 'images\\tocPython.jpg', 5);
INSERT INTO books (seller_id, isbn10, title, author, price, description, post_time, pic_path, toc_path, rating) VALUES (1, '0062397346', 'A People''s History of the United States', 'Howard Zinn', 25.00, 'Excellent condition, used only for two semesters', '2019-03-10', 'images\\coverHistroyUs.jpg', 'images\\tocHistroyUs.jpg', 3);
INSERT INTO books (seller_id, isbn10, title, author, price, description, post_time, pic_path, toc_path) VALUES (5, '1491914912', 'Learning JavaScript', 'Ethan Brown', 27.00, 'Have been used few times', '2019-03-10', 'images\\CoverLearningJavascript.jpg', 'images\\TOCLearningJavascript.jpg');

-- Populate comments table

INSERT INTO comments (commenter_id, commenter_name, comment, parent_isbn10, comment_rating) VALUES (1, 'Kevin Crespin', 'If you are taking MATH 2010 and MATH 2020 at Cal State, you are required to have it in two semesters; so if you are a freshman is a must have', '0321954351', 5);
INSERT INTO comments (commenter_id, commenter_name, comment, parent_isbn10, comment_rating) VALUES (1, 'Kevin Crespin', 'Required for US HIST class.', '0062397346', 3);
INSERT INTO comments (commenter_id, commenter_name, comment, parent_isbn10, comment_ating) VALUES (4, 'John Jackson', 'This book will help you understand Java programming way better, I really recommend it.', '0133813460', 5);
INSERT INTO comments (commenter_id, commenter_name, comment, parent_isbn10, comment_rating) VALUES (5, 'Jose Rosa', 'Getting familiar with data structures in programming is really important, if you wanna be a decent programmer I recommend you starting here.', '1118290275', 5);
