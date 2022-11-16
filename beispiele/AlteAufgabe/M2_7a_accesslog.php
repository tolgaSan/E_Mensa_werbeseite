<!--
- Praktikum DBWT. Autoren:
- Kenny, Rohlf, 3517996
- Tolga, Sanli, 3236111
-->
<?php
$file = fopen('accesslog.txt', 'a');

if(!$file){
    die("Die Datei konnte nicht geöffnet werden!");
}

//Daten vom Nutzer werden gesammelt.
$WebserverVersion = $_SERVER['HTTP_USER_AGENT'];
$WebserverAdress = $_SERVER["REMOTE_ADDR"];
$uhrZeit = time();

// Format hier anschaulich : https://www.php-einfach.de/php-tutorial/php-datum-uhrzeit/#:~:text=Mit%20dem%20Befehl%20time(),(%24format%2C%20%24timestamp)%20.
$datum = date("d.m.Y - G:i" , $uhrZeit);

//Daten werden in die txt Datei geschrieben.
fwrite($file, "Version : ".$WebserverVersion . "\n");
fwrite($file, "IP-Adresse : " . $WebserverAdress . "\n");
fwrite($file, "Datum : " . $datum . "\n" . "\n");

fclose($file);
