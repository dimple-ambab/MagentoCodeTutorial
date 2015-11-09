<?php
class Boolfly_Checkout_Block_Onepage extends Mage_Checkout_Block_Onepage
{
    public function getSteps()
    {
        $steps = array();

        if(!$this->isCustomerLoggedIn()) {
            $steps['login'] = $this->getCheckout()->getStepData('login');
        }
        //New Code adding step Delivery here
        $stepCodes = array('billing', 'shipping', 'shipping_method', 'billing_comment', 'payment', 'review');
        foreach ($stepCodes as $step) {
            $steps[$step] = $this->getCheckout()->getStepData($step);
        }

        return $steps;
    }
}