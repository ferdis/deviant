<?php

namespace Deviant\Library;

class Module implements Iface\Module {

	protected $router;
	protected $dispatcher;
	public $config, $db;

	public function __construct(Iface\Router $router, Iface\Dispatcher $dispatcher, Config $config) {
		$this->router = $router;
		$this->dispatcher = $dispatcher;
		$this->config = $config;

		$this->db = new Database($config->ini->db);
	}

	public function run(Iface\Request $request, Iface\Response $response) {
		$route = $this->router->route($request, $response);
		$module = $this->createModule($route, $request, $response);

		if (method_exists($module, 'preDispatch')) {
			$module->preDispatch();
		}

		$this->dispatcher->dispatch($route, $request, $response, $module);
	}

	public function createModule(Iface\Route $route, Iface\Request $request, Iface\Response $response) {
		return new $route->moduleClass($this->db, $request, $response);
	}

}
