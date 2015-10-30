<?php
class Boolfly_Brand_Model_Brand extends  Mage_Core_Model_Abstract
{

    protected $_eventPrefix = 'boolfly_brand';
    protected $_eventObject = 'brand';
    const VISIBILITY_HIDDEN = '0';
    const VISIBILITY_SHOW = '1';

    protected function _construct()
    {
        $this->_init('boolfly_brand/brand');
    }

    /**
     * Getting visibilities of brand.
     * @return array
     */
    public function getAvailableVisibilities()
    {
        return array(
            self::VISIBILITY_HIDDEN => Mage::helper('boolfly_brand')->__('Hidden'),
            self::VISIBILITY_SHOW => Mage::helper('boolfly_brand')->__('Visible'),
        );
    }
    protected function _beforeSave()
    {
        parent::_beforeSave();
        $this->_updateTimestamps();
        $this->_prepareUrlKey();
        return $this;
    }

    protected function _updateTimestamps()
    {
        $timestamp = now();

        $this->setUpdatedAt($timestamp);

        if($this->isObjectNew())
        {
            $this->setCreatedAt($timestamp);
        }
        return $this;
    }

    protected function _prepareUrlKey()
    {
        return $this;
    }
}