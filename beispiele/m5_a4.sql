
/* AUFGABE 4 */
CREATE VIEW view_suppengerichte AS SELECT name, beschreibung FROM gericht WHERE name LIKE '%suppe%';
/* CREATE VIEW */


/* Tests, noch keine Lösung gefunden.*/
SELECT g.name, vegetarisch , k.name
FROM gericht AS g
LEFT JOIN gericht_hat_kategorie AS gk on g.id = gk.gericht_id
LEFT JOIN  kategorie as k ON gk.kategorie_id = k.id  WHERE vegetarisch = '1' ORDER BY k.name DESC;


SELECT k.name, k.id , gk.gericht_id, g.name
FROM kategorie as k
LEFT JOIN gericht_hat_kategorie gk ON k.id = gk.kategorie_id
LEFT JOIN gericht g ON gk.gericht_id = k.id;

