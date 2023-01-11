<?php

function addBewertung($Name, $Admin , $Bemerkung , $Gericht, $Bewertung) : void {

    $link = connectdb();

    $Bemueberprueft = mysqli_real_escape_string($link, $Bemerkung);

    $sql="INSERT INTO bewertung(benutzerName, Admin, Gericht, Bewertung, Bemerkung, Datum) VALUES 
          ('$Name', $Admin, '$Gericht', '$Bewertung', '$Bemueberprueft', NOW())";

    $link->query($sql);
    $link->close();
}
function IdToGericht($gerichtID){
    $link = connectdb();

    $sql = "SELECT name From gericht g WHERE $gerichtID = g.id";

    $result = mysqli_query($link, $sql)->fetch_array();

    mysqli_close($link);
    return $result[0];
}
function GerichtToBild($gericht){
    $link = connectdb();

    $sql = "SELECT IFNULL(bildname, '00_image_missing.jpg') AS bildname FROM gericht g WHERE '$gericht' = g.name";
    $result = mysqli_query($link, $sql)->fetch_array();
    return $result;
}

function isAdmin($name){
    $link = connectdb();

    $sql = "SELECT admin FROM benutzer b WHERE b.name = 'Test'";
    $result = mysqli_query($link, $sql)->fetch_array();
    mysqli_close($link);
    return $result[0];
}