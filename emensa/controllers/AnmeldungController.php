<?php
require_once('../models/logins.php');
require_once('../models/anmeldung.php');

class AnmeldungController{

    public function anmeldung(RequestData $rd) {
        $login_ok[] = null;
        $result[] = null;
        if($_SESSION['login_ok'] == true){
            header('/');
        }
        else{
            $data = [
                'title' => 'Anmeldung',
                'email' => $_SESSION['email'],
                'result' => $_SESSION['result']

            ];
            return view('anmeldung', $data);
        }
    }

    public function anmeldung_verifizieren(RequestData $rd){

        //$username = $rd->query['email'] ?? false;
        //$password = $rd->query['password'] ?? false;
        $_SESSION['login_result_message'] = null;

        $_SESSION['email'] = htmlspecialchars(trim($_POST['email']));
        $password = trim($_POST['password']);
        $saltp = pwvalidierung($password);

        $loginStatus = anmeldung($_SESSION['email'], $saltp);
        if($loginStatus == 1){
            $target = $_SESSION['target'];
            $_SESSION['login_ok'] = true;
            header('/'.$target);
        }elseif ($loginStatus == 2){
            $_SESSION['login_ok'] = false;
            $_SESSION['loginStatus'] = "Login Informationen sind falsch, bitte überprüfen";
            header('/anmeldung');

        }else{
            //do nothing
        }
    }

}