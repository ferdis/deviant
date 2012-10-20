<?php

namespace Deviant\Library;

/**
 * The dispatcher handles everything that happens 
 * after a request route has been identified.
 * 
 * @uses Instantiates module
 * @uses Handles dispatch flow
 */
class Dispatcher implements Iface\Dispatcher {

	public function dispatch(Iface\Route $route, Iface\Request $request, Iface\Response $response) {
		$module = $this->createModule($route);
		
		if (method_exists($module, 'preDispatch')) {
			$module->preDispatch();
		}
		
		$module->start($request, $response);
		
		if (method_exists($module, 'preDispatch')) {
			$module->postDispatch();
		} else {
			if (count($response->getHeaders()) == 0) {
				$response->ok();
			} else {
				$response->send();
			}
		}
	}
	
	public function createModule(Iface\Route $route) {
		return new $route->moduleClass;
	}
}