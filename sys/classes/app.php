<?php

namespace redcross\hurricane\classes;

class app extends base {
	
	protected $page;
	
	public function __construct() {
		$path = $this->getInput('p');
		
		if(!$path) {
			$path = 'start';
		}
		
		$this->page = new page($path);
	}
	
	
	public function run() {
		echo $this->page->render();
	}
	
	
	private function getInput($name) {
		if(!empty($_GET[$name])) {
			
			return $_GET[$name];
		}
		
		return false;
	}
	
}