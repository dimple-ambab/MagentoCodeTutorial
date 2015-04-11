<?php
$installer = $this;
$installer->startSetup();
// Add Catalog Default Sort Attributes
$installer->addAttribute('catalog_product', 'testing_attribute', array(
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'Testing Attributes',
    'required'      => 0,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
    'visible'       => 1,
    'group'         => 'General'
//    'sort'          => 50
));
$installer->endSetup();
