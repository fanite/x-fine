<?php
/**
 * X Fine functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage X_Fine
 * @since 1.0.0
 */

function xfine_theme_scripts()
{
  wp_enqueue_style( 'xfine-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'xfine_theme_scripts' );