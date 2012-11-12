<?php

namespace redcross\hurricane\classes;

class app  extends base {
	
	protected $page;
	
	public function __construct() {
		$this->page = new page();
	}
	
	
	public function run() {
		$path = $this->getInput('p');
		$this->page->setPath($path);
		echo $this->page->render($path);
	}
	
	
	private function getInput($name) {
		return $_GET[$name];
	}
	
}