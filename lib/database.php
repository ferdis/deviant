<?php

namespace Deviant\Library;

class Database implements Iface\Database {
	
	protected $adapter;
	
	public function __construct(\stdClass $db) {
		
		$db->adapter = __NAMESPACE__ . '\Database\Adapter\\' . ucfirst(strtolower($db->adapter));
		
		if (!class_exists($db->adapter)) {
			throw new Exception\Database('Adapter "' . $db->adapter . '" not found');
		}
		
		$this->adapter = new $db->adapter($db);
	}
	
}