<?php

namespace Deviant\Library\Iface;

interface Response {

	public function getVersion();
	public function addHeader($header);
	public function addHeaders(array $headers);
	public function getHeaders();
	public function send();
}