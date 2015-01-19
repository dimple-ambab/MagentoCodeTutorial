<?php
$storeId = 1;
$cmsPage= array (
	'title' => 'CMS Page',
	'content_heading' => 'CMS Page New New', //Change Content Here
	'root_template'   => 'one_column',
	'identifier' => 'cmspage-testing',
	'is_active' => '1',
	'stores' => array($storeId),
	'content' => file_get_contents(__DIR__ .
	                               '/data_blocks_pages_0.1.0/cms_page1.html')
);

/**
 * For Multi Stores
 * Can run shortly by using saveCmsData
 */
foreach ($cmsPage as $data) {
	Mage::getModel('vt_cms/import')->saveCmsData($data, $storeId, true);
}
