<?php
    function getAll30NewestReviews(){
        $link = connectdb();

        $sql = "SELECT benutzerName, Gericht, Bewertung, Bemerkung, Datum FROM bewertung
                ORDER BY Datum DESC LIMIT 30";
        $result = mysqli_query($link, $sql);
        $data = mysqli_fetch_all($result, MYSQLI_BOTH);

        mysqli_close($link);
        return $data;
    }