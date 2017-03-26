<?php get_header(); ?>
<div class="container">
	<ol class="col-md-4 breadcrumb">
		<li><a href="<?php echo get_site_url(); ?>">Home</a></li>
		<li><a href="<?php echo get_permalink( 161 ); ?>">Videos</a></li>
		<li  class="active"><?php single_post_title();?></li>
	</ol>
</div>

<div class="container">
	<div class="col-md-8 col-md-offset-4 video-single">
		<h5><?php the_title(); ?></h5>
		<h2><?php the_time('F j, Y'); ?></h2>
	</div>
</div>
<div class=" container video">


	<div class="col-md-3 background-wrap show-when-large">
		<h5>Categories of videos</h5>
		<div class="video-page">
		<?php show_post('videos');?>
		</div>
		<!-- Taxonomy -->
		<hr>
		<div class="info info-video">
		<?php dynamic_sidebar('videos_taxonomy');?>
		</div>


	</div>

	<div class="col-md-8 col-md-offset-1 ">

			<?php if ( have_posts() ) : while ( have_posts()  ) : the_post(); ?>


					<div class="video-single">
						<?php 
						$meta = get_post_meta(get_the_ID(), 'video', true);
						$content = apply_filters('the_content', get_field('url_of_video') );
						echo $content;
						?>
					</div>
					<br>
					<br>
					<?php if (get_field('description')):?>
						<h5>Description</h5>
						<?php the_field('description');?>
					<?php endif ?>



			<?php endwhile; endif; ?>


		<br>
		<br>
		<br>
		<br>
		<h5><i>Comments</i> </h5>
		<?php do_action(seo_facebook_comments);?>
	</div>
</div>



<?php get_footer(); ?>