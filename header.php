<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">

<title><?php woo_title(); ?></title>
<?php woo_meta(); ?>

	<link href="<?php bloginfo('template_url'); ?>/images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
       
    <!--[if IE 6]>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/suckerfish.js"></script>
    <![endif]-->
    <?php if(is_home()){ ?>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/slider.css" media="screen" />
	<?php } ?>
    <?php if ( is_single() ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>

	<?php if(is_home()){ ?>
	<script type="text/javascript">
		jQuery(document).ready(function(){
	    	jQuery('#wooslider').wooslider(
	    	<?php if(get_option('woo_slider_sfade') != ''){ ?>
	    	{
	   		sfade : <?php echo get_option('woo_slider_sfade'); ?>, // Slide Fade
			cfade : <?php echo get_option('woo_slider_cfade'); ?>, // content Fade
			offset : 20, // Padding offset
			speed: <?php echo get_option('woo_slider_speed'); ?>,
			timeout: <?php echo get_option('woo_slider_timeout'); ?>,
			content_speed: <?php echo get_option('woo_slider_content_speed'); ?>
			}
			<?php } ?>
			);
		});
	</script>
	<!--  IE HACK for Slider-->
	<!--[if IE]>
		<style>
		.slider-container .slide-content { FILTER: alpha(opacity=100)!important; z-index:999!important} 
		.slide{FILTER: alpha(opacity=100)!important;}
		.slider-nav .slider-right { background: url('<?php bloginfo('template_url'); ?>/images/fleche2.gif') no-repeat center bottom; }
		.slider-nav .slider-left { background: url('<?php bloginfo('template_url'); ?>/images/fleche1.gif') no-repeat center bottom; }
		</style>
	<![endif]-->

	    
	    <?php } ?>



</head>

<body <?php body_class(); ?>>

<!-- Set video category -->
<?php $cat = get_option('woo_video_category'); $GLOBALS[vid_cat] = $wpdb->get_var("SELECT term_id FROM $wpdb->terms WHERE name='$cat'"); ?>

<div id="page">

<div id="nav"> <!-- START TOP NAVIGATION BAR -->
	
		<div id="nav-left">
			<?php
			if ( function_exists('has_nav_menu') && has_nav_menu('primary-menu') ) {
				wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'nav1', 'theme_location' => 'primary-menu' ) );
			} else {
			?>
			<ul id="nav1">
			<?php 
        	if ( get_option('woo_custom_nav_menu') == 'true' ) {
        		if ( function_exists('woo_custom_navigation_output') )
					woo_custom_navigation_output('name=Woo Menu 1');

			} else { ?>
            
            	<?php /* If this is the frontpage */ if ( is_home() ) { ?>
				<li class="current_page_item"><a href="<?php echo get_option('home'); ?>/"><?php _e('Home','woothemes'); ?></a></li>
				<?php } else { ?>
				<li class="page_item"><a href="<?php echo get_option('home'); ?>/"><?php _e('Home','woothemes'); ?></a></li>
				<?php } ?>
				<?php wp_list_pages('sort_column=menu_order&title_li=' ); ?>	
                
            <?php } ?>	
			
			</ul>
			<?php } ?>
		</div><!--/nav-left -->

		<div id="nav-right">		
		
			<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
				
				<div id="search">
					<input type="text" value="<?php _e('输入关键词','woothemes'); ?>" onclick="this.value='';" name="s" id="s" />
					<input name="" type="image" src="<?php bloginfo('template_directory'); ?>/<?php woo_style_path(); ?>/search.gif" value="<?php _e('Go','woothemes'); ?>" class="btn" />
				</div><!--/search -->
				
			</form>
		
		</div><!--/nav-right -->
		
	</div><!--/nav-->
	
	<div class="fix"></div>
	
	<div id="header"><!-- START LOGO LEVEL WITH RSS FEED -->
		
		<div id="logo">
	       
		<?php if (get_option('woo_texttitle') <> "true") : $logo = get_option('woo_logo'); ?>
            <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('description'); ?>">
                <img src="<?php if ($logo) echo $logo; else { bloginfo('template_directory'); ?>/images/logo.gif<?php } ?>" alt="<?php bloginfo('name'); ?>" />
            </a>
        <?php endif; ?> 
        
        <?php if( is_singular() ) : ?>
            <span class="site-title"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></span>
        <?php else : ?>
            <h1 class="site-title"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
        <?php endif; ?>
            <span class="site-description"><?php bloginfo('description'); ?></span>
	      	
		</div><!-- /#logo -->
		
		<!-- Top Ad Starts -->
			<?php if (get_option('woo_ad_top_disable') == "false") include (TEMPLATEPATH . "/ads/top_ad.php"); ?>
		<!-- Top Ad Ends -->
		<?php //do_action('icl_language_selector'); ?>
	</div><!--/header -->
    
    	
	
	<div id="suckerfish">
	<?php woo_sidebar('sidebar-4'); ?>
	<!-- START CATEGORY NAVIGATION (SUCKERFISH CSS) -->
			<?php
			if ( function_exists('has_nav_menu') && has_nav_menu('secondary-menu') ) {
				wp_nav_menu( array( 'depth' => 5, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'nav2', 'theme_location' => 'secondary-menu' ) );
			} else {
			?>
			<ul id="nav2">
			<?php 
        	if ( get_option('woo_custom_nav_menu') == 'true' ) {
        		if ( function_exists('woo_custom_navigation_output') )
					woo_custom_navigation_output('name=Woo Menu 2');

			} else { ?>
            
				<?php wp_list_categories('title_li=') ?>	
                
            <?php } ?>
			</ul>
			<?php } ?>		
	</div><!--/nav2-->
	
    <div id="columns"><!-- START MAIN CONTENT COLUMNS -->