<?php

class Training_Distro_Model_System_Config_Source_Distributor
    extends Training_Distro_Model_Resource_Distributor_Collection
{
    public function toOptionArray()
    {
        $list = array();

        foreach ($this as $distro) {
            $list[] = array(
                'label' => $distro->getName(),
                'value' => $distro->getId()
            );
        }

        return $list;
    }
}
