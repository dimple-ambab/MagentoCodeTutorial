<?php

class Boolfly_Checkout_Block_Onepage_Comment
    extends Mage_Checkout_Block_Onepage_Abstract
{
    protected function _construct()
    {
        $this->getCheckout()->setStepData('billing_comment', array(
            'label'     => $this->__('Billing Comment'),
            'is_show'   => $this->isShow()
        ));
        parent::_construct();
    }
}