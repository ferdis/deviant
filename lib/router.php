<?php

namespace Deviant\Library;

class Router implements Iface\Router {

	protected $routes = array();

	public function __construct(array $routes = array()) {
		if (!empty($routes)) {
			$this->addRoutes($routes);
		}
	}

	public function addRoute(Iface\Route $route) {
		$this->routes[] = $route;
		return $this;
	}

	public function addRoutes(array $routes) {
		foreach ($routes as $route) {
			$this->addRoute($route);
		}
		return $this;
	}

	public function getRoutes() {
		return $this->routes;
	}

	public function route(Iface\Request $request, Iface\Response $response) {
		foreach ($this->routes as $route) {
			if ($route->match($request)) {
				return $route;
			}
		}
		
		return new Route('error', '\Deviant\Module\Error');
	}

}