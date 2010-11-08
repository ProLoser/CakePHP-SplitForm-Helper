<?php
/**
* 
*/
App::import('Helper', 'Form');
class SplitFormHelper extends FormHelper {
	
	var $_fieldGroups = array();
	
	function input($fieldName, $options = array()) {
		$options = array_merge(array(
			
		), $options);
		
		$this->setEntity($fieldName);

		$modelKey = $this->model();
		$fieldKey = $this->field();
		if (!isset($this->fieldset[$modelKey])) {
			$this->_introspectModel($modelKey);
		}
		
		if ($modelKey === $fieldKey) {
			$options['hiddenField'] => false;
			if (isset($this->_fieldGroups[$modelKey])) {
				$this->_fieldGroups[$modelKey] = true;
				$options['hiddenField'] => true;
			}
		}
		
		return $this->input($fieldName, $options);
	}
	
}
?>