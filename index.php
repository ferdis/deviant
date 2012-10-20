<?php

use Deviant\Library\Autoloader,
	Deviant\Library\Config,
    Deviant\Library\Route,
    Deviant\Library\Router,
    Deviant\Library\Dispatcher,
    Deviant\Library\Request,
    Deviant\Library\Response,
	Deviant\Library\Module;

require_once('lib/autoloader.php');
new Autoloader;

$request = new Request();
$response = new Response;
$dispatcher = new Dispatcher;

$routes = array();
$routes[] = new Route('index', 'Deviant\Module\Index');
$routes[] = new Route('test', 'Deviant\Module\Test');
$routes[] = new Route('error', 'Deviant\Module\Error');

$router = new Router($routes);



$module = new Module($router, $dispatcher);
$module->run($request, $response);