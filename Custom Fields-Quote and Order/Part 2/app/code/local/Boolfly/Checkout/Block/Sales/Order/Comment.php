<?php


class Boolfly_Checkout_Block_Sales_Order_Comment extends Mage_Core_Block_Template {

    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('boolfly/sales/order/billing_comment.phtml');
    }

    /**
     * Getting data from billing comment table.
     * @return $this
     */
    public function getBillingComment()
    {
        $order = Mage::registry('current_order');
        Mage::getResourceModel('boolfly_checkout/comment')
                ->loadCommentByIncrementId($this, $order->getIncrementId());
        return $this;
    }
}