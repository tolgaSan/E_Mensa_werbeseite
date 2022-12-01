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

