<?php
/**
 * 
 * ?      Project Teaser
 * 
 */
// 


// 
// 
$guides['project'] = '
  <li class="grid-item%1$s%6$s%7$s">
    <a class="contains-clickable-area" href="%5$s"'.$the_title_attribute.' %8$s>
      %2$s
      <div class="grid-item-content">
        %9$s
        %3$s
        %4$s
        <div class="is-hanging-icon"><i class="fa-regular fa-arrow-up-right"></i></div>
      </div>
    </a>
  </li>
';

$checkTerms = get_the_terms( $post, 'nu_profiles-types' );
$profile_type = !empty( $checkTerms ) ? '<div class="profile-type">'.$checkTerms[0]->name.'</div>' : '';

// 
// 
$return .= sprintf(
  $guides['project'],
  ' '.$post_type,
  $the_cover_image,
  $the_post_title,
  $profile_item_metadata['headline'],
  $determined_permalink,
  $aspect_ratio_class,
  $orientationClass,
  $maybe_target,
  $profile_type,
);



?>