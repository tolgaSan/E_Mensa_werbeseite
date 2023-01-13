<?php
/**
 * Mapping of paths to controllers.
 * Note, that the path only supports one level of directory depth:
 *     /demo is ok,
 *     /demo/subpage will not work as expected
 */

return array(
    '/'             => "HomeController@index",
    "/demo"         => "DemoController@demo",
    '/dbconnect'    => 'DemoController@dbconnect',
    '/debug'        => 'HomeController@debug',
    '/error'        => 'DemoController@error',
    '/requestdata'   => 'DemoController@requestdata',

    // Erstes Beispiel:
    '/m4_7a_queryparameter' => 'ExamplesController@m4_7a_queryparameter',
    '/m4_7b_kategorie' => 'ExamplesController@m4_7b_kategorie',
    '/m4_7c_gerichte' => 'ExamplesController@m4_7c_gerichte',
    '/m4_7d_layout' => 'ExamplesController@m4_7d_layout',

    '/werbeseite' => 'WerbeseiteController@werbeseite',

    '/bewertung ' => 'BewertungController@bewertung',
    '/bewertungAbschicken' => 'BewertungController@bewertungAbschicken',

    '/bewertungen' => 'BewertungenController@index',
    '/meinebewertungen' => 'BewertungenController@meineBewertungen',
    '/bewertungenRueckgaengig' => 'BewertungenController@rueckgaengig',
    '/bewertungenHervorheben' => 'BewertungenController@hervorheben',
    '/back' => 'WerbeseiteController@back',

    '/anmeldung' => 'AnmeldungController@anmeldung',
    '/anmeldung_verifizieren' => 'AnmeldungController@anmeldung_verifizieren',
    '/abmeldung' => 'AnmeldungController@abmeldung'

);