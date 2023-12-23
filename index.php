<?php
    require_once("controllers/Controller.php");
    require_once("controllers/AdminController.php");
  
    require_once("Route.php");
      
    $router = new Route();
    $router -> addRoute("/admin","AdminController@getView");

    $requestedUrl = $_SERVER['REQUEST_URI'];

    $router->routeRequest($requestedUrl);

    ?>