<?php

function addBewertung($Gericht, $Bewertung){
    $sql="INSERT INTO Bewertung()";

}
function IdToGericht(){
    $link = connectdb();
    $gerichtID = $_GET['id'];
    $sql = "SELECT name From gericht g WHERE $gerichtID = g.id";

    $result = mysqli_query($link, $sql);
    $data = mysqli_fetch_all($result, MYSQLI_BOTH);

    mysqli_close($link);
    return $data;
}