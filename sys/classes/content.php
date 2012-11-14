<?php

namespace redcross\hurricane\classes;

class content extends base {
	private $content;
	
	public function __construct($content) {
		parent::__construct();
		
		$this->content = $content;
	}
	
	public function getContent() {
		return $this->content;
	}
	
	public function parseContent() {
		$this->parseFormating();
		$this->parseMedia();
	}
	
	private function parseFormating() {
		for($i=10;$i>0;$i--) {
			$this->replaceContentElement('/' . str_repeat('\+', $i) . '(.*)/', '<h' . $i . '>$1</h' . $i . '>');
		}
		
	}
	
	private function parseMedia() {
		$this->replaceContentElement('/(.*)\[(.*)\](.*)/', '$1<img src="page/$2">$3');
	}
	
	private function replaceContentElement($pattern, $replacement) {
		$this->content = preg_replace($pattern, $replacement, $this->content);
	}
}