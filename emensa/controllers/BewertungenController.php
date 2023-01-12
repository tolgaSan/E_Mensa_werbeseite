<?php

    require_once($_SERVER['DOCUMENT_ROOT'].'/../models/bewertungen.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/../models/bewertung.php');

    class BewertungenController{

        public function index(RequestData $rd){

            $Reviews = getAll30NewestReviews();
            if(isset($_SESSION['name'])){
                $isAdmin = isAdmin($_SESSION['name']);
            }
            else {
                $isAdmin = 0;
            }

           return view('bewertungen' ,  [
               'liste' => $Reviews,
               'isAdmin' => $isAdmin
           ]);
        }

        public function meineBewertungen(RequestData $rd){

            $MyReviews = getAllReviewsAccount($_SESSION['name']);

            return view('meinebewertungen', [
                'myList' => $MyReviews
            ]);
        }

        public function rueckgaengig(){
            funcRueckgaengig($_POST['id']);

            header('Location: /bewertungen');
        }

        public function hervorheben(){
            funcHervorheben($_POST['id']);

            header('Location: /bewertungen');
        }
    }
