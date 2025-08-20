<?php
/* 
	REGISTER BLOCK STYLES
*/


/* 
	Paragraph Block
*/
// ? Large
register_block_style(
	'core/paragraph',
	array(
		'name'         => 'large',
		'label'        => __( 'Large', 'nu-start' ),
		'inline_style' => 'p.is-style-large { font-size: var(--wp--preset--font-size--24-32);line-height: var(--wp--custom--line-height--rfs-32); }'
		)
);

// ? "Eyebrow"
register_block_style(
	'core/paragraph',
	array(
		'name'         => 'eyebrow',
		'label'        => __( 'Eyebrow', 'nu-start' ),
	)
);

/* 
	Cover Block
*/
register_block_style(
	'core/cover',
	array(
			'name'         => 'as-hero',
			'label'        => __( 'As Hero', 'nu-start' ),
			'style_handle' => 'as-hero'
	)
);

/* 
	Image Block
*/
register_block_style(
	'core/image',
	array(
			'name'         => 'floating-cite',
			'label'        => __( 'Floating Cite', 'nu-start' ),
			'style_handle' => 'floating-cite'
	)
);

/* 
	Media+Text Block
*/
register_block_style(
	'core/media-text',
	array(
			'name'         => 'squared-card',
			'label'        => __( 'Squared Card', 'nu-start' ),
			'style_handle' => 'squared-card'
	)
);

/* 
	Gutenslider block --- vendor plugin
*/
register_block_style(
	'eedee/block-gutenslider',
	array(
		'name'         => 'alternate',
		'label'        => __( 'Alternate', 'nu-start' ),
	)
);
?>