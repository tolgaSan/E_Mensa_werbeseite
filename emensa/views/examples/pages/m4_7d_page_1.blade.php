@extends('layout.m4_7d_layout')
@section('title')
    <title>Erste Seite</title>
@endsection

@section('header')
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <title>Ihre E-Mensa</title>
        <link type="text/css" rel="stylesheet" href="E_Mensa_werbeseite\werbeseite\style.css" />
    </head>
    <body>
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
@endsection
@section('main')
    <div>
        <h3>Dies ist die erste Seite und das ist die Main Section</h3>
    </div>
@endsection
@section('footer')
    <div>
        <h4>Footer bereich. Hier sollte Impressum, Copryright und sonstiges stehen.</h4>
    </div>
@endsection