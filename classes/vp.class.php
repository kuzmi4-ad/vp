<?php
class vp{
	protected $security;
	protected $server;
	public function __construct($server, $security){
		$this->security = $security;	
		$this->server = $server;	
	}
}