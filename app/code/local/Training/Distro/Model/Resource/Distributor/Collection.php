<?php

class Training_Distro_Model_Resource_Distributor_Collection
    extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('distro/distributor');
    }

    public function toOptionArray()
    {
        $list = array();

        foreach ($this as $distro)
        {
            $list[] = array(
                            'label' => $distro->getName(),
                            'value' => $distro->getId()
                        );
        }

        return $list;
    }
}