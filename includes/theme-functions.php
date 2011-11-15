<?php 

/*-----------------------------------------------------------------------------------

TABLE OF CONTENTS

- Page / Post navigation
- WooTabs - Popular Posts
- WooTabs - Latest Posts
- WooTabs - Latest Comments
- WordPress 3.0 New Features Support
- Gazette Slider
- Misc

-----------------------------------------------------------------------------------*/



/*-----------------------------------------------------------------------------------*/
/* Page / Post navigation */
/*-----------------------------------------------------------------------------------*/
if (!function_exists('woo_pagenav')) {
	function woo_pagenav() { 
	
		if (function_exists('wp_pagenavi') ) { ?>
	    
			<?php wp_pagenavi(); ?>
	    
		<?php } else { ?>    
	    
			<?php if ( get_next_posts_link() || get_previous_posts_link() ) { ?>
	        
	            <div class="nav-entries">
	                <div class="nav-prev fl"><?php previous_posts_link(__('&laquo; Newer Entries ', 'woothemes')) ?></div>
	                <div class="nav-next fr"><?php next_posts_link(__(' Older Entries &raquo;', 'woothemes')) ?></div>
	                <div class="fix"></div>
	            </div>	
	        
			<?php } ?>
	    
		<?php }   
	} 
}               	

if (!function_exists('woo_postnav')) {
	function woo_postnav() { 
		?>
	        <div class="post-entries">
	            <div class="post-prev fl"><?php previous_post_link( '%link', '<span class="meta-nav">&laquo;</span> 上一篇文章' ) ?></div>
	            <div class="post-next fr"><?php next_post_link( '%link', '下一篇文章 <span class="meta-nav">&raquo;</span>' ) ?></div>
	            <div class="fix"></div>
	        </div>	
	
		<?php 
	}                	
}                	


/*-----------------------------------------------------------------------------------*/
/* WooTabs - Popular Posts */
/*-----------------------------------------------------------------------------------*/
if (!function_exists('woo_tabs_popular')) {
	function woo_tabs_popular( $posts = 5, $size = 45 ) {
		global $post;
		$popular = get_posts('caller_get_posts=1&orderby=comment_count&showposts='.$posts);
		foreach($popular as $post) :
			setup_postdata($post);
	?>
	<li>
		<?php if ($size <> 0) woo_image('height='.$size.'&width='.$size.'&class=thumbnail&single=true'); ?>
		<a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
		<span class="meta"><?php the_time( get_option( 'date_format' ) ); ?></span>
		<div class="fix"></div>
	</li>
	<?php endforeach;
	}
}


/*-----------------------------------------------------------------------------------*/
/* WooTabs - Latest Posts */
/*-----------------------------------------------------------------------------------*/
if (!function_exists('woo_tabs_latest')) {
	function woo_tabs_latest( $posts = 5, $size = 45 ) {
		global $post;
		$latest = get_posts('caller_get_posts=1&showposts='. $posts .'&orderby=post_date&order=desc');
		foreach($latest as $post) :
			setup_postdata($post);
	?>
	<li>
		<?php if ($size <> 0) woo_image('height='.$size.'&width='.$size.'&class=thumbnail&single=true'); ?>
		<a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
		<span class="meta"><?php the_time( get_option( 'date_format' ) ); ?></span>
		<div class="fix"></div>
	</li>
	<?php endforeach;
	}
}



/*-----------------------------------------------------------------------------------*/
/* WooTabs - Latest Comments */
/*-----------------------------------------------------------------------------------*/
if (!function_exists('woo_tabs_comments')) {
	function woo_tabs_comments( $posts = 5, $size = 35 ) {
		global $wpdb;

		$comments = get_comments( array( 'number' => $posts, 'status' => 'approve' ) );
		if ( $comments ) {
			foreach ( (array) $comments as $comment) {
			$post = get_post( $comment->comment_post_ID );
			?>
				<li class="recentcomments">
					<?php echo get_avatar( $comment, $size ); ?>
					<a href="<?php echo get_comment_link($comment->comment_ID); ?>" title="<?php echo wp_filter_nohtml_kses($comment->comment_author); ?> <?php _e('on', 'woothemes'); ?> <?php echo $post->post_title; ?>"><?php echo wp_filter_nohtml_kses($comment->comment_author); ?>: <?php echo substr( wp_filter_nohtml_kses( $comment->comment_content ), 0, 50 ); ?>...</a>
					<div class="fix"></div>
				</li>
			<?php
			}
 		}
	}
}



/*-----------------------------------------------------------------------------------*/
/* WordPress 3.0 New Features Support */
/*-----------------------------------------------------------------------------------*/

if ( function_exists('wp_nav_menu') ) {
	add_theme_support( 'nav-menus' );
	register_nav_menus( array( 'primary-menu' => __( 'Primary Menu' ) ) );
}     


/*-----------------------------------------------------------------------------------*/
/* Gazette Slider */
/*-----------------------------------------------------------------------------------*/

function gaz_slider_height(){
?>
<style type="text/css">

.wooslider .slider-container,.slider-container .slide  { height: <?php echo get_option('woo_carousel_height'); ?>px!important } 
.wooslider .slider-container .slide-content { top: <?php echo get_option('woo_carousel_height'); ?>px } }
</style>
<?php
}    

if(get_option("woo_carousel_height") != 270 ){
    add_action('wp_head','gaz_slider_height');
}

/*-----------------------------------------------------------------------------------*/
/* MISC */
/*-----------------------------------------------------------------------------------*/




// WordPress 3.0 New Features Support */
if ( function_exists('wp_nav_menu') ) {
	add_theme_support( 'nav-menus' );
	register_nav_menus( array( 'primary-menu' => __( 'Primary Menu' ), 'secondary-menu' => __( 'Secondary Menu' ) ) );
}

?>