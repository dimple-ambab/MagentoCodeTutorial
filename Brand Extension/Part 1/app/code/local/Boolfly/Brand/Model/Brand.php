<?php
class Boolfly_Brand_Model_Brand extends  Mage_Core_Model_Abstract
{

    protected $_eventPrefix = 'boolfly_brand';
    protected $_eventObject = 'brand';

    protected function _construct()
    {
        $this->_init('boolfly_brand/brand');
    }
}