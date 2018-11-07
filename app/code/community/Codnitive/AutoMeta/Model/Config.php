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

class Codnitive_AutoMeta_Model_Config
{

	const PATH_NAMESPACE      = 'codnitiveseo';
	const EXTENSION_NAMESPACE = 'autometa';

	const PRODUCT_NAMESPACE   = 'autometa_product_meta';
	const MEDIA_NAMESPACE     = 'autometa_product_media';
	const CATEGORY_NAMESPACE  = 'autometa_category_meta';
	const CMS_PAGE_NAMESPACE  = 'autometa_cms_meta';

	const EXTENSION_NAME    = 'Auto Meta Data SEO';
	const EXTENSION_VERSION = '1.0.02';
	const EXTENSION_EDITION = 'Basic';

	public static function getNamespace()
	{
		return self::PATH_NAMESPACE . '/' . self::EXTENSION_NAMESPACE . '/';
	}

	public function getExtensionName()
	{
		return self::EXTENSION_NAME;
	}

	public function getExtensionVersion()
	{
		return self::EXTENSION_VERSION;
	}

	public function getExtensionEdition()
	{
		return self::EXTENSION_EDITION;
	}

	public static function getProductNamespace()
	{
		return self::PATH_NAMESPACE . '/' . self::PRODUCT_NAMESPACE . '/';
	}

	public static function getMediaNamespace()
	{
		return self::PATH_NAMESPACE . '/' . self::MEDIA_NAMESPACE . '/';
	}

	public static function getCategoryNamespace()
	{
		return self::PATH_NAMESPACE . '/' . self::CATEGORY_NAMESPACE . '/';
	}

	public static function getCmsNamespace()
	{
		return self::PATH_NAMESPACE . '/' . self::CMS_PAGE_NAMESPACE . '/';
	}

	public function isActive()
	{
		return Mage::getStoreConfig(self::getNamespace() . 'active');
	}

	public function isAutoFillProdMetaTitle()
	{
		if (!$this->isActive()) {
			return false;
		}
		return Mage::getStoreConfigFlag(self::getProductNamespace() . 'auto_fill');
	}

	public function getProdMetaTitleFillType()
	{
		return Mage::getStoreConfig(self::getProductNamespace() . 'fill_type');
	}

	public function getProdMetaTitleType()
	{
		return Mage::getStoreConfig(self::getProductNamespace() . 'meta_title');
	}

	public function getProdMetaTitleAttr()
	{
		return explode(',', Mage::getStoreConfig(self::getProductNamespace() . 'attr_title'));
	}

	public function getProdMetaTitleAttrSeparator()
	{
		return Mage::getStoreConfig(self::getProductNamespace() . 'separator');
	}

	public function getProdMetaTitleLength()
	{
		return Mage::getStoreConfig(self::getProductNamespace() . 'length');
	}

	public function getProdMetaTitleStaticPos()
	{
		return Mage::getStoreConfig(self::getProductNamespace() . 'static_pos');
	}

	public function getProdMetaTitleStaticCont()
	{
		return Mage::getStoreConfig(self::getProductNamespace() . 'static_content');
	}

	public function isAutoFillProdMetaKey()
	{
		if (!$this->isActive()) {
			return false;
		}
		return Mage::getStoreConfigFlag(self::getProductNamespace() . 'key_auto_fill');
	}

	public function getProdMetaKeyFillType()
	{
		return Mage::getStoreConfig(self::getProductNamespace() . 'key_fill_type');
	}

	public function getProdMetaKeyType()
	{
		return 'custom_attribute';
	}

	public function getProdMetaKeyAttr()
	{
		return explode(',', Mage::getStoreConfig(self::getProductNamespace() . 'attr_key'));
	}

	public function getProdMetaKeyAttrSeparator()
	{
		return Mage::getStoreConfig(self::getProductNamespace() . 'key_separator');
	}

	public function getProdMetaKeyLength()
	{
		return Mage::getStoreConfig(self::getProductNamespace() . 'key_length');
	}

	public function getProdMetaKeyStaticPos()
	{
		return Mage::getStoreConfig(self::getProductNamespace() . 'key_static_pos');
	}

	public function getProdMetaKeyStaticCont()
	{
		return Mage::getStoreConfig(self::getProductNamespace() . 'key_static_content');
	}

	public function isAutoFillProdMetaDesc()
	{
		if (!$this->isActive()) {
			return false;
		}
		return Mage::getStoreConfigFlag(self::getProductNamespace() . 'desc_auto_fill');
	}

	public function getProdMetaDescFillType()
	{
		return Mage::getStoreConfig(self::getProductNamespace() . 'desc_fill_type');
	}

	public function getProdMetaDescType()
	{
		return Mage::getStoreConfig(self::getProductNamespace() . 'meta_desc');
	}

	public function getProdMetaDescAttr()
	{
		return explode(',', Mage::getStoreConfig(self::getProductNamespace() . 'attr_desc'));
	}

	public function getProdMetaDescAttrSeparator()
	{
		return Mage::getStoreConfig(self::getProductNamespace() . 'desc_separator');
	}

	public function getProdMetaDescLength()
	{
		return Mage::getStoreConfig(self::getProductNamespace() . 'desc_length');
	}

	public function getProdMetaDescStaticPos()
	{
		return Mage::getStoreConfig(self::getProductNamespace() . 'desc_static_pos');
	}

	public function getProdMetaDescStaticCont()
	{
		return Mage::getStoreConfig(self::getProductNamespace() . 'desc_static_content');
	}

	public function isAutoFillImgLabel()
	{
		if (!$this->isActive()) {
			return false;
		}
		return Mage::getStoreConfigFlag(self::getMediaNamespace() . 'auto_fill');
	}

	public function getImgLabelFillType()
	{
		return Mage::getStoreConfig(self::getMediaNamespace() . 'fill_type');
	}

	public function getImgLabelType()
	{
		return Mage::getStoreConfig(self::getMediaNamespace() . 'image_label');
	}

	public function getImgLabelAttr()
	{
		return explode(',', Mage::getStoreConfig(self::getMediaNamespace() . 'attr_label'));
	}

	public function getImgLabelAttrSeparator()
	{
		return Mage::getStoreConfig(self::getMediaNamespace() . 'separator');
	}

	public function getImgLabelLength()
	{
		return Mage::getStoreConfig(self::getMediaNamespace() . 'length');
	}

	public function getImgLabelStaticPos()
	{
		return Mage::getStoreConfig(self::getMediaNamespace() . 'static_pos');
	}

	public function getImgLabelStaticCont()
	{
		return Mage::getStoreConfig(self::getMediaNamespace() . 'static_content');
	}

	public function isAutoFillCatMetaTitle()
	{
		if (!$this->isActive()) {
			return false;
		}
		return Mage::getStoreConfigFlag(self::getCategoryNamespace() . 'auto_fill');
	}

	public function getCatMetaTitleFillType()
	{
		return Mage::getStoreConfig(self::getCategoryNamespace() . 'fill_type');
	}

	public function getCatMetaTitleType()
	{
		return Mage::getStoreConfig(self::getCategoryNamespace() . 'meta_title');
	}

	public function getCatMetaTitleAttr()
	{
		return explode(',', Mage::getStoreConfig(self::getCategoryNamespace() . 'attr_title'));
	}

	public function getCatMetaTitleAttrSeparator()
	{
		return Mage::getStoreConfig(self::getCategoryNamespace() . 'separator');
	}

	public function getCatMetaTitleLength()
	{
		return Mage::getStoreConfig(self::getCategoryNamespace() . 'length');
	}

	public function getCatMetaTitleStaticPos()
	{
		return Mage::getStoreConfig(self::getCategoryNamespace() . 'static_pos');
	}

	public function getCatMetaTitleStaticCont()
	{
		return Mage::getStoreConfig(self::getCategoryNamespace() . 'static_content');
	}

	public function isAutoFillCatMetaKey()
	{
		if (!$this->isActive()) {
			return false;
		}
		return Mage::getStoreConfigFlag(self::getCategoryNamespace() . 'key_auto_fill');
	}

	public function getCatMetaKeyFillType()
	{
		return Mage::getStoreConfig(self::getCategoryNamespace() . 'key_fill_type');
	}

	public function getCatMetaKeyType()
	{
		return 'custom_attribute';
	}

	public function getCatMetaKeyAttr()
	{
		return explode(',', Mage::getStoreConfig(self::getCategoryNamespace() . 'attr_key'));
	}

	public function getCatMetaKeyAttrSeparator()
	{
		return Mage::getStoreConfig(self::getCategoryNamespace() . 'key_separator');
	}

	public function getCatMetaKeyLength()
	{
		return Mage::getStoreConfig(self::getCategoryNamespace() . 'key_length');
	}

	public function getCatMetaKeyStaticPos()
	{
		return Mage::getStoreConfig(self::getCategoryNamespace() . 'key_static_pos');
	}

	public function getCatMetaKeyStaticCont()
	{
		return Mage::getStoreConfig(self::getCategoryNamespace() . 'key_static_content');
	}

	public function isAutoFillCatMetaDesc()
	{
		if (!$this->isActive()) {
			return false;
		}
		return Mage::getStoreConfigFlag(self::getCategoryNamespace() . 'desc_auto_fill');
	}

	public function getCatMetaDescFillType()
	{
		return Mage::getStoreConfig(self::getCategoryNamespace() . 'desc_fill_type');
	}

	public function getCatMetaDescType()
	{
		return Mage::getStoreConfig(self::getCategoryNamespace() . 'meta_desc');
	}

	public function getCatMetaDescAttr()
	{
		return explode(',', Mage::getStoreConfig(self::getCategoryNamespace() . 'attr_desc'));
	}

	public function getCatMetaDescAttrSeparator()
	{
		return Mage::getStoreConfig(self::getCategoryNamespace() . 'desc_separator');
	}

	public function getCatMetaDescLength()
	{
		return Mage::getStoreConfig(self::getCategoryNamespace() . 'desc_length');
	}

	public function getCatMetaDescStaticPos()
	{
		return Mage::getStoreConfig(self::getCategoryNamespace() . 'desc_static_pos');
	}

	public function getCatMetaDescStaticCont()
	{
		return Mage::getStoreConfig(self::getCategoryNamespace() . 'desc_static_content');
	}

	public function isAutoFillCmsMetaKey()
	{
		if (!$this->isActive()) {
			return false;
		}
		return Mage::getStoreConfigFlag(self::getCmsNamespace() . 'key_auto_fill');
	}

	public function getCmsMetaKeyFillType()
	{
		return Mage::getStoreConfig(self::getCmsNamespace() . 'key_fill_type');
	}

	public function getCmsMetaKeyType()
	{
		return 'custom_attribute';
	}

	public function getCmsMetaKeyAttr()
	{
		return explode(',', Mage::getStoreConfig(self::getCmsNamespace() . 'attr_key'));
	}

	public function getCmsMetaKeyAttrSeparator()
	{
		return Mage::getStoreConfig(self::getCmsNamespace() . 'key_separator');
	}

	public function getCmsMetaKeyLength()
	{
		return Mage::getStoreConfig(self::getCmsNamespace() . 'key_length');
	}

	public function getCmsMetaKeyStaticPos()
	{
		return Mage::getStoreConfig(self::getCmsNamespace() . 'key_static_pos');
	}

	public function getCmsMetaKeyStaticCont()
	{
		return Mage::getStoreConfig(self::getCmsNamespace() . 'key_static_content');
	}

	public function isAutoFillCmsMetaDesc()
	{
		if (!$this->isActive()) {
			return false;
		}
		return Mage::getStoreConfigFlag(self::getCmsNamespace() . 'desc_auto_fill');
	}

	public function getCmsMetaDescFillType()
	{
		return Mage::getStoreConfig(self::getCmsNamespace() . 'desc_fill_type');
	}

	public function getCmsMetaDescType()
	{
		return 'custom_attribute';
	}

	public function getCmsMetaDescAttr()
	{
		return explode(',', Mage::getStoreConfig(self::getCmsNamespace() . 'attr_desc'));
	}

	public function getCmsMetaDescAttrSeparator()
	{
		return Mage::getStoreConfig(self::getCmsNamespace() . 'desc_separator');
	}

	public function getCmsMetaDescLength()
	{
		return Mage::getStoreConfig(self::getCmsNamespace() . 'desc_length');
	}

	public function getCmsMetaDescStaticPos()
	{
		return Mage::getStoreConfig(self::getCmsNamespace() . 'desc_static_pos');
	}

	public function getCmsMetaDescStaticCont()
	{
		return Mage::getStoreConfig(self::getCmsNamespace() . 'desc_static_content');
	}

}
