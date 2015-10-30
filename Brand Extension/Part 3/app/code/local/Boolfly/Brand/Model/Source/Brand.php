<?php

class Boolfly_Brand_Model_Source_Brand
    extends Mage_Eav_Model_Entity_Attribute_Source_Abstract
{
    public function getAllOptions()
    {
        $brandsCollection = Mage::getModel('boolfly_brand/brand')->getCollection()->setOrder('name', 'ASC');

        $options = array(
            array(
                'label' => Mage::helper('boolfly_brand')->__('Select'),
                'value' => ''
            ),
        );

        foreach($brandsCollection as $brand) {
            $options[] = array(
                'label' => $brand->getName(),
                'value' => $brand->getId(),
            );
        }
        return $options;
    }
}