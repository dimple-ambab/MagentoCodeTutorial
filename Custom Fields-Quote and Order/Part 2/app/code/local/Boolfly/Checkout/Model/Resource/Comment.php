<?php

class Boolfly_Checkout_Model_Resource_Comment extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('boolfly_checkout/comment','comment_id');
    }

    public function loadCommentByIncrementId($comment, $incrementId)
    {
        $read = $this->_getReadAdapter();
        $select = $read->select()
            ->from($this->getMainTable())
            ->where('order_id = :order_id');
        $data = $read->fetchRow($select, array(':order_id' => $incrementId));
        if($data) {
            $comment->setData($data);
        }
        return $this;
    }
}