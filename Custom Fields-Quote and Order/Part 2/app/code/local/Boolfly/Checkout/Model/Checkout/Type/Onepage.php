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
        $session = Mage::getSingleton("core/session");
        $quote = $this->getQuote();
        $quote->setSubjBillingComment($data['subj_billing_comment']);
        $quote->setBillingComment($data['billing_comment']);

        $session->setData('subj_billing_comment',$data['subj_billing_comment']);
        $session->setData('billing_comment',$data['billing_comment']);

        $this->getCheckout()
            ->setStepData('billing_comment', 'allow', true)
            ->setStepData('billing_comment', 'complete', true)
            ->setStepData('payment', 'allow', true);
        return array();
    }
}