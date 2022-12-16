
/* AUFGABE 4 */
CREATE VIEW view_suppengerichte AS SELECT name, beschreibung FROM gericht WHERE name LIKE '%suppe%';

CREATE VIEW view_anmeldungen AS SELECT name, anzahlanmeldungen FROM benutzer ORDER BY anzahlanmeldungen DESC;

CREATE VIEW view_kategoriegerichte_vegetarisch AS SELECT k.name AS Kategorie, k.id , gk.gericht_id, g.name
FROM kategorie as k
LEFT JOIN gericht_hat_kategorie gk ON k.id = gk.kategorie_id
LEFT JOIN gericht g ON gk.gericht_id = k.id;

/* Die letzte sieht etwas fehlerhaft aus aber das ist das beste was ich erreichen konnte */