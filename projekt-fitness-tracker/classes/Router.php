<?php
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
       if(is_array($method)){
         foreach($method as $method){
           $this->routes[$url][$method]['action'] = $callback;
         }      
       }
       else{

         $this->routes[$url][$method]['action'] = $callback;

       }

    }



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
