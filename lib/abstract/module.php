<?php

namespace Deviant\Library\Iface;

interface Module {

	public function run(Request $request, Response $response);
	public function createModule(Route $route, Request $request, Response $response);
}
