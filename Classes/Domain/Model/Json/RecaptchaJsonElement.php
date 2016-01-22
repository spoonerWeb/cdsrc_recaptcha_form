<?php

namespace CDSRC\CdsrcRecaptchaForm\Domain\Model\Json{

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
 * JSON textline
 *
 * @author Matthias Toscanelli <m.toscanelli@code-source.ch>
 */
class RecaptchaJsonElement extends \TYPO3\CMS\Form\Domain\Model\Json\AbstractJsonElement {

    /**
     * The ExtJS xtype of the element
     *
     * @var string
     */
    public $xtype = 'typo3-form-wizard-elements-predefined-recaptcha';

    /**
     * The configuration array for the xtype
     *
     * @var array
     */
    public $configuration = array(
        'attributes' => array(
        ),
        'filters' => array(),
        'label' => array(
            'value' => ''
        ),
        'validation' => array()
    );

    /**
     * Allowed attributes for this object
     *
     * @var array
     */
    protected $allowedAttributes = array(
        'id'
    );

}
}

namespace TYPO3\CMS\Form\Domain\Model\Json{
    class RecaptchaJsonElement extends \CDSRC\CdsrcRecaptchaForm\Domain\Model\Json\RecaptchaJsonElement{}
}
