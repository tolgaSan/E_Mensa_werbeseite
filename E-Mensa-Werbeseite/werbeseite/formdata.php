
<!--
- Praktikum DBWT. Autoren:
- Kenny, Rohlf, 3517996
- Tolga, Sanli, 3236111
-->

<?php
//Vorverarbeitung

$erfolgt = true;
if(isset($_POST['Button'])){
    if(isset($_POST['Vorname'])){
        if (!ctype_alpha($_POST['Vorname'])){
            echo "Ihr Name darf keine Sonderzeichen oder Leerzeichen beinhalten! Bitte um Korrektur. <br>";
            $erfolgt = false;
        }
    }
    else{
        echo "Sie haben keinen Vornamen angegeben. Bitte um Korrektur! <br>";
        $erfolgt = false;
    }

    if(isset($_POST['Email'])) {
        if (filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)) {
            if (strpos($_POST['Email'], "rcpt.at")) {
                echo "Wir nehmen keine Email vom Typ rcpt.at an. Bitte um Korrektur. <br>";
                $erfolgt = false;
            }
            if (strpos($_POST['Email'], "damnthespam.at")) {
                echo "Wir nehmen keine Email vom Typ damnthespam.at an. Bitte um Korrektur. <br>";
                $erfolgt = false;
            }
            if (strpos($_POST['Email'], "wegwerfmail.de")) {
                echo "Wir nehmen keine Email vom Typ wegwerfmail.de an. Bitte um Korrektur. <br>";
                $erfolgt = false;
            }
            if (strpos($_POST['Email'], "trashmail.")) {
                echo "Wir nehmen keine Email vom Typ trashmail.* an. Bitte um Korrektur. <br>";
                $erfolgt = false;
            }
        }
    }
    if(!isset($_POST['Intervall'])){
        echo "Sie haben kein Intervall ausgewählt. Bitte um Korrektur. <br>";
    }
    if($_POST['Datenschutz'] !== "on"){
        echo "Sie haben der Datenschutzerklärung nicht zugestimmt. Bitte um Korrektur. <br>";
    }
    if($erfolgt){
        echo "Daten konnten gespeichert werden! <br>";
        $Daten = $_POST;
    }
    else{
        echo "Aus den zuvor genannten Problemen können die Daten nicht gespeichert werden! <br>";
        unset($_POST);
    }
}
?>