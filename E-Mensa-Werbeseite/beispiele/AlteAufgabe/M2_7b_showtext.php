<!--
- Praktikum DBWT. Autoren:
- Kenny, Rohlf, 3517996
- Tolga, Sanli, 3236111
-->
<!DOCTYPE html>
<head>
    <meta charset="UTF-8" lang="de">
    <title>Wortsuche</title>
</head>
<body>
    <!-- Formular für die Wortsuche-->
    <form action="M2_7b_showtext.php" method="get">
        <label for ="Suche">Welches Wort soll gesucht werden?</label><br>
        <input type="text" id ="Suche" name="GesWort"><br>
        <button type="submit">Suche</button>
    </form>

<?php

//Erst, wenn eine Eingabe erfolgt ist suche das Wort aus der Liste.
if(isset($_GET['GesWort'])){
    $file = fopen('en.txt','r');

    if(!$file){
        die("Öffnen fehlgeschlagen!");
    }
    $search = $_GET['GesWort'];

    $find = false;

    //Zeile wird ausgegeben und nach dem gesuchten Wort gesucht.
    while(!feof($file)){
        $line = fgets($file);
        $vorverarbeitung = str_replace(";", ' ',$line);

        if(str_contains($line, $search)) {
            $find = true;
        }
    }
    fclose($file);

    if (!$find) {
        echo "Das ausgewählte Wort " . $search . " ist nicht enthalten.";
    }
    else{
        echo "Das ausgewählte Wort " . $search . " wurde gefunden!";
    }
}
?>
</body>
</html>
