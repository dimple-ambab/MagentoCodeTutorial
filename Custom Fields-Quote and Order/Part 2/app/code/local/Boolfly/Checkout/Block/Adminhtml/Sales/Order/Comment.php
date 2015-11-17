<?php

class Boolfly_Checkout_Block_Adminhtml_Sales_Order_Comment
    extends Mage_Core_Block_Template
{
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
