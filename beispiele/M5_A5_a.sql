UPDATE benutzer SET anzahlanmeldungen = anzahlanmeldungen+1 WHERE email = '$user';
UPDATE benutzer SET letzteanmeldung = '$date' WHERE email = '$user';

CREATE PROCEDURE inkrementAnmeldung (in search_id int8)
begin
    update benutzer set anzahlanmeldungen = anzahlanmeldungen + 1 where id = search_id;
end;