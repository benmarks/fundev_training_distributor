<?php

class Training_Distro_Model_System_Config_Source_Show
{
    public function toOptionArray()
    {
        return array(
            array(
                'value' => 1,
                'label' => Mage::helper('distro')->__('Show')
            ),
            array(
                'value' => 0,
                'label' => Mage::helper('distro')->__('Hide')
            ),
        );
    }

}