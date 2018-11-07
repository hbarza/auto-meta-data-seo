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

abstract class Codnitive_AutoMeta_Model_Observer_Abstract extends Mage_Core_Model_Abstract
{
    
    protected $_config;
    protected $_partNameType;
    protected $_object;
    protected $_metaInfo = array();
    
    public function __construct()
    {
        $this->_config = Mage::getModel('autometa/config');
    }
    
    public function autoMetaData()
    {
        if (!$this->_config->isActive()) {
            return;
        }
        
        foreach ($this->_metaInfo as $data) {
            $partName       = $this->getPartName($data);
            $fillTypeMethod = $partName . 'FillType';
            $fillType       = $this->_config->$fillTypeMethod();
            $isAutoMethod   = str_replace('get', 'isAutoFill', $partName);
            
            if ($this->_config->$isAutoMethod()) {
                $currentValue = $this->_object->getData($data);
                
                if ($data == 'media_gallery') {
                    $imgsArr  = json_decode($currentValue['images']);
                    foreach ($imgsArr as &$image) {
                        $currentLabel = $image->label;
                        $condition = ('just_empty' == $fillType && empty($currentLabel))
                            || 'always' == $fillType;
                        
                        if ($condition) {
                            $label = $this->getMetaData($data);
                            $image->label = $image->label_default = $label;
                        }
                    }
                    
                    $imgsStr['images'] = json_encode($imgsArr);
                    $this->_object->setMediaGallery($imgsStr);
                }
                else {
                    $condition = ('just_empty' == $fillType && empty($currentValue))
                        || 'always' == $fillType;

                    if ($condition) {
                        $newValue = $this->getMetaData($data);
                        $this->_object->setData($data, $newValue);
                    }
                }
            }
        }
    }
    
    public function getMetaData($data)
    {
        $partName        = $this->getPartName($data);
        $TypeMethod      = $partName . 'Type';
        $lengthMethod    = $partName . 'Length';
        $attrMethod      = $partName . 'Attr';
        $separatorMethod = $partName . 'AttrSeparator';
        
        $newValue = $this->getFieldValue(
                        $data,
                        $this->_config->$TypeMethod(),
                        $this->_config->$lengthMethod(),
                        $this->_config->$attrMethod(),
                        $this->_config->$separatorMethod()
                    );
        return $newValue;
    }
    
    public function getFieldValue($data, $valueType, $length, $attributes = null, $separator = null)
    {
        $length = intval($length);
        $value  = '';
        
        $partName          = $this->getPartName($data);
        var_dump($data);
        var_dump($partName);
        $statitcPosMethod  = $partName . 'StaticPos';
        $staticContPos     = $this->_config->$statitcPosMethod();
        $statitcContMethod = $partName . 'StaticCont';
        $staticContent     = $this->_config->$statitcContMethod();
        
        if ('just' == $staticContPos) {
            $value = $staticContent;
        }
        else {
            if ('custom_attribute' == $valueType) {
                $value = $this->getCustomAttrValue($attributes, $separator);
            }
            else {
                $value = $this->_object->getData($valueType);
            }
        }
        
        if ('no' != $staticContPos) {
            if ('first' == $staticContPos) {
                $value = $staticContent . $separator . $value;
            }
            else if ('end' == $staticContPos) {
                $value .= $separator . $staticContent;
            }
        }
        $value = trim($value, $separator);
        
        if ($length > 0) {
            $value = rtrim(substr($value, 0, $length));
        }
        
        return $value;
    }
    
    public function getCustomAttrValue($attributes, $separator)
    {
        $valueStr = '';
        foreach ($attributes as $attribute) {
            $value = $this->_object->getData($attribute);
            if (is_array($value) && !empty($value)) {
                foreach ($value as $val) {
                    $valueStr .= $separator . $val['line_title'];
                }
            }
            else if (!is_null($value)) {
                $valueStr .= $separator . $value;
            }
        }
        return trim($valueStr, $separator);
    }
    
    public function getPartName($data)
    {
        $partName = '';
        $type = $this->_partNameType;
        
        switch ($data) {
            case 'meta_title':
                $partName = 'get' . ucfirst($type) . 'MetaTitle';
                break;
                
            case 'meta_keyword':
            case 'meta_keywords':
                $partName = 'get' . ucfirst($type) . 'MetaKey';
                break;
            
            case 'meta_description':
                $partName = 'get' . ucfirst($type) . 'MetaDesc';
                break;
            
            case 'media_gallery':
                $partName = 'getImgLabel';
                break;
        }
        
        return $partName;
    }

}
