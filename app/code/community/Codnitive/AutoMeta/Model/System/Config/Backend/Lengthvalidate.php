<?php
/**
 * CODNITIVE
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE_EULA.html.
 * It is also available through the world-wide-web at this URL:
 * http://www.codnitive.com/en/terms-of-service-softwares/
 * http://www.codnitive.com/fa/terms-of-service-softwares/
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade to newer
 * versions in the future.
 *
 * @category   Codnitive
 * @package    Codnitive_AutoMeta
 * @author     Hassan Barza <support@codnitive.com>
 * @copyright  Copyright (c) 2012 CODNITIVE Co. (http://www.codnitive.com)
 * @license    http://www.codnitive.com/en/terms-of-service-softwares/ End User License Agreement (EULA 1.0)
 */

class Codnitive_AutoMeta_Model_System_Config_Backend_Lengthvalidate extends Mage_Core_Model_Config_Data
{

    private $_type = 'Length';

    protected function _beforeSave()
    {
        $value = intval($this->getValue());
        
        if ($value < 8 || $value > 255) {
            Mage::throwException(Mage::helper('autometa')->__('%s is not valid.', 
                    Mage::helper('autometa')->__($this->_type)));
        }
    }

}
