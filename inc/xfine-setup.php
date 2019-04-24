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
     * 日志（aside） - 典型样式就是没有标题。类似于 Facebook 或人人网中更新的一条日志。
     * 
     * 相册（gallery） - 图像陈列厅。文章中通常会有“gallery”代码和相应的图像附件。
     * 
     * 链接（link） - 链接到其它网站的链接。主题可能会使用文章中的第一个 <a href=""> 标签
     * 作为文章的外部链接。有可能有的文章至包含一个 URL，那么这个 URL 将会被使用；同时，文
     * 章标题（post_title）将会是附加到它的锚的名称。
     * 
     * 图像（image） - 单张图像。文章中的首个 <img /> 标记将会被认为是该图片。另外，如果文
     * 章只包含一个 URL 链接，则被认为是该图片的 URL 地址，而文章标题（post_title）将会作
     * 为图片的标题属性。
     * 
     * 引语（quote） - 引用他人的一段话。通常使用 blockquote 来包裹引用内容。或者，可能直
     * 接将引语写入文章，并将其出处写在标题栏。
     * 
     * 状态（status） - 简短更新，通常最多 140 个字符。类似于微博 Twitter 状态消息。
     * 
     * 视频（video） - 单一视频。文章中第一个 <video /> 或 object 或 embed 将被作为视频
     * 处理。或者，文章可以仅包含视频的 URL，甚至一些主题和插件可以支持自动嵌入您的文章附件
     * 中的视频。
     * 
     * 音频（audio） - 一个音频文件。可以用于播客（podcasting）等。
     */
    $post_format = [ 'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio' ];
    add_theme_support( 'post-formats', $post_format );

    
  }
endif;