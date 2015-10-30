<?php

class Boolfly_Brand_Block_List extends Mage_Core_Block_Template
{
    public function getBrandsCollection()
    {
        $brandsCollection = Mage::getModel('boolfly_brand/brand')->getCollection()
            ->addFieldToFilter('visibility', Boolfly_Brand_Model_Brand::VISIBILITY_SHOW)
            ->setOrder('name', 'ASC')
            ->setPageSize(20);
        return $brandsCollection;
    }
}