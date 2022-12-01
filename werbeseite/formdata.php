
<!--
- Praktikum DBWT. Autoren:
- Kenny, Rohlf, 3517996
- Tolga, Sanli, 3236111
-->

<?php

    $link=mysqli_connect(
        "127.0.0.1",
        "root",
        "root",
        "emensawerbeseite"
    );

$erfolgt = true;
if(isset($_POST['Button'])){

    $name = $_POST['Vorname'];
    $email = $_POST['Email'];
    $sprache = $_POST['Intervall'];


    //Sofern die Daten von der Textdatei in einem SQL Befehl kommt werden diese Daten unschädlich gemacht für SQL-Injection
    $name = mysqli_real_escape_string($link, $name);
    $email = mysqli_real_escape_string($link, $email);


    if (!ctype_alpha($name)){
        echo "Ihr Name darf keine Sonderzeichen oder Leerzeichen beinhalten! Bitte um Korrektur. <br>";
        $erfolgt = false;
    }

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if (strpos($email, "rcpt.at")) {
            echo "Wir nehmen keine Email vom Typ rcpt.at an. Bitte um Korrektur. <br>";
            $erfolgt = false;
        }
        if (strpos($email, "damnthespam.at")) {
            echo "Wir nehmen keine Email vom Typ damnthespam.at an. Bitte um Korrektur. <br>";
            $erfolgt = false;
        }
        if (strpos($email, "wegwerfmail.de")) {
            echo "Wir nehmen keine Email vom Typ wegwerfmail.de an. Bitte um Korrektur. <br>";
            $erfolgt = false;
        }
        if (strpos($email, "trashmail.")) {
            echo "Wir nehmen keine Email vom Typ trashmail.* an. Bitte um Korrektur. <br>";
            $erfolgt = false;
        }
    }
    if(!isset($_POST['Intervall'])){
        echo "Sie haben kein Intervall ausgewählt. Bitte um Korrektur. <br>";
        $erfolgt = false;
    }
    if($_POST['Datenschutz'] !== "on"){
        echo "Sie haben der Datenschutzerklärung nicht zugestimmt. Bitte um Korrektur. <br>";
        $erfolgt = false;
    }
    if($erfolgt){
        echo "Daten konnten gespeichert werden! <br>";

        $file = fopen('newsletterAnmeldungen.txt', 'a');

        if(!$file){
            die("Die Datei konnte nicht geöffnet werden!");
        }
        fwrite($file, "Daten : ". $name . " , " . $email . " , ". $sprache . "\n" );
        fclose($file);
    }
    else{
        echo "Aus den zuvor genannten Problemen können die Daten nicht gespeichert werden! <br>";
        unset($_POST);
    }
}
?>
