<?php

namespace Deviant\Module;
use Deviant\Library\Module\Guest;


class Index extends Guest {
	
	public $minRole = 'moderator';
	
	public function start() {
		
		echo 'ellos from ' . __METHOD__;
	}
}
