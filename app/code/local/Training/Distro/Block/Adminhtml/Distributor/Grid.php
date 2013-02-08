<?php

class Training_Distro_Block_Adminhtml_Distributor_Grid
    extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * Initialize grid settings
     *
     */
    protected function _construct()
    {
        parent::_construct();

        $this->setId('training_distro_list');
        $this->setDefaultSort('id');

        /*
           * Override method getGridUrl() in this class to provide URL for ajax
           */
        $this->setUseAjax(true);
    }

    /**
     * Return Grid URL for AJAX query
     *
     * @return string
     */
    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current' => true));
    }

    /**
     * Return URL where to send the user when he clicks on a row
     *
     * @param $row Varien_Object
     * @return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

    /**
     * Prepare distributor collection.
     *
     * @return Training_Distro_Block_Adminhtml_Distributor_Grid
     */
    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel('training_distro/distributor_collection');
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }


    /**
     * Prepare grid columns
     *
     * @return Training_Distro_Block_Adminhtml_Distributor_Grid
     */
    protected function _prepareColumns()
    {
        /**
         * Columns are widget block instances. Rendering of each cell
         * in the grid template occurs via this class's getRowField()
         * method, which incorporates several rendering possibilties.
         *
         * Standard renderers are associated with each type, and
         * custom renderers may be set in the column configuration
         * array. @see Mage_Adminhtml_Block_Widget_Grid_Column
         * _getRendererByType() method for standard types and their
         * corresponding renderer classes.
         *
         */
        $this->addColumn('id', array(
            'header' => $this->__('ID'),
            'sortable' => true,
            'width' => '60px',
            'index' => 'entity_id'
        ));

        $this->addColumn('email', array(
            'header' => $this->__('Distributor Email'),
            'index' => 'email',
        ));

        $this->addColumn('name', array(
            'header' => $this->__('Name'),
            'index' => 'name',
            'column_css_class' => 'name'
        ));

        /**
         * Add functional cell to row. Single actions are rendered as
         * a link unless getNoLink() returns true - else they render
         * in a <select>
         *
         * @see Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Action
         */
        $this->addColumn('action', array(
            'header' => $this->__('Action'),
            'width' => '100px',
            'type' => 'action',
            'getter' => 'getId',
            'actions' => array(
                array(
                    'caption' => $this->__('Edit'),
                    'url' => array('base' => '*/*/edit'),
                    'field' => 'id',
                ),
                array(
                    'caption' => $this->__('Delete'),
                    'url' => array('base' => '*/*/delete'),
                    'field' => 'id',
                ),
            ),
            'filter' => false,
            'sortable' => false,
        ));

        return parent::_prepareColumns();
    }
}
