<?php

class Boolfly_Newsletter_Helper_Gender extends Mage_Core_Helper_Abstract
{
    const MALE = '1';
    const FEMALE = '2';

    public function getGender()
    {
        return array(
            self::MALE => Mage::helper('boolfly_newsletter')->__('Male'),
            self::FEMALE => Mage::helper('boolfly_newsletter')->__('Female'),
        );
    }
}