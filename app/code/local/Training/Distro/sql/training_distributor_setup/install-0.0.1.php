<?php

// app/code/local/Training/Distro/sql/training_distro_setup/install-0.0.1.php

/* @var $installer Mage_Core_Model_Resource_Setup */

$installer = $this;
$installer->startSetup();

$tableName = $installer->getTable('distro/distributor');

if ($installer->getConnection()->isTableExists($tableName)){
    $installer->getConnection()->dropTable($tableName);
}

$table = $installer->getConnection()->newTable($tableName)
        ->addColumn('entity_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null,
                array(
                        'unsigned' => true,
                        'nullable' => false,
                        'primary' => true,
                        'identity' => true
                ), 'ID')
        ->addColumn('name', Varien_Db_Ddl_Table::TYPE_TEXT, '255',
                array(
                        'nullable' => false,
                        'default' => ''
                ), 'Distributor Name')
        ->addColumn('email', Varien_Db_Ddl_Table::TYPE_TEXT, '255',
                array(
                        'nullable' => false,
                        'default' => ''
                ), 'Distributor Email')
        ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_DATETIME, null,
                array(
                        'nullable' => false,
                ), 'Created At')
        ->addColumn('updated_at', Varien_Db_Ddl_Table::TYPE_DATETIME, null,
                array(
                        'nullable' => false,
                ), 'Modified At')
        ->addIndex(
                $installer->getIdxName($tableName, array('name')),
                array('name'),
                array('type' => Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE)
        )
        ->addIndex(
                $installer->getIdxName($tableName, array('email')),
                array('email'),
                array('type' => Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE)
        )
        ->setComment('Distributor Training Example Entity');

$installer->getConnection()->createTable($table);

$installer->getConnection()->addColumn($tableName, 'comment', array(
        'type' => Varien_Db_Ddl_Table::TYPE_TEXT,
        'nullable' => true,
        'length' => '1k',
        'comment' => 'Comment Field'
));



$installer->endSetup();
