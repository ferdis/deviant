<?php

namespace Devaint\Library;

/**
 * Description of config
 *
 * @author Ferdi
 */
class Config {
	
	private $contents, $data;
	public $allowExcpetions = false;
	
	public function __construct($file_path, $section=false) {
		$this->load($file_path);
		$this->parse($section);
	}
	
	private function load($file) {
		if (file_exists($file) === false) {
			throw new Exception\InvalidArgument('Configuration file does not exists');
		}
		
		$fp = fopen($file, 'r');
		$buffer = array();
		
		while(feof($fp) !== false) {
			array_push($buffer, fread($fp, 64));
		}
		
		fclose($fp);
		$this->contents = implode($buffer);
	}
	
	private function parse($section) {
		if (empty($contents)) {
			throw new Exception\InvalidArgument('Configuration file is empty');
		}
		
		$ini = parse_ini_string($this->contents, $section);
		if ($ini === false) {
			throw new Exception\InvalidArgument('Error while parsing configuration file');
		}
		
		$this->config = $data;
	}
	
	protected function getValue($key) {
		if (array_key_exists($key, $this->data) === false) {
			return false;
		}
		
		return $this->data[$key];
	}
	
	protected function getSection($name) {
		if (isset($this->data[0][0]) === false) {
			return false;
		}
		
		$section_data = $this->data[$name];
		return function($key) use($section_data) {
			if (array_key_exists($key, $section_data) === false) {
				return false;
			}

			return $this->data[$section_data];
		};
	}
}