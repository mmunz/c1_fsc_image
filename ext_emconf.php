<?php

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Responsive Images',
	'description' => 'Responsive images. Uses c1_fluid_styled_responsive images to render the images.',
	'author' => 'Manuel Munz',
	'author_email' => 't3dev@comuno.net',
	'author_company' => 'comuno.net',
	'version' => '0.0.3',
	'category' => 'plugin',
	'state' => 'beta',
	'constraints' => array(
		'depends' => array(
			'core' => '7.5.0-8.6.99',
			'c1_fluid_styled_responsive_images' => ''
		),
	),
);

?>
