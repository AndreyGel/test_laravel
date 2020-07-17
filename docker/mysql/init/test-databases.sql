# create database
CREATE DATABASE IF NOT EXISTS `app`;
CREATE DATABASE IF NOT EXISTS `app_test`;

# create root user and grant rights
CREATE USER 'app'@'localhost' IDENTIFIED BY 'secret';
GRANT ALL PRIVILEGES ON *.* TO 'app'@'%';
