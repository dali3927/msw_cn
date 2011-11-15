<div class="box">

	<?php 
	if (is_paged()) $is_paged = true;
	
	if(get_option('woo_exclude_video') == "true")
		$ex_vid = get_cat_id(get_option('woo_video_category'));
			  
	if (get_option('woo_slider_magazine_exclude') == "true") $exclude = get_option('woo_exclude'); // Get featured posts and exclude
	$args = array(	'post__not_in' => $exclude, 
					'cat' => '-'.$ex_vid,
					'paged'=> $paged ); 
					
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts($args);
	
	if (have_posts()) : $counter = 0;
	while (have_posts()) : the_post(); $counter++;
	?>

	<div class="post <?php if ($counter == 1) { echo 'fl'; } else { echo 'fr'; $counter = 0; } ?>">
            
		    <div class="box-post-content">
            <?php woo_get_image('image',get_option('woo_home_thumb_width'),get_option('woo_home_thumb_height')); ?> 
			<h2><a title="<?php _e('Permalink to ','woothemes'); ?> <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
            <p><em><?php the_time('d F Y'); ?></em></p>

			<p><?php echo strip_tags(get_the_excerpt(), '<a><strong>'); ?></p>
            </div>
			<p><span class="continue"><a title="<?php _e('Permalink to ','woothemes'); ?> <?php the_title(); ?>" href="<?php the_permalink() ?>"><?php _e('Read the full story','woothemes'); ?></a></span></p>
            
		
        <p class="posted"><?php _e('Posted in ','woothemes'); ?> <?php the_category(', ') ?><span class="comments"><?php comments_popup_link(__('0 Comments','woothemes'), __('1 Comment','woothemes'), __('% Comments','woothemes')); ?></span></p>
		</div><!--/post-->
		
		<?php if ( $counter == 0 ) { echo '<div class="hl-full"></div>'; ?> <div style="clear:both;"></div> <?php } ?>
	
	<?php endwhile; ?>
    <?php endif; ?>
	
	<div class="fix" style="height:1px"></div>
		
    <div class="more_entries">
        <?php if (function_exists('wp_pagenavi')) wp_pagenavi(); else { ?>
            <div class="fl"><?php previous_posts_link(__('&laquo; Newer Entries ','woothemes')) ?></div>
            <div class="fr"><?php next_posts_link(__(' Older Entries &raquo;','woothemes')) ?></div>
            <br class="fix" />
        <?php } ?>
    </div>		
    
    <div class="fix" style="height:15px"></div>
	
</div><!--/box-->