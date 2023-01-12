@extends('layout.Overlaybemerkungen')
@section('title')
    Ihre E-Mensa
@endsection
@section('content')
    <div>
        <div id="box">
            <table border="1" id="BewertungListe">
                <thead>
                <th>Benutzername</th>
                <th>Gericht</th>
                <th>Bewertung</th>
                <th>Bemerkung</th>
                <th>Datum</th>
                @if($isAdmin == 1)
                    <th>Hervorheben</th>
                @endif
                </thead>
                <tbody>
                @foreach($liste as $vars)
                    @if($vars['hervorheben'] == 1)
                        <tr id="hervorheben">
                            <td>{{$vars['benutzerName']}}</td>
                            <td>{{$vars['Gericht']}}</td>
                            <td>{{$vars['Bewertung']}}</td>
                            <td>{{$vars['Bemerkung']}}</td>
                            <td>{{$vars['Datum']}}</td>
                            @if($isAdmin == 1)
                                <td><form action="/bewertungenRueckgaengig" method="POST">
                                    <input type="hidden" id="id" name="id" value="{{$vars['bewertungID']}}" >
                                    <input type="submit" name="rückgängigButton" value="rückgängig">
                                    </form></td>
                            @endif
                        </tr>
                    @endif
                    @if($vars['hervorheben'] != 1)
                        <tr>
                            <td>{{$vars['benutzerName']}}</td>
                            <td>{{$vars['Gericht']}}</td>
                            <td>{{$vars['Bewertung']}}</td>
                            <td>{{$vars['Bemerkung']}}</td>
                            <td>{{$vars['Datum']}}</td>
                            @if($isAdmin == 1)
                                <td><form action="/bewertungenHervorheben" method="POST">
                                        <input type="hidden" id="id" name="id" value="{{$vars['bewertungID']}}" >
                                        <input type="submit" name="hervorhebenButton" value="hervorheben">
                                    </form></td>
                        </tr>
                        @endif
                    @endif
                @endforeach
                </tbody>
            </table>
            @if(isset($_SESSION['login_ok']) && $_SESSION['login_ok'])
            <a href="?function=1" id="löschen" onclick="confirm('Wollen sie ihre Bewertungen wirklich löschen?')" >Wollen sie ihre Bewertungen löschen?</a>
            @endif
        </div>
    </div>
@endsection

<?php
    if(isset($_GET['function'])){
        deleteAllReviewsAccount($_SESSION['name']);
    }
?>