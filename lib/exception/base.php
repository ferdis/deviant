<?php

namespace Deviant\Library\Exception;

/**
 * The base exception class for Library
 * It serves as a proxy.
 */
class Base extends \Exception {
	
	public function __construct($message = null, $code = 0, Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}
}

?>
