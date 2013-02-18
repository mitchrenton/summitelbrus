<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
   <meta charset="utf-8" />
   
   <!-- Set the viewport width to device width for mobile -->
   <meta name="viewport" content="width=device-width" />
   <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
   <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico"/>
   
   <title><?php wp_title( '|' ); ?> <?php bloginfo( 'name' ); ?></title>
   
   <!-- including stylesheets -->
   <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/normalize.css" />
   <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/foundation.css" />
   <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />

   <!-- including scripts -->
   <script src="<? bloginfo('template_url'); ?>/javascripts/modernizr.foundation.js"></script>
   <script src="<? bloginfo('template_url'); ?>/javascripts/foundation.min.js"></script>
   <script src="<? bloginfo('template_url'); ?>/javascripts/jquery.fitvids.min.js"></script>
   <script type="text/javascript" src="//use.typekit.net/qlc6iti.js"></script>
   <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<? if(! is_front_page()) : ?>
   <script src="<?php bloginfo('template_url'); ?>/javascripts/jquery.backstretch.min.js"></script>
<? endif; ?>
   
   <!-- Initialize JS Plugins -->
   <script src="<?php bloginfo('template_url'); ?>/javascripts/app.js"></script>
      
   <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

   <header>
   
      <nav>
      
         <a href="#" class="mobile-nav-trigger"></a>
   
      <? wp_nav_menu(array(
         'menu' => 'Main menu',
         'container' => '',
         'container_class' => 'main-menu'
      )); ?>
      
      </nav>
         
   </header>
   
   <? if(! is_front_page()) : ?>
   
   <div class="container">
      
      <!--  
      <div class="logo">
      
         <figure>
            <img src="<? bloginfo('template_url'); ?>/images/logo.png" alt="<? echo get_bloginfo('name') .' - '. get_bloginfo('description'); ?>" />
         </figure>
      
      </div>-->
      
   <? endif; ?>