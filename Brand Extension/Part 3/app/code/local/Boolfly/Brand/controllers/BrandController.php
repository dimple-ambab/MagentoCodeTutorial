<?php
class Boolfly_Brand_BrandController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout()->renderLayout();
    }

    public function viewAction()
    {
        $brand = Mage::getModel('boolfly_brand/brand');
        $urlKey = $this->getRequest()->getParam('url_key', '');

        if(strlen($urlKey) > 0) {
            $brand->load($urlKey, 'url_key');
        } else {
            $id = (int)$this->getRequest()->getParam('id', 0);
            $brand->load($id);
        }

        if($brand->getId() < 1) {
            $this->_redirect('*/*/index');
        }

        Mage::register('current_brand', $brand);
        $this->loadLayout()->renderLayout();
    }
    /**
     * Adding brand
     */
//    public function addAction() {
//
//        $brand = Mage::getModel('boolfly_brand/brand');
//        $brand->setData('name', 'Nike');
//        $brand->setData('description', 'Nike');
//        $brand->setData('visibility', 1);
//        $brand->setData('url_key', 'nike');
//        try {
//            $brand->save();
//            echo "Successfully saved brand";
//
//        } catch (Exception $e) {
//            echo $e->getMessage();
//            Mage::logException($e);
//        }
//    }

    /**
     * Show brands
     */
    public function getBrandAction()
    {
        $brands = Mage::getModel('boolfly_brand/brand')->getCollection();
        foreach($brands as $brand) {
            echo $brand->getName() . "<br/>";
            echo $brand->getDescription() . "<br/>";
        }
    }
}