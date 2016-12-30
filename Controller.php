<?php

/**
 * Class Controller
 */
class Controller
{
    /**
     * Controller constructor.
     * @param $action
     */
    public function __construct()
    {
    }

    function formatResponse($response){
        return json_encode($response);
    }

    /**
     * get configs
     */
    function configs(){

    }

    /**
     * get Projects
     */
    function projetos(){

    }

    /**
     * get labels
     */
    function getLabels(){

    }

    /**
     * add labels
     */
    function addLabels(){

    }

}

$controller = new Controller();