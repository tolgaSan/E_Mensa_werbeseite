use emensawerbeseite;

DROP TABLE benutzer;

CREATE TABLE IF NOT EXISTS benutzer(
  id INT8 PRIMARY KEY AUTO_INCREMENT UNIQUE,
  name VARCHAR(200) NOT NULL DEFAULT '',
  email VARCHAR(100) NOT NULL UNIQUE,
  passwort VARCHAR(200) NOT NULL,
  admin BOOLEAN NOT NULL DEFAULT FALSE,
  anzahlfehler INT NOT NULL DEFAULT 0,
  anzahlanmeldungen INT NOT NULL DEFAULT 0,
  letzteanmeldung DATETIME,
  letzterfehler DATETIME
);