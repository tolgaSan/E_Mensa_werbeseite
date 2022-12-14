<?php

function anmeldung($email, $passwort){
    $link = connectdb();

    mysqli_begin_transaction($link);
    $stmt = mysqli_stmt_init($link);
    mysqli_stmt_prepare($stmt, "SELECT id FROM benutzer WHERE email=(?)");
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $loginStatus=null;
    $result = mysqli_stmt_get_result($stmt);
    $demail = mysqli_fetch_assoc($result);

    if($demail != null){
        mysqli_stmt_prepare($stmt, "SELECT id FROM benutzer WHERE email=(?)");
        mysqli_stmt_bind_param($stmt, 'ss', $password, $email);
        mysqli_stmt_execute($stmt);

        $result2 = mysqli_stmt_get_result($stmt);
        $login = mysqli_fetch_assoc($result2);

        if($login != null){
            login_ok($login['id']);
            $loginStatus = 1;
        }
        else
        {
            login_not_ok($demail['id']);
            $loginStatus = 2;
        }
    }
    mysqli_commit($link);
    return $loginStatus;
}

function login_ok($data){
    $link = connectdb();
    $date = date('d-M-Y H:i', time());
    mysqli_query($link, "UPDATE benutzer SET letzteanmeldung='{$date}' where id='{$data}'");

}

function login_not_ok($data){
    $link = connectdb();
    $date = date('d-M-Y H:i', time());
    mysqli_query($link, "UPDATE benutzer SET letzterfehler='{$date}' where id='{$data}'");
}

