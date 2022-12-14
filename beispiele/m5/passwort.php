<?php

$salt = "dbwt";
$pass = "adminpass";

$password = sha1($salt.$pass);

echo $password;