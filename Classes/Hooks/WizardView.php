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
 * WizardView hook object
 *
 * @author Matthias Toscanelli <m.toscanelli@code-source.ch>
 */
class WizardView {

    public function render(array $params, \TYPO3\CMS\Form\View\Wizard\WizardView $wizard) {
        // Load necessary JavaScript
        $this->loadJavascript($wizard);
        // Load necessary CSS
        $this->loadCss($wizard);
        // Localization
        $this->loadLocalization($wizard);
    }

    /**
     * Load the necessarry css
     *
     * This will only be done when the referenced record is available
     *
     * @return void
     */
    protected function loadCss(\TYPO3\CMS\Form\View\Wizard\WizardView $wizard) {
        // TODO Set to TRUE when finished
        $compress = FALSE;
        $cssFiles = array(
            'Wizard/Form.css',
            'Wizard/Wizard.css'
        );
        $baseUrl = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('cdsrc_recaptcha_form') . 'Resources/Public/CSS/';
        // Load the wizards css
        foreach ($cssFiles as $cssFile) {
            $wizard->doc->getPageRenderer()->addCssFile($baseUrl . $cssFile, 'stylesheet', 'all', '', $compress, FALSE);
        }
    }

    /**
     * Load the necessarry javascript
     *
     * This will only be done when the referenced record is available
     *
     * @return void
     */
    protected function loadJavascript(\TYPO3\CMS\Form\View\Wizard\WizardView $wizard) {
        $compress = TRUE;
        $javascriptFiles = array(
            'Elements/Predefined/Recaptcha.js',
            'Viewport/Left/Elements/PredefinedRecaptcha.js',
            'Viewport/Left/Options/Forms/Validation/Recaptcha.js',
        );
        // Load the wizards javascript
        $baseUrl = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('cdsrc_recaptcha_form') . 'Resources/Public/JavaScript/Wizard/';
        foreach ($javascriptFiles as $javascriptFile) {
            $wizard->doc->getPageRenderer()->addJsFile($baseUrl . $javascriptFile, 'text/javascript', $compress, FALSE);
        }
    }

    /**
     * Reads locallang file into array (for possible include in header)
     *
     * @return void
     */
    protected function loadLocalization(\TYPO3\CMS\Form\View\Wizard\WizardView $wizard) {
        $wizardLabels = $GLOBALS['LANG']->includeLLFile('EXT:cdsrc_recaptcha_form/Resources/Private/Language/locallang_wizard.xlf', FALSE, TRUE);
        $wizard->doc->getPageRenderer()->addInlineLanguageLabelArray($wizardLabels['default']);
    }

}

?>