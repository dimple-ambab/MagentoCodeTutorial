<?php
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;
$installer->startSetup();

$tableName = $installer->getTable('boolfly_checkout/billing_comment');
//Check if the table already exists
if($installer->getConnection()->isTableExists($tableName) != true) {
    $table = $installer->getConnection()
        ->newTable($installer->getTable('boolfly_checkout/billing_comment'))
        ->addColumn('comment_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
            'auto_increment' => true,
            'identity'  => true,
            'unsigned'  => true,
            'nullable'  => false,
            'primary'   => true,
        ), 'Billing Comment Id')
        ->addColumn('order_id', Varien_Db_Ddl_Table::TYPE_VARCHAR, 50, array(
            'nullable'  => false,
        ), 'Order Id')
        ->addColumn('subj_comment', Varien_Db_Ddl_Table::TYPE_TEXT, 250, array(
            'nullable'  => true,
        ), 'Subject Billing Comment')
        ->addColumn('comment', Varien_Db_Ddl_Table::TYPE_TEXT, 250, array(
            'nullable'  => true,
        ), 'Billing Comment')
        ->setComment('Billing Comment Table');
    $installer->getConnection()->createTable($table);
}