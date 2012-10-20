<?php

namespace Deviant\Library;

class Autoloader {
	
	public $patterns;
	private $config;
	
	public function __construct() {
		spl_autoload_register(array($this, 'load'));
	}
	
	private function load($class) {
		$patterns = array(
			array(str_replace('\Library', '', __NAMESPACE__), null),
//			array('Module\Action', 'Library\Iface\Action'),
//			array('Module\Module', 'Library\Module'),
			array('Library', 'lib'),
			array('Iface', 'abstract')
		);
		
		if (is_array($this->patterns)) {
			$patterns = array_merge_recursive($patterns, $this->patterns);
		}
		
		foreach($patterns as $pattern) {
			if (isset($pattern[2])) {
				$class = call_user_func($pattern[2], $pattern[0], $pattern[1], $class);
			} else {
				$class = str_replace($pattern[0], $pattern[1], $class);
			}
		}
		
		$directory_structure = explode('\\', $class);
		$directory_structure = array_filter($directory_structure);
		foreach($directory_structure as $key => $dir) {
			$directory_structure[$key][0] = strtolower($directory_structure[$key][0]);
		}
		
		$class = implode('/', $directory_structure) . '.php';
		
		if (file_exists($class) == false) {
			throw new \Exception('Autoloader failed to find "' . $class . '" from ' . getcwd()); 
		}
		
		require($class);
		return true;
	}
}
