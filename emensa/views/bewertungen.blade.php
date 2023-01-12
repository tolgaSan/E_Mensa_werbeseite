@extends('layout.payoutBemerkungen')
@section('title')
    Ihre E-Mensa
@endsection
@section('content')
    <div>
        <div id="box">
            <table border ="1" id="BewertungListe">
                <thead>
                <th>Benutzername</th>
                <th>Gericht</th>
                <th>Bewertung</th>
                <th>Bemerkung</th>
                <th>Datum</th>
                </thead>
                <tbody>
                @foreach($liste as $vars)
                    <tr>
                        <td>{{$vars['benutzerName']}}</td>
                        <td>{{$vars['Gericht']}}</td>
                        <td>{{$vars['Bewertung']}}</td>
                        <td>{{$vars['Bemerkung']}}</td>
                        <td>{{$vars['Datum']}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection