<?php
$cmsBlocks = array(
	array(
		'title'         => 'Static Block 01',
		'identifier'    => 'static-block-01',
		'content'       => 'PHP Script to create or update static blocks',
		'is_active'     => 1,
		'stores'        => 1
	),
	array(
		'title'         => 'Static Block 02',
		'identifier'    => 'static-block-02',
		'content'       => 'PHP Script to create or update static blocks',
		'is_active'     => 1,
		'stores'        => 1
	)
);
/**
 * Insert default blocks
 */
foreach ($cmsBlocks as $data) {
	Mage::getModel('cms/block')->setData($data)->save();
}

$storeId = 1;
$cmsPage= array (
	'title' => 'CMS Page',
	'content_heading' => 'CMS Page',
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
	Mage::getModel('cms/page')->setData($data)->save();
}