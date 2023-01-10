<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/gericht.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/kategorie.php');

class BewertungController {

    public function Bewertung(RequestData $rd){
        $gericht = "Toll!";
        if(isset($_SESSION['login_ok']) && $_SESSION['login_ok']){
            return view('bewertung', ['$gericht' => $gericht]);
        }
        else {
         header('/anmeldung');
        }
    }
}
?>;