<?php

namespace redcross\hurricane\classes;

class app  extends base {
	
	protected $page;
	
	public function __construct() {
		$this->page = new page();
	}
	
	
	public function run() {
		$path = $this->getInput('p');
		
		if(!$path) {
			$path = 'start';
		}
		
		$this->page->setPath($path);
		echo $this->page->render($path);
	}
	
	
	private function getInput($name) {
		if(!empty($_GET[$name])) {
			
			return $_GET[$name];
		}
		
		return false;
	}
	
}