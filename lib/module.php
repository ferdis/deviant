<?php

namespace Deviant\Library;

class Module implements Iface\Module {

	protected $router;
	protected $dispatcher;

	public function __construct(Iface\Router $router, Iface\Dispatcher $dispatcher) {
		$this->router = $router;
		$this->dispatcher = $dispatcher;
	}

	public function run(Iface\Request $request, Iface\Response $response) {
		$route = $this->router->route($request, $response);
		$this->dispatcher->dispatch($route, $request, $response);
	}

}
