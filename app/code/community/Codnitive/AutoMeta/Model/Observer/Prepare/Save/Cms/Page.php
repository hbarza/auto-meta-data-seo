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

class Codnitive_AutoMeta_Model_Observer_Prepare_Save_Cms_Page 
    extends Codnitive_AutoMeta_Model_Observer_Abstract 
{
    
    protected $_metaInfo = array(
        'meta_keywords', 'meta_description',
    );
    
    public function __construct()
    {
        parent::__construct();
        $this->_partNameType = 'Cms';
    }
    
    public function cmsPageSaveBefore(Varien_Event_Observer $observer)
    {
        if (!$this->_config->isActive()) {
            return;
        }
        
        $this->_object = $observer->getPage();
        $this->autoMetaData();
        
    }

}
