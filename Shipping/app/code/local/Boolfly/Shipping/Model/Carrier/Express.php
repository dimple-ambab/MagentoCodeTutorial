<?php
class Boolfly_Shipping_Model_Carrier_Express extends
    Mage_Shipping_Model_Carrier_Abstract
    implements Mage_Shipping_Model_Carrier_Interface
{
    protected $_code = 'boolfly_shipping_express';


    public function collectRates(Mage_Shipping_Model_Rate_Request $request)
    {
        $result = Mage::getModel('shipping/rate_result');

        //Check if our method is enabled

        if($this->getConfigData('active'))
        {
            $method = Mage::getModel('shipping/rate_result_method');

            $method->setCarrier($this->_code);
            $method->setCarrierTitle($this->getConfigData('title'));

            $method->setMethod($this->_code);
            $method->setMethodTitle($this->getConfigData('title'));

            $method->setCost($this->getConfigData('express_price'));
            $method->setPrice($this->getConfigData('express_price'));

            $result->append($method);

            return $result;
        }
    }

    public function getAllowedMethods()
    {
        return array($this->_code => $this->getConfigData('name'));
    }
}