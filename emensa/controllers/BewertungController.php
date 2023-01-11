<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/gericht.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/kategorie.php');

class BewertungController {

    public function bewertung(RequestData $rd){



        $gericht = "Toll!";
        if(isset($_SESSION['login_ok']) && $_SESSION['login_ok']){
            return view('bewertung', ['$gericht' => $gericht]);
        }
        else {
            $msg = $_SESSION['login_result_message'] ?? null;

            return view('anmeldung', ['msg' => $msg]);
        }
    }
}
?>;