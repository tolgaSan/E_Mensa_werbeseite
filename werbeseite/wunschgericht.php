<!DOCTYPE HTML>
<?php
    $link=mysqli_connect(
        "127.0.0.1",
        "root",
        "root",
        "M4"
    );
?>

<HTML>
<head>
    <meta charset="UTF-8">
    <title>Wunschgericht</title>
    <style>
        #Input{
            width: 15%;
        }
        #text{
            font-size: 10px;
        }
    </style>
</head>
<body>
<form action ="wunschgericht.php" method="post">
    <fieldset id="Input">
        <label for="wunschgericht">Wunschgericht* : </label><br>
        <input type="text" name="wunschgerichtInput" id ="wunschgericht" required><br>

        <label id="beschreibungLabel" for="beschreibung">Beschreibung* : </label><br>
        <input type="text" name="beschreibungInput" id ="beschreibung" required><br>

        <label id="nameLabel" for="name">Name : </label><br>
        <input type="text" name="nameInput" id ="name"><br>

        <label id="emailLabel" for="email">Email* : </label><br>
        <input type="text" name="emailInput" id ="email" required><br>

        <label id="erstellungsdatumLabel" for="erstellungsdatum">Erstellungsdatum* : </label><br>
        <input type="date" name="erstellungsdatumInput" id ="erstellungsdatum" required><br><br>

        <Button type="submit" name ="button" id="button">Wunsch abschicken</Button><br>

        <i id ="text">Mit * sind erforderlich!</i>
    </fieldset>
</form>
</body>
</HTML>
<?php
    $isset = true;

if(!isset($_POST['wunschgerichtInput'])){
    $isset = false;
}
if(!isset($_POST['beschreibungInput'])){
    $isset = false;
}
if(!isset($_POST['emailInput'])){
    $isset = false;
}
if(!isset($_POST['erstellungsdatumInput'])){
    $isset = false;
}

if($isset){
    $gericht = $_POST['wunschgerichtInput'];
    $bsr = $_POST['beschreibungInput'];
    $name = strtolower($_POST['nameInput']);
    $email = $_POST['emailInput'];
    $datum = $_POST['erstellungsdatumInput'];

    if($name == ""){
        $name = "anonym";
    }

    $sql = "IF EXISTS (SELECT name FROM Ersteller WHERE name = '$name') THEN
            INSERT INTO wunschgericht(name, Beschreibung, Erstellungsdatum, Ersteller_ID) VALUES
            ('$gericht','$bsr', '$datum', (SELECT Ersteller.ID FROM Ersteller WHERE name = '$name'));
            ELSE
            INSERT INTO ersteller(Name, email) VALUES ('$name','$email');
            INSERT INTO wunschgericht(name, Beschreibung, Erstellungsdatum, Ersteller_ID) VALUES
            ('$gericht', '$bsr', '$datum', (SELECT Ersteller.ID FROM Ersteller WHERE name = '$name'));
            END IF
            ";

    $link->query($sql);
}

/*
if(isset($_Post)){
    if($isset){
    echo "Sie haben alles richtige macht!";
    }
    else{
        echo "Leider haben sie ein Fehler gemacht!";
    }
}
*/
