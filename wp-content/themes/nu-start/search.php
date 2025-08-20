<?php
/**
 * 
 */
// 

// ? the pattern is the pattern...
$return = '';
$guides = [];

//Outer wrapper for search results
$guides['results'] = '
<div class="main-heading-search">
	<h1>Search</h1>
</div>	

<div class="blocks--wrapper">

	
	<div class="search-results-info">
		%1$s
		%2$s
		%3$s
	</div>
	<div class="acf-block posts-grid homepage-posts-grid">
		<div class="nu__grid cols-1">
			<ul>
				%4$s
			</ul>
			%5$s
		</div>
	</div>
</div>
';
	
//
//
//
//
//
//

// Individual search result items
$result_items = '';
if( have_posts() && is_search() && !empty(get_search_query()) ){
		while( have_posts() ){
		the_post();
		 
		$guides['grid-item-default'] = '
			<li class="grid-item is-search-result %1$s%8$s%9$s">
				<a class="contains-clickable-area" href="%8$s" title="Read More about %11$s">
					%2$s
					<div class="grid-item-content">%3$s%4$s%5$s%7$s</div>
				</a>
			</li>
		';
		
		$the_date_time = '';
		$the_cover_image = has_post_thumbnail( $post->ID ) ? '<figure>'.get_the_post_thumbnail( $post->ID ).'</figure>' : '';
		$the_post_title = '<h2 class="post-title"><span>'.get_the_title( $post->ID ).'</span></h2>';

		// * Formulate a breadcrumb for the search result items
		$the_breadcrumb = '<p class="post-breadcrumb">' . parse_url( get_site_url(), PHP_URL_HOST ) . ' <i class="fa-regular fa-chevron-right fa-xs"></i> ';
		
		// * Find the ancestors of the search result page
		$parents = get_post_ancestors( $post->ID );

		// * Add each page ancestor to the breadcrumb
		if($parents){
			for ( $i=(count($parents)-1); $i>=0; $i-- ){
				get_the_title($parents[$i]);
				$the_breadcrumb .= get_the_title($parents[$i]) . ' <i class="fa-regular fa-chevron-right fa-xs"></i> ';
			}
		}

		$the_breadcrumb .= get_the_title( $post->ID ) .'</p>';
		
		$the_basic_excerpt = '<p class="post-excerpt">' . wp_strip_all_tags( wp_trim_words( get_the_excerpt( $post->ID ),30 ) ) . '</p>';
		
		$the_icon_element = '<div class="is-hanging-icon"><i class="fa-light fa-arrow-right"></i></div>';

		$result_items .= sprintf(
			$guides['grid-item-default'],
			' search-result', // The post type
			$the_cover_image,
			$the_post_title,
			$the_breadcrumb,
			$the_icon_element,
			$the_date_time,
			$the_basic_excerpt,
			get_permalink($post->ID),
			' has-square-cover-image',
			' has-layout-horizontal',
			get_the_title( $post->ID )
		);
			
		
	}
}

$pagination = ( !empty( get_search_query() ) ) ? '<div class="pagination">'.nu__get_pagination().'</div>' : '';

$in_page_search_form = NU__Starter::nu__includeSiteSearch();

//
//
//
//
//
//
// * Display the text for the search results in $search_results
// ? Display the results on current page in $search_results_on_page

// ! If the user hasn't entered anything in the search box
if ( empty(get_search_query()) ) {
	$search_results = '<p class="search-error">Oops! Please enter a search term above.</p>';
}

// * Else if there are search results
elseif ( $wp_query->found_posts > 0 ){

	// ? First show how many results were found
	$search_results = '
		<p class="returned-results">Your search for "' .  get_search_query() . '" returned ' . $wp_query->found_posts . ' results.</p>
	';

	// ? Show the results on the last page
	if ( get_query_var('paged') == $wp_query->max_num_pages ){
		$search_results_on_page = '
		<p class="results-range">Displaying results ' . ( (get_query_var('paged') * 10 ) - 9 )  . '-' . ($wp_query->found_posts ) .  '</p>'
		;
	}

	// ? Show the correct results upon first loading the search results (WP thinks it's on page 0)
	else if ( get_query_var('paged') == 0 ) {

		// ? Display this if there are less than 10 results
		if ( $wp_query->post_count < 10 ){
			$search_results_on_page = '
			<p class="results-range">Displaying results 1-' . $wp_query->found_posts . ' of ' . $wp_query->found_posts .  '</p>'
			;
		}
	
		else {
			$search_results_on_page = '
			<p class="results-range">Displaying results 1-10</p>
			';
		}
	}

	// ? Otherwise just show the math for 11-20, 21-30, etc.
	 else {
		$search_results_on_page = '
		<p class="results-range">Displaying results ' . ( ($wp_query->post_count * get_query_var('paged')) - 9 )  . '-' . ($wp_query->post_count * get_query_var('paged')) . '</p>'
		;

	 }
}

// Else no search results were found
else {
	$search_results = '
	<p class="returned-results">Sorry, that search term did not return any results.</p> 
	<p class="results-range">Please try a different keyword.</p>
		';
}

// * END Display the text for the search results in $search_results
// ? END Display the results on current page in $search_results_on_page

//
//
//
//
//
//
//

// ? write the complete string of result items into the results container
$return = sprintf(
	$guides['results'],
	$in_page_search_form,
	!empty($search_results) ? $search_results : '',
	!empty($search_results_on_page) ? '<p>'.$search_results_on_page.'</p>' : '',
	$result_items,
	$pagination
);

get_header();
echo $return;
get_footer();
?>