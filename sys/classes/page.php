<?php

namespace redcross\hurricane\classes;

class page extends base {
	protected $path;
	
	public function render() {
		if(!$this->path) {
			$this->helper->error('wrong path...');
		}
		
		$pages = $this->getAllPages();
		
		$fixedPath = 'page/' . strtolower($this->path) . '.txt';
		
		foreach ($pages as $pagePath) {
			if(strtolower($pagePath) == $fixedPath) {
				return $this->renderPage($pagePath);
			}
		}
	}
	
	public function setPath($path) {
		$this->path = $this->helper->getClearUrlPath($path);
	}

	private function getAllPages() {
		$pages = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator('page'));
		return iterator_to_array($pages);
	}
	
	private function getPageContent($path) {
		$file = file_get_contents($path);
		return $file;
	}
	
	private function parsePageContent($content) {
		$result = str_replace('+', '<h1>', $content);
		
		return $result;
	}

	private function renderPage($path) {
		$content = $this->getPageContent($path);
		$content = $this->parsePageContent($content);
		return $this->renderTemplate($content);
	}
	
	private function renderTemplate($content) {
		$template = file_get_contents('res/template/index.html');
		$rendered = str_replace('{$content}', $content, $template);
		return $rendered;
	}
}