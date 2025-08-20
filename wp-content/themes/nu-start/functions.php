<?php

/**
 * 
 */
require_once( get_template_directory().'/classes/vendors/class.taxonomy-single-term.php' );
require_once(  get_template_directory() . '/functions/utilities.php');
/**
 * 		enqueues scripts / styles
 * 		cleans wp_head
 * 		...
 */
require_once(  get_template_directory() . '/classes/setup-theme.php');

/**
 * 		creates the theme settings
 */
require_once(  get_template_directory() . '/classes/nu-starter.php');

/**
 * 
 * 		register all the option pages we will use for theme-settings
 * 
 */
require_once(  get_template_directory() . '/functions/options-pages.php');

/**
 * 		TBD: brief explainer
 * 
 */
require_once(  get_template_directory() . '/classes/content-types.php');


/**
 * ? server-side functionality for gutenberg / block editor
 * ? - register block styles
 * ? - register custom ACF blocks
 */
require_once(  get_template_directory() . '/functions/gutenberg.php');

/**
 * 		TBD: brief explainer
 * 
 */
require_once(  get_template_directory() . '/classes/acf-blocks.php');


// 
?>