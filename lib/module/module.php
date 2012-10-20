<?php

namespace Deviant\Library\Module;

/**
 * Description of module
 *
 * @author Ferdi
 */
 class Module implements Iface\Action {
	
	protected $db, $request, $response, $view;
	 
	public function __construct($db, $request, $response) {
		$this->db = $db;
		$this->request = $request;
		$this->response = $response;
	}
	
	public function start() {
		return;
	}
	
	public function postDispatch() {
		$this->response->ok();
	}
}
