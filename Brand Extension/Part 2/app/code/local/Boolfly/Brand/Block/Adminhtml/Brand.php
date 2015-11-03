<?php
class Boolfly_Brand_Block_Adminhtml_Brand extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    protected function _construct()
    {
        parent::_construct();
        $this->_blockGroup = 'boolfly_brand';
        $this->_controller = 'adminhtml_brand';
        $this->_removeButton('add');
        $this->_headerText = Mage::helper('boolfly_brand')->__('Brand Directory');

    }

    /**
     * Getting a create url
     * @return mixed
     */

    public function getCreateUrl()
    {
        return $this->getUrl(
            '*/*/edit'
        );
    }
}