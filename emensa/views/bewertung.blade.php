<!DOCTYPE html>
<head>

    <meta charset="utf-8">
    <!-- style css und so -->
    <style>
        #field{
            width: 450px;
        }
        #BildBewertung{
            height: 100px;
            width: 100px;
            top:78px;
            left: 278px;
            object-fit: cover;
            position: relative;
        }
        @media (max-width: 600px){
            #test {
                background: black;
            }
            .umbruch::before{
                content: "\A";
                white-space: pre;
            }
        }

    </style>
</head>

<body>
<div>
    <h3>Wie würden sie das folgende Gericht bewerten?</h3>
</div>

<form action ="/bewertungAbschicken" method="POST">
    <fieldset id="field">
        <legend>{{$gericht}}</legend>
        <label for="selection">Wie hat ihr das Gericht geschmeckt?</label><span class="umbruch"></span>
        <select name="selection" id="selection">
            <option selected name ="option" value="Sehr gut">Sehr gut</option>
            <option value="Gut">Gut</option>
            <option value="Schlecht">Schlecht</option>
            <option value="Sehr schlecht">Sehr schlecht</option>
        </select><span class="umbruch"></span><span class="umbruch"></span>
        <label for="bemerkung">Haben sie noch irgendwelche Bemerkungen?</label><span class="umbruch"></span>
        <textarea name ="bemerkung" id="Bemerkung" minlength="5"></textarea>
        <input type="hidden" name ="gerichtID" value="<?php echo $_GET['id']; ?> "><span class="umbruch"></span><span class="umbruch"></span>
        <button type="submit">Abschicken!</button>
    </fieldset>
    <img id="BildBewertung" src="./img/gerichte/{{$gerichtBild['bildname']}}">
</form>
<div>
</div>
<div id="test">

</div>
</body>