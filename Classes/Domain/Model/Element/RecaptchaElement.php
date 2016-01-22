<?php

namespace CDSRC\CdsrcRecaptchaForm\Domain\Model\Element{

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
 * Recaptcha model object
 *
 * @author Matthias Toscanelli <m.toscanelli@code-source.ch>
 */
class RecaptchaElement extends \TYPO3\CMS\Form\Domain\Model\Element\AbstractElement {

    /**
     * Allowed attributes for this object
     *
     * @var array
     */
    protected $allowedAttributes = array(
        'id' => ''
    );

    /**
     * Mandatory attributes for this object
     *
     * @var array
     */
    protected $mandatoryAttributes = array(
        'id'
    );

    /**
     * Check the request handler on input of this field,
     * filter the submitted data and add this to the right
     * datapart of the element
     *
     * @return \TYPO3\CMS\Form\Domain\Model\Element\RecaptchaElement
     * @see \TYPO3\CMS\Form\Domain\Model\Element\AbstractElement::checkFilterAndSetIncomingDataFromRequest()
     */
    public function checkFilterAndSetIncomingDataFromRequest() {
        if ($this->requestHandler->has($this->getName())) {
            $value = $this->filter->filter($this->requestHandler->getByMethod($this->getName()));
            $this->attributes->addAttribute('value', $value);
        }
        return $this;
    }

}
}

namespace TYPO3\CMS\Form\Domain\Model\Element{
    class RecaptchaElement extends \CDSRC\CdsrcRecaptchaForm\Domain\Model\Element\RecaptchaElement{}
}
