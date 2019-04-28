<?php
function add_test_theme_page() {
  add_theme_page( __('Xfine Settings'), __('Xfine Settings'), 'edit_theme_options', 'xfine-options', 'theme_option_page' );
}
add_action( 'admin_menu', 'add_test_theme_page' );

function theme_option_page() {
  require INC_PATH . '/options/options.php';
}