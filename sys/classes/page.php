<?php

namespace redcross\hurricane\classes;

class page extends base {
	protected $path;
	
	public function __construct($path) {
		parent::__construct();
		
		$this->path = $path;
	}


	public function render() {
		$pages = $this->getAllPageNames();
		
		$fixedPath = 'page/' . strtolower($this->path) . '.txt';
		
		foreach ($pages as $pagePath) {
			if(strtolower($pagePath) == $fixedPath) {
				return $this->renderPage($pagePath);
			}
		}
		
		$this->helper->error('wrong path...');
	}
	
	private function getAllPageNames() {
		$pages = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator('page'));
		return iterator_to_array($pages);
	}
	
	private function renderPage($filePath) {
		$content = new content(file_get_contents($filePath));
		$htmlContent = $content->parseContent();
		return $this->renderTemplate($htmlContent);
	}
	
	private function renderTemplate($content) {
		$template = file_get_contents('res/template/index.html');
		$rendered = str_replace('{$content}', $content, $template);
		return $rendered;
	}
}