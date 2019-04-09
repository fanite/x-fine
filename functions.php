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

if ( ! function_exists( 'xfine_setup' ) ) :
  function xfine_setup()
  {
    // 加载翻译
    // load_theme_textdomain( 'xfine', get_template_directory() . '/languages' );

    // feed 支持
    add_theme_support( 'automatic-feed-links' );

    // 添加自定义Logo支持
    add_theme_support(
			'custom-logo',
			array(
				'height'      => 240,
				'width'       => 240,
				'flex-height' => true,
			)
    );

    add_theme_support( 'title-tag' );

    add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 9999 );

    add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
    );
    
    add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'status',
				'audio',
				'chat',
			)
    );
    
    // 支持小widgets
    add_theme_support( 'customize-selective-refresh-widgets' );
    
    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus(
			array(
				'primary' => __( '主菜单', 'xfine' ),
				'social'  => __( '社交菜单', 'xfine' ),
			)
		);
  }
endif;
add_action( 'after_setup_theme', 'xfine_setup' );

// 侧边栏widget
function xfine_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'xfine' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'xfine' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Content Bottom 1', 'xfine' ),
			'id'            => 'sidebar-2',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'xfine' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Content Bottom 2', 'xfine' ),
			'id'            => 'sidebar-3',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'xfine' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'xfine_widgets_init' );

function xfine_theme_scripts()
{
  wp_enqueue_style( 'xfine-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'xfine_theme_scripts' );