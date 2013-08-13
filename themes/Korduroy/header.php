<!doctype html>

<!--[if lt IE 7]>
<html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]>
<html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]>
<html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
  <meta charset="utf-8">

  <!-- Google Chrome Frame for IE -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php wp_title(''); ?></title>

  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <!-- icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) -->
  <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">

  <!--[if IE]>
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
  <![endif]-->

  <meta name="msapplication-TileColor" content="#f01d4f">
  <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

  <script type="text/javascript" src="//use.typekit.net/jiy2hqu.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

  <!-- wordpress head functions -->
  <?php wp_head(); ?>
  <!-- end of wordpress head -->
</head>

<body <?php body_class(); ?>>

<div id="page-wrap">
  <header id="header">
    <div class="logo-container">
      <a href="<?php echo home_url(); ?>" class="korduroy-logo"><?php bloginfo('name'); ?></a>
    </div>

    <div class="navigation-container">
      <div class="navigation-row">
        <nav role="social-navigation" class="social-navigation">
          <ul class="social-navigation-list">
            <li class="social-navigation-item vimeo"><a href="http://vimeo.com/korduroy" target="_blank">Vimeo</a></li>
            <li class="social-navigation-item instagram"><a href="http://instagram.com/korduroytv" target="_blank">Instagram</a></li>
            <li class="social-navigation-item pinterest"><a href="http://pinterest.com/korduroytv" target="_blank">Pinterest</a></li>
            <li class="social-navigation-item facebook"><a href="http://facebook.com/Korduroytv" target="_blank">Facebook</a></li>
            <li class="social-navigation-item tumblr"><a href="http://korduroytv.tumblr.com" target="_blank">Tumblr</a></li>
            <li class="social-navigation-item twitter"><a href="http://twitter.com/Korduroytv" target="_blank">Twitter</a></li>
          </ul>
        </nav>
      </div>

      <div class="navigation-row">
        <nav role="site-navigation" class="site-navigation">
          <ul class="site-navigation-list">
            <li class="site-navigation-item <?php if (get_post_type(get_the_ID()) === 'shows') { echo "current"; } ?>"><a href="<?php echo site_url(); ?>/shows">Shows</a></li>
            <li class="site-navigation-item <?php if (get_post_type(get_the_ID()) === 'post') { echo "current"; } ?>"><a href="<?php echo site_url(); ?>/blog">Blog</a></li>
            <li class="site-navigation-item <?php if ( is_page('store') ) { echo "current"; }?>"><a href="<?php echo site_url(); ?>/store">Store</a></li>
            <li class="site-navigation-item <?php if ( is_page('supporters') ) { echo "current"; }?>"><a href="<?php echo site_url(); ?>/supporters">Supporters</a></li>
            <li class="site-navigation-item <?php if ( is_page(array('the-site', 'the-crew', 'big-shaka-club')) ) { echo "current"; }?>"><a href="<?php echo site_url(); ?>/about">About</a></li>
          </ul>
        </nav>
        <div class="search-container">
          <?php the_widget('WP_Widget_Search'); ?>
        </div>
      </div>
    </div>
  </header>
