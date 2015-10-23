<?php
require_once 'Mage/Customer/controllers/AccountController.php';
class Boolfly_Newsletter_AccountController extends Mage_Customer_AccountController {

    /**
     * Get Customer Model
     *
     * @return Mage_Customer_Model_Customer
     */
    protected function _getCustomer()
    {
        $customer = $this->_getFromRegistry('current_customer');
        if (!$customer) {
            $customer = $this->_getModel('customer/customer')->setId(null);
        }
        if ($this->getRequest()->getParam('is_subscribed', false)) {
            $customer->setIsSubscribed(1);
            if($gender = $this->getRequest()->getPost('sub_gender') ) {
                Mage::register('sub_gender',$gender);
            }
        }
        /**
         * Initialize customer group id
         */
        $customer->getGroupId();

        return $customer;
    }
}