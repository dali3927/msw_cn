<?php get_header(); ?>

		<div class="col1">

		<?php if (have_posts()) : ?>
		
		<div id="archivebox">
        	
            	<h2><em>Tag Archive |</em> "<?php single_tag_title("", true); ?>"</h2>        
		
		</div><!--/archivebox-->	

			<?php while (have_posts()) : the_post(); ?>		

				<div class="post-alt blog" id="post-<?php the_ID(); ?>">
		
					<?php woo_image('width='.get_option('woo_thumb_width').'&height='.get_option('woo_thumb_height').'&class=th'); ?>                    
					
					<h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<p class="post_date">Posted on <?php the_time('d F Y'); ?>. <span class="singletags"><?php if (function_exists('the_tags')) { ?><?php the_tags('Tags: ', ', ', ''); ?><?php } ?></span></p>
		
					<div class="entry">
						<?php if ( get_option('woo_blog_excerpt') == "true" ) { the_excerpt() ?>
						<p><span class="continue"><a title="<?php _e('Permalink to ','woothemes'); ?> <?php the_title(); ?>" href="<?php the_permalink() ?>"><?php _e('Read the full story','woothemes'); ?></a></span></p>
						<?php } else { the_content(__('<span class="continue">Continue Reading</span>','woothemes')); } ?>  
					</div>
		
					 <p class="posted">Posted in <?php the_category(', ') ?><span class="comments"><?php comments_popup_link('Comments (0)', 'Comments (1)', 'Comments (%)'); ?></span></p>
				
				</div><!--/post-->

		<?php endwhile; ?>
		
        <div class="more_entries">
            <?php if (function_exists('wp_pagenavi')) wp_pagenavi(); else { ?>
            <div class="alignleft"><?php previous_posts_link('&laquo; Newer Entries ') ?></div>
            <div class="alignright"><?php next_posts_link(' Older Entries &raquo;') ?></div>
            <br class="fix" />
            <?php } ?> 
        </div>		
	
	<?php endif; ?>							

		</div><!--/col1-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>