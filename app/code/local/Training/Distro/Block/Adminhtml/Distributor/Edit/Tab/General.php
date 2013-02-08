<?php

class Training_Distro_Block_Adminhtml_Distributor_Edit_Tab_General
    extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * Add the form fields
     *
     * @return Training_Distro_Block_Adminhtml_Distributor_Edit_Tab_General
     */
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $form->setHtmlIdPrefix('general');

        $fieldset = $form->addFieldset('general_form', array(
            'legend' => $this->__('General Setup')
        ));

        $entityType = Mage::getSingleton('eav/config')->getEntityType('catalog_product');
        /* @var $entityType Mage_Eav_Model_Entity_Type */
        //$attributesArray = $entityType->getAttributeCollection();
        /*
          $attributesArray = array(
              Mage::getSingleton('eav/config')->getAttribute('catalog_product', 'description'),
              Mage::getSingleton('eav/config')->getAttribute('catalog_product', 'weight'),
              Mage::getSingleton('eav/config')->getAttribute('catalog_product', 'short_desc'),
              Mage::getSingleton('eav/config')->getAttribute('catalog_product', 'sku'),
          );
          $this->_setFieldset($attributesArray, $fieldset);
          */

        if (Mage::registry('current_distributor')->getId()) {
            $fieldset->addField('entity_id', 'label', array(
                'label' => $this->__('Entity ID:'),
            ));
        }

        $fieldset->addField('name', 'text', array(
            'label' => $this->__('Name'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'name',
        ));

        $fieldset->addField('email', 'text', array(
            'label' => $this->__('Distributor Email'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'email',
        ));

        $dateFormatIso = Mage::app()->getLocale()->getDateFormat(
            Mage_Core_Model_Locale::FORMAT_TYPE_SHORT
        );

        $fieldset->addField('updated_at', 'date', array(
            'label' => $this->__('Updated At'),
            'name' => 'updated_at',
            'format' => $dateFormatIso,
            'image' => $this->getSkinUrl('images/grid-cal.gif'),
        ));

        $form->addValues($this->_getFormData());

        $this->setForm($form);

        return parent::_prepareForm();
    }

    /**
     *
     * @return array
     */
    protected function _getFormData()
    {
        $data = Mage::getSingleton('adminhtml/session')->getFormData();

        if (!$data && Mage::registry('current_distributor')->getData()) {
            $data = Mage::registry('current_distributor')->getData();
        }

        return (array)$data;
    }
}
