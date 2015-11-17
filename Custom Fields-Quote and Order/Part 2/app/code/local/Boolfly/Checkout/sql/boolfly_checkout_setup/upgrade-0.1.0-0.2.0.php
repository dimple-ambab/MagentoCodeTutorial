<?php

/* @var $installer Mage_Eav_Model_Entity_Setup */
$installer = $this;
$installer->startSetup();

$orderTypeId = Mage::getModel('eav/entity_type')->loadByCode('order')->getEntityTypeId();
if($orderTypeId){
    $installer->removeAttribute($orderTypeId, 'subj_billing_comment');
    $installer->removeAttribute($orderTypeId, 'billing_comment');

    $installer->addAttribute($orderTypeId, 'subj_billing_comment', array('label' => 'Subject Comment','type' => 'text','input' => 'text','required'=>1));
    $installer->addAttribute($orderTypeId, 'billing_comment', array('label' => 'Billing Comment','type' => 'text','input' => 'textarea','required'=>1));
}

$installer->endSetup();
