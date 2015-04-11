<?php
/**
 * User: Mr Khoa
 */
require_once 'Mage/Newsletter/controllers/SubscriberController.php';
class Boolfly_Newsletter_SubscriberController extends Mage_Newsletter_SubscriberController
{

    public function indexAction(){
        echo 'Hello World';
    }
    /**
     * New Ajax Action
     */
    public function newAjaxAction() {
        $response = array();
        if ($this->getRequest()->isPost() && $this->getRequest()->getPost('email')) {
            $customerSession    = Mage::getSingleton('customer/session');
            $email              = (string) $this->getRequest()->getPost('email');
            try {
                if (!Zend_Validate::is($email, 'EmailAddress')) {
                    $response['status'] = 'ERROR';
                    $response['message'] = $this->__('Please enter a valid email address.');
                }
                if (Mage::getStoreConfig(Mage_Newsletter_Model_Subscriber::XML_PATH_ALLOW_GUEST_SUBSCRIBE_FLAG) != 1 &&
                    !$customerSession->isLoggedIn()) {
                    $response['status'] = 'ERROR';
                    $response['message'] = $this->__('Sorry, but administrator denied subscription for guests. Please <a href="%s">register</a>.', Mage::helper('customer')->getRegisterUrl());
                }
                $ownerId = Mage::getModel('customer/customer')
                    ->setWebsiteId(Mage::app()->getStore()->getWebsiteId())
                    ->loadByEmail($email)
                    ->getId();
                if ($ownerId !== null && $ownerId != $customerSession->getId()) {
                    $response['status'] = 'ERROR';
                    $response['message'] = $this->__('This email address is already assigned to another user.');
                }
                $status = Mage::getModel('newsletter/subscriber')->subscribe($email);
                if ($status == Mage_Newsletter_Model_Subscriber::STATUS_NOT_ACTIVE) {
                    $message = $this->__('Confirmation request has been sent.');
                    $response['status'] = 'SUCCESS';
                    $response['message'] = $message;
                }
                else {
                    $response['status'] = 'SUCCESS';
                    $response['message'] = $this->__('Thank you for your subscription.');
                }
            }
            catch (Mage_Core_Exception $e) {
                $response['status'] = 'ERROR';
                $response['message'] = $this->__('There was a problem with the subscription: %s', $e->getMessage());
                Mage::logException($e);
            }
            catch (Exception $e) {
                $response['status'] = 'ERROR';
                $response['message'] = $this->__('There was a problem with the subscription.');
                Mage::logException($e);
            }
        }
        $this->getResponse()->setBody(Mage::helper('core')->jsonEncode($response));
        return;
    }
}