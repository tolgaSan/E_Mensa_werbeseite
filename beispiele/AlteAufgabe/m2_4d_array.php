<!--
- Praktikum DBWT. Autoren:
- Kenny, Rohlf, 3517996
- Tolga, Sanli, 3236111
-->
<?php
$famousMeals = [
    1 => ['name' => 'Currywurst mit Pommes',
        'winner' => [2001, 2003, 2007, 2010, 2020]],
    2 => ['name' => 'Hähnchencrossies mit Paprikareis',
        'winner' => [2002, 2004, 2008]],
    3 => ['name' => 'Spaghetti Bolognese',
        'winner' => [2011, 2012, 2017]],
    4 => ['name' => 'Jägerschnitzel mit Pommes',
        'winner' => 2019]
];
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8" lang ="de">
    <title>Arrayausgabe</title>
    <style>
        #Listen{
            margin-bottom:-20px;
            margin-top :10px;
        }
    </style>
</head>
<body>
<ol id ="Array">
<?php
//Gibt den Array einmal komplett aus.


foreach($famousMeals as $value){
    if(isset($value['winner'][1])){
        echo "<li id='Listen'>" . $value['name'] . "</li><br>";
        for($i = count($value['winner']) - 1; $i >= 0 ; $i--) {
            echo $value['winner'][$i];
            if ($i != 0) {
                echo ", ";
            }
        }
    }
    //Wenn kein Array angehängt wurde.
    else{
        echo "<li id='Listen'>" . $value['name'] . "</li><br>";
        echo $value['winner'];
    }
}
?>
</ol>
<h2>In den folgenden Jahren existieren keine Gewinner:</h2>

<?php

//Überprüfe für jedes Jahr, ob der Wert im Array vorhanden ist.
for($i = 2000; $i < 2020; $i++){

    $winner = false;

    //Gehe durch das Array und überprüfe, ob das Jahr vorhanden ist.
    foreach($famousMeals as $value){
        if(isset($value['winner'][1] )){
            for($j = count($value['winner']) - 1 ; $j >= 0; $j--){
                if($value['winner'][$j] === $i){
                    $winner = true;
                    break;
                }
            }
        }
        //Wenn kein Array angehängt wurde.
        else{
            if($value['winner'] === $i){
                $winner = true;
                break;
            }
        }
    }
    if($winner === false) {
        echo $i . ", ";
    }
}

?>
</body>

