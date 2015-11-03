<?php

class Boolfly_Brand_Block_Adminhtml_Brand_Edit_Form extends
Mage_Adminhtml_Block_Widget_Form
{
    /**
     * Prepare form before rendering HTML
     * @return $this
     */
    protected function _prepareForm()
    {
        $brandModel = $this->_getBrand();
        //A new form to display our brand for editing
        $form = new Varien_Data_Form(array(
            'id' => 'edit_form',
            'action' => $this->getUrl('*/*/edit', array(
                '_current' => true,
                'continue' => 0,
            )),
            'method' => 'post',
            'enctype' => 'multipart/form-data'
        ));

        //Define a new fieldset.
        $fieldset = $form->addFieldset(
            'general',
            array(
                'legend' => $this->__('Brand Details')
            )
        );
        $brandSingleton = Mage::getSingleton('boolfly_brand/brand');

        if ($brandModel->getId()) {
            $fieldset->addField('brand_id', 'hidden', array(
                'name'      => 'brand_id',
                'value'     => $brandModel->getBrandId(),
            ));
        }
        //Add the fields that we want to be editable.
        $fieldset->addField('name', 'text', array(
            'name'  => 'name',
            'label' => $this->__('Name'),
            'title' => $this->__('Name'),
            'required'  => true,
            'value' => $brandModel->getName(),
        ));
        $fieldset->addField('description', 'textarea', array(
            'name'  => 'description',
            'label' => $this->__('Description'),
            'title' => $this->__('Description'),
            'required'  => true,
            'value' => $brandModel->getDescription(),
        ));
        $fieldset->addField('url_key', 'text', array(
            'name'  => 'url_key',
            'label' => $this->__('Url Key'),
            'title' => $this->__('Url Key'),
            'required'  => true,
            'value' => $brandModel->getUrlKey(),
        ));

        $fieldset->addField('visibility', 'select',
            array(
                'name'  => 'visibility',
                'label' => Mage::helper('boolfly_brand')->__('Visibility'),
                'title' => Mage::helper('boolfly_brand')->__('Visibility'),
                'value' => $brandModel->getVisibility(),
                'options' => $brandModel->getAvailableVisibilities()
            ));

        //Add Image field to our form
        $fieldset->addField('brand_image', 'image', array(
            'name'  => 'brand_image',
            'label' => $this->__('Image'),
            'title' => $this->__('Image'),
            'value' => $brandModel->getBrandImage()?Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA) . 'brand/' . $brandModel->getBrandImage():''
        ));
        $form->setUseContainer(true);
        $this->setForm($form);
        return $this;
    }


    /**
     * Retrieve the existing brand to pre-populate brand object to the fields in form.
     * For a new brand, this method will return an empty brand object.
     */
    protected function _getBrand()
    {
        if(!$this->hasData('brand'))
        {
            //This will have been set in the controller.
            $brand = Mage::registry('current_brand');
            $this->setData('brand', $brand);
        }
        return $this->getData('brand');
    }
}