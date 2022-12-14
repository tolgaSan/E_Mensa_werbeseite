
CREATE DATABASE M4 CHARACTER SET UTF8mb4 COLLATE utf8mb4_unicode_ci;

USE M4;
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

/* Meilenstein 4 Aufgaben in chronologischer Reihenfolge*/
USE emensawerbeseite;

ALTER TABLE gericht_hat_kategorie ADD CONSTRAINT UNIQUE (gericht_id, kategorie_id)

CREATE INDEX index_gericht_name on gericht(name);

ALTER TABLE gericht_hat_kategorie DROP FOREIGN KEY gericht_hat_kategorie_ibfk_1,
                                  ADD CONSTRAINT FOREIGN KEY foreignkey_kategorie_id (gericht_id) REFERENCES gericht(id) ON DELETE CASCADE;

ALTER TABLE gericht_hat_allergen DROP FOREIGN KEY gericht_hat_allergen_ibfk_2,
                                 ADD CONSTRAINT FOREIGN KEY foreignkey_allergen_id (gericht_id) REFERENCES gericht(id) ON DELETE CASCADE;

ALTER TABLE kategorie ADD FOREIGN KEY (eltern_id) REFERENCES kategorie(id);

ALTER TABLE gericht_hat_allergen DROP FOREIGN KEY gericht_hat_allergen_ibfk_1,
                                 ADD CONSTRAINT FOREIGN KEY index_allergen_code (code) REFERENCES allergen(code) ON UPDATE CASCADE;

ALTER TABLE gericht_hat_kategorie ADD CONSTRAINT PRIMARY KEY (gericht_id,kategorie_id);