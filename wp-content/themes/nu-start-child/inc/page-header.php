<?php

add_filter( 'body_class', 'page_header_opt', 99, 2 );
function page_header_opt($classes, $class ) {

  if (is_page() || is_front_page()) {
    $is_dark_header = get_post_meta( get_the_ID(), 'header_color', true );
    if ($is_dark_header == 'dark') {

      $classes[] = 'is-dark-header';

    } else if ($is_dark_header == 'white') {

      foreach ($classes as $key => $value) {
        if ($value === 'is-dark-header') unset($classes[$key]);
      }

    }
  }

  return $classes;
}

