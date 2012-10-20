<?php

namespace Deviant\Library\Iface;

interface Router {

	public function addRoute(Route $route);
	public function addRoutes(array $routes);
	public function getRoutes();
	public function route(Request $request, Response $response);
}