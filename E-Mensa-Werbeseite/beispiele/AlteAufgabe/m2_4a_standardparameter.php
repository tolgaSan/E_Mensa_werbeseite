<!--
- Praktikum DBWT. Autoren:
- Kenny, Rohlf, 3517996
- Tolga, Sanli, 3236111
-->
<?php

function addition(int $x , int $y = 0){
    return $x + $y;
}

$x = 5;
$y = 95;

echo "Wert X : ". $x ."<br>";
echo "Wert Y : ". $y ."<br>";
echo "Ergebnis : ".addition($x , $y)."<br>";
echo "Das Ergebnis bei Übergabe von 1 Parameter X : " . addition($x). "<br><br>";
