<?php
$cmsBlock = array (
	'title' => 'Static Block Testing',
	'identifier' => 'static_block_testing',
	'is_active' => '1',
	'stores' => 1,
	'content' => file_get_contents(__DIR__ .
	                               '/data_blocks_pages_0.1.0/static_block_1.html')
);

/**
 * Insert default blocks
 */
$cmsBlock = Mage::getModel('cms/block');
$cmsBlock->setData($block)->save();
