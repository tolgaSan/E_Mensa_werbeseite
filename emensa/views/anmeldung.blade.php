<!DOCTYPE html>

<head>

    <meta charset="utf-8">
    <!-- style css und so -->

</head>

<body>
<div>
    <h3>{{$msg}}</h3>
</div>
<form action="/anmeldung_verifizieren" method="post">
    <label for="email">E-Mail ADresse</label>
    <input type="email" id="email" name="email" required>
    <br>
    <label for="password">geheimer Passwort</label>
    <input type="password" id="password" name="password" required>
    <input type="submit" name="sent" value="Anmelden/Sign in">
</form>

</body>