<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<html xmlns:wb="http://open.weibo.com/wb">
<!--<![endif]-->
<head>
<script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>
<meta property="wb:webmaster" content="a6274dc5fc7ba13c" />
<meta name="google-site-verification" content="tSxHHK19kKdNz6hQ7-Lt_72z19gI5_X6FdXZ717z-5E" />
<meta charset="utf-8">
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="http://feed.jevylee.com/" />
<!-- 设置网站小图标 -->
<link rel="shortcut icon"    href="http://jevyleeb.sinaapp.com/wp-content/themes/zanblog2.0.7/ui/images/favicon.ico" >

<!-- 设置标题 -->
<title>
  <?php
    global $page, $paged;
    $site_description = get_bloginfo( 'description', 'display' );
    if ($site_description && ( is_home() || is_front_page() )) {
      bloginfo('name');
      echo " - $site_description";
    } else {
      echo trim(wp_title('',0));
      if ( $paged >= 2 || $page >= 2 )
        echo ' - ' . sprintf( __( '第%s页' ), max( $paged, $page ) );
      echo ' | ' ;
      bloginfo('name');
    }
  ?>
</title>
<!-- 设置标题结束 -->

<!-- 设置关键词、描述 -->
<?php if (is_home() || is_front_page())
  {
    $description = get_option( 'zan_description' );
    $keywords = get_option( 'zan_keywords' );
  }
  elseif (is_category())
  {
    $description = strip_tags(trim(category_description()));
    $keywords = single_cat_title('', false);
  }
  elseif (is_tag())
  {
    $description = sprintf( __( '与标签 %s 相关联的文章列表'), single_tag_title('', false));
    $keywords = single_tag_title('', false);
  }
  elseif (is_single())
  {
    if ($post->post_excerpt) {$description = $post->post_excerpt;} 
    else {$description = mb_strimwidth(strip_tags($post->post_content),0,110,"");}
    $keywords = "";
    $tags = wp_get_post_tags($post->ID);
    foreach ($tags as $tag ) {$keywords = $keywords . $tag->name . ", ";}
  }
  else
  {
    $description = get_option( 'zan_description' );
    $keywords = get_option( 'zan_keywords' );
  }
?>
<!-- 设置关键词、描述结束 -->

<meta charset="utf-8">
<meta content="<?php echo trim($description); ?>" name="description"/>
<meta content="<?php echo rtrim($keywords,','); ?>" name="keywords"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php wp_head(); ?>

<!--[if lt IE 9]>
  <script src="<?php echo get_template_directory_uri(); ?>/ui/js/modernizr.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/ui/js/respond.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/ui/js/html5shiv.js"></script>
<![endif]-->

</head>
<body <?php body_class(); ?>>
<header id="zan-header" class="navbar navbar-inverse">
  <nav class="container">
    <a href="<?php echo site_url(); ?>"><div class="navbar-brand"></div></a>
    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="fa fa-reorder fa-lg"></span>
    </button>
    <div class="navbar-collapse bs-navbar-collapse collapse">
      <?php
        $defaults = array(
          'container' => '',
          'menu_class' => 'nav navbar-nav',
          'walker' => new Zan_Nav_Menu('')
        );
        wp_nav_menu($defaults);
      ?>
	  <?php if(dynamic_sidebar('搜索框')) {?>
        <div class="search visible-lg">
           <form method="get" id="searchform" class="form-inline" action="<?php bloginfo('url'); ?>">
              <input class="form-control" type="text" name="s" id="s" placeholder="搜索..." />
              <button type="submit" class="btn btn-danger btn-small" name="submit" ><i class="fa fa-search"></i></button>
           </form>
        </div>
		<?php };?>
    </div>
  </nav>
  <div id="if-fixed" class="pull-right visible-lg visible-md">
    <i class="fa fa-thumb-tack"></i>
    <input type="checkbox">
  </div>
</header>