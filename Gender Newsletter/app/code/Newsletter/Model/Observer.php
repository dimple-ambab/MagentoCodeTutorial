<?php

class Boolfly_Newsletter_Model_Observer
{
    public function newsletterSubscriberSaveBefore(Varien_Event_Observer $observer)
    {
        $subscriber = $observer->getEvent()->getSubscriber();

        //Saving Newsletter Gender
        if(Mage::registry('sub_gender')) {
            $subscriber->setNewsletterGender(Mage::registry('sub_gender'));
            Mage::unregister('sub_gender');
        }
        return $this;
    }
}