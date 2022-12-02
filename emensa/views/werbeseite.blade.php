@extends('layout.standard')
@section('title')
    Ihre E-Mensa
@endsection
@section('content')
    <div>
        <link href ="../public/css/style.css" rel="stylesheet">
        <div id="box">
            <img  id="imageEssen" src="./img/Mensa.jpg">
            <h2 id="ankuendigunganker">Bald gibt es Essen auch online ;)</h2>
            <p class="pborder">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna
                aliqua. Quis hendrerit dolor magna eget est lorem. Condimentum
                mattis pellentesque id nibh. Morbi quis commodo odio aenean sed
                adipiscing diam donec. Condimentum mattis pellentesque id nibh
                tortor id aliquet lectus proin. Volutpat est velit egestas dui id
                ornare arcu. Ut lectus arcu bibendum at varius vel pharetra.
                Est sit amet facilisis magna etiam tempor orci. Duis at consectetur
                lorem donec massa sapien faucibus. Senectus et netus et malesuada
                fames ac turpis egestas. Tristique senectus et netus et malesuada fames.
                Maecenas sed enim ut sem viverra aliquet eget sit. Dui accumsan sit amet
                nulla facilisi morbi tempus iaculis. Proin fermentum leo vel orci porta non.
                Porttitor rhoncus dolor purus non. Sem fringilla ut morbi tincidunt augue interdum
                velit euismod in. Ut diam quam nulla porttitor massa id neque. Enim lobortis
                celerisque fermentum dui faucibus in. At varius vel pharetra vel turpis nunc
                eget lorem dolor. Feugiat vivamus at augue eget arcu dictum.
            </p>
            <h2 id="koestlichkeitenanker">Köstlichkeiten, die Sie erwarten</h2>
            <table id="GerichtAllergen" border ="1">
                <thead>
                    <th>Gericht</th>
                    <th>Preis intern</th>
                    <th>Preis extern</th>
                    <th>Allergen</th>
                </thead>
                <tbody>
                @foreach($gericht as $key)
                    <tr>
                        <td>{{$key['name']}}</td>
                        <td>{{number_format($key['preis_intern'],2)}}€</td>
                        <td>{{number_format($key['preis_extern'],2)}}€</td>
                        @if(isset($key['code']))
                        <td>{{$key['code']}}</td>
                        @else
                            <td></td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
            <h3 id="AllergenCodes">Folgende Allergencodes enthalten:</h3>
            <table id ="GerichtAllergen" border ="1">
                <thead>
                <tr>
                    <td>Code</td>
                    <td>Allergen</td>
                </tr>
                </thead>
                <tbody>
                @foreach($allergen as $key)
                    <tr>
                        <td>{{$key['code']}}</td>
                        <td>{{$key['name']}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <h2 id="wichtiganker">Das ist uns wichtig</h2>
            <ul id="wichtig">
                <li>Beste frische saisonale Zutaten</li>
                <li>Ausgewogene abwechslungsreiche Gerichte</li>
                <li>Sauberkeit</li>
            </ul>
            <h3>Wir freuen uns auf Ihren Besuch!</h3>
        </div>
    </div>
@endsection

