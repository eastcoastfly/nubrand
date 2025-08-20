<?php
/**
 * 
 */
// 

// * the pattern is the pattern
$guides = [];
$return = '';
$guides['404-section'] = '
<div class="blocks--wrapper">
	<div class="is-the-404-section">
		%1$s
		%2$s
	</div>
	%3$s
</div>
';

$current_url = $_SERVER['REQUEST_URI'];

$error_message = '<h2>The page you\'re looking for has moved or no longer exists.</h2>';
$suggested_message = '<h5>Try searching the site to find related information.</h5>';

$search_form = NU__Starter::nu__includeSiteSearch();

$return = sprintf(
	$guides['404-section'],
	$error_message,
	$suggested_message,
	$search_form
);


get_header(); // ?	open <main>

if( is_active_sidebar( 'alerts-sitewide' ) ){
	dynamic_sidebar( 'alerts-sitewide' );
}

echo $return;


get_footer(); // ?	close </main>


// 
?>