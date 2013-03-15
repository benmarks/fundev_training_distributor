<?php

class Training_Distro_Block_Adminhtml_Distributor_Edit
    extends Mage_Adminhtml_Block_Widget_Form_Container
{
    /**
     * Create the outer form wrapper
     *
     * $this->_blockGroup . '/' . $this->_controller . '_' . $this->_mode . '_form'
     *
     * Child Class: distro/adminhtml_distributor_edit_form
     */
    protected function _construct()
    {
        parent::_construct();

        $this->_objectId = 'id';
        $this->_blockGroup = 'distro';
        $this->_controller = 'adminhtml_distributor';
        $this->_mode = 'edit';
    }

    protected function  _prepareLayout()
    {
        $this->_updateButton('save', 'label', $this->__('Save Distributor'));
        $this->_updateButton('delete', 'label', $this->__('Delete Distributor'));

        $this->_addButton('save_and_continue', array(
            'label' => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick' => 'saveAndContinueEdit()',
            'class' => 'save',
        ), -100);

        $this->_formScripts[] = "
			function saveAndContinueEdit(){
				editForm.submit($('edit_form').action+'back/edit/');
			}
		";
        return parent::_prepareLayout();
    }

    /**
     * Return the title string to show above the form
     *
     * @return string
     */
    public function getHeaderText()
    {
        $model = Mage::registry('current_distributor');
        if ($model && $model->getId()) {
            return $this->__('Edit Distributor "%s" (%s)',
                $this->escapeHtml($model->getName()),
                $this->escapeHtml($model->getId())
            );
        } else {
            return $this->__('New Distributor');
        }
    }
}
