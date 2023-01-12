<?php
    function getAll30NewestReviews(){
        $link = connectdb();

        $sql = "SELECT bewertungID ,benutzerName, Gericht, Bewertung, Bemerkung, Datum, hervorheben FROM bewertung
                ORDER BY Datum DESC LIMIT 30";
        $result = mysqli_query($link, $sql);
        $data = mysqli_fetch_all($result, MYSQLI_BOTH);

        mysqli_close($link);
        return $data;
    }

    function getAllReviewsAccount($name){
        $link = connectdb();

        $sql = "SELECT benutzerName, Gericht, Bewertung, Bemerkung, Datum FROM bewertung b WHERE '$name' = b.benutzerName
                ORDER BY Datum DESC";
        $result = mysqli_query($link, $sql);
        $data = mysqli_fetch_all($result, MYSQLI_BOTH);

        mysqli_close($link);
        return $data;
    }

    function deleteAllReviewsAccount($name) : void{
        $link = connectdb();

        $sql = "DELETE FROM bewertung WHERE '$name' = benutzerName";
        mysqli_query($link, $sql);

        header('Location: /bewertungen');
    }

    function funcHervorheben($id){
        $link = connectdb();

        $sql = "UPDATE bewertung SET hervorheben = 1 WHERE '$id' = bewertungID";
        mysqli_query($link, $sql);

        header('Location: /bewertungen');
    }

    function funcrueckgaengig($id){
        $link = connectdb();

        $sql = "UPDATE bewertung SET hervorheben = 0 WHERE '$id' = bewertungID";
        mysqli_query($link, $sql);

        header('Location: /bewertungen');
    }
