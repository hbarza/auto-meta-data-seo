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

class Codnitive_AutoMeta_Model_System_Config_Source_Prodmetadesc extends Mage_Core_Model_Config_Data
{

    const PRODUCT_SHORT_DESC = 'short_description';
    const CUSTOM_ATTRIBUTE   = 'custom_attribute';

    public function toOptionArray()
    {
        return array(
            array(
                'value' => self::PRODUCT_SHORT_DESC,
                'label' => Mage::helper('autometa')->__('Product Short Description')
            ),
            array(
                'value' => self::CUSTOM_ATTRIBUTE,
                'label' => Mage::helper('autometa')->__('Custom Attributes')
            ),
        );
    }

}
