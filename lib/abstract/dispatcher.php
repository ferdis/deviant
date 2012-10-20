<?php

namespace Deviant\Library\Iface;

interface Dispatcher {
	
    public function dispatch(Route $route, Request $request, Response $response, $module);
}