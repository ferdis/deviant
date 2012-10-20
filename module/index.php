<?php

namespace Deviant\Module;
use Deviant\Library\Module\Staff;


class Index extends Staff {
	
	public $minRole = 'moderator';
	
	public function start() {
		$this->response->notFound();
		echo 'ellos from ' . __METHOD__;
	}
}
