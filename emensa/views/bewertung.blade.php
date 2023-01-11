<!DOCTYPE html>

<head>

    <meta charset="utf-8">
    <!-- style css und so -->
    <style>
        #field{
            width: 350px;
        }
    </style>
</head>

<body>
<div>
    <h3>Wie würden sie das folgende Gericht bewerten?</h3>
</div>

<form action ="/bewertung" method="POST">
    <fieldset id="field">
        <legend>{{$gericht}}</legend>
        <label for="selection">Wie hat ihr das Gericht geschmeckt?</label><br>
        <select name="selection" id="selection">
            <option selected name ="option" value="Sehr gut">Sehr gut</option>
            <option value="Gut">Gut</option>
            <option value="Schlecht">Schlecht</option>
            <option value="Sehr schlecht">Sehr schlecht</option>
        </select><br><br>
        <label for="Bemerkung">Haben sie noch irgendwelche Bemerkungen?</label><br>
        <textarea name ="Bemerkung" id="Bemerkung"></textarea>
        <input type="hidden" name ="GerichtID" value=/"<?php echo $_GET['id']; ?>/"><br><br>
        <button type="submit">Abschicken!</button>
    </fieldset>
</form>
<div>
</div>
</body>

