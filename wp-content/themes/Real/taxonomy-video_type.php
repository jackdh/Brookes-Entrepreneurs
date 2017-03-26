<?php 

get_header(); ?>

<div class="container">
	<ol class="col-md-4 breadcrumb">
		<li><a href="<?php echo get_site_url(); ?>">Home</a></li>
		<li><a href="<?php echo get_permalink( 161 ); ?>">videos</a></li>
		<li class="active"><?php $term =	$wp_query->queried_object; echo $term->name; ?></li>

	</ol>
</div>


<div class="container">
	<div class="col-md-4 background-wrap">
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

	<div class="col-md-8 overflow-committee">

		<?php if ( have_posts() ) : while ( have_posts()  ) : the_post(); ?>
				<div class="well">

				<div class="col-md-4">
					<div>

						<?php
							$link = getYouTubeIdFromURL(get_field('url_of_video'));
						?>
						<a href="<?php the_permalink(); ?>"</a><img class="img-responsive portrait-video" src="http://img.youtube.com/vi/<?php echo $link ?>/0.jpg">
						

					</div>
				</div>

				<div class="col-md-8">
					<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?>&rarr;</a></h4>
					<ul style="padding-left:20px;">
					<?php if ( get_the_term_list( $post->ID, 'video_type') ):?>
						<li>Posted in: <?php echo get_the_term_list( $post->ID, 'video_type','',', '); ?> </li>
					<?php endif ?>
						<li>On: <?php the_time('F j, Y'); ?></li>
					</ul>
				<h5>Summary:</h5>
				<?php the_field('summary');?>
				<p><a href="<?php the_permalink(); ?>">Find out more. &rarr;</a></p>
				</div>

				</div>
			<?php endwhile; endif; ?>

	</div>


</div>

<?php get_footer(); ?>
