<?php


function passwordHashen($password){
    $salt = "dbwt";
    return sha1($salt.$password);
}