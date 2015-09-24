<?php

class Boolfly_Brand_Adminhtml_BrandController extends Mage_Adminhtml_Controller_Action
{
    /**
     * Present our grid container.
     * This is also admin index page of our module
     */
    public function indexAction()
    {
        //Instantiate the grid container
        $brandBlock = $this->getLayout()->createBlock('boolfly_brand/adminhtml_brand');
        $this->loadLayout()
            ->_addContent($brandBlock)
            ->renderLayout();
    }
    /**
     * This method will set “editing mode” if an ID was specified.
     * On the contrary, it will be set “creating mode” and an empty brand entity ready to be populated.
     */
    public function editAction()
    {

        $brand = Mage::getModel('boolfly_brand/brand');
        if($brandId = $this->getRequest()->getParam('id', false))
        {
            $brand->load($brandId);
            if($brand->getId() < 1)
            {
                $this->_getSession()->addError($this->__('This brand no longer exist.'));
                return $this->_redirect('boolfly_brand_admin/brand/index');
            }
        }
        //Check $_POST data if the form was submitted
        if($postData = $this->getRequest()->getPost())
        {
            try{
                $brand->addData($postData);
                $brand->save();
                $this->_getSession()->addSuccess(
                    $this->__('The brand has been saved.')
                );

                return $this->_redirect('boolfly_brand_admin/brand/edit', array('id' => $brand->getId()));

            }catch (Exception $e)
            {
                Mage::logException($e);
                $this->_getSession()->addError($e->getMessage());
            }

        }
        //Make the current brand object available to blocks
        Mage::register('current_brand', $brand);

        //Instantiate the form container
        $brandEditBlock = $this->getLayout()->createBlock('boolfly_brand/adminhtml_brand_edit');

        $this->loadLayout()->_addContent($brandEditBlock)->renderLayout();
    }

    public function deleteAction()
    {
        $brand = Mage::getModel('boolfly_brand/brand');
        if($brandId = $this->getRequest()->getParam('id', false))
        {
            $brand->load($brandId);
        }
        if($brand->getId() < 1)
        {
            $this->_getSession()->addError(
              $this->__('This brand no longer exists.')
            );
            return $this->_redirect(
                'boolfly-brand-admin/brand/index'
            );
        }
        try {
            $brand->delete();

        }catch (Exception $e)
        {
            Mage::logException($e);
            $this->_getSession()->addError($e->getMessage());
        }
        return $this->_redirect('boolfly-brand-admin/brand/index');
    }
    /**
     * Without this method the ACL rules rules configured in adminhtml.xml are ignored.
     */
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('boolfly_brand/brand');
    }

}