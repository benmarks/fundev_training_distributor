<?php

class Training_Distro_Adminhtml_DistributorController
    extends Mage_Adminhtml_Controller_Action
{
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')
            ->isAllowed('catalog/distro');
    }

    public function indexAction()
    {
        /*
           * Redirect user via 302 http redirect (the browser url changes)
           */
        $this->_redirect('*/*/list');
    }

    /**
     * Display grid
     */
    public function listAction()
    {
        $this->_getSession()->setFormData(array());

        $this->_title($this->__('Catalog'))->_title($this->__('Distributors'));

        $this->loadLayout();

        $this->_setActiveMenu('catalog/distro');

        $this->renderLayout();
    }

    /**
     * Grid action for ajax requests
     */
    public function gridAction()
    {
        $this->loadLayout(false);
        $this->renderLayout();
    }

    public function newAction()
    {
        /*
           * Redirect the user via a magento internal redirect
           */
        $this->_forward('edit');
        //$this->editAction();
    }

    /**
     * Create or edit distributor
     */
    public function editAction()
    {
        $model = Mage::getModel('distro/distributor');
        Mage::register('current_distributor', $model);
        $id = $this->getRequest()->getParam('id');

        try {
            if ($id) {
                if (!$model->load($id)->getId()) {
                    Mage::throwException($this->__('No record with ID "%s" found.', $id));
                }
            }

            /*
                * Build the page title
                */
            if ($model->getId()) {
                $pageTitle = $this->__('Edit %s (%s)', $model->getName(), $model->getId());
            } else {
                $pageTitle = $this->__('New Distributor');
            }
            $this->_title($this->__('Catalog'))->_title($this->__('Distributors'))->_title($pageTitle);

            $this->loadLayout();

            $this->_setActiveMenu('catalog/distro');

            $this->renderLayout();
        } catch (Exception $e) {
            Mage::logException($e);
            $this->_getSession()->addError($e->getMessage());
            $this->_redirect('*/*/list');
        }
    }

    /**
     * Process form post
     */
    public function saveAction()
    {
        if ($data = $this->getRequest()->getPost()) {
            $this->_getSession()->setFormData($data);
            $model = Mage::getModel('distro/distributor');
            $id = $this->getRequest()->getParam('id');

            try {
                if ($id) {
                    $model->load($id);
                }
                $model->addData($data)->save();

                if (!$model->getId()) {
                    Mage::throwException($this->__('Error saving distributor'));
                }

                $this->_getSession()->addSuccess($this->__('Distributor was successfully saved'));
                $this->_getSession()->setFormData(false);

                if ($this->getRequest()->getParam('back')) {
                    $params = array('id' => $model->getId());
                    $this->_redirect('*/*/edit', $params);
                } else {
                    $this->_redirect('*/*/list');
                }
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
                if ($model && $model->getId()) {
                    $this->_redirect('*/*/edit', array('id' => $model->getId()));
                } else {
                    $this->_redirect('*/*/new');
                }
            }

            return;
        }

        $this->_getSession()->addError($this->__('No data found to save'));
        $this->_redirect('*/*');
    }

    /**
     * Delete distributor entity
     */
    public function deleteAction()
    {
        $model = Mage::getModel('distro/distributor');
        $id = $this->getRequest()->getParam('id');

        try {
            if ($id) {
                if (!$model->load($id)->getId()) {
                    Mage::throwException($this->__('No record with ID "%s" found.', $id));
                }
                $name = $model->getName();
                $model->delete();
                $this->_getSession()->addSuccess($this->__('"%s" (ID %d) was successfully deleted', $name, $id));
                $this->_redirect('*/*');
            }
        } catch (Exception $e) {
            Mage::logException($e);
            $this->_getSession()->addError($e->getMessage());
            $this->_redirect('*/*');
        }
    }
}
