<?php

function db_logins_add($benutzer, $passwort){
    $link = connectdb();

    mysqli_begin_transaction($link);

    $passwort = mysqli_real_escape_string($link,$passwort);
    //$benutzer ist immer email
    $benutzer = mysqli_real_escape_string($link, $benutzer);

    $salt = "dbwt";
    $password = mysqli_real_escape_string($link, sha1($salt.$passwort));

    $sql = "INSERT INTO benutzer(email, passwort, admin) VALUES('$benutzer','$password', 0)";

    $result = mysqli_query($link,$sql);
    mysqli_free_result($result);
    mysqli_commit($link);
    mysqli_close($link);

}

function db_logins_add_admin($benutzer, $passwort){
    $link = connectdb();

    mysqli_begin_transaction($link);

    $passwort = mysqli_real_escape_string($link,$passwort);
    //$benutzer ist immer email
    $benutzer = mysqli_real_escape_string($link, $benutzer);

    $salt = "dbwt";
    $password = mysqli_real_escape_string($link, sha1($salt.$passwort));

    $sql = "INSERT INTO benutzer(email, passwort, admin) VALUES('$benutzer','$password', 1)";

    $result = mysqli_query($link,$sql);
    mysqli_free_result($result);
    mysqli_commit($link);
    mysqli_close($link);

}

function pwvalidierung($passwort){
    $salt = 'dbwt';
    return sha1($salt.$passwort);
}


?>