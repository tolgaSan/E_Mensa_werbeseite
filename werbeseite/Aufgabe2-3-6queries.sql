/* SOLLTE MAN DIESE MAL BRAUCHEN!
DROP DATABASE emensawerbeseite;
DROP TABLE allergen;
DROP TABLE gericht;
DROP TABLE kategorie;
DROP TABLE gericht_hat_kategorie;
DROP TABLE gericht_hat_allergen;
*/

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

/* AUFGABE 3 */
Select * FROM gericht;
SELECT erfasst_am FROM gericht;
SELECT erfasst_am, name AS Gerichtname FROM gericht ORDER BY Gerichtname DESC;
SELECT name, beschreibung FROM gericht ORDER BY name ASC LIMIT 5;
SELECT name, beschreibung FROM gericht ORDER BY name ASC LIMIT 10 OFFSET 5;
SELECT typ FROM allergen GROUP BY typ;
SELECT name FROM gericht WHERE name LIKE 'K%';
SELECT id, name FROM gericht Where name LIKE '%suppe%';
/* Stichpunkt 9 nicht verstanden */
SELECT * FROM Kategorie
WHERE eltern_id is NULL;
UPDATE allergen SET name = 'Kamut' WHERE code = 'a6';
INSERT INTO gericht (`name`, `beschreibung`, `erfasst_am`, `vegetarisch`, `vegan`, `preis_intern`, `preis_extern`) VALUES
    ('Currywurst mit Pommes', 'Ein Gericht aus einer Wurst mit Kartoffeln als Streifen geschnitten', '2020-08-25' , 0, 0, 3, 5 );


DELETE FROM gericht WHERE id='24';

SELECT * FROM gericht;

/* AUFGABE 6 nicht fertig */

SELECT name, GROUP_CONCAT(code) FROM gericht g JOIN gericht_hat_allergen a ON g.id = a.gericht_id GROUP BY name ASC;
SELECT name, GROUP_CONCAT(code) FROM gericht g LEFT JOIN gericht_hat_allergen a ON g.id = a.gericht_id GROUP BY name ASC;
SELECT code, group_concat(name) FROM gericht g RIGHT JOIN gericht_hat_allergen a ON g.id = a.gericht_id GROUP BY code ASC; /* Alle Allergene sind zugeordnet */
/* Noch nicht 100% RICHTIG fehlt noch die Zählung */
SELECT n.name as Kategorie FROM gericht g RIGHT JOIN (SELECT k.name , g.gericht_id FROM Kategorie k JOIN gericht_hat_kategorie g ON k.id = g.kategorie_id) n ON gericht_id = g.id;

