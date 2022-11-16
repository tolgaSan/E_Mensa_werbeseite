<!--
- Praktikum DBWT. Autoren:
- Kenny, Rohlf, 3517996
- Tolga, Sanli, 3236111
-->
<?php
const GET_PARAM_MIN_STARS = 'search_min_stars';
const GET_PARAM_SEARCH_TEXT = 'search_text';
const GET_PARAM_SHOW_DESCR = 'show_description';
const GET_PARAM_LANGUAGE = 'sprache';
const GET_PARAM_TOP = 'top';
const GET_PARAM_FLOPP = 'flopp';



/**
 * List of all allergens.
 */
$allergens = [
    11 => 'Gluten',
    12 => 'Krebstiere',
    13 => 'Eier',
    14 => 'Fisch',
    17 => 'Milch'
];

$meal = [
    'name' => 'Süßkartoffeltaschen mit Frischkäse und Kräutern gefüllt',
    'description' => 'Die Süßkartoffeln werden vorsichtig aufgeschnitten und der Frischkäse eingefüllt.',
    'price_intern' => 2.90,
    'price_extern' => 3.90,
    'allergens' => [11, 13],
    'amount' => 42             // Number of available meals
];

$ratings = [
    [   'text' => 'Die Kartoffel ist einfach klasse. Nur die Fischstäbchen schmecken nach Käse. ',
        'author' => 'Ute U.',
        'stars' => 2 ],
    [   'text' => 'Sehr gut. Immer wieder gerne',
        'author' => 'Gustav G.',
        'stars' => 4 ],
    [   'text' => 'Der Klassiker für den Wochenstart. Frisch wie immer',
        'author' => 'Renate R.',
        'stars' => 4 ],
    [   'text' => 'Kartoffel ist gut. Das Grüne ist mir suspekt.',
        'author' => 'Marta M.',
        'stars' => 3 ]
];

$showRatings = [];
//Aufgabe 3 4) c) strpos() zu stripos geändert, so werden die klein und großbuchstaben ignoriert
if (!empty($_GET[GET_PARAM_SEARCH_TEXT])) {
    $searchTerm = $_GET[GET_PARAM_SEARCH_TEXT];
    foreach ($ratings as $rating) {
        if (stripos($rating['text'], $searchTerm) !== false) {
            $showRatings[] = $rating;
        }
    }
} else if (!empty($_GET[GET_PARAM_MIN_STARS])) {
    $minStars = $_GET[GET_PARAM_MIN_STARS];
    foreach ($ratings as $rating) {
        if ($rating['stars'] >= $minStars) {
            $showRatings[] = $rating;
        }
    }
}else if (!empty($_GET[GET_PARAM_TOP])) {
    $z = 0;
    $subTop = [];
    foreach ($ratings as $rating) {
        $subTop[$z] = $rating['stars'];
        $z++;
    }
    $max = max($subTop);

    foreach ($ratings as $rating) {
        if ($rating['stars'] == $max) {
            $showRatings[] = $rating;
        }
    }
} else if (!empty($_GET[GET_PARAM_FLOPP])) {
    $z = 0;
    $subFlopp = [];
    foreach ($ratings as $rating) {
        $subFlopp[$z] = $rating['stars'];
        $z++;
    }
    $min = min($subFlopp);

    foreach ($ratings as $rating) {
        if ($rating['stars'] == $min) {
            $showRatings[] = $rating;
        }
    }
} else {
    $showRatings = $ratings;
}

function calcMeanStars(array $ratings) : float {
    $sum = 0;
    foreach ($ratings as $rating) {
        $sum += $rating['stars'];
    }
    return $sum / count($ratings);
}

/*
function topRatings(array $ratings){
        $topStars = $_GET(GET_PARAM_TOP);
        foreach($ratings as $rating){
            foreach ($rating as $key){
                if($key == $ratings['stars']){
                    $topStars = $ratings[$key];
                    echo $topStars;
                }
            }
        }
*/


$de = ['Gericht', 'Bewertungen', 'suchen' ,'Beschreibungen', 'Text', 'Sterne', 'Autor','Preis', 'Allergene'];
$en = ['meal', 'ratings', 'search','description', 'text', 'stars', 'author','price','allergens'];
$aktuelleSprache = $de;

if(!empty($_GET['sprache'])){
    if($_GET['sprache'] == 'EN'){
        $aktuelleSprache = $en;
    }else{
        $aktuelleSprache = $de;
    }
}
/*
$file = fopen('./en.txt', 'r');
if (!$file) {
    die('Öffnen fehlgeschlagen');
}
foreach($txts as $key => $txt) {
    $line = "$key;$txt\n";
    echo $line.'<br>';
}
fclose($file);
*/
/*
function englishactive(){
    $txts = [
        'Gericht' => 'meal',
        'Bewertungen' => 'ratings',
        'suchen' => 'search',
        'Beschreibung Ein/Aus' => 'Description on/off',
        'Text' => 'text',
        'Sterne' => 'stars',
        'Autor' => 'author'
    ];
}
function deutschactive(){
    $txts = [
        'meal' => 'Gericht',
        'ratings' => 'Bewertungen',
        'search' => 'suchen',
        'Description on/off' => 'Beschreibung Ein/Aus',
        'text' => 'Text',
        'stars' => 'Sterne',
        'author' => 'Autor'
    ];

*/
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8"/>
    <title>Gericht: <?php echo $meal['name']; ?></title>
    <style>
        * {
            font-family: Arial, serif;
        }
        .rating {
            color: darkgray;
        }
    </style>
</head>
<body>
<a href="meal.php?sprache=DE">Deutsch</a>
<a href="meal.php?sprache=EN">Englisch</a>
<form method="post">

    <input type="submit" name="englishbutton" class="button" value="English" />

    <input type="submit" name="deutschbutton" class="button" value="Deutsch" />
</form>
<h1><?php echo $aktuelleSprache[0]?>: <?php echo $meal['name']; ?></h1>
<!-- $_GET Param geändert -->
<form>
    <label for="show_description"></label>
    <input id="show_description" type="checkbox" name="show_description" value="1">
    <input type="submit" value="<?php echo $aktuelleSprache[3]?>">
</form>
<p><?php
    if(!empty($_GET[GET_PARAM_SHOW_DESCR])){
        $description = $_GET[GET_PARAM_SHOW_DESCR];
        if($description == 1){
            echo $meal['description'];
        }else if($description == 0){
            echo "Beschreibung wird nicht angezeigt.";
        }
    }
    ?>
</p>
<p> <?php
    echo $aktuelleSprache[7]." Intern: ".number_format($meal['price_intern'],2)."&#8364"."<br>";
    echo $aktuelleSprache[7]." Extern: ".number_format($meal['price_extern'],2)."&#8364"."<br>";
    ?></p>
<!-- Wurde ersetzt von Aufg. 3) 4) e) -->
<!-- <p><?php echo $aktuelleSprache[3]; ?></p>-->
<p><?php  ?></p>
<ul><?php echo $aktuelleSprache[8]?>:<br>
    <?php
    //Die allgerne mittels ungeordneter Liste darstellen. Hierfür
    //einfach mittels for schleife abfragen, ob es zum Array allergens aus $meal gehört
    //dann die werte vom $meal['allergens'] (was 11 und 13 sind) in $allergens array einsetzen und ausgeben
    for($i = 0; $i < count($meal['allergens']);$i++){
        if($meal['allergens']){
            echo "<li>".$allergens[$meal['allergens'][$i]]."</li>";
        }
    }
    ?>
</ul>
<h1><?php echo $aktuelleSprache[1]?> (Insgesamt: <?php echo calcMeanStars($ratings); ?>)</h1>

<form method="get">
    <label for="search_text">Filter:</label>
    <input id="search_text" type="text" name="search_text" placeholder="<?php if(isset($_GET[GET_PARAM_SEARCH_TEXT])) { echo $_GET[GET_PARAM_SEARCH_TEXT]; }?>">
    <input type="submit" value="<?php echo $aktuelleSprache[2] ?>">
    <input id="top" type="submit" name="top" value="top">
    <?php


    ?>
    <input id="flopp" type="submit" name="flopp" value="flopp">
    <?php

    ?>
</form>
<table class="rating">
    <thead>
    <tr>
        <td><?php echo $aktuelleSprache[4]?></td>
        <td><?php echo $aktuelleSprache[5]?></td>
        <td><?php echo $aktuelleSprache[6]?>:</td>
    </tr>
    </thead>
    <tbody>
    <?php

    /* if(($_GET[GET_PARAM_FLOPP])){
        arsort($showRatings);

    }*/
    foreach ($showRatings as $rating) {
        echo "<tr><td class='rating_text'>{$rating['text']}</td>
                              <td class='rating_stars'>{$rating['stars']}</td>
                              <!--Die werte aus dem 'author' ausgeben für Ratings-->
                              <td class='rating_author'>{$rating['author']}</td>
                          </tr>";
    }
    ?>

    </tbody>
</table>
<br>

</body>
</html>