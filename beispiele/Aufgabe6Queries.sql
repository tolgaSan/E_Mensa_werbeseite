USE emensawerbeseite;
DROP TABLE IF EXISTS Bewertung;

CREATE TABLE Bewertung (
    bewertungID INT8 AUTO_INCREMENT UNIQUE Primary Key ,
    benutzerName VARCHAR(200) NOT NULL,
    Admin INT8 NOT NULL,
    Gericht VARCHAR(200) NOT NULL,
    Bewertung VARCHAR(200) NOT NULL,
    Bemerkung VARCHAR(200) NOT NULL,
    Datum DATETIME
);