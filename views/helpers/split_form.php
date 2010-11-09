<?php
/**
* 
*/
class SplitFormHelper extends AppHelper {
	
	var $helpers = array('Form');
	
	var $_fieldGroups = array();
	
	/**
	 * Generates individual inputs or input groups based on the values passed
	 *
	 * @param string $fieldName 
	 * @param mixed $values 
	 * @param array $options 
	 * @return void
	 * @author Dean
	 */
	public function input($fieldName, $values, $options = array()) {
		$options = array_merge(array(
		), $options);
		$result = '';
		
		if (!isset($this->_fieldGroups[$fieldName])) {
			$this->_fieldGroups[$fieldName] = true;
			$result .= $this->Form->hidden($fieldName . '.' . $fieldName);
		}
		
		if (!isset($options['label'])) {
			$view =& ClassRegistry::getObject('view');
			$varName = Inflector::variable(
				Inflector::pluralize(preg_replace('/_id$/', '', $fieldName))
			);
			$varOptions = $view->getVar($varName);
			$options['label'] = $varOptions[$values];
		}
		
		$options['hiddenField'] = false;
		$options['value'] = $values;
		$options['name'] = "data[{$fieldName}][{$fieldName}][]";
		$options['type'] = 'checkbox';
		$options['checked'] = (
			isset($this->data[$fieldName][$fieldName])
			&& is_array($this->data[$fieldName][$fieldName])
			&& !in_array($values, $this->data[$fieldName][$fieldName])
		) ? false : true;
		
		$result .= $this->Form->input($fieldName . $values, $options);
		return $result;
	}
	
}
?>