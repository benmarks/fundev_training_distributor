<?php

    $installer = $this;
    /* @var $installer Mage_Core_Model_Resource_Setup */

    $installer->startSetup();

    $installer->getConnection()->addColumn($installer->getTable('distro/distributor'), 'comment', array(
        'type' => Varien_Db_Ddl_Table::TYPE_TEXT,
        'nullable' => true,
        'length' => '1k',
        'comment' => 'Comment Field'
    ));
    
    $installer->endSetup();
