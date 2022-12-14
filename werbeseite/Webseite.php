<!DOCTYPE html>
<!--
- Praktikum DBWT. Autoren:
- Kenny, Rohlf, 3517996
- Tolga, Sanli, 3236111
-->
<?php
include 'Gerichte.php';
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

//Die Funktion gibt die Anzahl der Zeilen in newsletterAnmeldung.txt zurück
function anzahlNewsletteranmeldungen(){
    $readfile = "newsletterAnmeldungen.txt";
    $zeilen = -1;
    $openfile = fopen($readfile, "r");
    while(!feof($openfile)){
        $line = fgets($openfile);
        $zeilen++;
    }
    fclose($openfile);
    return $zeilen;
}

//Die Funktion gibt die Anzahl der Speisen als Array aus
function anzahlSpeisen(){
    $link=mysqli_connect(
        "127.0.0.1",
        "root",
        "root",
        "emensawerbeseite"
    );
    if(!$link){
        echo "Verbindung zu Datenbank konnte nicht hergestellt werden: ".mysqli_connect_error();
        exit();
    }

    $sql = "SELECT COUNT(name) AS anzahlSpeisen FROM gericht";
    $result = mysqli_query($link, $sql);
    $zeile = mysqli_fetch_array($result);

    mysqli_free_result($result);
    mysqli_close($link);
    echo $zeile[0];
}

//Die Funktion gibt die Anzahl der Besucher als Array aus
function anzahlBesucher(){
    $link=mysqli_connect(
        "127.0.0.1",
        "root",
        "root",
        "emensawerbeseite"
    );
    if(!$link){
        echo "Verbindung zu Datenbank konnte nicht hergestellt werden: ".mysqli_connect_error();
        exit();
    }

    $sql3 ="UPDATE besucher SET id = id + 1";
    $link->query($sql3);


    $sql = "SELECT MAX(id) FROM besucher";
    $result = mysqli_query($link, $sql);
    $zeile = mysqli_fetch_array($result);

    mysqli_free_result($result);
    mysqli_close($link);
    echo $zeile[0];
}
?>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Ihre E-Mensa</title>
    <link type="text/css" rel="stylesheet" href="style.css" />
</head>
<body>
<div id="header">
    <div id="logo"><img src="img/mensa.png" alt="Mensa Logo" width="80" height="80"></div>
    <div id="menu">
        <ul id="reitermenu">
            <li><a href ="#ankuendigunganker">Ankündigung</a></li>
            <li><a href ="#koestlichkeitenanker">Speisen</a></li>
            <li><a href ="#zahlenanker">Zahlen</a></li>
            <li><a href ="#kontaktanker">Kontakt</a></li>
            <li><a href ="#wichtigfuerunsanker">Wichtig für uns</a></li>
        </ul>
    </div>
    <div id="irgendwas"> irgendwas </div>
</div>
<div id="box">
    <div id="linkeSpalte"></div>
    <div id="content">
        <img src ="./img/Mensa.jpg" width="100%" height="20%">
        <h2 id="ankuendigunganker">Bald gibt es Essen auch online ;)</h2>
        <p class="pborder">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
            labore et dolore magna aliqua. Quis hendrerit dolor magna eget est lorem. Condimentum mattis pellentesque id
            nibh. Morbi quis commodo odio aenean sed adipiscing diam donec. Condimentum mattis pellentesque id nibh tortor
            id aliquet lectus proin. Volutpat est velit egestas dui id ornare arcu. Ut lectus arcu bibendum at varius vel
            pharetra. Est sit amet facilisis magna etiam tempor orci. Duis at consectetur lorem donec massa sapien faucibus.
            Senectus et netus et malesuada fames ac turpis egestas. Tristique senectus et netus et malesuada fames. Maecenas
            sed enim ut sem viverra aliquet eget sit. Dui accumsan sit amet nulla facilisi morbi tempus iaculis. Proin fermentum
            leo vel orci porta non. Porttitor rhoncus dolor purus non. Sem fringilla ut morbi tincidunt augue interdum velit
            euismod in. Ut diam quam nulla porttitor massa id neque. Enim lobortis scelerisque fermentum dui faucibus in.
            At varius vel pharetra vel turpis nunc eget lorem dolor. Feugiat vivamus at augue eget arcu dictum.</p>

        <h2 id="koestlichkeitenanker">Köstlichkeiten, die Sie erwarten</h2>
        <?php
        for ($i = 0; $i < count($meal['Gerichte']); $i++){
            echo "<tr>";
            $picture = $meal['Bild'][$i];
        }
        $sqlRandom = "SELECT name, beschreibung FROM gericht ORDER BY RAND() limit 5";
        $resultsRandom = mysqli_query($link, $sqlRandom);

        echo '<table id ="randomgerichte" border ="1">';
        echo "<th>5 zufällige Gerichte</th>";
        echo "<th>Beschreiung</th>";
        while($zeileRandom = mysqli_fetch_array($resultsRandom, MYSQLI_ASSOC)){
            echo "<tr>";
            echo "<td>".$zeileRandom['name']."</td>";
            echo "<td>".$zeileRandom['beschreibung']."</td>";
            echo "</tr>";
        }
        echo "</table><br>";

        $sql ="SELECT DISTINCT name, preis_intern, preis_extern, GROUP_CONCAT(code) AS code FROM gericht g LEFT JOIN gericht_hat_allergen a ON g.id = a.gericht_id GROUP BY name ASC LIMIT 5;" ;
        $results = mysqli_query($link, $sql);
        if(!$results){
            die("ungültige Abfrage".mysqli_error());
        }

        echo '<table border="1" id="fünfgerichte">';
        echo "<th>Gericht</th> <th>Preis intern</th> <th>Preis Extern</th> <th>Allergen</th>";
        while($zeile = mysqli_fetch_array($results, MYSQLI_ASSOC)){
            echo "<tr>";
            echo "<td>".$zeile['name']."</td>";
            echo "<td>".$zeile['preis_intern']."</td>";
            echo "<td>".$zeile['preis_extern']."</td>";
            echo "<td>".$zeile['code']."</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<h2 id ='überschriftallergen'>Folgende Allergencodes enthalten</h2>";
        $sql2 = "SELECT code, name  FROM allergen";
        $resultsAllergene = mysqli_query($link, $sql2);

        if(!$resultsAllergene){
            die("ungültige Abfrage".mysqli_error());
        }
        echo "<table id='allergentable' border ='1'>";
        echo "<th>Code</th><th>Allergen</th> ";
        while($zeile2 = mysqli_fetch_array($resultsAllergene, MYSQLI_ASSOC)){
            echo "<tr>";
            echo "<td>".$zeile2['code']."</td>";
            echo "<td>".$zeile2['name']."</td>";
            echo "</tr>";
        }
        echo "</table>";

        mysqli_free_result($results);
        mysqli_close($link);

        ?>
        </table>
        <h2 id="zahlenanker">E Mensa in Zahlen</h2>
        <div id="kleineTabelle">
            <div id="spalte1"><?php echo anzahlBesucher() ?> Besucher</div>
            <div id='spalte2'><?php echo anzahlNewsletteranmeldungen() ?> Anmeldungen zum Newsletter</div>
            <div id="spalte3"><?php echo anzahlSpeisen(); ?> Speisen</div>
        </div>
        <h2 id="kontaktanker">Interesse geweckt? Wir informieren Sie!</h2>
        <div id="newslettergrid">
            <form method="Post" action="Webseite.php#newslettergrid">
                <label for="vorname" id ="LabelVorname">Vorname</label>
                <input type="text" id ="vorname" name="Vorname" placeholder="Max Mustermann" required>
                <label for="email" id ="LabelEmail">E-Mail</label>
                <input type="email" id="email" name="Email" placeholder="maxmustermann@gmx.de" required>
                Newsletter bitte in:
                <select name="Intervall">
                    <option value="1">Englisch</option>
                    <option value="2" selected>Deutsch</option>
                    <option value="3">Chinesisch</option>
                </select>
                <br>
                <input id="Datenschutzhinweis" type="checkbox" name="Datenschutz" required>
                <label for="Datenschutzhinweis">Den Datenschutzbestimmungen stimme ich zu &nbsp &nbsp &nbsp &nbsp</label>
                <button type="submit" name="Button">Zum Newsletter anmelden</button><br>
                <?php include ('formdata.php') ?>
            </form>
        </div>
        <a href="wunschgericht.php">Haben sie noch einen Wunsch offen? Benutzen sie unser Formular!</a>

        <h2 id="wichtigfuerunsanker">Das ist uns wichtig</h2>
        <ul id="wichtig">
            <li>Beste frische saisonale Zutaten</li>
            <li>Ausgewogene abwechslungsreiche Gerichte</li>
            <li>Sauberkeit</li>
        </ul>
        <h3>Wir freuen uns auf Ihren Besuch!</h3>
        <footer id="footercenter">
            <ul>
                <li>&copy;E-Mensa GmbH</li>
                <li>&lt;Kenny, Tolga&gt;</li>
                <li><a href="impressum">Impressum</a></li>
            </ul>
        </footer>
    </div>
    <div id="rechteSpalte"></div>
</div>
</body>
</html>