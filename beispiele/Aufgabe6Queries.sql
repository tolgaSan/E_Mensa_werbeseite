USE emensawerbeseite;
DROP TABLE IF EXISTS Bewertung;

CREATE TABLE Bewertung (
    benutzerID INT8 NOT NULL UNIQUE,
    Admin INT8 NOT NULL,
    GerichtID INT8 NOT NULL UNIQUE,
    Bewertung VARCHAR(200) NOT NULL,
    Bemerkung VARCHAR(200) NOT NULL,
    Datum DATETIME
)
