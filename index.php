<?php
require_once("controllers/Controller.php");
require_once("controllers/AdminController.php");
require_once("controllers/AuthController.php");
require_once("controllers/CategoryController.php");
require_once("controllers/ProductController.php"); 
require_once("controllers/TablesController.php");  
require_once("controllers/UsersController.php");  
require_once("controllers/HomepageController.php"); 
require_once("controllers/RegisterController.php"); 
require_once("Route.php");

$router = new Route();
$router->addRoute("/admin", "AdminController@getView");
$router->addRoute("/home", "HomepageController@getView");
$router->addRoute("/admin/category", "CategoryController@getView");
$router->addRoute("/admin/product", "ProductController@getView"); 
$router->addRoute("/admin/table", "TablesController@getView"); 
$router->addRoute("/admin/user", "UsersController@getView"); 
$router->addRoute("/login", "AuthController@getLoginPage");
$router->addRoute("/admin/logout", "AuthController@logout");
$router->addRoute("/", "RegisterController@getview");
$router->addRoute("/register", "RegisterController@getview");
$router->addRoute("/detail", "");

$requestedUrl = $_SERVER['REQUEST_URI'];

$router->routeRequest($requestedUrl);
?>





