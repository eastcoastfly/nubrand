<?php
/* 
	REGISTER BLOCKS
	@link https://developer.wordpress.org/block-editor/reference-guides/block-api/block-supports/
	@link https://www.advancedcustomfields.com/resources/acf_register_block_type/
*/

$supports = [
	'mode' => false,		// This property allows the user to toggle between edit and preview modes via a button. Defaults to true.
	'anchor' => true,
	'align' => array( 'wide', 'full' ),		// This property adds block controls which allow the user to change the block’s alignment. Defaults to true. Set to false to hide the alignment toolbar. Set to an array of specific alignment names to customize the toolbar.
	'jsx' => true,
	'color' => [
		'background' => true,
		'gradients'  => false,
		'text'       => true,
	],
];

acf_register_block_type(array(
	'name' => 'breadcrumbs',
	'title' => 'Breadcrumbs',
	'description' => '',
	'category' => 'nu-blocks',
	'keywords' => array(
	),
	'post_types' => array(
	),
	'mode' => 'preview',
	'align' => '',
	'align_content' => NULL,
	'render_template' => get_template_directory(  ) . '/acf-blocks/breadcrumbs/breadcrumbs.php',
	'icon' => '',
	'supports' => $supports,
));


/* 

*/

$supports = [
	'mode' => false,		// This property allows the user to toggle between edit and preview modes via a button. Defaults to true.
	'anchor' => true,
	'align_content' => true,
	'align_text' => true,
	'align' => array( 'wide', 'full' ),
	'full_height' => true,
	'jsx' => true,
	'color' => [
		'background' => true,
		'gradients'  => false,
		'text'       => true,
	],
];

acf_register_block_type(array(
	'name' => 'cards',
	'title' => 'Cards',
	'description' => '',
	'category' => 'nu-blocks',
	'mode' => 'preview',
	'render_template' => get_template_directory().'/acf-blocks/cards/cards.php',
	'icon' => '',
	'supports' => $supports,
));


/* 

*/
$supports = [
	'mode' => false,		// This property allows the user to toggle between edit and preview modes via a button. Defaults to true.
	'anchor' => true,
	'align' => array( 'wide', 'full' ),		// This property adds block controls which allow the user to change the block’s alignment. Defaults to true. Set to false to hide the alignment toolbar. Set to an array of specific alignment names to customize the toolbar.
	'jsx' => true,
	'color' => [
		'background' => true,
		'gradients'  => false,
		'text'       => true,
	],
];
// 
acf_register_block_type(array(
	'name' => 'posts-grid',
	'title' => 'Posts Grid',
	'description' => '',
	'category' => 'nu-blocks',
	'mode' => 'preview',
	'render_template' => get_template_directory().'/acf-blocks/posts-grid/posts-grid.php',
	'icon' => '',
	'supports' => $supports,
	'styles' => [
		[
			'name' => 'default',
			'label' => __('Default', 'nu-start'),
			'isDefault' => true,
		],
		[
			'name' => 'minimal',
			'label' => __('Minimal', 'nu-start')
		],
	]
));

/* 

*/


$supports = [
	'mode' => false,		// This property allows the user to toggle between edit and preview modes via a button. Defaults to true.
	'anchor' => true,
	'align' => array( 'wide', 'full' ),		// This property adds block controls which allow the user to change the block’s alignment. Defaults to true. Set to false to hide the alignment toolbar. Set to an array of specific alignment names to customize the toolbar.
	'jsx' => true,
	'color' => [
		'background' => true,
		'gradients'  => false,
		'text'       => true,
	],
];

// 
// 
acf_register_block_type(array(
	'name' => 'person-info',
	'title' => 'Person Info',
	'description' => 'Fetch and display info for a Person.',
	'category' => 'nu-blocks',
	'mode' => 'preview',
	'render_template' => get_template_directory().'/acf-blocks/person-info/person-info.php',
	'icon' => '',
	'supports' => $supports,
));

/* 

*/
$supports = [
	'mode' => false,		// This property allows the user to toggle between edit and preview modes via a button. Defaults to true.
	'anchor' => true,
	'align' => array( 'wide', 'full' ),		// This property adds block controls which allow the user to change the block’s alignment. Defaults to true. Set to false to hide the alignment toolbar. Set to an array of specific alignment names to customize the toolbar.
	'jsx' => true,
	'color' => [
		'background' => true,
		'gradients'  => false,
		'text'       => true,
	],
];
// 
// 
acf_register_block_type(array(
	'name' => 'event-info',
	'title' => 'Event Info',
	'description' => 'Fetch and display info for an Event.',
	'category' => 'nu-blocks',
	'mode' => 'preview',
	'render_template' => get_template_directory().'/acf-blocks/event-info/event-info.php',
	'icon' => '',
	'supports' => $supports,
));

/* 

*/
$supports = [
	'mode' => false,		// This property allows the user to toggle between edit and preview modes via a button. Defaults to true.
	'anchor' => true,
	'align' => array( 'wide', 'full' ),		// This property adds block controls which allow the user to change the block’s alignment. Defaults to true. Set to false to hide the alignment toolbar. Set to an array of specific alignment names to customize the toolbar.
	'jsx' => true,
	'color' => [
		'background' => true,
		'gradients'  => false,
		'text'       => true,
	],
];

// 
// 
acf_register_block_type(array(
	'name' => 'news-info',
	'title' => 'News Info',
	'description' => 'Fetch and display info for a News Item.',
	'category' => 'nu-blocks',
	'mode' => 'preview',
	'render_template' => get_template_directory().'/acf-blocks/news-info/news-info.php',
	'icon' => '',
	'post_types' => ['nu_news'],
	'supports' => $supports,
));



/* 

*/
$supports = [
	'mode' => false,		// This property allows the user to toggle between edit and preview modes via a button. Defaults to true.
	'anchor' => true,
	'align' => array( 'wide', 'full' ),		// This property adds block controls which allow the user to change the block’s alignment. Defaults to true. Set to false to hide the alignment toolbar. Set to an array of specific alignment names to customize the toolbar.
	'jsx' => true,
	'color' => [
		'background' => true,
		'gradients'  => false,
		'text'       => true,
	],
];
// 
// 
acf_register_block_type(array(
	'name' => 'nu-datetime-range',
	'title' => 'Date and Time Range',
	'description' => '',
	'category' => 'nu-blocks',
	'keywords' => array(
	),
	'mode' => 'preview',
	'render_template' => get_template_directory().'/acf-blocks/datetime-range/datetime-range.php',
	'icon' => '',
	'supports' => $supports,
));

?>