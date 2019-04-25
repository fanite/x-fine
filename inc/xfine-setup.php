<?php
if ( ! function_exists( 'xfine_setup' ) ) :
  /**
   * xfine 主题的一些默认设置，和注册Wordpress的功能
   * 
   * @since 1.0.0
   * @return void
   */
  function xfine_setup()
  {
    // 保存主题版本
    update_option( 'xfine_ver', VERSIONS, true );

    // 加载翻译支持
    load_theme_textdomain( TEXT_DOMAIN, LANG_PATH );

    // 添加 feed xml (RSS) 支持
    add_theme_support( 'automatic-feed-links' );

    // 添加缩略图支持
    add_theme_support( 'post-thumbnails' );

    // 设置缩略图的大小
    set_post_thumbnail_size( 640, 320 );

    /**
     * 添加文章支持形式
     * 
     * see @link https://codex.wordpress.org/zh-cn:%E6%96%87%E7%AB%A0%E5%BD%A2%E5%BC%8F#.E6.94.AF.E6.8C.81.E7.9A.84.E5.BD.A2.E5.BC.8F
     */
    $post_format = [ 'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio' ];
    add_theme_support( 'post-formats', $post_format );
  }
endif;
add_action( 'after_setup_theme', 'xfine_setup' );