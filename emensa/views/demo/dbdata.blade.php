<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Beispiel: Daten aus der Datenbank</title>
</head>
<body>

@if (isset($data['error']))
    <h1>Es gab ein Problem mit der Datenbankverbindung</h1>
    <p>Fehlermeldung</p>
    <pre> {{$data['beschreibung']}}</pre>

@else


    <article>
        <h1>Daten aus der Datenbank der Tabelle: Gerichte</h1>
        <p>Der Controller inkludiert das benötigte Model (gerichte.php in diesem Fall)
            und ruft die benötigte Funktion <code>db_gerichte_select_all()</code> zum Laden der Daten auf</p>
        <ul>
            @forelse($data as $a)
                <li>{{$a['name']}}</li>
            @empty
                <li>Keine Daten vorhanden.</li>
            @endforelse
        </ul>
    </article>
@endif
</body>
</html>