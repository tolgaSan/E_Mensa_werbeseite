<?php

require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/anmeldung.php');

class AnmeldungController{

    public function anmeldung(RequestData $rd){
        $msg = $_SESSION['login_result_message'] ?? null;

        //db_user_einfuegen("admin@emensa.example", "123");

        return view('anmeldung', ['msg' => $msg]);
    }
    public function anmeldung_verifizieren(RequestData $rd){

        $userlogin = $rd->query['email'] ?? false;
        $password = $rd->query['passwort'] ?? false;
        if(isset($_POST['sent'])){
            $userlogin = $_POST['email'];
            $password = $_POST['passwort'];
        }
        //db suche
        $find = db_user_suchen($userlogin, $password);
        $_SESSION['login_result_message'] = null;
        if($find){
            $_SESSION['login_ok'] = true;
            db_anmeldung_anzahlanmeldungen($userlogin);
            $_SESSION['login_result_message'] = 'Profil: '.$userlogin;
            $target = 'werbeseite';
            header('Location: /werbeseite');
        }else{
            $_SESSION['login_result_message'] = 'Benutzer oder Passwort falsch. Bitte erneut eingeben';
            header('Location: /anmeldung');
        }
    }
}