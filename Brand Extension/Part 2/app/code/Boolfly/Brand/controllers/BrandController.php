<?php
class Boolfly_Brand_BrandController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        echo "Hello World!";
    }

    /**
     * Adding brand
     */
    public function addAction() {

        $brand = Mage::getModel('boolfly_brand/brand');
        $brand->setData('name', 'Nike');
        $brand->setData('description', 'Nike');
        $brand->setData('visibility', 1);
        $brand->setData('url_key', 'nike');
        try {
            $brand->save();
            echo "Successfully saved brand";

        } catch (Exception $e) {
            echo $e->getMessage();
            Mage::logException($e);
        }
    }

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