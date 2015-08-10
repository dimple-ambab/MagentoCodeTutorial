<?php
require_once dirname(__FILE__).'/../lib/Stripe.php';

class Boolfly_Stripe_Model_Payment extends Mage_Payment_Model_Method_Cc
{
    protected $_code = 'boolfly_stripe';
    protected $_isGateway = true;
    protected $_canCapture = true;

    /**
     * Getting Apikey from Stripe Payment
     */
    public function __construct()
    {
        Stripe\Stripe::setApiKey($this->getConfigData('api_key'));
    }

    /**
     * Capture payment method
     *
     * @param Varien_Object $payment
     * @param float $amount
     * @return $this
     * @throws Mage_Core_Exception
     */
    public function capture(Varien_Object $payment, $amount)
    {
        $order = $payment->getOrder();
        $billingAddress = $order->getBillingAddress();
        try {
            $api = Stripe\Charge::create(array(
                'amount' => $amount,
                'currency' => strtolower($order->getBaseCurrencyCode()),
                'card' => array(
                    'number' => $payment->getCcNumber(),
                    'exp_month' => sprintf('%02d', $payment->getCcExpMonth()),
                    'exp_year' => $payment->getCcExpYear(),
                    'cvc' => $payment->getCcCid(),
                    'name' => $billingAddress->getName(),
                    'address_line1' => $billingAddress->getStreet(1),
                    'address_line2' => $billingAddress->getStreet(2),
                    'address_zip' => $billingAddress->getPostcode(),
                    'address_state' => $billingAddress->getRegion(),
                    'address_country' => $billingAddress->getCountry(),
                ),
                'description' => sprintf('#%s, %s', $order->getIncrementId(), $order->getCustomerEmail())
            ));
        } catch (Exception $e) {
            $this->debugData($e->getMessage());
            Mage::throwException(Mage::helper('boolfly_stripe')->__('Payment capturing error.'));
        }
        $payment->setTransactionId($api->id)->setIsTransactionClosed(0);
        return $this;
    }

    /**
     * Refund a capture transaction
     *
     * @param Varien_Object $payment
     * @param float $amount
     * @return $this
     * @throws Mage_Core_Exception
     */
    public function refund(Varien_Object $payment, $amount)
    {
        $transactionId = $this->getParentTransactionId($payment);
        try {
            Stripe\Charge::retrieve($transactionId)->refund();

        } catch (Exception $e) {
            $this->debugData($e->getMessage());
            Mage::throwException(Mage::helper('boolfly_stripe')->__('Payment refunding error.'));
        }
        $payment->setTransactionId($transactionId. '-' . Mage_Sales_Model_Order_Payment_Transaction::TYPE_REFUND)
                ->setParentTransactionId($transactionId)
                ->setIsTransactionClosed(1)
                ->setShouldCloseParentTransaction(1);

        return $this;
    }

}