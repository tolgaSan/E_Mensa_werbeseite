/* SOLLTE MAN DIESE MAL BRAUCHEN!
DROP DATABASE emensawerbeseite;
DROP TABLE allergen;
DROP TABLE gericht;
DROP TABLE kategorie;
DROP TABLE gericht_hat_kategorie;
DROP TABLE gericht_hat_allergen;
*/

DROP DATABASE emensawerbeseite;

/* AUFGABE 2.1 - 2.3 */
CREATE DATABASE emensawerbeseite CHARACTER SET UTF8mb4 COLLATE utf8mb4_unicode_ci;
USE emensawerbeseite;

CREATE TABLE gericht(
    id INT8 PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(80) NOT NULL UNIQUE,
    beschreibung VARCHAR(800) NOT NULL,
    erfasst_am DATE NOT NULL,
    vegetarisch BOOLEAN NOT NULL DEFAULT FALSE,
    vegan BOOLEAN NOT NULL DEFAULT FALSE,
    preis_intern DOUBLE NOT NULL CHECK (gericht.preis_intern > 0),
    preis_extern DOUBLE NOT NULL CHECK (gericht.preis_intern < gericht.preis_extern)
);

CREATE TABLE allergen(
     code CHAR(4) PRIMARY KEY,
     name VARCHAR(300) NOT NULL,
     typ VARCHAR(20) DEFAULT 'allergen' NOT NULL
);

CREATE TABLE Kategorie(
      id INT8 PRIMARY KEY AUTO_INCREMENT,
      name VARCHAR(80) NOT NULL,
      eltern_id INT8,
      bildname VARCHAR(200)
);

CREATE TABLE gericht_hat_allergen(
     code CHAR(4),
     gericht_id INT8 NOT NULL,
     CONSTRAINT gericht_hat_allergen_ibfk_1 FOREIGN KEY (code) REFERENCES allergen (code),
     CONSTRAINT gericht_hat_allergen_ibfk_2 FOREIGN KEY (gericht_id) REFERENCES gericht (id)
);

CREATE TABLE gericht_hat_kategorie(
      gericht_id int8 NOT NULL,
      kategorie_id int8 NOT NULL,
      CONSTRAINT gericht_hat_kategorie_ibfk_1 FOREIGN KEY (gericht_id) REFERENCES gericht (id),
      CONSTRAINT gericht_hat_kategorie_ibfk_2 FOREIGN KEY (kategorie_id) REFERENCES kategorie (id)
);

/* AUFGABE 2.4 */
SELECT COUNT(code) FROM allergen;
SELECT COUNT(id) FROM gericht;
SELECT COUNT(code) FROM gericht_hat_allergen;
SELECT COUNT(gericht_id) FROM gericht_hat_kategorie;
SELECT COUNT(id) FROM kategorie;

/* AUFGABE 3 in chronologischer Reihenfolge */
Select * FROM gericht;
SELECT erfasst_am FROM gericht;
SELECT erfasst_am, name AS Gerichtname FROM gericht ORDER BY Gerichtname DESC;
SELECT name, beschreibung FROM gericht ORDER BY name ASC LIMIT 5;
SELECT name, beschreibung FROM gericht ORDER BY name ASC LIMIT 10 OFFSET 5;
SELECT typ FROM allergen GROUP BY typ;
SELECT name FROM gericht WHERE name LIKE 'K%';
SELECT id, name FROM gericht Where name LIKE '%suppe%';
SELECT * FROM Kategorie
WHERE eltern_id is NULL;
UPDATE allergen SET name = 'Kamut' WHERE code = 'a6';
INSERT INTO gericht (`name`, `beschreibung`, `erfasst_am`, `vegetarisch`, `vegan`, `preis_intern`, `preis_extern`) VALUES
    ('Currywurst mit Pommes', 'Ein Gericht aus einer Wurst mit Kartoffeln als Streifen geschnitten', '2020-08-25' , 0, 0, 3, 5 );

DELETE FROM gericht WHERE id='24';

SELECT * FROM gericht;

/* Aufgabe 6 in chronologischer Reihenfolge */
SELECT DISTINCT name, GROUP_CONCAT(code) FROM gericht g JOIN gericht_hat_allergen a ON g.id = a.gericht_id GROUP BY name ASC;
SELECT DISTINCT name, GROUP_CONCAT(code) FROM gericht g LEFT JOIN gericht_hat_allergen a ON g.id = a.gericht_id GROUP BY name ASC;
SELECT DISTINCT allergen.code, GROUP_CONCAT(gericht.name) AS gericht FROM allergen
LEFT JOIN gericht_hat_allergen on allergen.code = gericht_hat_allergen.code
LEFT JOIN gericht ON gericht_hat_allergen.gericht_id = gericht_id
GROUP BY allergen.name
ORDER BY code ASC;
SELECT kategorie.name, COUNT(kategorie_id) AS anzahl FROM gericht_hat_kategorie, kategorie
WHERE kategorie.id = gericht_hat_kategorie.kategorie_id
GROUP BY kategorie_id
ORDER BY anzahl ASC;
SELECT kategorie.name, COUNT(kategorie_id) AS anzahl FROM gericht_hat_kategorie, kategorie
WHERE kategorie.id = gericht_hat_kategorie.kategorie_id AND kategorie_id > 2
GROUP BY kategorie_id
ORDER BY anzahl ASC;
SELECT DISTINCT name, GROUP_CONCAT(code) as anzahl FROM gericht g
LEFT JOIN gericht_hat_allergen a ON g.id = a.gericht_id
WHERE gericht_id = 3 OR gericht_id = 4 OR gericht_id = 5
GROUP BY name ASC;

/* AUFGABE 9 */
CREATE TABLE besucher(
    id INT8 AUTO_INCREMENT PRIMARY KEY
);
DROP TABLE besucher;

/* Initialisierung der Datenbank
INSERT INTO besucher() VALUES ();

UPDATE besucher SET id = 0;
*/