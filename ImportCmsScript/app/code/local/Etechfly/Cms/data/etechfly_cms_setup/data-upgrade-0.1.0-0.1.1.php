<?php
$cmsBlocks = array(
	array(
		'title'         => 'Homepage Boutiques',
		'identifier'    => 'homepage-boutiques',
		'content'       => '<p><a href="#"><img src="{{media url="wysiwyg/homepage/block4_2_1.jpg"}}" alt="Homepage Boutiques" /></a></p>',
		'is_active'     => 1,
		'stores'        => 1
	)
);
/**
 * Insert default blocks
 */
foreach ($cmsBlocks as $data) {
	// Check if static block already exists:
	$collection = Mage::getModel('cms/block')->load($data['identifier']);
	$block_identifier = $collection->getData('identifier');
	if(!$block_identifier)
	{
		// Create static block:
		Mage::getModel('cms/block')->setData($data)->save();
	}else{
		//Update Content if static block already exists
		Mage::getModel('cms/block')->load($data['identifier'])
		    ->setData('content', $data['content'])
		    ->save();
	}
}