<?php

function db_allergen_select_all(){
    $link = connectdb();
    $sql = "SELECT DISTINCT code, name FROM allergen ORDER BY code";
    $result = mysqli_query($link, $sql);
    $data = mysqli_fetch_all($result, MYSQLI_BOTH);

    mysqli_close($link);
    return $data;
}

