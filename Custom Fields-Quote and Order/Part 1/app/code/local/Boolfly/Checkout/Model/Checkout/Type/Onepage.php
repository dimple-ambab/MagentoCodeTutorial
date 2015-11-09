<?php

class Boolfly_Checkout_Model_Checkout_Type_Onepage
    extends Mage_Checkout_Model_Type_Onepage {

    public function saveShippingMethod($shippingMethod)
    {
        if (empty($shippingMethod)) {
            return array('error' => -1, 'message' => Mage::helper('checkout')->__('Invalid shipping method.'));
        }
        $rate = $this->getQuote()->getShippingAddress()->getShippingRateByCode($shippingMethod);
        if (!$rate) {
            return array('error' => -1, 'message' => Mage::helper('checkout')->__('Invalid shipping method.'));
        }
        $this->getQuote()->getShippingAddress()
            ->setShippingMethod($shippingMethod);

        $this->getCheckout()
            ->setStepData('shipping_method', 'complete', true)
            ->setStepData('billing_comment', 'allow', true);

        return array();
    }
    public function saveBillingComment($data)
    {
        if(empty($data)) {
            return array('error' => -1, 'message' => $this->_helper->__('Invalid data.'));
        }
        $this->getCheckout()
            ->setStepData('billing_comment', 'allow', true)
            ->setStepData('billing_comment', 'complete', true)
            ->setStepData('payment', 'allow', true);
        return array();
    }
}