<?php

namespace redcross\hurricane\classes;

class base {
	protected $helper;
	
	public function __construct() {
		$this->helper = new helper();
	}
}