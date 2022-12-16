<?php

require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/anmeldung.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/password.php');

class AnmeldungController{

    public function anmeldung(RequestData $rd){
        $msg = $_SESSION['login_result_message'] ?? null;

        //db_user_einfuegen("admin@emensa.example", "123");

        return view('anmeldung', ['msg' => $msg]);
    }
    public function anmeldung_verifizieren(RequestData $rd){

        $link = connectdb();
        mysqli_begin_transaction($link);

        $userlogin = $rd->query['email'] ?? false;
        $password = $rd->query['password'] ?? false;

        if(isset($_POST['sent'])){
            $userlogin = $_POST['email'];
            $password = $_POST['password'];
        }

        $_SESSION['email'] = $_POST['email'];

        //db suche

        $find = db_user_suchen($userlogin, passwordHashen($password));
        $orgemdwas = mysqli_fetch_all($find, MYSQLI_ASSOC);

        $_SESSION['login_result_message'] = null;

        if($find != null){

            if(count($orgemdwas) != 0){

                $_SESSION['login_ok'] = true;
                $ersteId = $orgemdwas[0]['id'];

                mysqli_query($link, "call inkrementAnmeldung('$ersteId')");

                mysqli_query($link,"update benutzer set letzteanmeldung = NOW(),anzahlfehler = 0 WHERE email = '$userlogin'");
                $_SESSION['login_result_message'] = Null;
                mysqli_commit($link);

                $log = FrontController::logger();
                $log->info("Anmeldung! : " . $userlogin);

                header('Location: /werbeseite');
            }else{

                $_SESSION['login_result_message'] = 'Fehlerhaft. Bitte erneut eingeben';

                mysqli_query($link,"UPDATE benutzer SET anzahlfehler = anzahlfehler + 1, letzterfehler = NOW() WHERE email = '$userlogin'");
                $log = FrontController::logger();
                $log->warning("Anmeldung fehlgeschlagen!");
                mysqli_commit($link);

                header('Location: /anmeldung');
            }
        }
    }

    public function abmeldung() : void {

        $log = FrontController::logger();
        $log->info("Es wurde sich abgemeldet!");
        $_SESSION['login_ok'] = false;
        header('Location: /werbeseite');
    }
}