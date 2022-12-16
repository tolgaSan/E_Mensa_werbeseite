<!DOCTYPE html>
<html lang="de">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>@yield('title')</title>
    <link type="text/css" rel="stylesheet" href="./css/style.css" />
</head>
<body>
<div id="header">
    <div id="logo"><img src="./img/mensa.png" alt="Mensa Logo" width="80" height="80"></div>
    <div id="menu">
        <ul id="reitermenu">
            <li><a href ="#ankuendigunganker">Ankündigung</a></li>
            <li><a href ="#koestlichkeitenanker">Speisen</a></li>
            <li><a href ="#zahlenanker">Zahlen</a></li>
            <li><a href ="#kontaktanker">Kontakt</a></li>
            <li><a href ="#wichtigfuerunsanker">Wichtig für uns</a></li>
        </ul>
    </div>
    <div id="irgendwas">
            <?php
                if(isset($_SESSION['login_ok'])){

                    if($_SESSION['login_ok'] == false){
                        echo "<a href='anmeldung' id='Anmeldung'>Anmelden</a>";
                    }else{
                        foreach($name as $nam) echo "Account : ".$nam['name']."<br><br>";
                        echo "<a href='/abmeldung' id='Anmeldung'> Abmelden/Signout </a>" ;

                    }
                }
                else echo "Anmelden</a>";
            ?>

    </div>
</div>
<div>
    @yield('content')
</div>
</body>
<hr>
<footer id="footercenter">
    <ul>
        <li>&copy;E-Mensa GmbH</li>
        <li>&lt;Kenny, Tolga&gt;</li>
        <li><a href="impressum">Impressum</a></li>
    </ul>
</footer>
</html>