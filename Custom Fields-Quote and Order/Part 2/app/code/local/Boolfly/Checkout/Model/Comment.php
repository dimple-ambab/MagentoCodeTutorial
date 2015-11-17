<?php

class Boolfly_Checkout_Model_Comment extends Mage_Core_Model_Abstract
{
    protected $_eventPrefix = 'boolfly_checkout';
    protected $_eventObject = 'comment';

    protected function _construct()
    {
        $this->_init('boolfly_checkout/comment');
    }
}