create database IF NOT EXISTS gpe;
create user if not exists ‘user_gpe’@‘localhost’ IDENTIFIED BY 'password';
USE gpe;
DROP TABLE IF EXISTS hobbyactivity ;
grant ALL PRIVILEGES ON gpe.* to ‘user_gpe’@‘localhost;
CREATE TABLE hobbyactivity (id INT AUTO_INCREMENT NOT NULL,
label TEXT,
description TEXT,
web_site TEXT,
minimum_older INT,
street TEXT,
zip_code INT,
city TEXT,
PRIMARY KEY (id)) ENGINE=InnoDB;

DROP TABLE IF EXISTS tag ;
CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL,
label TEXT,
PRIMARY KEY (id)) ENGINE=InnoDB;

DROP TABLE IF EXISTS photo ;
CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL,
title TEXT,
path TEXT,
description TEXT,
id_hobbyactivity INT,
PRIMARY KEY (id)) ENGINE=InnoDB;

DROP TABLE IF EXISTS user ;
CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL,
name TEXT,
firstname TEXT,
birthday DATE,
email TEXT,
password TEXT,
street TEXT,
zip_code INT,
city TEXT,
id_role INT,
photo TEXT,
PRIMARY KEY (id)) ENGINE=InnoDB;

DROP TABLE IF EXISTS booking ;
CREATE TABLE booking (id INT AUTO_INCREMENT NOT NULL,
user_id int  NOT NULL,
n_people int  NOT NULL,
activity_id int  NOT NULL,
PRIMARY KEY (id)) ENGINE=InnoDB;

DROP TABLE IF EXISTS role ;
CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL,
label TEXT,
PRIMARY KEY (id)) ENGINE=InnoDB;

DROP TABLE IF EXISTS post ;
CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL,
content TEXT,
grade FLOAT,
id_user INT,
id_hobbyactivity INT,
PRIMARY KEY (id)) ENGINE=InnoDB;

DROP TABLE IF EXISTS has_tags ;
CREATE TABLE has_tags (id_tag INT AUTO_INCREMENT NOT NULL,
id_hobbyactivity INT NOT NULL,
PRIMARY KEY (id_tag,
 id_hobbyactivity)) ENGINE=InnoDB;

ALTER TABLE photo ADD CONSTRAINT FK_photo_hobbyactivity_id_hobbyactivity FOREIGN KEY (id_hobbyactivity) REFERENCES hobbyactivity (id);

ALTER TABLE user ADD CONSTRAINT FK_user_id_role FOREIGN KEY (id_role) REFERENCES role (id);
ALTER TABLE post ADD CONSTRAINT FK_post_id_Utilisateur FOREIGN KEY (id_user) REFERENCES user (id);
ALTER TABLE post ADD CONSTRAINT FK_post_id_HobbyActivity FOREIGN KEY (id_hobbyactivity) REFERENCES hobbyactivity (id);
ALTER TABLE has_tags ADD CONSTRAINT FK_has_tags_id_TAG FOREIGN KEY (id_tag) REFERENCES tag (id);
ALTER TABLE has_tags ADD CONSTRAINT FK_has_tags_id_HobbyActivity FOREIGN KEY (id_hobbyactivity) REFERENCES hobbyactivity (id);
ALTER TABLE booking ADD CONSTRAINT FK_user_id FOREIGN KEY (user_id) REFERENCES user(id);
ALTER TABLE booking ADD CONSTRAINT FK_activity_id FOREIGN KEY(activity_id) REFERENCES hobbyactivity(id);