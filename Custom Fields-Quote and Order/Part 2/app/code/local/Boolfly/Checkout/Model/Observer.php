<?php

class Boolfly_Checkout_Model_Observer
{

    public function salesOrderPlaceAfter($observer)
    {
        $session = Mage::getSingleton("core/session");
        $sub = $session->getData('subj_billing_comment');
        $comment = $session->getData('billing_comment');

        $order = $observer->getEvent()->getOrder();
        $id = $order->getIncrementId();
        $bill_comment = Mage::getModel('boolfly_checkout/comment');
        $bill_comment->setData('order_id', $id);
        $bill_comment->setData('subj_comment', $sub);
        $bill_comment->setData('comment', $comment);
        try {
            $bill_comment->save();
        } catch(Exception $e) {
            Mage::logException($e);
        }

    }
}