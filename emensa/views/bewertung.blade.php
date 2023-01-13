<!DOCTYPE html>
<head>

    <meta charset="utf-8">
    <!-- style css und so -->
    <style>
        #field{
            width: 450px;
            height: 200px;
        }
        #BildBewertung{
            height: 100px;
            width: 100px;
            top:-205px;
            left: 370px;
            object-fit: cover;
            position: relative;
        }
        #submit{
            position: absolute;
            top: 40px;
            left:300px;
        }
        @media (max-width: 450px){
            .umbruch::before{
                content: "\A";
                white-space: pre;
            }
            #BildBewertung {
                height: 100px;
                width: 100px;
                top: -205px;
                left: 250px;
                object-fit: cover;
                position: relative;
            }
            #field{
                width: 330px;
                height: 200px;
            }
            #submit{
                position: absolute;
                top: 40px;
                left:300px;
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
        </select><span class="umbruch"></span><span class="umbruch"></span><br>
        <label for="bemerkung" id="LabelBemerkung">Haben sie noch irgendwelche Bemerkungen?</label><span class="umbruch"></span>
        <textarea name ="bemerkung" id="Bemerkung" minlength="5"></textarea>
        <input type="hidden" name ="gerichtID" value="<?php echo $_GET['id']; ?> "><span class="umbruch"></span><span class="umbruch"></span><br>
        <button type="submit">Abschicken!</button>
    </fieldset>
    <img id="BildBewertung" src="./img/gerichte/{{$gerichtBild['bildname']}}">
</form>
<div>
    <form action="/back" method="POST">
        <button type="submit" id="submit">Zurück!</button>
    </form>
</div>
</body>