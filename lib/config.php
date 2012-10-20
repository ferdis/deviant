<?php

namespace Deviant\Library;

/**
 * Description of config
 *
 * @author Ferdi
 */
class Config {
	
	private $contents;
	public $ini, $allowExcpetions = false;
	
	public function __construct($section=false, $file_path=false) {
		if (empty($file_path)) {
			$file_path = 'config.ini';
		}
		
		$this->load($file_path);
		$this->parse($section);
	}
	
	private function load($file) {
		if (file_exists($file) === false) {
			throw new Exception\InvalidArgument('Configuration file does not exists');
		}
		
		$fp = fopen($file, 'r');
		$stack = fread($fp, filesize($file));
		
		
		fclose($fp);
		$this->contents = $stack;
	}
	
	private function parse($section) {
		if (empty($this->contents)) {
			throw new Exception\InvalidArgument('Configuration file is empty');
		}
		
		$ini = parse_ini_string($this->contents, true);
		unset($this->contents);
		
		if ($ini === false) {
			throw new Exception\InvalidArgument('Error while parsing configuration file');
		}
		
		$this->ini = $ini;
		
		if ($section !== false && is_string($section)) {
			$this->ini = $this->getSection($section);
		} 		
		
		$this->parseDotted($ini);
	}
	
	protected function getSection($name) {
		if (array_key_exists($name, $this->ini) === false) {
			return false;
		}
		
		return $this->ini[$name];
	}
	
	private function parseDotted() {
		$build = new \stdClass;
		
		$ini = $this->ini;
		
		foreach($ini as $key => $value) {
			if (strstr($key, '.')) {
				$key_parts = explode('.', $key);
				
				if (array_key_exists($key_parts[0], $build) == false ){
					$build->$key_parts[0] = new \stdClass();
				}
				
				$build->$key_parts[0]->$key_parts[1] = empty($value) ? false : $value;
			} else {
				$build->$key = empty($value) ? false : $value;
			}
		}
		
		$this->ini = $build;
	}
}