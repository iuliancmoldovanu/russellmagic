<?php

class Validate
{
    private $_passed = false;
    private $_errors = array();
	private $_items = array();

    public function check($source, $items = array())
    {
        foreach ($items as $item => $rules) {
            foreach ($rules as $rule => $rule_value) {
                $value = trim($source[$item]);
                if ($rule === 'required' && empty($value)) {
                    $this->setError("\"" . ucfirst($items[$item]['name']) . "\" field is required !", $item);
                } else if (!empty($value)) {
                    switch ($rule) {
                        case 'min':
                            if (strlen($value) < $rule_value) {
                                $this->setError("The \"{$items[$item]['name']}\" field must have at least {$rule_value} characters!", $item);
                            }
                            break;
                        case 'max':
                            if (strlen($value) > $rule_value) {
                                $this->setError("\"{$items[$item]['name']}\" excess maximum characters of {$rule_value}!", $item);
                            }
                            break;
                        case 'matches':
                            if ($value != $source[$rule_value]) {
                                $this->setError("\"" . ucfirst($items[$item]['matches']) . "\" field does not match with \"{$items[$item]['name']}\"!", $item);
                            }
                            break;
	                    case 'captcha':
		                    if ($value != $_SESSION['6_letters_code']) {
			                    $this->setError("\"{$items[$item]['name']}\" field does not match!", $item);
		                    }
		                    break;
                        case 'numeric':
                            if (!is_numeric($value)) {
                                $this->setError("\"{$items[$item]['name']}\" must contain only numbers!", $item);
                            }
                            break;
	                    case 'isValidEmail':
		                    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
			                    $this->setError("Invalid email format", $item);
		                    }
                    }
                }
            }
        }

        if (count($this->getError()) == 0) {
            $this->_passed = true;
        }
        return $this;
    }



    private function setError($errors, $valueName = '')
    {
	    $this->_items[] = $valueName;
        $this->_errors[] = $errors;
    }

    public function getError()
    {
        return $this->_errors;
    }
	public function getItemName()
	{
		return $this->_items;
	}
    public function passed()
    {
        return $this->_passed;
    }
} 