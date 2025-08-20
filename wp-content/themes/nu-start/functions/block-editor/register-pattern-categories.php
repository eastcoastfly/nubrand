<?php
/* 
	* PATTERN CATEGORIES
*/


/* 
	CONTENT TYPES
*/
register_block_pattern_category(
	'project',
	array( 'label' => __( 'project', 'nu-start' ) )
);
register_block_pattern_category(
	'profile',
	array( 'label' => __( 'profile', 'nu-start' ) )
);
register_block_pattern_category(
	'news',
	array( 'label' => __( 'News', 'nu-start' ) )
);
register_block_pattern_category(
	'teams',
	array( 'label' => __( 'Team Member', 'nu-start' ) )
);
register_block_pattern_category(
	'event',
	array( 'label' => __( 'Event', 'nu-start' ) )
);

/* 
	MISC
*/
register_block_pattern_category(
	'blurbs',
	array( 'label' => __( 'Blurbs', 'nu-start' ) )
);
// 
register_block_pattern_category(
	'cards',
	array( 'label' => __( 'Cards', 'nu-start' ) )
);
// 
register_block_pattern_category(
	'contact',
	array( 'label' => __( 'Contact', 'nu-start' ) )
);
// 
register_block_pattern_category(
	'faqs',
	array( 'label' => __( 'FAQs', 'nu-start' ) )
);

// ? i.e., "the features this product has"
register_block_pattern_category(
	'features',
	array( 'label' => __( 'Features', 'nu-start' ) )
);
register_block_pattern_category(
	'heroes',
	array( 'label' => __( 'Heroes', 'nu-start' ) )
);
// 
register_block_pattern_category(
	'informative',
	array( 'label' => __( 'Informative', 'nu-start' ) )
);
// 
register_block_pattern_category(
	'layouts',
	array( 'label' => __( 'Layouts', 'nu-start' ) )
);
// 
register_block_pattern_category(
	'mediatext',
	array( 'label' => __( 'Media + Text', 'nu-start' ) )
);
// 
register_block_pattern_category(
	'pageintros',
	array( 'label' => __( 'Page Intros', 'nu-start' ) )
);
// 
register_block_pattern_category(
	'pathways',
	array( 'label' => __( 'Pathways', 'nu-start' ) )
);
// ? i.e., teasers with "view all some_content_type_items"
register_block_pattern_category(
	'showcase',
	array( 'label' => __( 'Showcase', 'nu-start' ) )
);
// 
register_block_pattern_category(
	'sliders',
	array( 'label' => __( 'Sliders', 'nu-start' ) )
);
// 
register_block_pattern_category(
	'stats',
	array( 'label' => __( 'Stats', 'nu-start' ) )
);
// 
register_block_pattern_category(
	'testimonials',
	array( 'label' => __( 'Testimonials', 'nu-start' ) )
);
// 
register_block_pattern_category(
	'utility',
	array( 'label' => __( 'Utility', 'nu-start' ) )
);




/* 
	* PATTERNS
*/
unregister_block_pattern('gutenslider/pattern-testimonial-slider');

?>