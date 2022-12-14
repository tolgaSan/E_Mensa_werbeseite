<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/kategorie.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/gericht.php');


class ExamplesController
{
    public function m4_7a_queryparameter(RequestData $rd) {
        return view('examples.m4_7a_queryparameter', [
            'request'=>$rd,
            'name' => 'Tolga',
            'url' => 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"
        ]);
    }

    public function m4_7b_kategorie(RequestData $rd){
        $kategorie = db_kategorie_select_all();
        return view('examples.m4_7b_kategorie', [
            'kategorie' => $kategorie
        ]);
    }

    public function m4_7c_gerichte(RequestData $rd){
        $gericht = db_gericht_preisintern_preisextern();
        return view('examples.m4_7c_gerichte',[
            'gericht' => $gericht
        ]);
    }

    public function m4_7d_layout(RequestData $rd){
        $var = ['no' => $rd->query['no'] ?? 1];
        return view('examples.pages.m4_7d_page_'.$var['no'], $var);
    }
}