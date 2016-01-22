<?php
namespace CDSRC\CdsrcRecaptchaForm\Hooks;

/* * *************************************************************
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
 * ************************************************************* */

/**
 * JsonToTypoScript hook object
 *
 * @author Matthias Toscanelli <m.toscanelli@code-source.ch>
 */
class JsonToTypoScript {

    protected $extJsXType = 'typo3-form-wizard-elements-predefined-recaptcha';
    
    /**
     * 
     * Converts the JSON Recaptcha element
     * 
     * @param array $element The JSON element
     * @param integer $elementCounter Current element counter
     * @param array $parent The parent element
     * @param boolean $childrenWithParentName Indicates if the children use the parent name
     * @param TYPO3\CMS\Form\Domain\Factory\JsonToTypoScript $pobj
     * 
     * @return void
     */
    public function convertToTyposcriptArray(&$element, $elementCounter, &$parent, $childrenWithParentName, &$pobj){
        if($element['xtype'] === $this->extJsXType){
            $pobj->getDefaultElementSetup($element, $parent, $elementCounter, $childrenWithParentName);
        }
    }
    

    /**
     * Returns the content object type for Recaptcha
     * 
     * @param string $contentObjectType
     * @param array $element
     * @param TYPO3\CMS\Form\Domain\Factory\JsonToTypoScript $pobj
     */
    public function getContentObjectType($contentObjectType, &$element, &$pobj){
        if($element['xtype'] === $this->extJsXType){
            $contentObjectType = 'RECAPTCHA';
        }
        return $contentObjectType;
    }

}

?>