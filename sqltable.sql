--  Drop table if exists

drop table if exists users;
drop table if exists books;
drop table if exists forum;
drop table if exists comments;

-- Create users table

CREATE TABLE users (
    id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    is_admin BOOLEAN NOT NULL DEFAULT 0,
    balance DECIMAL(15, 2) NOT NULL DEFAULT 0
);

-- Create forum table

CREATE TABLE forum (
    poster_id INT(10) NOT NULL,
    poster_name VARCHAR(50) NOT NULL,
    post VARCHAR(250) NOT NULL,
    post_time DATETIME NULL
);

-- Create books table

CREATE TABLE books (
    seller_id INT(10) NOT NULL,
    isbn10 VARCHAR(10) NOT NULL,
    isbn13 VARCHAR(13) NOT NULL,
    title VARCHAR(100) NULL,
    author VARCHAR(50) NOT NULL,
    price VARCHAR(50) NOT NULL,
    description VARCHAR(500) NULL,
    post_time DATETIME NULL,
    pic_path VARCHAR(100) NULL,
    rating DOUBLE DEFAULT 0.0
);

-- Create comments table

CREATE TABLE comments (
    commenter_id INT(10) NOT NULL,
    commenter_name VARCHAR(50) NOT NULL,
    comment VARCHAR(250) NOT NULL,
    parent_isbn10 VARCHAR(10) NOT NULL,
    post_time DATETIME NULL,
    rating INT(1)
);

-- Populate users table

INSERT INTO users (name, email, is_admin) VALUES ('Kevin Crespin', 'kcrespi@calstatela.edu', 1);
INSERT INTO users (name, email) VALUES ('Jose Rosa', 'jrosa@calstatela.edu');
INSERT INTO users (name, email) VALUES ('Manuel Herrera', 'mherrer@calstatela.edu');
INSERT INTO users (name, email) VALUES ('John Jackson', 'jjackson@calstatela.edu');
INSERT INTO users (name, email) VALUES ('Sandip Hodkhasa', 'shodkha@calstatela.edu');
INSERT INTO users (name, email) VALUES ('Admin', 'admin@calstatela.edu', 1);


-- Populate forum table

INSERT INTO forum (poster_id, poster_name, post, post_time) VALUES (1, 'Kevin Crespin', 'Hello, everyone! I was looking to sell my ''Java Introduction''. I made it available in the BookExchange market.', '2019-03-10');
INSERT INTO forum (poster_id, poster_name, post, post_time) VALUES (2, 'Jose Rosa', 'I''m looking to donate my University Physics book, if interested check the BookExchange market', '2019-03-10');
INSERT INTO forum (poster_id, poster_name, post, post_time) VALUES (4, 'John Jackson', 'Goodafternoon, I need this book <a href="https:///www.amazon.com//History-Empires-Rise-Fall-Greatest//dp//1547021241//ref=tmm_pap_swatch_0?_encoding=UTF8&qid=1556238372&sr=8-2-spons">History of Empires</a> for tomorrow, HELP!', '2019-03-10');
INSERT INTO forum (poster_id, poster_name, post, post_time) VALUES (3, 'Manuel Herrera', 'Nice website!', '2019-03-10');

-- Populate books table

INSERT INTO books (seller_id, isbn10, isbn13, title, author, price, description, post_time, pic_path) VALUES (1, '0321954351', '9780321954350', 'Calculus 2nd Edition', 'William L. Briggs, Lyle Cochran, Bernard Gillett', '$40.00', 'Excellent condition, used only for a semester', '2019-03-10', 'images\\calculus2ndedition.jpg');
INSERT INTO books (seller_id, isbn10, isbn13, title, author, price, description, post_time, pic_path) VALUES (2, '0133813460', '9780133813463', 'Introduction to Java Programming Comprehensive Version 10th ', 'Y. Daniel Liang', '$14.00', 'Fair condition', '2019-03-10', 'images\\javaprogramming10thedition.jpg');
INSERT INTO books (seller_id, isbn10, isbn13, title, author, price, description, post_time, pic_path) VALUES (4, '1118290275', '9781118290279', 'Data Structures and Algorithms in Python 1st Edition', 'Michael T. Goodrich', '$50.99', 'Mint condition, needs to go now!', '2019-03-10', 'images\\datastructurespython1stedition.jpg');
INSERT INTO books (seller_id, isbn10, isbn13, title, author, price, description, post_time, pic_path) VALUES (1, '0062397346', '9780062397346', 'A People''s History of the United States', 'Howard Zinn', '$25.00', 'Excellent condition, used only for two semesters', '2019-03-10', 'images\\historyus.jpg');

-- Populate comments table

INSERT INTO comments (commenter_id, commenter_name, comment, parent_isbn10, post_time, rating) VALUES (1, 'Kevin Crespin', 'I hate, but love this book. It has tons of useful information for Calculus, and in Cal State you are required to have it in two semesters so if you are a freshman is a must have', '0321954351', '2019-03-10', 5);
INSERT INTO comments (commenter_id, commenter_name, comment, parent_isbn10, post_time, rating) VALUES (1, 'Kevin Crespin', 'I hate this book. I just don''t like history.', '0062397346', '2019-03-10', 3);
INSERT INTO comments (commenter_id, commenter_name, comment, parent_isbn10, post_time, rating) VALUES (4, 'John Jackson', 'This book will help you understand Java programming way better, I really recommend it.', '0133813460', '2019-03-10', 5);
INSERT INTO comments (commenter_id, commenter_name, comment, parent_isbn10, post_time, rating) VALUES (2, 'Jose Rosa', 'Get yourself familiar with data structures in programming is really important, if you wanna be a decent programmer I recommend you starting here', '1118290275', '2019-03-10', 5);
