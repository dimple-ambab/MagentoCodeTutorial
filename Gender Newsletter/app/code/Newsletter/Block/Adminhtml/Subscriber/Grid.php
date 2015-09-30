<?php

class Boolfly_Newsletter_Block_Adminhtml_Subscriber_Grid
    extends Mage_Adminhtml_Block_Newsletter_Subscriber_Grid {

    protected function _prepareColumns()
    {
        parent::_prepareColumns();

        $this->addColumn('newsletter_gender', array(
            'header' => Mage::helper('newsletter')->__('Gender'),
            'index' => 'newsletter_gender',
            'type' => 'options',
            'width' => '120',
            'options' => Mage::helper('boolfly_newsletter/gender')->getGender()
        ));
    }
}