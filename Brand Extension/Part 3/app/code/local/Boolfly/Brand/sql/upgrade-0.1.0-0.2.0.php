<?php
$installer = $this;
/* @var $installer Mage_Core_Model_Resource_Setup */

$installer->startSetup();
$installer->getConnection()->addColumn(
    $installer->getTable('boolfly_brand_user'), 'brand_image', "text AFTER updated_at");

$installer->endSetup();