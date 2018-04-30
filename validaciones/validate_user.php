<?php

class Validate
{
	private $_passed = false,
	$_errors = array();

	public function check($source, $items = array())
	{
		foreach($items as $item => $rules)
		{
			$value = htmlspecialchars(trim($source[$item]), ENT_QUOTES, 'UTF-8');
			foreach($rules as $rule => $rule_value)
			{
				switch($rule)
				{
					case 'required':
					if(empty($value)) {
						$this->add_error("<b>{$item}</b> es requerido.");
					}
					break;
					case 'length_min':
					if(strlen($value) < $rule_value) {
						$this->add_error("<b>{$item}</b> debe contener al menos <b>{$rule_value}</b> caracteres");
					}
					break;
					case 'length_max':
					if(strlen($value) > $rule_value) {
						$this->add_error("<b>{$item}</b> no debe contener mas de <b>{$rule_value}</b> caracteres");
					}
					break;
					case 'matches':
					if($value != htmlspecialchars(trim($source[$rule_value]), ENT_QUOTES, 'UTF-8')) {
						$this->add_error("<b>{$item}</b> deben coincidir <b>{$rule_value}</b>");
					}
					break;
					case 'mailcheck':
					if(!filter_var($value, FILTER_VALIDATE_EMAIL)) {
						$this->add_error("<b>{$value}</b> no es una direccion de email valida");
					}
					break;
					case 'numeric':
					if(!ctype_digit(str_replace('+', '', $value))) {
						$this->add_error("<b>{$item}</b> contiene caracteres no validos. Solo numeros del 0-9 y los signos \"+\"- son validos ");
					}
					break;
					case 'alphabetic':
					if (!ctype_alpha(str_replace(array(' ', "'", '-'), '', $value))) {
						$this->add_error("<b>{$item}</b> contiene caracteres no validos. Solo las letras de A-Z, \"'\", \" \" y \"-\" son validos");
					}
					break;
					case 'alphanumeric':
					if(!ctype_alnum($value)) {
						$this->add_error("<b>{$item}</b> contiene caracteres no validos. Solo los caracteres alfanumericos (A-Z and 0-9) son validos");
					}
					break;
					case 'blacklist':
					foreach($rule_value as $blocked_word) {
						if($value == $blocked_word) {
							$this->add_error("<b>{$value}</b> esta bloqueado");
						}
					}
					break;
					case 'whitelist':
					foreach($rule_value as $approved_word) {
						if($value == $approved_word) {
							$match = true;
							break;
						}
					}
					if(!$match) {
						$this->add_error("<b>{$value}</b> esta bloqueado");
					}
				}
			}
		}
		if(empty($this->_errors))
		{
			$this->_passed = true;
		}
		return $this;
	}

	private function add_error($error)
	{
		$this->_errors[] = $error;
	}

	public function errors()
	{
		return $this->_errors;
	}

	public function passed()
	{
		return $this->_passed;
	}
}
?>