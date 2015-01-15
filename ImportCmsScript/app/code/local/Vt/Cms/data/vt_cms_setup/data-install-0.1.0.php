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