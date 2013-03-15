<?php

class Training_Distro_Block_Adminhtml_Distributor
	extends Mage_Adminhtml_Block_Widget_Grid_Container
{
	/**
	 * Initialize grid container settings
	 *
	 * The grid block class must be:
	 * 
	 * $this->_blockGroup . '/' . $this->_controller . '_grid'
	 * i.e. distro/adminhtml_distributor_grid
     *
     * Container and widget templates are set automatically
     * in their respective super classes.
	 */
	protected function _construct()
	{
		$this->_blockGroup = 'distro';
		$this->_controller = 'adminhtml_distributor';
		$this->_headerText = $this->__('List Distributors');
		$this->_addButtonLabel = $this->__('Add Distributor');

		parent::_construct();
	}

}
