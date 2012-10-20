<?php

namespace Deviant\Module;
use Deviant\Library\Iface\Request,
	Deviant\Library\Iface\Response;

interface Action {
	
    public function start($request, $response);
}