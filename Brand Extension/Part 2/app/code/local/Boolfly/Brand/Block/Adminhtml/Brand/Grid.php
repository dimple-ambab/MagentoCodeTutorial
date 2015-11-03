<?php
class Boolfly_Brand_Block_Adminhtml_Brand_Grid
    extends Mage_Adminhtml_Block_Widget_Grid
{
    protected function _prepareCollection()
    {
        /**
         * Tell Magento which collection to use to display in the grid
         */
        $collection = Mage::getResourceModel('boolfly_brand/brand_collection');
        $this->setCollection($collection);
        return parent::_prepareCollection();

    }

    public function getRowUrl($row)
    {
        /**
         * When a grid row is clicked, this is where the user should be
         * redirected to - in our example, the method edit action of Brand Controller
         * in Brand Module.
         */
        return $this->getUrl('*/*/edit', array(
           'id' => $row->getId()
        ));
    }

    protected function _prepareColumns()
    {
        /**
         * Here, we'll define which columns to display in the gird.
         */
        $this->addColumn('brand_id', array(
            'header' => Mage::helper('boolfly_brand')->__('Brand Id'),
            'type'   => 'number',
            'index'  => 'brand_id',
        ));

        $this->addColumn('created_at', array(
            'header' => Mage::helper('boolfly_brand')->__('Created'),
            'type'   => 'datetime',
            'index'  => 'created_at',
        ));
        $this->addColumn('name', array(
            'header' => Mage::helper('boolfly_brand')->__('Name'),
            'type' => 'text',
            'index' => 'name',
        ));
        $this->addColumn('description', array(
            'header' => Mage::helper('boolfly_brand')->__('Description'),
            'type' => 'text',
            'index' => 'description',
        ));
        $this->addColumn('url_key', array(
            'header' => Mage::helper('boolfly_brand')->__('Url Key'),
            'type' => 'text',
            'index' => 'url_key',
        ));

        $brandVisibility = Mage::getSingleton('boolfly_brand/brand');
        $this->addColumn('visibility', array(
            'header' => Mage::helper('boolfly_brand')->__('Visibility'),
            'type' => 'options',
            'index' => 'visibility',
            'options' => $brandVisibility->getAvailableVisibilities()
        ));

        //Add Image column to our grid
        $this->addColumn('brand_image', array(
            'header' => Mage::helper('boolfly_brand')->__('Image'),
            'type' => 'text',
            'index' => 'brand_image',
            'align' => 'left',
            'width' => '60px',
            'renderer' => 'Boolfly_Brand_Block_Adminhtml_Grid_Renderer_Image'
        ));
    }
}