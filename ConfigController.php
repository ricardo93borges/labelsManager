<?php

require_once('Controller.php');

class ConfigController extends Controller
{

    /**
     * ConfigController constructor.
     */
    public function __construct()
    {
    }

    public function get(){

    }

    public function getAll(){
        $content = file_get_contents("config.json");
        die($content);
    }
}

$controller = new ConfigController();