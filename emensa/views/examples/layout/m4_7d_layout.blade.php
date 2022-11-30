<!DOCTYPE html>
<html lang="de">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>@yield('title')</title>
</head>
<body>
@section('header')
    <div id="header">
        <div id="logo"><img src="img/mensa.png" alt="Mensa Logo" width="80" height="80"></div>
        <div id="menu">
            <ul id="reitermenu">
                <li><a href ="#ankuendigunganker">Ankündigung</a></li>
                <li><a href ="#koestlichkeitenanker">Speisen</a></li>
                <li><a href ="#zahlenanker">Zahlen</a></li>
                <li><a href ="#kontaktanker">Kontakt</a></li>
                <li><a href ="#wichtigfuerunsanker">Wichtig für uns</a></li>
            </ul>
        </div>
        <div id="irgendwas"> irgendwas </div>
    </div>
    @show
    @section('main')
        <div>
            <h3>Dies ist die erste Seite und das ist die Main Section</h3>
        </div>
    @show
    @section('footer')
        <div>
            <h4>Footer bereich. Hier sollte Impressum, Copryright und sonstiges stehen.</h4>
        </div>
    @show
</body>
</html>

