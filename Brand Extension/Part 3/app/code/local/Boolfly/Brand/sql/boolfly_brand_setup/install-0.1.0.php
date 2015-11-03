<?php
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;
$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('boolfly_brand/brand'))
    ->addColumn('brand_id', Varien_Db_Ddl_Table::TYPE_INTEGER, 10, array(
        'auto_increment' => true,
        'unsigned' => true,
        'nullable' => false,
        'primary'  => true,
    ), 'Brand Id')
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
        'nullable' => false,
    ), 'Name of Brand')
    ->addColumn('url_key', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable' => false,
    ), 'Url key of Brand')
    ->addColumn('description', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable' => false,
    ), 'Description of Brand')
    ->addColumn('visibility', Varien_Db_Ddl_Table::TYPE_BOOLEAN, null, array(
        'nullable' => false,
    ). 'Visibility')
    ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
        'nullable' => false,
    ), 'Created at')
    ->addColumn('updated_at', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
        'nullable' => false,
    ), 'Updated at')
    ->setComment('Boolfly Brand Entity');

$installer->getConnection()->createTable($table);
$installer->endSetup();