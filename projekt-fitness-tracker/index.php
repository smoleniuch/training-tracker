<?php
require_once("core/init.php");

// var_dump($_SERVER);
$user = new User();

/*
//default panel
if($user->isLoggedIn()){

  Redirect::to("panel.php");

}
else{

  Redirect::to("login.php");

}
*/

$router = new Router;

$router->bind('/panel', 'GET', function() { 
    $panelController = new PanelController;
    return $panelController->displayPanel();
});

$router->bind('/profile', 'GET', function() {
    $profileController = new ProfileController;
    return $profileController->displayProfile();
});

$router->bind('/test', 'GET', function(){ return 'test'; });

echo $router->runUrl($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

class Router
{
    /**
     * Routes array.
     * @var array
     */
    protected $routes;

    /**
     * Bind a route
     * @return [type] [description]
     */
    public function bind($url, $method, $callback)
    {
       $this->routes[$url][$method]['action'] = $callback;
    }

    /**
     * Run a requested route and return a result
     * @return [type] [description]
     */
    /* public function runUrl($url, $method)
    {
        // if we have a closure for this route
        // run it
        if(is_callable($this->routes[$url][$method]['action']))
        {
            return $this->routes[$url][$method]['action'](); 
        }

    } */

    public function runUrl($url, $method)
    {
        foreach($this->routes as $binding => $bindMethod)
        {   

            if(strpos($url, $binding) !== false && array_key_exists($method, $bindMethod))
            {
                return $bindMethod[$method]['action']();
            }
        }
    }

}

?>
