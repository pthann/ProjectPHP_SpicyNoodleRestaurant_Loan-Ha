<?php

require_once("controllers/Controller.php");
require_once("controllers/AdminController.php");
require_once("controllers/AuthController.php");
require_once("controllers/CategoryController.php");
require_once("controllers/ProductController.php"); 
require_once("controllers/TablesController.php");  
require_once("controllers/UsersController.php");  
require_once("controllers/ProfileController.php");  
require_once("controllers/HomepageController.php");
require_once("controllers/MenuController.php"); 
require_once("controllers/RegisterController.php"); 
require_once("controllers/DetailFoodController.php"); 
require_once("controllers/SearchController.php"); 
require_once("controllers/PutTableController.php");
require_once("controllers/CartController.php"); 
require_once("controllers/LoginController.php"); 
require_once("controllers/OrderController.php"); 
require_once("controllers/ThankiuController.php"); 
require_once("controllers/PayQrController.php"); 

require_once("Route.php");

$router = new Route();

$router->addRoute("/admin", "AdminController@getView");
$router->addRoute("/home", "HomepageController@getView");
$router->addRoute("/menu", "MenuController@getView");
$router->addRoute("/admin/category", "CategoryController@getView");
$router->addRoute("/admin/product", "ProductController@getView"); 
$router->addRoute("/admin/table", "TablesController@getView"); 
$router->addRoute("/admin/user", "UsersController@getView"); 
$router->addRoute("/admin/profile", "ProfileController@getView"); 
$router->addRoute("/admin/order", "OrderController@getView"); 
$router->addRoute("/login", "AuthController@getLoginPage");
$router->addRoute("/admin/logout", "AuthController@logout");
$router->addRoute("/logout", "AuthController@logout");
$router->addRoute("/", "RegisterController@getview");
$router->addRoute("/register", "RegisterController@getview");
$router->addRoute("/detail", "DetailFoodController@getview");
$router->addRoute("/cart", "CartController@getview");
$router->addRoute("/thankiu", "ThankiuController@getview");
$router->addRoute("/pay_qr", "PayQrController@getview");

$router->addRoute("/search", "SearchController@getview");
$router->addRoute("/table", "PutTableController@getview");

$requestedUrl = $_SERVER['REQUEST_URI'];

$router->routeRequest($requestedUrl);
?>