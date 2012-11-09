<?php

class Training_Distro_Block_Adminhtml_Distributor_Edit_Form
	extends Mage_Adminhtml_Block_Widget_Form
{
	/**
	 * Prepare the inner form wrapper
	 */
	protected function _prepareForm()
	{
		$form = new Varien_Data_Form(array(
				'id' => 'edit_form',
				'action' => $this->getUrl('*/*/save',
						array('id' => $this->getRequest()->getParam('id'))),
				'method' => 'post',
				'enctype' => 'multipart/form-data',
		));
		$form->setUseContainer(true); // <- Render the <form> tag

		$this->setForm($form);
        //$fieldset = $form->addFieldset('testfieldset', array('legend' => 'Test'));
        //$fieldset->addField('test', 'text', array('label' => 'Test', 'name' => 'test'));

		return parent::_prepareForm();
	}
}
