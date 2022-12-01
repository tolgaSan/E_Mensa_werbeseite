/*
CREATE DATABASE M4 CHARACTER SET UTF8mb4 COLLATE utf8mb4_unicode_ci;
USE M4;
*/
/* AUFGABE 1 */
DROP TABLE IF EXISTS wunschgericht;
DROP TABLE IF EXISTS ersteller;

CREATE TABLE ersteller (
    ID INT8 PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Name varchar(200) NOT NULL,
    Email varchar(200) NOT NULL
);

CREATE TABLE  wunschgericht(
    ID INT8 PRIMARY KEY AUTO_INCREMENT,
    name varchar(200) NOT NULL DEFAULT 'Anonym',
    Beschreibung varchar(200) NOT NULL,
    Erstellungsdatum varchar(200) NOT NULL,
    Ersteller_ID INT8 REFERENCES Ersteller(ID)
);

SELECT e.Name, e.Email, w.name, w.Beschreibung, w.Erstellungsdatum
FROM ersteller e INNER JOIN wunschgericht w on e.ID = w.Ersteller_ID ORDER BY Erstellungsdatum DESC LIMIT 5;