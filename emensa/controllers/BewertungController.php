<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/gericht.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/kategorie.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/bewertung.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/anmeldung.php');
class BewertungController {

    public function index(RequestData $rd){

        if(isset($_GET['id'])){
            $gerichtID = $_GET['id'];
        }
        else{
            $gerichtID = 1;
        }

        $gericht = IdToGericht($gerichtID);
        $gerichtBild = GerichtToBild($gericht);
        if(isset($_SESSION['login_ok']) && $_SESSION['login_ok']){
            return view('bewertung', [
                    'gericht' => $gericht,
                    'gerichtBild' => $gerichtBild
            ]);
        }
        else {
            $msg = $_SESSION['login_result_message'] ?? null;
            $_SESSION['target'] = '/bewertung?id=1';

            header('Location: /anmeldung');
        }
    }

    public function bewertungAbschicken(RequestData $rd){

        $name = $_SESSION['name'];
        $select = $rd->query['selection'];
        $text = $rd->query['bemerkung'];
        $gerichtID = $rd->query['gerichtID'];
        $gericht = IdToGericht($gerichtID);
        $isAdmin = isAdmin($name);

        addBewertung($name, $isAdmin , $text , $gericht ,$select);

        header('Location: /werbeseite');
    }
}
?>;