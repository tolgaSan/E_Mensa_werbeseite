use emensawerbeseite;

DROP TABLE benutzer;

CREATE TABLE benutzer (
    id INT8 PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name VARCHAR(200) not null default '',
    email varchar(100) NOT NULL UNIQUE,
    passwort VARCHAR(200) NOT NULL,
    admin BOOLEAN DEFAULT false NOT NULL,
    anzahlfehler INT NOT NULL DEFAULT 0,
    anzahlanmeldungen INT NOT NULL DEFAULT 0,
    letzteanmeldung DATETIME,
    letzterfehler DATETIME
    );


INSERT INTO benutzer(email, passwort, admin) VALUES('admin@emensa.example','chinchilla', 1);