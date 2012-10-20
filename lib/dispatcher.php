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

	public function dispatch(Iface\Route $route, Iface\Request $request, Iface\Response $response, $module) {
		$module->start();
		
		if (method_exists($module, 'preDispatch')) {
			$module->postDispatch();
		}
		
		$response->send();
	}
}