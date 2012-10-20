<?php

namespace Deviant\Module;
use Deviant\Library\Iface\Request,
	Deviant\Library\Iface\Response;

class Error implements Action {
	
	public function start($r, $r) {
		echo 'error called';
	}
}