<?php

    require_once($_SERVER['DOCUMENT_ROOT'].'/../models/bewertungen.php');

    class BewertungenController{

        public function index(RequestData $rd){
            $tabelle = getAll30NewestReviews();

            $vars = [
                'tabelle' => $tabelle
            ];

           return view('bewertungen' ,  $vars);
        }

    }
