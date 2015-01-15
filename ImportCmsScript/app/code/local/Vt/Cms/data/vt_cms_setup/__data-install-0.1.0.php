<?php
$cmsPage= array (
	'title' => 'CMS Page',
	'content_heading' => 'CMS Page',
	'root_template'   => 'one_column',
	'identifier' => 'cmspage-testing',
	'is_active' => '1',
	'stores' => 1,
	'content' => file_get_contents(__DIR__ .
	                               '/data_blocks_pages_0.1.0/cms_page1.html')
);

$cmsBlock= array (
	'title' => 'CMS Page',
	'identifier' => 'staticblock-testing',
	'is_active' => '1',
	'stores' => 1,
	'content' => file_get_contents(__DIR__ .
	                               '/data_blocks_pages_0.1.0/cms_block.html')
);

/**
 * Insert CMS Page
 */
$cms = Mage::getModel('cms/page');
$cms->setData($cmsPage)->save();
