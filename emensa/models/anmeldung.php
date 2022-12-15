<?php

//include 'C:\Users\TolgaSanli\PhpstormProjects\E_Mensa_werbeseite\beispiele\password.php';
include 'C:\Users\KVRoh\Repositories\E_Mensa_werbeseite\beispiele\password.php';

function db_user_einfuegen($user,$password){

    $link = connectdb();
    mysqli_begin_transaction($link);

    $user = mysqli_real_escape_string($link, $user);
    $password = mysqli_real_escape_string($link, $password);
    $salt = "dbwt";
    $passwortHash = mysqli_real_escape_string($link, passwordHashen($password));
    //$adminRechte = $admin;

    $sql = "INSERT INTO benutzer(email, passwort) VALUES ('$user', '$passwortHash')";


    $result = mysqli_query($link, $sql);
    mysqli_free_result($result);
    mysqli_commit($link);
    mysqli_close($link);

}


function db_user_suchen($user, $password)
{

    $link = connectdb();
    mysqli_begin_transaction($link);
    $passwordmres = mysqli_real_escape_string($link, $password);
    $usermres = mysqli_real_escape_string($link, $user);

    $salt = "dbwt";
    $passwordHashed = passwordHashen($salt . $password);

    $sql = "SELECT EXISTS (SELECT email, passwort FROM benutzer WHERE email = '$usermres' AND passwort = '$passwordHashed')";

    $result = mysqli_query($link, $sql)->fetch_array();

    mysqli_commit($link);
    mysqli_close($link);

    if ($result[0] == 1) {
        header("Location: /werbeseite");
    } else {
        header("Location: /werbeseite");
    }
}

function db_anmeldung_anzahlanmeldungen($user){
    $link = connectdb();

    mysqli_begin_transaction($link);

    $sql = "SELECT email FROM benutzer WHERE email = '$user'";

    $result = mysqli_query($link, $sql);

    $date = date("d-M-Y H:i");

    $sql2 = "UPDATE benutzer SET anzahlanmeldungen = anzahlanmeldungen+1 WHERE email = '$user'";
    $sql3 = "UPDATE benutzer SET letzteanmeldung = '$date' WHERE email = '$user'";

    $result2 = mysqli_query($link, $sql2);
    $result3 = mysqli_query($link, $sql3);

    mysqli_free_result($result);
    mysqli_commit($link);
    mysqli_close($link);
}













?>