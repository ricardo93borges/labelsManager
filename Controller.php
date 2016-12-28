<?php

/**
 * Class Controller
 */
class Controller
{
    private $action;
    private $params;

    /**
     * Controller constructor.
     * @param $action
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    function run(){

        /*
         * GET http.site.com/projetos
         * GET http.site.com/projeto/id/labels
         * POST http.site.com/projeto/id/labels
         * GET http.site.com/configs
         */

        $uri = explode('/',$_SERVER['REQUEST_URI']);

        foreach ($uri as $k=>$v){
            if($v == "Controller.php"){
                unset($uri[$k]);
                break;
            }else{
                unset($uri[$k]);
            }
        }

        /**
         * TODO implement router with regex
         */


        $response = $this->formatResponse(explode('/',$uri));
        die($response);
    }

    function formatResponse($response){
        return json_encode($response);
    }

    function getConfig(){

    }

}

$controller = new Controller();
$controller->run();