<?php
namespace CDSRC\CdsrcRecaptchaForm\Domain\Factory;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Matthias Toscanelli <m.toscanelli@code-source.ch>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Json to Typoscript converter
 *
 * Takes the incoming Json and converts it to Typoscipt
 *
 * @author Matthias Toscanelli <m.toscanelli@code-source.ch>
 */
class JsonToTypoScript extends \TYPO3\CMS\Form\Domain\Factory\JsonToTypoScript{

        protected $hooks = array();
    
        public function __construct() {
            if (is_array($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['form']['hooks']['JsonToTypoScript'])) {
                    foreach ($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['form']['hooks']['JsonToTypoScript'] as $className) {
                            $this->hooks[] = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance($className);
                    }
            }
        }
        
	/**
	 * Converts the JSON array for each element to a TypoScript array
	 * and adds this Typoscript array to the parent
	 *
	 * @param array $elements The JSON array
	 * @param array $parent The parent element
	 * @param boolean $childrenWithParentName Indicates if the children use the parent name
	 * @return void
	 */
	protected function convertToTyposcriptArray(array $elements, array &$parent, $childrenWithParentName = FALSE) {
		if (is_array($elements)) {
			$elementCounter = 10;
			foreach ($elements as $element) {
				if ($element['xtype']) {
					$this->elementId++;
					switch ($element['xtype']) {
						case 'typo3-form-wizard-elements-basic-button':

						case 'typo3-form-wizard-elements-basic-checkbox':

						case 'typo3-form-wizard-elements-basic-fileupload':

						case 'typo3-form-wizard-elements-basic-hidden':

						case 'typo3-form-wizard-elements-basic-password':

						case 'typo3-form-wizard-elements-basic-radio':

						case 'typo3-form-wizard-elements-basic-reset':

						case 'typo3-form-wizard-elements-basic-select':

						case 'typo3-form-wizard-elements-basic-submit':

						case 'typo3-form-wizard-elements-basic-textarea':

						case 'typo3-form-wizard-elements-basic-textline':

						case 'typo3-form-wizard-elements-predefined-email':

						case 'typo3-form-wizard-elements-content-header':

						case 'typo3-form-wizard-elements-content-textblock':
							$this->getDefaultElementSetup($element, $parent, $elementCounter, $childrenWithParentName);
							break;
						case 'typo3-form-wizard-elements-basic-fieldset':

						case 'typo3-form-wizard-elements-predefined-name':
							$this->getDefaultElementSetup($element, $parent, $elementCounter);
							$this->getContainer($element, $parent, $elementCounter);
							break;
						case 'typo3-form-wizard-elements-predefined-checkboxgroup':

						case 'typo3-form-wizard-elements-predefined-radiogroup':
							$this->getDefaultElementSetup($element, $parent, $elementCounter);
							$this->getContainer($element, $parent, $elementCounter, TRUE);
							break;
						case 'typo3-form-wizard-elements-basic-form':
							$this->getDefaultElementSetup($element, $parent, $elementCounter);
							$this->getContainer($element, $parent, $elementCounter);
							$this->getForm($element, $parent, $elementCounter);
							break;
						default:
                                                    foreach($this->hooks as &$hook){
                                                        if(method_exists($hook, 'convertToTyposcriptArray')){
                                                            $hook->convertToTyposcriptArray($element, $elementCounter, $parent, $childrenWithParentName, $this);
                                                        }
                                                    }
					}
				}
				$elementCounter = $elementCounter + 10;
			}
		}
	}

	/**
	 * Returns the content object type which is related to the ExtJS xtype
	 *
	 * @param array $element The JSON array for this element
	 * @return string The Content Object Type
	 */
	protected function getContentObjectType(array $element) {
		$contentObjectType = NULL;
		$shortXType = str_replace('typo3-form-wizard-elements-', '', $element['xtype']);
		list($category, $type) = explode('-', $shortXType);
		switch ($category) {
			case 'basic':
				$contentObjectType = strtoupper($type);
				break;
			case 'predefined':
				switch ($type) {
				case 'checkboxgroup':

				case 'radiogroup':
					$contentObjectType = strtoupper($type);
					break;
				case 'email':
					$contentObjectType = 'TEXTLINE';
					break;
				case 'name':
					$contentObjectType = 'FIELDSET';
				}
				break;
			case 'content':
				switch ($type) {
				case 'header':

				case 'textblock':
					$contentObjectType = strtoupper($type);
				}
			default:

		}
                if($contentObjectType === NULL){
                        foreach($this->hooks as &$hook){
                                if(method_exists($hook, 'getContentObjectType')){
                                        $contentObjectType = $hook->getContentObjectType($contentObjectType, $element, $this);
                                }
                        }
                }
		return $contentObjectType;
	}

	/**
	 * Changes the layout of some elements when this has been set in the wizard
	 *
	 * The wizard only uses 'back' or 'front' to set the layout. The TypoScript
	 * of the form uses a XML notation for the position of the label to the
	 * field.
	 *
	 * @param array $element The JSON array for this element
	 * @param string $value The layout setting, back or front
	 * @param array $parent The parent element
	 * @param integer $elementCounter The element counter
	 * @return void
	 */
	protected function setLayout(array $element, $value, array &$parent, $elementCounter) {
		switch ($element['xtype']) {
			case 'typo3-form-wizard-elements-basic-button':

			case 'typo3-form-wizard-elements-basic-fileupload':

			case 'typo3-form-wizard-elements-basic-password':

			case 'typo3-form-wizard-elements-basic-reset':

			case 'typo3-form-wizard-elements-basic-submit':

			case 'typo3-form-wizard-elements-basic-textline':
				if ($value === 'back') {
					$parent[$elementCounter . '.']['layout'] = '<input />' . chr(10) . '<label />';
				}
				break;
			case 'typo3-form-wizard-elements-basic-checkbox':

			case 'typo3-form-wizard-elements-basic-radio':
				if ($value === 'front') {
					$parent[$elementCounter . '.']['layout'] = '<label />' . chr(10) . '<input />';
				}
				break;
			case 'typo3-form-wizard-elements-basic-select':
				if ($value === 'back') {
					$parent[$elementCounter . '.']['layout'] = '<select>' . chr(10) . '<elements />' . chr(10) . '</select>' . chr(10) . '<label />';
				}
				break;
			case 'typo3-form-wizard-elements-basic-textarea':
				if ($value === 'back') {
					$parent[$elementCounter . '.']['layout'] = '<textarea />' . chr(10) . '<label />';
				}
				break;
			default:
                                foreach($this->hooks as &$hook){
                                        if(method_exists($hook, 'setLayout')){
                                                $hook->setLayout($element, $value, $parent, $elementCounter, $this);
                                        }
                                }
		}
	}

        public function getDefaultElementSetup(array $element, array &$parent, $elementCounter, $childrenWithParentName = FALSE) {
            parent::getDefaultElementSetup($element, $parent, $elementCounter, $childrenWithParentName);
        }
}
