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

    /**
     * Get parameter from query string
     * @param $param
     * @return null
     */
    public function _getParam($param){
        $uri = $_SERVER['REQUEST_URI'];
        $explode = explode('/', $uri);

        foreach($explode as $k=>$v){
            if($v == $param){
                if(isset($explode[$k+1])) {
                    return $explode[$k + 1];
                }
            }
        }

        return null;
    }

    function toJson($object){
        return json_encode($object);
    }


}