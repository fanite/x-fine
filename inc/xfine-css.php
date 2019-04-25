<?php
function xfine_theme_styles () 
{
  wp_enqueue_style( 'xfine-style', get_stylesheet_uri(), array(), VERSIONS );
}

add_action( 'wp_enqueue_scripts', 'xfine_theme_styles' );