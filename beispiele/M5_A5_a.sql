UPDATE benutzer SET anzahlanmeldungen = anzahlanmeldungen+1 WHERE email = '$user';
UPDATE benutzer SET letzteanmeldung = '$date' WHERE email = '$user';