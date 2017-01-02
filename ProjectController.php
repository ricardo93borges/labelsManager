<?php

require_once('Controller.php');
require 'Request.php';

class ProjectController extends Controller
{

    /**
     * ProjetoController constructor.
     */
    public function __construct()
    {
    }


    public function getProjeto(){

    }

    public function getProjetos(){
        $content = file_get_contents("config.json");
        $configs = json_decode($content, true);

        $url = $configs['api_url']."/projects/";
        $params = array('private_token'=>$configs['private_token']);

        $request = new Request($url, $params);
        $response = $request->get();
        die($response);
    }

    public function getLabels(){
        $content = file_get_contents("config.json");
        $configs = json_decode($content, true);

        $projeto = $this->_getParam('project');
        $url = $configs['api_url']."/projects/$projeto/labels";
        $params = array('private_token'=>$configs['private_token']);

        $request = new Request($url, $params);
        $response = $request->get();
        die($response);
    }

    public function addLabels(){
        $content = file_get_contents("config.json");
        $configs = json_decode($content, true);

        $projeto = $this->_getParam('project');
        $url = $configs['api_url']."/projects/$projeto/labels";
        $params = array(
            'private_token'=>$configs['private_token'],
            'id'=>$projeto,
            'name'=>'test label',
            'color'=>'#5843AD',
            'description'=>'testing',
            'priority'=>null,
        );

        $request = new Request($url, $params);
        $response = $request->post();
        die($response);
    }

}

$controller = new ProjectController();