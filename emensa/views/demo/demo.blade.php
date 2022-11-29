@extends("layout")

@section("content")
    <div>
        <h1>Demo für {{ $name }}</h1>
        <p>Kurze Übersicht, wie die Arbeit mit dem Router und der Blade View-Engine funktioniert.</p>

        <h2>Router</h2>
        <p>Der Router nimmt den Request entgegen und zerlegt ihn in die einzelnen Teile der URI. Wichtig ist hier vor
            allem der Pfad und der Querystring.</p>
        <p>Wenn der Pfad in der Routenkonfiguration (<code>\$config</code> Array aus der Datei
            <code>routes/web.php</code>) gefunden wird, lädt der Router die angegebene Klasse.</p>

        <h3>Funktionsweise</h3>
        <p>Im vorliegenden Beispiel sehen Sie diese Seite ... </p>
        <ol>
            <li>weil der Pfad in der Routenkonfiguration gefunden wurde</li>
            <li>und dort <span class="code">'DemoController@howto'</span> hinterlegt ist</li>
            <li>und im Ordner <span class="code">controllers/</span> die Datei <code class="language-php">DemoController.php</code> gefunden werden konnte
            </li>
            <li>und mit ihr ein Objekt des Typs <span class="code">DemoController</span> instanziiert werden konnte</li>
            <li>und dieses Objekt die Funktion (Action) <span class="code">howto()</span> ausgeführt hat</li>
        </ol>
        <p>Sie sehen: da muss einiges stimmen und vieles davon ist Konvention.</p>
        <h3>Querystrings und Pfadsegmente</h3>
        <p>Die Actions in den Controller-Klassen sollen per Konvention immer ein <span class="code">RequestData</span> Objekt
            entgegennehmen. Beispiel: <code class="language-php">howto(RequestData \$rd)</code></p>
        <p>Dieses RequestData Objekt wird durch den Router befüllt, wenn Daten in der URL extrahiert werden konnten.</p>
        <p>Daten finden sich URLs...</p>

        <ul>
            <li>
                <p>
                    <strong>im Querystring</strong><br>Beispiel: rufen Sie diese mit
                <code class="language-http">{{strtolower(explode('/',$_SERVER["SERVER_PROTOCOL"])[0])}}://{{$_SERVER["HTTP_HOST"]}}/demo?<strong>bgcolor=fefbd8&name=Remmy</strong></code>
            auf, werden <span class="code">bgcolor</span> und <code class="language-php">name</code> mitsamt Werten als Query Array
            <code class="language-php">$rd->query</code>) übergeben
                </p>
            </li>
        </ul>

        <p>Probieren Sie es aus ;)</p>
        @if(count($rd->args))
            <p><strong>Argumente dieses Aufrufs:</strong></p>

            @forelse($rd->args as $a)
                <div><span class="code">{{$a}}</span></div>
            @empty
                <p>Keine weiteren Argumente im Request</p>
            @endforelse
        @endif
        @if(count($rd->query))
            <p><strong>Daten aus der Query dieses Aufrufs:</strong></p>
            <pre><code class="language-php">
            @forelse($rd->query as $k => $v)
               $rd->query['{{$k}}']={{$v}}
            @empty
                <p>Keine Querydaten</p>
            @endforelse
            </code></pre>
        @endif
        <h2>Blade</h2>
        <p>Blade <a href="https://github.com/EFTEC/BladeOne#install-pick-one-of-the-next-one">muss installiert</a> sein.
            Die Installation ist bereits geschehen und die Bibliothek liegt unter /vendor.
        </p>
        <h3>Daten übergeben und View rendern</h3>
        <p>Bei der Verwendung der View-Engine gelten einige Konventionen:
            Die Dateien müssen <code class="language-php">&lt;viewname&gt;.blade.php</code> heißen und im Ordner <code class="language-php">views</code> liegen.
        </p>
        <p>Sie können der View dann Daten mitgeben, indem Sie alle Daten in ein Array schreiben und dieses dann
            übergeben.</p>
        <p>Beispiel:</p>
        <pre><code class="language-php">
 view("viewtest",
    array(
        "texts"=>$textArray,
        "persona"=>$persona,
        "rd"=>$rd
    )); // öffnet ../views/viewtest.blade.php
            </code></pre>
    </div>
@endsection

@section("cssextra")
    <link rel="stylesheet" href="/css/default.min.css">
    <style>
        body > div {background-color: {{ '#' . $bgcolor }}; }
    </style>
@endsection

@section("jsextra")
    <script src="/js/highlight.min.js"></script><script>hljs.highlightAll();</script>
@endsection