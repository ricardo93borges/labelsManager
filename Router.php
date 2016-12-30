<?php

class Router
{
    private $routes;

    /**
     * Router constructor.
     * @param $route
     */
    public function __construct()
    {

    }

    /**
     * Add route
     *
     * @param $pattern
     * @param $controller
     * @param $action
     * @param $method
     */
    public function add($pattern, $controller, $action, $method){
        $route = array(
            'pattern' => $pattern,
            'controller' => $controller,
            'action' => $action,
            'method' => $method
        );
        $this->routes[] = $route;
    }

    /**
     * Main method
     */
    public function run(){
        $uri = explode('/',$_SERVER['REQUEST_URI']);
        $method = $_SERVER['REQUEST_METHOD'];

        //Format URI
        foreach($uri as $k=>$v){
            if($v == "Router.php"){
                unset($uri[$k]);
                break;
            }else{
                unset($uri[$k]);
            }
        }

        //Find route and call an action
        $uri = implode('/', $uri);
        $route = $this->match($uri, $method);
        if(is_null($route)){
            print "There are no match for this route";
        }else {
            $this->callAction($route);
        }
    }

    /**
     * Find an route
     * @param $uri
     * @param $method
     * @return null
     */
    public function match($uri, $method){
        foreach($this->routes as $route){
            preg_match($route['pattern'], $uri, $matches);
            if(is_array($matches) && count($matches) > 0 && $method == $route['method']){
                return $route;
            }
        }
        return null;
    }

    /**
     * Call an  action
     * @param $route
     */
    public function callAction($route){
        require($route['controller']);
        $action = $route['action'];
        if(is_callable(array($controller, $action))) {
            call_user_func_array(array($controller, $action), array());
        }else{
            print "Method is not callable";
        }
    }
}

$router = new Router();
$router->add('/^\/?projetos\/?$/', 'Controller.php', 'projetos', 'GET');
$router->add('/^\/?projeto\/id\/labels\/?$/', 'Controller.php', 'getLabels', 'GET');
$router->add('/^\/?projeto\/id\/labels\/?$/', 'Controller.php', 'addLabels', 'POST');
$router->add('/^\/?(config)\/?$/', 'Controller.php', 'configs', 'GET');
$router->run();
