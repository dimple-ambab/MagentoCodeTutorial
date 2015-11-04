<?php
class Boolfly_Brand_Helper_Brand extends Mage_Core_Helper_Abstract
{

    /**
     * Generate brand ulr
     */
    public function getBrandUrl(Boolfly_Brand_Model_Brand $brand)
    {
        if(! $brand instanceof Boolfly_Brand_Model_Brand) {
            return '#';
        }
        $brandUrl = $brand->getUrlKey();
        $url = $this->_getUrl('brand/brand/view' . $brandUrl, array(
            'url_key' => $brand->getUrlKey()));
        return $url;
    }

    public function isEnabled()
    {
        $config = Mage::getStoreConfig('boolfly_brand/enabled');
        return $config;
    }
}