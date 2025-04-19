CREATE DATABASE IF NOT EXISTS e_learning_platform;
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    role ENUM('student', 'teacher'),
    bio TEXT,
    profile_picture VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE courses (
id int(11) NOT NULL AUTO_INCREMENT,
title varchar(255) DEFAULT NULL,
description text DEFAULT NULL,
teacher_id int(11) DEFAULT NULL,
thumbnail varchar(255) DEFAULT NULL,
created_at timestamp NOT NULL DEFAULT current_timestamp(),
rating decimal(2,1) DEFAULT 0.0,
category varchar(100) DEFAULT NULL,
level enum('beginner','intermediate','advanced') DEFAULT NULL,
PRIMARY KEY (id),
KEY teacher_id (teacher_id),
CONSTRAINT courses_ibfk_1 FOREIGN KEY (teacher_id) REFERENCES users (id)
)
CREATE TABLE articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    content TEXT,
    teacher_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (teacher_id) REFERENCES users(id)
);
CREATE TABLE enrollments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_id INT,
    student_id INT,
    enrolled_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (course_id) REFERENCES courses(id),
    FOREIGN KEY (student_id) REFERENCES users(id)
);
CREATE TABLE lessons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_id INT,
    title VARCHAR(255),
    video_url VARCHAR(255),
    content TEXT,
    position INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (course_id) REFERENCES courses(id)
);
CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    content TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    -- Either article_id or lesson_id
    article_id INT DEFAULT NULL,
    lesson_id INT DEFAULT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (article_id) REFERENCES articles(id),
    FOREIGN KEY (lesson_id) REFERENCES lessons(id)
);
