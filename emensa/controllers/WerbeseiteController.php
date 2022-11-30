<?php

require_once('../models/gericht.php');
require_once('../models/kategorie.php');
require_once('../models/allergen.php');

class WerbeseiteController{
    public function werbeseite(RequestData $rd){
        $gericht = db_gericht_select_all();
        $allergen = db_allergen_select_all();
        $tabelle = db_gericht_preisintern_preisextern_allergen();
        return view('werbeseite', [
            'gericht' => $tabelle,
            'preis_intern' => $tabelle,
            'preis_extern' => $tabelle,
            'allergen' => $allergen,
        ]);
    }

}