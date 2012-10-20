<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Deviant\Library;

/**
 * Description of request
 *
 * @author Ferdi
 */
class Request implements Iface\Request {

	protected $uri;
	protected $params = array();

	public function __construct($uri=false, array $params = array()) {
		
		if ($uri === false) {
			$uri = $this->getUri();
		}
		
		$this->uri = $uri;
		$this->params = $params;
	}

	public function getUri() {
		if (empty($this->uri)) {
			$this->uri = str_replace('/', null, $_SERVER['PATH_INFO']);
		}
		
		return $this->uri;
	}

	public function setParam($key, $value) {
		$this->params[$key] = $value;
		return $this;
	}

	public function getParam($key) {
		if (!isset($this->params[$key])) {
			throw new Exception\InvalidArgument(
					"The request parameter with key '$key' is invalid.");
		}
		return $this->params[$key];
	}

	public function getParams() {
		return $this->params;
	}

}

?>
