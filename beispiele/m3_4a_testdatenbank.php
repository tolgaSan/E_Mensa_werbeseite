<?php
    $link=mysqli_connect(
        "127.0.0.1",
        "root",
        "root",
        "emensawerbeseite"
    );
    if (!$link) {
        echo "Verbindung fehlgeschlagen: ", mysqli_connect_error();
        exit();
    }

    $sql = "SELECT * FROM gericht";
    $results = mysqli_query($link, $sql);

    if(!$results){
        die("ungültige Abfrage".mysqli_error());
    }

    echo '<table border="1">';

    echo "<tr>";
    echo "<th>Id</th>";
    echo "<th>Name</td>";
    echo "<th>Beschreibung</th>";
    echo "<th>erfasst_am</th>";
    echo "<th>vegetarisch</th>";
    echo "<th>vegan</th>";
    echo "<th>preis_intern</th>";
    echo "<th>preis_extern</th>";
    echo "</tr>";

    while($zeile = mysqli_fetch_array($results, MYSQLI_ASSOC)){

        echo "<tr>";
        echo "<td>".$zeile['id']."</td>";
        echo "<td>".$zeile['name']."</td>";
        echo "<td>".$zeile['beschreibung']."</td>";
        echo "<td>".$zeile['erfasst_am']."</td>";
        echo "<td>".$zeile['vegetarisch']."</td>";
        echo "<td>".$zeile['vegan']."</td>";
        echo "<td>".$zeile['preis_intern']."</td>";
        echo "<td>".$zeile['preis_extern']."</td>";
        echo "</tr>";

    }


    $Anzahl = "SELECT count(name) as Anzahl FROM gericht";
    $results2 = mysqli_query($link, $Anzahl);

    if (!$results) {
        die("ungültige Abfrage" . mysqli_error());
    }

?>