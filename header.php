<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
	<?php endif; ?>
  <title><?php wp_title( '&mdash;', true, 'right' ); bloginfo( 'name' );?>
	</title>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php if ( is_front_page() && is_home() ) : ?>
  <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
<?php else : ?>
  <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
  <?php
endif;

$description = get_bloginfo( 'description', 'display' );
if ( $description || is_customize_preview() ) :
  ?>
  <p class="site-description"><?php echo $description; ?></p>
<?php endif; ?>
<?php var_dump(has_nav_menu( 'primary' ));?>
<?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) ) : ?>
  <button id="menu-toggle" class="menu-toggle"><?php _e( 'Menu', 'xfine' ); ?></button>

  <div id="site-header-menu" class="site-header-menu">
    <?php if ( has_nav_menu( 'primary' ) ) : ?>
      <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'xfine' ); ?>">
        <?php
          wp_nav_menu(
            array(
              'theme_location' => 'primary',
              'menu_class' => 'primary-menu',
            )
          );
        ?>
      </nav><!-- .main-navigation -->
    <?php endif; ?>

    <?php if ( has_nav_menu( 'social' ) ) : ?>
      <nav id="social-navigation" class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'xfine' ); ?>">
        <?php
          wp_nav_menu(
            array(
              'theme_location' => 'social',
              'menu_class'  => 'social-links-menu',
              'depth'       => 1,
              'link_before' => '<span class="screen-reader-text">',
              'link_after'  => '</span>',
            )
          );
        ?>
      </nav><!-- .social-navigation -->
    <?php endif; ?>
  </div><!-- .site-header-menu -->
<?php endif; ?>