<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}


require_once(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('cdsrc_recaptcha_form') . 'Classes/Domain/Model/Element/RecaptchaElement.php');
require_once(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('cdsrc_recaptcha_form') . 'Classes/Domain/Model/Json/RecaptchaJsonElement.php');
require_once(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('cdsrc_recaptcha_form') . 'Classes/Validation/RecaptchaValidator.php');
require_once(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('cdsrc_recaptcha_form') . 'Classes/View/Form/Element/RecaptchaElementView.php');

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['form']['hooks']['renderWizard'][] = 'CDSRC\\CdsrcRecaptchaForm\\Hooks\\WizardView->render';
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['form']['hooks']['JsonToTypoScript'][] = 'CDSRC\\CdsrcRecaptchaForm\\Hooks\\JsonToTypoScript';

$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects']['TYPO3\\CMS\\Form\\Domain\\Factory\\JsonToTypoScript'] = array('className' => 'CDSRC\\CdsrcRecaptchaForm\\Domain\\Factory\\JsonToTypoScript');

\TYPO3\CMS\Form\Utility\FormUtility::getInstance()->setFormObjects(
        array_merge(
                \TYPO3\CMS\Form\Utility\FormUtility::getInstance()->getFormObjects(), array('RECAPTCHA')
        )
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TSconfig/modWizards.ts">');
?>
