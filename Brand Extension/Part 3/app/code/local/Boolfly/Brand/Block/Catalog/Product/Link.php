<?php
class Boolfly_Brand_Block_Catalog_Product_Link
    extends Mage_Core_Block_Template
{
    public function getAssociatedBrand()
    {
       $product = Mage::registry('current_product');
        if(!$product instanceof Mage_Catalog_Model_Product){
            return false;
        }

        $brandId = (int) $product->getBoolflyBrand();
        $brand = Mage::getModel('boolfly_brand/brand')->load($brandId);
        if($brand->getId() < 1) {
            return false;
        }

        return $brand;
    }
}