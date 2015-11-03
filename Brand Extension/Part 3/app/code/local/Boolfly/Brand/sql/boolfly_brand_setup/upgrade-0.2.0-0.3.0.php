<?php
$installer = $this;
/* @var $installer Mage_Catalog_Model_Resource_Eav_Mysql4_Setup */

$installer->startSetup();

// adding attribute group
$installer->addAttributeGroup('catalog_product', 'Default', 'Brands Listing', 1000);

$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'boolfly_brand', array(
    'group' => 'Brand Listing',
    'label' => 'Brands',
    'input' => 'select',
    'type' => 'int',
    'user_defined' => 1,
    'visible' => 1,
    'required' => 0,
    'searchable' => 1,
    'source' => 'boolfly_brand/source_brand',
));
