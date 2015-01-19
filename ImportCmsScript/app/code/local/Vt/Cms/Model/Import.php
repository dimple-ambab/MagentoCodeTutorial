<?php

class Vt_Cms_Model_Import
{
	/**
	 * Import Function
	 * @param $data
	 * @param $storeId
	 * @param bool $isPage
	 */
	public function saveCmsData($data, $storeId, $isPage = false) {
		$store = array($storeId);
		$store[] = Mage_Core_Model_App::ADMIN_STORE_ID;
		if ($isPage) {
			$model = Mage::getModel('cms/page');
		} else {
			$model = Mage::getModel('cms/block');
		}
		$collection = $model->getCollection()
		                    ->addFieldToFilter('identifier', $data['identifier'])
		                    ->addStoreFilter($storeId)
		                    ->addFieldToFilter('store_id', array('in' => $store));
		$cmsItem = $collection->getFirstItem();
		if ($cmsItem && ($cmsItem->getBlockId()||$cmsItem->getPageId())) {
			$oldData = $cmsItem->getData();
			$data = array_merge($oldData, $data);
			$cmsItem->setData($data)->save();
		} else {
			$model->setData($data)->save();
		}
		return;
	}
}