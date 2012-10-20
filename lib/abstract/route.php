<?php

namespace Deviant\Library\Iface;

interface Route {

	public function match(Request $request);
}
