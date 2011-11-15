<?php get_header(); ?>

		<div class="col1">

		<?php if (have_posts()) : ?>
	
			<?php while (have_posts()) : the_post(); ?>		

				<div id="archivebox">
					
						<h3><em><?php _e('Categorized','woothemes'); ?> |</em> <?php the_category(', ') ?></h3>     
				
				</div><!--/archivebox-->			

				<div class="post-alt blog" id="post-<?php the_ID(); ?>">
				
					<h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<p class="post_date"><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>" class="avatar_link"><?php echo get_avatar( get_the_author_meta('ID'), 32 ); ?></a><?php _e('发表于','woothemes'); ?> <?php the_time('d F Y'); ?> 由<b><?php the_author_posts_link(); ?></b>. <span class="singletags"><?php if (function_exists('the_tags')) { ?><?php the_tags('标签: ', ', ', ''); ?><?php } ?></span></p>
                    
                    <?php 
                    if(woo_get_embed('embed',595,420))
                        {   
                        echo woo_get_embed('embed',595,420); 
                        }
		            ?>
					<div class="entry">
						<?php if (get_option('woo_image_single') == "false" && !woo_get_embed('embed',595,420)) woo_image('width='.get_option('woo_single_width').'&height='.get_option('woo_single_height').'&class=thumbnail alignright'); ?>
						<?php the_content(__('<span class="continue">Continue Reading</span>','woothemes')); ?>
					</div>
				
				</div><!--/post-->
				
               	<?php if (get_option('woo_author') == "true") { ?>

                <div class="author_info">
                    <h3><?php _e('About this author','woothemes'); ?>: <?php the_author_posts_link(); ?></h3>                	
                    
                        <?php
                            // Determine which gravatar to use for the user
                            $email = get_the_author_email();
                            $grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=".md5($email). "&default=".urlencode($GLOBALS['defaultgravatar'] )."&size=48";
                            $usegravatar = get_option('woo_gravatar');
                        ?>
                        
                    <?php  if ( $usegravatar ) { ?><span class="author_photo"><img src="<?php echo $grav_url; ?>" width="48" height="48" alt="" /></span><?php } ?>
                    <!--<p> - who has written <?php the_author_posts(); ?> posts on <a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a>.</p>-->
                    <p><?php the_author_description(); ?> <br style="clear:both;" /></p>
                    <!--<p class="author_email"><a href="mailto:<?php the_author_email(); ?>">Contact the author</a></p>-->
                </div>

				<?php } ?>
                
                <div class="navigation">
					<?php if (function_exists('woo_postnav')) woo_postnav(); else { ?>
            			<div class="alignleft"><?php previous_posts_link(__('&laquo; Newer Entries ','woothemes')) ?></div>
            			<div class="alignright"><?php next_posts_link(__(' Older Entries &raquo;','woothemes')) ?></div>
            			<br class="fix" />
           		 	<?php } ?>
				</div>

				<div id="comment">
					<?php comments_template(); ?>
				</div>

		<?php endwhile; ?>
		
		
	<?php endif; ?>							

		</div><!--/col1-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>