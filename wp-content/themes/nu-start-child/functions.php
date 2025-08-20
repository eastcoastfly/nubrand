<?php
/**
 * nu-start-child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package nu-start-child
 */

// enqueue script/style
include_once 'inc/enqueue.php';

// page heeader options
include_once 'inc/page-header.php';



add_action('wp_footer', 'render_scroll_to_top');
function render_scroll_to_top() {

  ?>
  <button id="scroll-to-top">
    <svg class="svg-inline--fa fa-angle-up icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M352 352c-8.188 0-16.38-3.125-22.62-9.375L192 205.3l-137.4 137.4c-12.5 12.5-32.75 12.5-45.25 0s-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25C368.4 348.9 360.2 352 352 352z"></path></svg>
  </button>
  <?php
}

/* Safe redirect */

add_action('wp', 'nu_redirect');
function nu_redirect() {

  global $post;
  if (!is_admin() && isset($post->ID) && $post->ID) {
    $is_safe_redirect = get_field('safe_redirect', $post->ID);
    $redirect_url = get_field('redirect_page', $post->ID);
    if ($is_safe_redirect) {

      if (!$redirect_url) {
        $redirect_url = home_url();
      }
      wp_redirect( $redirect_url );
      die;
    }
  }
}


