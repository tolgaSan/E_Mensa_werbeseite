<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/gericht.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/kategorie.php');

class DemoController
{
    public function dbconnect() {
        $data = db_gericht_select_all();
        // Frage Daten aus kategorie ab:
        // $data = db_kategorie_select_all();
        return view('demo.dbdata', ['data' => $data]);
    }

    public function demo(RequestData $rd) {
        $vars = [
            'bgcolor' => $rd->query['bgcolor'] ?? 'ffffff',
            'name' => $rd->query['name'] ?? 'Dich',
            'rd' => $rd
        ];
        return view('demo.demo', $vars);
    }

    /**
     * error action for debug purposes
     * @throws Exception
     * @noinspection PhpUnusedLocalVariableInspection
     */
    public function error(RequestData $rd) {
        $test = $rd;
        throw new Exception("Not implemented");
    }

    public function requestdata(RequestData $rd) {
        return view('demo.requestdata', ['rd' => $rd]);
    }
}