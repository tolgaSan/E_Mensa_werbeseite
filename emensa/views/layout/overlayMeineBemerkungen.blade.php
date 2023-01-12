<!DOCTYPE html>
<html lang="de">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>@yield('title')</title>
    <link type="text/css" rel="stylesheet" href="./css/stylebewertung.css" />
</head>
<body>
<div id="header">
    <div id="logo"><img src="./img/mensa.png" alt="Mensa Logo" width="80" height="80"></div>
    <div id="menu">
        <ul id="reitermenu">
            <li>Hier sind ihre letzten Bewertungen!</li>
        </ul>
    </div>
    <div id="irgendwas">
        <?php
            if(isset($_SESSION['login_ok'])){

                if($_SESSION['login_ok'] == false){
                    echo "<a href='anmeldung' id='Anmeldung'>Anmelden</a>";
                }else{
                    echo "Account : " . $_SESSION['name']."<br><br>";
                    echo "<a href='/abmeldung' id='Anmeldung'> Abmelden/Signout </a>" ;

                }
            }
            else echo "<a href='anmeldung' id='Anmeldung'>Anmelden</a>";
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
