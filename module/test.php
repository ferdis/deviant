<?php

namespace Deviant\Module;
use Deviant\Library\Module\Module;

class Test extends Module {
	
	public function start() {
		var_dump($this);
	}
}