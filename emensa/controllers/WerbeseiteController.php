<?php

require_once('../models/gericht.php');
require_once('../models/kategorie.php');
require_once('../models/allergen.php');


class WerbeseiteController{
    public function werbeseite(RequestData $rd){
        $link = connectdb();

        $allergen = db_allergen_select_all();
        $tabelle = db_gericht_preisintern_preisextern_allergen_werbeseite();

        $log = FrontController::logger();
        $log->info("Es wurde auf die Webseite zugegriffen!");

        return view('werbeseite', [
            'gericht' => $tabelle,
            'allergen' => $allergen,
        ]);
    }

}