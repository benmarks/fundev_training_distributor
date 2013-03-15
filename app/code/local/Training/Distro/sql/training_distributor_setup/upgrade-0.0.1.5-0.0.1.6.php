<?php

$installer = Mage::getResourceModel('catalog/setup','catalog_setup');
/* @var $installer Mage_Catalog_Model_Resource_Setup */

$installer->startSetup();

$installer->updateAttribute(
    'catalog_product',
    'distro_example',
    'is_visible_on_front',
    1
);

$installer->endSetup();