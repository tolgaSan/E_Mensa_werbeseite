<!DOCTYPE html>

<head>

    <meta charset="utf-8">
    <!-- style css und so -->
    <style>
    </style>
</head>

<body>
<div>
    <h3>Wie würden sie das folgende Gericht bewerten?</h3>
</div>

<form action ="/bewertung" method="POST">
    <fieldset>
        <legend>{{$gericht}}</legend>
        <select>
            <option selected name ="option" value="Sehr gut!">Sehr gut</option>
            <option value="Gut!">Gut</option>
            <option value="Okay">Okay</option>
            <option value="Schlecht">Schlecht</option>
        </select>
        <button type="submit">Abschicken!</button>
    </fieldset>
</form>
<div>
</div>
</body>

