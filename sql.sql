CREATE TABLE reviews(
    rid int(11) not null AUTO_INCREMENT PRIMARY KEY,
    uid varchar(128) not null,
    date datetime not null,
    message Text not null
 );
 CREATE TABLE user(
	id int(11) not null AUTO_INCREMENT PRIMARY KEY,
    uid varchar(128) not null,
    pwd varchar(128) not null
);
