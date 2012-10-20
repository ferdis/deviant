<?php

namespace Deviant\Module;

class Index implements Action {
	
	public function start($request, $response) {
		$response->notFound();
		echo 'ellos from ' . __METHOD__;
	}
}
