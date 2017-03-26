<?php get_header(); ?>
<div class="container">
	<ol class="col-md-4 breadcrumb">
		<li><a href="<?php echo get_site_url(); ?>">Home</a></li>
		<li><a href="<?php echo get_permalink( 134 ); ?>">News</a></li>
		<li  class="active"><?php single_post_title();?></li>

	</ol>
</div>


<div class="container single">

	<div class="col-md-3 show-when-large" style="border-right: 1px solid ccc;">

	<?php $page = get_page_by_title( 'news' ); ?>
		<?php if(get_field('title_of_youtube_video', $page)):?>

			<h5><?php the_field('title_of_youtube_video', $page); ?></h5>
				<?php 
				$meta = get_post_meta(get_the_ID(), 'video', true);
				$content = apply_filters('the_content', get_field('youtube_video_link', $page) );
				echo $content;
				?>
			<?php else: ?>
				<h5><?php the_field('title_if_no_youtube_video', $page);?></h5>
		<?php endif ?>

		<?php

			$content = apply_filters('the_content', $page->post_content); 
			echo $content;
		?>

		<?php dynamic_sidebar('news_taxonomy'); ?>

	</div>

	<div class="col-md-8 col-md-offset-1 news-single">

		<?php if ( have_posts() ) : while ( have_posts()  ) : the_post(); ?>
			<h5><?php the_field('title_of_the_news'); ?></h5>
			<div class="container" style="padding-left: 0;">
			<ul class="info">
				<?php if ( get_the_term_list( $post->ID, 'news_type_new') ):?>	
				<li>Posted in: <?php echo get_the_term_list( $post->ID, 'news_type_new','',','); ?> </li>
				<?php endif ?>
				<li>Added by: <?php the_author(); ?></li>
				<li>On: <?php the_time('F j, Y'); ?></li>
				<?php if (get_field('photo_gallery_of_post')):?>
						<li>Photo Gallery: <a href="<?php the_field('photo_gallery_of_post') ?>">Click here.</a></li>
					<?php endif;?>
			</ul>
			</div>
			<div class="containter news-single-content">
				<?php the_field('content_of_the_news'); ?>
			</div>
			
		<?php endwhile; else: ?>
			<p>Sorry there is no post under this name</p>
		<?php endif; ?>

		<br>
		<br>
		<br>
		<br>
		<h5><i>Comments</i> </h5>
		<?php do_action(seo_facebook_comments)?>

	</div>

</div>


<?php get_footer(); ?>