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

		<div class="post-alt blog">

			
            <?php if ( get_option('woo_blog_excerpt') == "true" ) { ?><div class="entry"><?php woo_image('width='.get_option('woo_home_thumb_width').'&class=alignright'); ?> </div><?php } ?>
            
			<h2><a title="<?php _e('Permanent Link to','woothemes'); ?> <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<p class="post_date"><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>" class="avatar_link"><?php echo get_avatar( get_the_author_meta('ID'), 32 ); ?></a><?php _e('发表于','woothemes'); ?> <?php the_time('d F Y'); ?> 由 <b><?php the_author_posts_link(); ?></b>.<br /> <span class="singletags"><?php if (function_exists('the_tags')) { ?><?php the_tags('标签: ', ', ', ''); ?><?php } ?></span></p>
            

			<div class="entry">
				<?php if ( get_option('woo_blog_excerpt') == "true" ) { the_excerpt() ?>
					<p><span class="continue"><a title="<?php _e('Permalink to ','woothemes'); ?> <?php the_title(); ?>" href="<?php the_permalink() ?>"><?php _e('阅读整篇文章','woothemes'); ?></a></span></p>
				<?php } else { the_content(__('<span class="continue">Continue Reading</span>','woothemes')); } ?>
                
			</div>
			<!-- JiaThis Button BEGIN -->
			<div onmouseover="setShare('<?php the_title(); ?>', '<?php the_permalink() ?>');">			
<div id="jiathis_style_32x32">
<a class="jiathis_button_tsina"></a>
<a class="jiathis_button_tqq"></a>
<a class="jiathis_button_tsohu"></a>
<a class="jiathis_button_t163"></a>
<a class="jiathis_button_renren"></a>
<a class="jiathis_button_douban"></a>
<a class="jiathis_button_buzz"></a>
<a class="jiathis_button_qzone"></a>
<a class="jiathis_button_kaixin001"></a>
<a class="jiathis_button_tianya"></a>
<a class="jiathis_button_baidu"></a>
<a class="jiathis_button_tieba"></a>
<a href="http://www.jiathis.com/share?uid=1539372" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank"></a>
</div>
<script type="text/javascript">

function setShare(title, url) {

jiathis_config.title = title;

jiathis_config.url = url;

}

var jiathis_config = {

url: "",

title: ""

}

</script>
<script type="text/javascript" >
var jiathis_config={
	data_track_clickback:true,
	hideMore:false
}
</script>
<script type="text/javascript" src="http://v2.jiathis.com/code/jia.js?uid=1539372" charset="utf-8"></script>
</div><br />
<!-- JiaThis Button END -->

			 <br /><p class="posted"><?php _e('发表在','woothemes'); ?> <?php the_category(', ') ?><span class="comments"><?php comments_popup_link(__('0 评论','woothemes'), __('1 Comment','woothemes'), __('% Comments','woothemes')); ?></span></p>
		
		</div><!--/post-->		

	<?php endwhile; ?>	
    <?php endif; ?>	
	
	<div class="fix"></div>
	
    <div class="more_entries">
        <?php if (function_exists('wp_pagenavi')) wp_pagenavi(); else { ?>
            <div class="fl"><?php previous_posts_link(__('&laquo; Newer Entries ','woothemes')) ?></div>
            <div class="fr"><?php next_posts_link(__(' Older Entries &raquo;','woothemes')) ?></div>
            <br class="fix" />
        <?php } ?> 
    </div>		
    
    <div class="fix" style="height:15px"></div>

</div>