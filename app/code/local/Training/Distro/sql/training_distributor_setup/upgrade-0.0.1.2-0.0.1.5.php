<?php

$installer = Mage::getResourceModel('catalog/setup','catalog_setup');
/* @var $installer Mage_Catalog_Model_Resource_Setup */

$installer->startSetup();

$installer->addAttribute(
    'catalog_product',
    'distro_example',               //$product->getDistroExample()
    array(
        'type' => 'text',           //backend_type
        'label' => 'Example',       //frontend_label
        'group' => 'Distributor',   //Add to all sets in new group
        'required' => 0,            //is_required
        //'visible_on_front' => 1
    )
);

$installer->endSetup();