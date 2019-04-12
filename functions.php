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

// 定义文本域
define('TEXT_DOMAIN', 'xfine');

if ( ! function_exists( 'xfine_setup' ) ) :
  function xfine_setup()
  {
    // 加载翻译
    load_theme_textdomain( TEXT_DOMAIN, get_template_directory() . '/languages' );

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
				'primary' => __( '主菜单', TEXT_DOMAIN ),
				'aside'		=> __( '侧边栏', TEXT_DOMAIN ),
				'social'  => __( '社交菜单', TEXT_DOMAIN ),
			)
		);
  }
endif;
add_action( 'after_setup_theme', 'xfine_setup' );

// 侧边栏widget
function xfine_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( '侧边栏', TEXT_DOMAIN ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your sidebar.', TEXT_DOMAIN ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Content Bottom 1', TEXT_DOMAIN ),
			'id'            => 'sidebar-2',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', TEXT_DOMAIN ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Content Bottom 2', TEXT_DOMAIN ),
			'id'            => 'sidebar-3',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', TEXT_DOMAIN ),
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


/**
 * Create the function to output the contents of our Dashboard Widget.
 */
function welcome_dashboard_widget_function() {

	// Display whatever it is you want to show.
	echo "Hello World, I'm a great Dashboard Widget";
}

/**
 * Add a widget to the dashboard.
 *
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */
function welcome_add_dashboard_widgets() {

	wp_add_dashboard_widget( 'welcome_dashboard_widget',         		// Widget slug.
													 '欢迎来到仪表盘',         		// Title.
													 'welcome_dashboard_widget_function' ); // Display function.
}
add_action( 'wp_dashboard_setup', 'welcome_add_dashboard_widgets' );

// Register Custom Post Type
function my_photos_post_type() {

	$labels = array(
		'name'                  => _x( '我的相片', '这是存放我的相片的地方', TEXT_DOMAIN ),
		'singular_name'         => _x( 'My Photos', 'This is my area which I save my photos.', TEXT_DOMAIN ),
		'menu_name'             => __( '相片', TEXT_DOMAIN ),
		'name_admin_bar'        => __( 'My Photos', TEXT_DOMAIN ),
		'archives'              => __( 'Item Archives', TEXT_DOMAIN ),
		'attributes'            => __( 'Item Attributes', TEXT_DOMAIN ),
		'parent_item_colon'     => __( 'Parent Item:', TEXT_DOMAIN ),
		'all_items'             => __( '所有相片', TEXT_DOMAIN ),
		'add_new_item'          => __( '添加新相片', TEXT_DOMAIN ),
		'add_new'               => __( '添加', TEXT_DOMAIN ),
		'new_item'              => __( 'New Item', TEXT_DOMAIN ),
		'edit_item'             => __( 'Edit Item', TEXT_DOMAIN ),
		'update_item'           => __( 'Update Item', TEXT_DOMAIN ),
		'view_item'             => __( 'View Item', TEXT_DOMAIN ),
		'view_items'            => __( 'View Items', TEXT_DOMAIN ),
		'search_items'          => __( 'Search Item', TEXT_DOMAIN ),
		'not_found'             => __( '没有相片', TEXT_DOMAIN ),
		'not_found_in_trash'    => __( 'Not found in Trash', TEXT_DOMAIN ),
		'featured_image'        => __( 'Featured Image', TEXT_DOMAIN ),
		'set_featured_image'    => __( 'Set featured image', TEXT_DOMAIN ),
		'remove_featured_image' => __( 'Remove featured image', TEXT_DOMAIN ),
		'use_featured_image'    => __( 'Use as featured image', TEXT_DOMAIN ),
		'insert_into_item'      => __( 'Insert into item', TEXT_DOMAIN ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', TEXT_DOMAIN ),
		'items_list'            => __( 'Items list', TEXT_DOMAIN ),
		'items_list_navigation' => __( 'Items list navigation', TEXT_DOMAIN ),
		'filter_items_list'     => __( 'Filter items list', TEXT_DOMAIN ),
	);
	$args = array(
		'label'                 => __( 'Post Type', TEXT_DOMAIN ),
		'description'           => __( 'Post Type Description', TEXT_DOMAIN ),
		'labels'                => $labels,
		'supports'              => false,
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'							=> 'dashicons-images-alt2',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'post_type', $args );

}
add_action( 'init', 'my_photos_post_type', 0 );