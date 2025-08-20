<?php
/**
 * Header Nav
 */
//


// * the pattern is the pattern
$return = '';
$guides = [];

// * Using the new Font Awesome icons for the mobile navicons
$nu_mobileNavIcon = '<div class="navicons"><i class="fa-regular fa-bars"></i><i class="fa-regular fa-xmark"></i></div>';


// * header nav guide string
$guides['nav-header'] = '
	<header class="header">
		%6$s
		<a id="skiptomaincontent" href="#main">Skip to content</a>
		%4$s
		<div class="container wide%5$s">
			%1$s
			'.$nu_mobileNavIcon.'
			<div class="navlinks--container">
				%2$s
				%3$s
			</div>
		</div>
	</header>
';


if( !empty( NU__Starter::$themeSettings['header']['status'] ) ){


	$submenu_reveal_type = !empty(NU__Starter::$themeSettings['header']['nav_menu_settings']['submenus_reveal']) ? ' submenus-open-using-'.NU__Starter::$themeSettings['header']['nav_menu_settings']['submenus_reveal'] : '';
	

	// * build the header
	$return .= sprintf(
		$guides['nav-header']
		,nu__get_site_logo()
		,has_nav_menu('header') ? nu__get_nav_menu('header') : ''
		// ! This line is checking if a search was conducted, not if the search function is enabled
//		,!is_search() ? NU__Starter::nu__includeSiteSearch() : ''
		,NU__Starter::nu__includeSiteSearch()
		,has_nav_menu('utility') ? '<div class="utilitynav">'.nu__get_nav_menu('utility').'</div>' : ''
		,$submenu_reveal_type
		,NU__Starter::nu__globalHeaderElement()
	);

}

echo $return;



?>