<?php
class Boolfly_Brand_Model_Resource_Brand extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('boolfly_brand/brand', 'brand_id');
    }
}