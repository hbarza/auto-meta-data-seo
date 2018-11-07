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

class Codnitive_AutoMeta_Model_System_Config_Source_Catattributeslist extends Mage_Core_Model_Config_Data
{

    protected $_invalidTypes = array(
        'gallery', 'media_image', 
        'multiselect',
    );
    
    public function toOptionArray()
    {
        $entityTypeId = Mage::getModel('eav/entity')
                ->setType('catalog_category')
                ->getTypeId();
        
        $attributes = Mage::getModel('eav/entity_attribute')
                ->getCollection()
                ->setEntityTypeFilter($entityTypeId)
                ->load();
        
        foreach ($attributes  as $attribute) {
            $attrCode      = $attribute->getAttributeCode();
            $frontendInput = $attribute->getFrontendInput();
            
            $condition1 = in_array($frontendInput, $this->_invalidTypes);
            
            if ($condition1) {
                continue;
            }
            
            $attrName = $attribute->getFrontendLabel();
            $label    = empty($attrName) ? $attrCode : $attrName;
            
            $attrs[$attribute->getAttributeId()] = array(
                'value' => $attrCode,
                'label' => Mage::helper('autometa')->__($label)
            );
        }
        
        return $attrs;
    }

}
