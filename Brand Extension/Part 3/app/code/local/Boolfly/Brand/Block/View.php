<?php
class Boolfly_Brand_Block_View extends Mage_Core_Block_Template
{
    /**
     * Get current brand information
     */
    public function getCurrentBrand()
    {
        return Mage::registry('current_brand');
    }

    /**
     * Getting associated products with current brand.
     */
    public function getProductCollection()
    {
        $brand = $this->getCurrentBrand();
        if(!$brand) {
            return array();
        }
        $productCollection = Mage::getModel('catalog/product')->getCollection()
                ->addAttributeToSelect('name')
                ->addAttributeToSelect('url_key')
                ->addAttributeToFilter('boolfly_brand', $brand->getId())
                ->setOrder('name', 'ASC')
                ->setPageSize(20);

        return $productCollection;
    }
}