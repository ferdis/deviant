<?php

namespace Deviant\Library\Iface;

interface Module {

	public function run(Request $request, Response $response);
}
