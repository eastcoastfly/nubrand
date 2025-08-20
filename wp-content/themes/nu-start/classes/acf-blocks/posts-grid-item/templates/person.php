<?php

/**
 *    Posts Grid Item --- Person Template Type A
 * 
 *    This template will render a single Person item into the Posts Grid.
 *    - this is a "clickable area" template
 */
// 

$full_name = !empty($person_metadata['full_name']) ? '<h2 class="full-name post-title"><span>' . $person_metadata['full_name'] . '</span></h2>' : $the_post_title;

$primary_title = !empty($person_metadata['primary_title']) ? $person_metadata['primary_title'] : '';
$year = !empty($person_overrides['title']) ? ', ' . $person_overrides['title'] : '';

$full_title = '<div class="primary-title">' . $primary_title . $year . '</div>';


$email = !empty($person_metadata['email']) ? '<p class="email has-inline-icon"><i class="fa-solid fa-envelope"></i><a href="mailto:' . $person_metadata['email'] . '">' . $person_metadata['email'] . '</a></p>' : '';
$phone = !empty($person_metadata['phone_number']) ? '<p class="phone-number has-inline-icon"><i class="fa-solid fa-phone"></i><a href="tel:' . $person_metadata['phone_number'] . '">' . $person_metadata['phone_number'] . '</a></p>' : '';

$description = !empty($person_overrides['description']) ? $person_overrides['description'] : '';


$teaser_template_name = !empty($gridOptions['contact_info_in_teaser']) ? 'uses-viewmore-button' : 'contains-clickable-area';
$view_profile_link = !empty($gridOptions['show_view_profile']) ? '<a class="view-profile-link" href="%4$s"%5$s%6$s>View Profile</a>' : '';

$guides['uses-viewmore-button'] = '
  <li class="grid-item%1$s%2$s%3$s ' . $teaser_template_name . '">
      %7$s
      <div class="grid-item-content">
        %8$s
        %9$s
        %10$s
        %11$s
        %12$s
      </div>
  </li>
';
$guides['contains-clickable-area'] = '
  <li class="grid-item%1$s%2$s%3$s ' . $teaser_template_name . '">
    <div class="person-teaser">
      %7$s
      <div class="grid-item-content">
        %8$s
        %9$s
        %10$s
      </div>
    </div>
  </li>
';


$return .= sprintf(
  $guides[$teaser_template_name],
  // ? generic grid-item args...
  ' ' . $post_type, // %1$s
  $aspect_ratio_class, // %2$s
  $orientationClass, // %3$s
  $determined_permalink, // %4$s
  $the_title_attribute, // %5$s
  $maybe_target, // %6$s
  $the_cover_image, // %7$s
  // ? person-specific args...
  $full_name, // %8$s
  $full_title, // %9$s
  $description, // %10$s
  $email, // %11$s
  $phone, // %12$s
  $view_profile_link // %13$s
);
