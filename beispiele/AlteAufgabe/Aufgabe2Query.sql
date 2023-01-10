/* Aufgabe 2 */
ALTER TABLE gericht ADD bildname VARCHAR(200) DEFAULT NULL;

UPDATE gericht set gericht.bildname = '01_bratkartoffel.jpg' WHERE ID = 1;
UPDATE gericht set gericht.bildname = '03_bratkartoffel.jpg' WHERE ID = 3;
UPDATE gericht set gericht.bildname = '04_tofu.jpg' WHERE ID = 4;
UPDATE gericht set gericht.bildname = '06_lasagne.jpg' WHERE ID = 6;
UPDATE gericht set gericht.bildname = '09_suppe.jpg' WHERE ID = 9;
UPDATE gericht set gericht.bildname = '10_forelle.jpg' WHERE ID = 10;
UPDATE gericht set gericht.bildname = '11_soup.jpg' WHERE ID = 11;
UPDATE gericht set gericht.bildname = '12_kassler.jpg' WHERE ID = 12;
UPDATE gericht set gericht.bildname = '13_reibekuchen.jpg' WHERE ID = 13;
UPDATE gericht set gericht.bildname = '15_pilze.jpg' WHERE ID = 15;
UPDATE gericht set gericht.bildname = '17_broetchen.jpg' WHERE ID = 17;
UPDATE gericht set gericht.bildname = '19_mousse.jpg' WHERE ID = 19;
UPDATE gericht set gericht.bildname = '20_suppe.jpg' WHERE ID = 20;

UPDATE benutzer set benutzer.name = 'Okay' WHERE ID = 1;
