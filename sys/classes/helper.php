<?php

namespace redcross\hurricane\classes;

class helper {
	
	const FILTER_ALPHA = 1;
	const FILTER_ALPHANUMERIC = 2;
	const FILTER_INT = 3;

	
	public function error($message) {
		die($message);
	}
	
	public function clearInput($filter, $input) {
		$rule = "";
		
		switch ($filter) {
			case self::FILTER_ALPHA:
				$rule = "/^[a-zA-Z]$/";
				break;
			case self::FILTER_ALPHANUMERIC:
				$rule = "/^[a-zA-Z0-9]$/";
				break;
			case self::FILTER_INT:
				$rule = "/^[0-9]$/";
				break;
		}
		
		return preg_match($rule, $input);
	}
	
	public function getClearUrlPath($path) {
		$pathParts = explode('/', $path);
		
		$failure = false;
		
		foreach ($pathParts as $pathPart) {
			if(!$this->clearInput(self::FILTER_ALPHA, $pathPart)) {
				$failure = true;
			}
		}
		
		if($failure == true) {
			return $path;
		}
		
		return false;
	}
}