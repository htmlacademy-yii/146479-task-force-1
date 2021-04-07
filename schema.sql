CREATE DATABASE taskforce_146479
 DEFAULT CHARACTER SET utf8
 DEFAULT COLLATE utf8_general_ci;

  USE taskforce_146479

    CREATE TABLE towns (
      id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
      name VARCHAR(128) NOT NULL,
      latitude DECIMAL NOT NULL,
      longitude DECIMAL NOT NULL
    );

    CREATE TABLE users (
      id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
      name VARCHAR(128) NOT NULL,
      email VARCHAR(128) UNIQUE NOT NULL,
      town_id INT NOT NULL,
      password VARCHAR(128) NOT NULL,
      rating DECIMAL NOT NULL,
      categories VARCHAR(255) NOT NULL
    );

    CREATE TABLE tasks (
      id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(128) NOT NULL,
      description VARCHAR(255),
      customer_id INT NOT NULL,
      executor_id INT NOT NULL,
      date_start DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
      deadline DATETIME,
      status VARCHAR(128) NOT NULL,
      date_end DATETIME,
      files VARCHAR(255),
      categories VARCHAR(255),
      budget INT
    );

    CREATE TABLE response (
      id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
      executor_id INT NOT NULL,
      date_start DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
      task_id INT NOT NULL,
      price INT,
      comment VARCHAR(255)
    );

    CREATE TABLE messages (
      id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
      author_id INT NOT NULL,
      target_id INT NOT NULL,
      date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
      message VARCHAR(255)
    );

