USE emensawerbeseite;
DROP TABLE IF EXISTS bewertung;

CREATE TABLE bewertung (
    bewertungID INT8 AUTO_INCREMENT UNIQUE Primary Key ,
    benutzerName VARCHAR(200) NOT NULL,
    Admin INT8 NOT NULL,
    Gericht VARCHAR(200) NOT NULL,
    Bewertung VARCHAR(200) NOT NULL,
    Bemerkung VARCHAR(200) NOT NULL,
    Datum DATETIME,
    hervorheben INT8 DEFAULT 0
);

/* Nutzer hinzufügen */
INSERT INTO benutzer(name, email,  passwort, admin) VALUES ('TestNotAdmin2','NotAdmin2@test.de' , 'bc19568e590911a6a55b9be06c964b0c26c201e3', 0);
