<!--
- Praktikum DBWT. Autoren:
- Kenny, Rohlf, 3517996
- Tolga, Sanli, 3236111
-->
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Addition/Multiplikation</title>

    <style>
        #Calculator{
            width: 10%;
        }
        #multButton {
            position: relative;
            top: -40px;
            left: 75px;
        }
    </style>
</head>
<body>
<form action="m2_4c_addform.php" method="post">
<fieldset id ="Calculator">
    <label for ="WertX">Wert X:*</label><br>
    <input type="text" id="WertX" name="WertX" required><br>
    <label for ="WertY">Wert Y:*</label><br>
    <input type="text" id="WertY" name="WertY" required><br><br>
    <button type="submit" name="add" id="addButton">Addition</button><br><br>
    <button type="submit" name="mult" id="multButton">Multiplikation</button><br>
    <?php
    function add($x, $y){
        return $x+$y;
    }
    function mult($x, $y){
        return $x*$y;
    }

    if (isset($_POST['add'])) {
        if((filter_var($_POST['WertX'], FILTER_VALIDATE_FLOAT) || filter_var($_POST['WertX'], FILTER_VALIDATE_INT)) &&(filter_var($_POST['WertY'], FILTER_VALIDATE_FLOAT) || filter_var($_POST['WertY'], FILTER_VALIDATE_INT))) {
            echo "Das Ergebnis ist: " . add($_POST['WertX'],$_POST['WertY']);
        }
        else{
        echo "Bitte stellen sie sicher, dass es sich rein um ganze und/oder Kommazahlen handelt!";
        }
    }
    elseif (isset($_POST['mult'])) {
        if((filter_var($_POST['WertX'], FILTER_VALIDATE_FLOAT) || filter_var($_POST['WertX'], FILTER_VALIDATE_INT)) &&(filter_var($_POST['WertY'], FILTER_VALIDATE_FLOAT) || filter_var($_POST['WertY'], FILTER_VALIDATE_INT))) {
            echo "Das Ergebnis ist: " . mult($_POST['WertX'],$_POST['WertY']);
        }
        else{
            echo "Bitte stellen sie sicher, dass es sich rein um ganze und/oder Kommazahlen handelt!";
        }
    }
    ?>
</fieldset>
</body>