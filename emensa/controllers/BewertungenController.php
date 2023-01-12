<?php

    require_once($_SERVER['DOCUMENT_ROOT'].'/../models/bewertungen.php');
    require_once('../models/gericht.php');
    require_once('../models/kategorie.php');
    require_once('../models/allergen.php');
    require_once('../models/bewertungen.php');

    class BewertungenController{

        public function index(RequestData $rd){

            $Reviews = getAll30NewestReviews();

           return view('bewertungen' ,  [
               'liste' => $Reviews,
           ]);
        }
    }
