<?php
/**
 *    Posts Grid Item --- Initiative Template Type A
 * 
 */



$temp_string = '';
$initiative_schools = get_the_terms( $post->ID, $post->post_type . '-schools' );

if( !empty($initiative_schools) && !is_wp_error( ($initiative_schools) ) ){
	foreach( $initiative_schools as $school_object ){
		$school_name = $school_object->name;
		$term_fields = get_fields($school_object);
		if( !empty($term_fields) ){
			$associated_color = $term_fields['associated_color'];
			$temp_string .= '<span style="color:'.$associated_color.'">'.$school_name.'</span><br />';
		} else {
			$temp_string .= '<span>'.$school_name.'</span><br />';
		}
	}	
}

// 
$initiative_schools_string = '<p class="featured-tags">'.$temp_string.'</p>';

// ? either use a custom url redirect via a known custom field; or just the normal get_permalink
// $determined_permalink = !empty($fields['custom_permalink_redirect']) ? $fields['custom_permalink_redirect'] : '';

// 
$guides['initiative-teaser'] = '
  <li class="grid-item%1$s%2$s%3$s">
    <div class="contains-clickable-area">
      %4$s
      <div class="grid-item-content">
				%5$s
				%6$s
				%7$s
      </div>
    </div>
  </li>
';


$return .= sprintf(
  $guides['initiative-teaser'],
  ' '.$post_type,
  $aspect_ratio_class,
  $orientationClass,
  $the_cover_image,
	$initiative_schools_string,
	$the_post_title,
	get_the_content($post->ID)
);

// $the_basic_excerpt = do_blocks(get_the_content($post->ID));


// $guides['grid-item-default'] = '
// 	<li class="is-default grid-item%1$s%7$s%8$s%11$s">
// 		<a class="contains-clickable-area" href="%6$s" title="Read More about '.get_the_title( ).'"%9$s>
// 			%2$s
// 			<div class="grid-item-content">%10$s%12$s%3$s%4$s%5$s</div>
// 		</a>
// 	</li>
// ';

// $return .= sprintf(
// 	$guides['grid-item-default'],
// 	' '.$post_type,
// 	$the_cover_image,
// 	$the_post_title,
// 	$the_date_time,
// 	$the_basic_excerpt,
// 	$determined_permalink,
// 	$aspect_ratio_class,
// 	$orientationClass,
// 	$maybe_target,
// 	$call_to_action_text,
// 	$if_image_alignment,
// 	$initiative_schools_string
// );



?>