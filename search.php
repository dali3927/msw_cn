<?php get_header(); ?>

		<div class="col1">

		<?php if (have_posts()) : ?>
		
		<div id="archivebox">
        	
            	<h3><em><?php _e('Search Results','woothemes'); ?> |</em> <?php printf(the_search_query()); ?></h3>        
		
		</div><!--/archivebox-->
	
			<?php while (have_posts()) : the_post(); ?>		

				<div class="post-alt blog" id="post-<?php the_ID(); ?>">
		
					<?php woo_image('width='.get_option('woo_thumb_width').'&height='.get_option('woo_thumb_height').'&class=th'); ?>                    
					
					
					<h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<p class="post_date"><?php _e('Posted on ','woothemes'); ?> <?php the_time('d F Y'); ?>. <span class="singletags"><?php if (function_exists('the_tags')) { ?><?php the_tags('Tags: ', ', ', ''); ?><?php } ?></span></p>
		
					<div class="entry">
						<?php the_excerpt(); ?>
					</div>
		
					<p class="posted"><?php _e('Posted in ','woothemes'); ?> <?php the_category(', ') ?><span class="comments"><?php comments_popup_link(__('0 Comments','woothemes'), __('1 Comment','woothemes'), __('% Comments','woothemes')); ?></span></p>
				
				</div><!--/post-->

		<?php endwhile; ?>
		
		<div class="navigation">
			<?php if (function_exists('wp_pagenavi')) wp_pagenavi(); else { ?>
	            <div class="fl"><?php previous_posts_link(__('&laquo; Newer Entries ','woothemes')) ?></div>
	            <div class="fr"><?php next_posts_link(__(' Older Entries &raquo;','woothemes')) ?></div>
	            <br class="fix" />
       		<?php } ?>
		</div>
		
		<?php else : ?>

		<div id="archivebox">
        	
            	<h3><em><?php _e('Search Results','woothemes'); ?> |</em> <?php _e('None Found','woothemes'); ?></h3>				
		
		</div><!--/archivebox-->	
        
        <p><?php _e('Sorry. Your search yielded no results. Please search again.','woothemes'); ?></p>			
	
	<?php endif; ?>							

		</div><!--/col1-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>	
