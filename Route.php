<?php
class Route {
    private $routes = [];

    public function addRoute($url, $controllerMethod) {
        $this->routes[$url] = $controllerMethod;
    }

    public function routeRequest($url) {
        if (array_key_exists($url, $this->routes)) {
            list($controller, $method) = explode('@', $this->routes[$url]);
            $controllerInstance = new $controller();
            $controllerInstance->processEventOnView();  
            $controllerInstance->$method();     
        }else{
            include("views/NotFoundPage.php");
        }
    }
}
?>