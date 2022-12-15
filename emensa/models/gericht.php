<?php
/**
 * Diese Datei enthält alle SQL Statements für die Tabelle "gerichte"
 */
function db_gericht_select_all() {
    try {
        $link = connectdb();

        $sql = 'SELECT id, name, beschreibung FROM gericht ORDER BY name';
        $result = mysqli_query($link, $sql);

        $data = mysqli_fetch_all($result, MYSQLI_BOTH);

        mysqli_close($link);
    }
    catch (Exception $ex) {
        $data = array(
            'id'=>'-1',
            'error'=>true,
            'name' => 'Datenbankfehler '.$ex->getCode(),
            'beschreibung' => $ex->getMessage());
    }
    finally {
        return $data;
    }

}
    function db_gericht_preisintern_preisextern(){
        $link = connectdb();
        $sql = "SELECT name, preis_intern FROM gericht WHERE preis_intern > 2 ORDER BY name ASC";
        $result = mysqli_query($link, $sql);
        $data = mysqli_fetch_all($result, MYSQLI_BOTH);

        mysqli_close($link);
        return $data;
    }

function db_gericht_preisintern_preisextern_allergen_werbeseite(){
    $link = connectdb();
    $sql = "SELECT DISTINCT IFNULL(bildname,'00_image_missing.jpg') AS bildname, name, preis_intern, preis_extern,
            GROUP_CONCAT(code) AS code FROM gericht g LEFT JOIN gericht_hat_allergen a
            ON g.id = a.gericht_id GROUP BY name ASC LIMIT 5;";
    $result = mysqli_query($link, $sql);
    $data = mysqli_fetch_all($result, MYSQLI_BOTH);

    mysqli_close($link);
    return $data;
}

