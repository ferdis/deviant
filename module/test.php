<?php

namespace Deviant\Module;
use Deviant\Library\Iface\Request,
	Deviant\Library\Iface\Response;

class Test implements Action {
	
	public function preDispatch() {
		echo 'pre';
		
	}
	
	public function start($r, $r) {
		echo 'haai';
	}
	
	public function postDispatch() {
		echo 'post';
	}
}