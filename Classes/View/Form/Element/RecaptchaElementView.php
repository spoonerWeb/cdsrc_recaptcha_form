<?php
namespace CDSRC\CdsrcRecaptchaForm\View\Form\Element{

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

require_once(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('jm_recaptcha') . 'class.tx_jmrecaptcha.php');
    
/**
 * View object for the recaptcha input element
 *
 * @author 2014 Matthias Toscanelli <m.toscanelli@code-source.ch>
 */
class RecaptchaElementView extends \TYPO3\CMS\Form\View\Form\Element\AbstractElementView {

        
	/**
	 * Default layout of this object
	 *
	 * @var string
	 */
	protected $layout = '
		<label />
	';

        public function __construct(\TYPO3\CMS\Form\Domain\Model\Element\AbstractElement $model) {
            parent::__construct($model);
            $recaptchaObj = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('tx_jmrecaptcha');
            $this->layout .= htmlspecialchars($recaptchaObj->getReCaptcha());
        }
}
}

namespace TYPO3\CMS\Form\View\Form\Element{
    class RecaptchaElementView extends \CDSRC\CdsrcRecaptchaForm\View\Form\Element\RecaptchaElementView{}
}
