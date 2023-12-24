<?php
require_once("controllers/Controller.php");
require_once("controllers/AdminController.php");
require_once("controllers/AuthController.php");
require_once("controllers/CategoryController.php");

require_once("Route.php");

$router = new Route();
$router->addRoute("/admin", "AdminController@getView");
$router->addRoute("/admin/category", "CategoryController@getView");
$router->addRoute("/admin/login", "AuthController@getLoginPage");
$router->addRoute("/admin/logout", "AuthController@logout");


$requestedUrl = $_SERVER['REQUEST_URI'];

$router->routeRequest($requestedUrl);
