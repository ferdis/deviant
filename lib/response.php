<?php

namespace Deviant\Library;

class Response implements Iface\Response {
    const 
		VERSION_11 = 'HTTP/1.1',
		VERSION_10 = 'HTTP/1.0';
	
	const 
		OK						= 200,
		MOVED_PERMANENTLY		= 301,
		FOUND					= 302,
		NOT_MODIFIED			= 304,
		TEMPORARY_REDIRECT		= 307,
		BAD_REQUEST				= 400,
		UNAUTHORIZED			= 401,
		FORBIDDEN				= 403,
		NOT_FOUND				= 404,
		METHOD_NOT_ALLOWED		= 405,
		GONE					= 410,
		INTERNAL_SERVER_ERROR	= 500,
		SERVICE_UNAVAILABLE		= 503;
    
    protected $version;
    protected $headers = array();
    
    public function __construct($version = self::VERSION_11) {
        $this->version = $version;
    }
    
    public function getVersion() {
        return $this->version;
    }
    
    public function addHeader($header) {
        $this->headers[] = $header;
        return $this;
    }
    
    public function addHeaders(array $headers) {
        foreach ($headers as $header) {
            $this->addHeader($header);
        }
        return $this;
    }
    
    public function getHeaders() {
        return $this->headers;
    }
    
    public function send() {
        if (!headers_sent()) {
            foreach($this->headers as $header) {
                header($this->version . ' ' . $header, true);
            }
        } 
    }
	
	public function ok() {
		$this->addHeader(self::OK . ' OK');
	}
	
	public function notFound() {
		$this->addHeader(self::NOT_FOUND . ' Not Found');
	}
	
	public function forbidden() {
		$this->addHeader(self::FORBIDDEN . ' Forbidden');
	}
}