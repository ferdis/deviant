<?php

namespace Deviant\Library;

class Route implements Iface\Route {

	protected $path;
	public $moduleClass;

	public function __construct($path, $moduleClass) {
		if (!is_string($path) || empty($path)) {
			throw new Exception\InvalidArgument("The path is invalid.");
		}
		if (!class_exists($moduleClass)) {
			throw new Exception\InvalidArgument("The module class is invalid.");
		}
		$this->path = $path;
		$this->moduleClass = $moduleClass;
	}

	public function match(Iface\Request $request) {
		return $this->path === $request->getUri();
	}

}