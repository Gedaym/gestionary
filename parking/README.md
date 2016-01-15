parking
==========

A Symfony project created on January 11, 2016, 10:30 am.


Hello les M1,
Alors tous d'abords pour créer les tables, utiliser la console et la function : 

$ php app/console doctrine:schema:update --force, 

j'ai crée les entité de façon a ce que la base soit monté automatiquement. 
Si jamais vous voulez les modifier, il faudra le faire sur les entités et ensuite exécuter ces deux functions d'affilés

$ php app/console doctrine:schema:update --dump-sql
$ php app/console doctrine:schema:update --force


De plus je pense qu'il va falloir renommer les elements dans les tables,  
c'est extrèmement moche de reutiliser les noms de la table pour ces attributs et je ne crois pas que cela se fasse en vrai.
Bref à voir.

Revoir nommage des tables qui sont ignobles, et demander car il manque la table produit

code automatique creation table :

CREATE TABLE fos_user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, username_canonical VARCHAR(255) NOT NULL, email VARCHAR(255) NO
T NULL, email_canonical VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, last_login DAT
ETIME DEFAULT NULL, locked TINYINT(1) NOT NULL, expired TINYINT(1) NOT NULL, expires_at DATETIME DEFAULT NULL, confirmation_token VARCHAR(255) DEFAULT
 NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT '(DC2Type:array)', credentials_expired TINYINT(1) NOT NULL, creden
tials_expire_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_957A647992FC23A8 (username_canonical), UNIQUE INDEX UNIQ_957A6479A0D96FBF (email_canonical),
PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE customer (customer_id INT AUTO_INCREMENT NOT NULL, type_adhesion INT NOT NULL, immatriculation INT NOT NULL, PRIMARY KEY(customer_id)) DE
FAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE offer (offer_id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, description TEXT DEFAULT NULL, state VARCHAR(50) NOT NULL, reduct
ion INT NOT NULL, PRIMARY KEY(offer_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE parking (parking_id INT AUTO_INCREMENT NOT NULL, type INT DEFAULT NULL, name VARCHAR(50) NOT NULL, number_street INT NOT NULL, street VAR
CHAR(50) NOT NULL, city VARCHAR(50) NOT NULL, postal_code INT NOT NULL, description TEXT DEFAULT NULL, INDEX FK_parkingtype_parking (type), PRIMARY KE
Y(parking_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE parking_type (parking_type_id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, PRIMARY KEY(parking_type_id)) DEFAULT CHARACTER SET
 utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE parking_user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, username_canonical VARCHAR(255) NOT NULL, email VARCHAR(255
) NOT NULL, email_canonical VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, last_login
 DATETIME DEFAULT NULL, locked TINYINT(1) NOT NULL, expired TINYINT(1) NOT NULL, expires_at DATETIME DEFAULT NULL, confirmation_token VARCHAR(255) DEF
AULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT '(DC2Type:array)', credentials_expired TINYINT(1) NOT NULL, cr
edentials_expire_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_F507A63A92FC23A8 (username_canonical), UNIQUE INDEX UNIQ_F507A63AA0D96FBF (email_canonica
l), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE reservation (reservation_id INT AUTO_INCREMENT NOT NULL, parking INT DEFAULT NULL, customer INT DEFAULT NULL, number_reservation INT NOT
NULL, date_start DATE NOT NULL, date_end DATE NOT NULL, hour_start INT NOT NULL, hour_end INT NOT NULL, price DOUBLE PRECISION NOT NULL, space INT NOT
 NULL, INDEX FK_reservation_parking (parking), INDEX FK_reservation_customer (customer), PRIMARY KEY(reservation_id)) DEFAULT CHARACTER SET utf8 COLLA
TE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE role (role_id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, PRIMARY KEY(role_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unico
de_ci ENGINE = InnoDB;
CREATE TABLE space (space_id INT AUTO_INCREMENT NOT NULL, type INT DEFAULT NULL, state INT DEFAULT NULL, space_id_parking INT NOT NULL, price DOUBLE P
RECISION NOT NULL, INDEX FK_space_space_type (type), INDEX FK_space_space_state (state), PRIMARY KEY(space_id)) DEFAULT CHARACTER SET utf8 COLLATE utf
8_unicode_ci ENGINE = InnoDB;
CREATE TABLE space_state (space_state_id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(space_state_id)) DEFAULT CHARACTER SET ut
f8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE space_type (space_type_id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, PRIMARY KEY(space_type_id)) DEFAULT CHARACTER SET utf8
COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE user_status (user_status_id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, PRIMARY KEY(user_status_id)) DEFAULT CHARACTER SET ut
f8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
ALTER TABLE parking ADD CONSTRAINT FK_B237527A8CDE5729 FOREIGN KEY (type) REFERENCES parking_type (parking_type_id);
ALTER TABLE reservation ADD CONSTRAINT FK_42C84955B237527A FOREIGN KEY (parking) REFERENCES parking (parking_id);
ALTER TABLE reservation ADD CONSTRAINT FK_42C8495581398E09 FOREIGN KEY (customer) REFERENCES customer (customer_id);
ALTER TABLE space ADD CONSTRAINT FK_2972C13A8CDE5729 FOREIGN KEY (type) REFERENCES space_type (space_type_id);
ALTER TABLE space ADD CONSTRAINT FK_2972C13AA393D2FB FOREIGN KEY (state) REFERENCES space_state (space_state_id);

