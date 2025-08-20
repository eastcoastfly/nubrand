<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


class PostsGrid_Item
{


	private static $post;
	private static $fields;
	private static $gridOptions;


	/**
	 * initialize this posts grid item (used in the wordpress loop)
	 *
	 * @param [type] $post - the post object set up inside the loop
	 * @param [type] $gridOptions - the field group of the calling parent posts grid (style and other options set here)
	 * @return void
	 */
	public static function init($post, $gridOptions){


		// destructure meaningful data

		$fields = get_fields($post->ID);

		$post_type = $post->post_type;
		$item_styles = !empty($gridOptions['item_style']) ? $gridOptions['item_style'] : '';

		// * get the capitalcase post type name (label)
		$post_type_label = !empty(get_post_type_object($post_type)->labels->singular_name) ? '<span class="is-post-type-label has-14-20-font-size">'.get_post_type_object($post_type)->labels->singular_name.'</span>' : '';
		// 
		$orientationClass = !empty($item_styles['orientation']) ? ' has-layout-' . $item_styles['orientation'] : '';

		// ! we need to actually do this
		$aspect_ratio_class = '';

		// call in the date-time block
		if( !empty($fields) ){
			$instance = new NU_DateTime_Helper($fields);
			$the_date_time = $instance::build_datetime_return_string();
		}

		// attach classes to choose image dimensions
		if( !empty( $item_styles ) && !empty($item_styles['display_featured_image']) ){
			$aspect_ratio_class = ' has-'.$item_styles['image_dimensions'].'-cover-image';
		}

		// ? the fully formatted post title markup
		$check_post_title = !empty($fields['overrides']['title']) ? $fields['overrides']['title'] : get_the_title( );
		$the_post_title = '<p class="post-title"><span>'.$check_post_title.'</span></p>';

		$if_image_alignment = !empty($item_styles['image_alignment']) ? ' has-image-align-'.$item_styles['image_alignment'] : '';
		$truncate_excerpt = !empty($item_styles['truncate_excerpt']) ? $item_styles['truncate_excerpt'] : 99;

		// ? check for the actual post_excerpt and possibly use it
		$check_post_excerpt = !empty($fields['overrides']['description']) ? $fields['overrides']['description'] : get_the_excerpt();
		$the_basic_excerpt = has_excerpt() ? '<p class="post-excerpt">'.wp_trim_words($check_post_excerpt, $truncate_excerpt).'</p>' : '';
		
		$call_to_action_text = !empty($fields['overrides']['call_to_action']) ? '<span class="call-to-action-text">'.$fields['overrides']['call_to_action'].'</span>' : '';

		// ? either use a custom url redirect via a known custom field; or just the normal get_permalink
		$determined_permalink = !empty($fields['custom_permalink_redirect']) ? $fields['custom_permalink_redirect'] : esc_url( get_the_permalink( ) );

		// ? if a custom URL is entered to override the permalink we also open in a new tab/window
		$maybe_target = !empty($fields['custom_permalink_redirect']) ? ' target="_blank"' : '';
		$will_open_new_tab = !empty($fields['custom_permalink_redirect']) ? ' [will open in a new tab/window]' : '';
		

		// the featured image in markup
		$the_cover_image = !empty($item_styles['display_featured_image']) && has_post_thumbnail( ) ? '<figure>'.get_the_post_thumbnail( ).'</figure>' : '';

		$the_title_attribute = ' title="Read More about '.get_the_title( ).$will_open_new_tab.'"';

		$the_icon_element = '<div class="is-hanging-icon"><i class="fa-light fa-arrow-right"></i></div>';

		$guides = [];
		$return = '';

		switch ($post_type) {
			case 'nu_people':
					$person_metadata = !empty( $fields['person_metadata'] ) ? $fields['person_metadata'] : '';
					$person_overrides = !empty( $fields['overrides'] ) ? $fields['overrides'] : '';
					include( get_template_directory( ) . '/classes/acf-blocks/posts-grid-item/templates/person.php' );
				break;
			case 'nu_events':
					$event_item_metadata = !empty( $fields['event_item_metadata'] ) ? $fields['event_item_metadata'] : '';
					include( get_template_directory( ) . '/classes/acf-blocks/posts-grid-item/templates/event.php' );
					break;
					case 'nu_profiles':
						$profile_item_metadata = !empty( $fields['profile_metadata'] ) ? $fields['profile_metadata'] : '';
				include( get_template_directory( ) . '/classes/acf-blocks/posts-grid-item/templates/profile.php' );
				break;
			case 'nu_projects':
				include( get_template_directory( ) . '/classes/acf-blocks/posts-grid-item/templates/project.php' );
				break;
			case 'nu_initiatives':
				include( get_template_directory( ) . '/classes/acf-blocks/posts-grid-item/templates/initiative.php' );
			break;
				case 'nu_news':
				$item_metadata = !empty( $fields['publication_info'] ) ? $fields['publication_info'] : '';
				include( get_template_directory( ) . '/classes/acf-blocks/posts-grid-item/templates/news-item.php' );
			break;
				case 'nu_programs':
					$pim_id = !empty( $fields['pim_id'] ) ? $fields['pim_id'] : '';
					$p_location = !empty( $fields['program_location'] ) ? $fields['program_location'] : '';
					$p_duration = !empty( $fields['program_duration'] ) ? $fields['program_duration'] : '';
					$p_study_options = !empty( $fields['program_study_options'] ) ? $fields['program_study_options'] : '';
					include( get_template_directory( ) . '/classes/acf-blocks/posts-grid-item/templates/program.php' );
				break;
			default:
				$guides['grid-item-default'] = '
					<li class="is-default grid-item%1$s%7$s%8$s%11$s">
						<a class="contains-clickable-area" href="%6$s" title="Read More about '.get_the_title( ).'"%9$s>
							%2$s
							<div class="grid-item-content">%10$s%12$s%3$s%4$s%5$s</div>
						</a>
					</li>
				';

				$the_date_time = '';

				$checkTerms = get_the_terms( $post, 'category' );

				$page_category = !empty( $checkTerms ) ? '<div class="page-category">'.$checkTerms[0]->name.'</div>' : '';

				$return .= sprintf(
					$guides['grid-item-default'],
					' '.$post_type,
					$the_cover_image,
					$the_post_title,
					$the_date_time,
					$the_basic_excerpt,
					$the_icon_element,
					$determined_permalink,
					$aspect_ratio_class,
					$orientationClass,
					$maybe_target,
					$call_to_action_text,
					$if_image_alignment,
					$page_category
				);
			break;
		}

		return $return;

	}
	
}

// 
