<?php
$installer = $this;
/* @var $installer Mage_Core_Model_Resource_Setup */

$installer->startSetup();
$installer->getConnection()->addColumn(
    $installer->getTable('newsletter/subscriber'), 'newsletter_gender', "INT(2) AFTER subscriber_confirm_code");

$installer->endSetup();