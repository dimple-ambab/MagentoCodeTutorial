<?php
$cmsBlocks = array(
	array(
	'title'         => 'Home Display',
	'identifier'    => 'home-display',
	'content'       =>  '<div>{{block type="catalog/product_list" category_id="17" template="catalog/product/list_home.phtml"}}</div>',
	'is_active'     => 1,
	'stores'        => 1
	),
	array(
		'title'         => 'Homepage Online Boutique',
		'identifier'    => 'homepage-online-boutique',
		'content'       => '<div><img src="{{media url="wysiwyg/homepage/home-page-online-boutique.png"}}" alt="Home Page Online Boutique" />
<div class="content">オンラインブティックのお勧め</div>
</div>',
		'is_active'     => 1,
		'stores'        => 1
	),
	array(
		'title'         => 'Homepage Tea',
		'identifier'    => 'homepage-tea',
		'content'       => '<p><a href="#"><img src="{{media url="wysiwyg/homepage/block2_1.jpg"}}" alt="Home Tea" /></a></p>',
		'is_active'     => 1,
		'stores'        => 1
	),
	array(
		'title'         => 'Homepage Biscuit',
		'identifier'    => 'homepage-biscuit',
		'content'       => '<p><a href="#"><img src="{{media url="wysiwyg/homepage/block1_2_1.jpg"}}" alt="Homepage Biscuit" /></a></p>',
		'is_active'     => 1,
		'stores'        => 1
	),
	array(
		'title'         => 'Homepage Message Card',
		'identifier'    => 'homepage-message-card',
		'content'       => '<p><a href="#"><img src="{{media url="wysiwyg/homepage/card_message.png"}}" alt="Homepage Message Card" /></a></p>',
		'is_active'     => 1,
		'stores'        => 1
	),
	array(
		'title'         => 'Homepage Jam',
		'identifier'    => 'homepage-jam',
		'content'       => '<p><a href="#"><img src="{{media url="wysiwyg/homepage/block3_2_1.jpg"}}" alt="Homepage Jam" /></a></p>',
		'is_active'     => 1,
		'stores'        => 1
	),
	array(
		'title'         => 'Homepage Newsletter',
		'identifier'    => 'homepage-newsletter',
		'content'       => '<div class="left">
<div class="title"><span class="brand">LADUR&Eacute;E</span> Newsletter</div>
</div>
<div class="right">{{block type="newsletter/subscribe" template="cms/newsletter_subscribe.phtml"}}</div>',
		'is_active'     => 1,
		'stores'        => 1
	),
	array(
		'title'         => 'Homepage About Laduree',
		'identifier'    => 'homepage-about-laduree',
		'content'       => '<p><a href="#"><img src="{{media url="wysiwyg/homepage/block3_1_1_1.png"}}" alt="Homepage About Laduree" /></a></p>',
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