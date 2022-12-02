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
    <div id="irgendwas"> Rechter spalten </div>
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