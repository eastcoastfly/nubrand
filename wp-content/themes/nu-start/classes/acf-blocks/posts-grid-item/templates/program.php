<?php
// 
// 
// 
$checkTerms = get_the_terms( $post, 'nu_programs-categories' );
$category = !empty( $checkTerms ) ? '<div class="program-category"><span>'.$checkTerms[0]->name.'</span></div>' : '';

$guides['program'] = '
  <li class="grid-item%1$s%6$s%7$s">
    <a class="contains-clickable-area" href="%5$s"'.$the_title_attribute.' %8$s>
      %2$s
      <div class="grid-item-content">
        %9$s
        %3$s
        %4$s
        %10$s
      </div>
    </a>
  </li>
';

$basic_program_info = '';
if( !empty($p_location) || !empty($p_duration)){

  $study_options = '';

  if( !empty($p_study_options) ){

    foreach($p_study_options as $option){
      $study_options .= '<span>'.$option['study_option'].'</span>';
    }

  }
  
  $basic_program_info = sprintf(
    '<div class="basic-program-info">
      %1$s
      %2$s
      %3$s
    </div>',
    !empty($p_location) ? '<div class="location">'.$p_location.'</div>' : '',
    !empty($p_duration) ? '<div class="duration">'.$p_duration.'</div>' : '',
    !empty($p_study_options) ? '<div class="studyoptions"><div>'.$study_options.'</div></div>' : ''
  );
}

$return .= sprintf(
  $guides['program'],
  ' '.$post_type,
  $the_cover_image,
  $the_post_title,
  // $the_basic_excerpt,
  '',
  $determined_permalink,
  $aspect_ratio_class,
  $orientationClass,
  $maybe_target,
  $category,
  $basic_program_info
);
?>