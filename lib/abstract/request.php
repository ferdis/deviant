<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Deviant\Library\Iface;

/**
 * Description of request
 *
 * @author Ferdi
 */
interface Request {
	
	public function getUri();
	public function setParam($key, $value);
	public function getParam($key);
	public function getParams();
}

?>
