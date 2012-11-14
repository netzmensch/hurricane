<?php

namespace redcross\hurricane\classes;

class content extends base {
	private $content;
	
	public function __construct($content) {
		parent::__construct();
		
		$this->content = $content;
	}
	
	public function parseContent() {
		$result = str_replace('+', '<h1>', $this->content);
		
		return $result;
	}
}