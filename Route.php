<?php
class Route {
    private $routes = [];

    public function addRoute($url, $controllerMethod) {
        $this->routes[$url] = $controllerMethod;
    }

    public function routeRequest($url) {
        $urlParts = explode('?', $url);
        $urlWithoutQueryString = $urlParts[0];
        if (array_key_exists($urlWithoutQueryString, $this->routes)) {
            list($controller, $method) = explode('@', $this->routes[$urlWithoutQueryString]);
            $controllerInstance = new $controller();
            $controllerInstance->$method();
        } else {
            include("views/pages/NotFoundPage.php");
        }
    }
}
