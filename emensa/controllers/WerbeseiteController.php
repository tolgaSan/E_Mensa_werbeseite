<?php

require_once('../models/gericht.php');
require_once('../models/kategorie.php');
require_once('../models/allergen.php');


class WerbeseiteController{
    public function werbeseite(RequestData $rd){
        $link = connectdb();

        $allergen = db_allergen_select_all();
        $tabelle = db_gericht_preisintern_preisextern_allergen_werbeseite();
        $tabelleID = "SELECT id FROM gericht";
        $name = "";
        if(isset($_SESSION['email'])){
            $email = $_SESSION['email'];
            $sql = "SELECT name FROM benutzer WHERE email = '$email'";

            $name = mysqli_query($link, $sql);
        }

        $log = FrontController::logger();
        $log->info("Es wurde auf die Webseite zugegriffen!");

        return view('werbeseite', [
            'id' => $tabelleID,
            'gericht' => $tabelle,
            'preis_intern' => $tabelle,
            'preis_extern' => $tabelle,
            'allergen' => $allergen,
            'name' => $name
        ]);
    }

}