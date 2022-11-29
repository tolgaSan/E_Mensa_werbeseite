@extends("layout")

@section("content")
    <header class="mt-5">
        <h1>Hauptseite E-Mensa</h1>
        <img src="./img/test.jpg"
             alt="Testbild von https://cdn.pixabay.com/photo/2014/06/03/19/38/road-sign-361513_960_720.jpg">
    </header>
    <nav class="mt-5">
        <strong>Navigation</strong>
        <ul>
            <li><a href="/demo/demo">Demo</a></li>
            <li><a href="/demo/dbconnect">Datenbank: Gerichte</a></li>
        </ul>
        <ul>
            <li><a href="/debug"><code class="language-php">phpinfo();</code></a></li>
        </ul>
    </nav>
    <footer>
        &copy; Team-Name DBWT
    </footer>
@endsection

@section("cssextra")
    <link rel="stylesheet" href="/css/default.min.css">
    <style>
        body > div {
            background-color: {{$rd->query['bgcolor'] ?? 'ffffff'}}
        }
    </style>
@endsection

@section("jsextra")
    <script src="/js/highlight.min.js"></script><script>hljs.highlightAll();</script>
@endsection