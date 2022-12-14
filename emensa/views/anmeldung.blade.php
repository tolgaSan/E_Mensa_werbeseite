<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Anmeldung Werbeseite</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div id="hauptcontainer">
    <h1>Sign in</h1>
    <form methode="post" action="/anmeldung_verifizieren">
        <label for="email">E-Mail</label>
        <input type="email" id="email" name="email" value="{{$email}}" required>
        <br>
        <label for="passwort">Ihr geheimes Passwort</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">sign in</button>
        <br>
        <input type="hidden" name="angemeldet" value="1">
    </form>
</div>
</body>


</html>