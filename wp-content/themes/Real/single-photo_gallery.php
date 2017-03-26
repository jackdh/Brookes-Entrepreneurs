<?php get_header(); ?>
<div class="container">
	<ol class="col-md-4 breadcrumb">
		<li><a href="<?php echo get_site_url(); ?>">Home</a></li>
		<li><a href="<?php echo get_permalink( 586 ); ?>">Photos</a></li>
		<li  class="active"><?php single_post_title();?></li>
	</ol>
</div>


<div class="container single">

	<div class="col-md-3 show-when-large" style="border-right: 1px solid ccc;">
			<?php dynamic_sidebar('photo_taxonomy'); ?>;
	</div>

	<div class="col-md-8 col-md-offset-1 news-single">

		<?php if ( have_posts() ) : while ( have_posts()  ) : the_post(); ?>
			<h5><?php echo get_the_title(); ?></h5>
			<div class="container">
			<ul class="info">
				<li>Posted in: <?php echo get_the_term_list( $post->ID, 'photo_type','',', '); ?> </li>
				<li>Added by: <?php the_author(); ?></li>
				<li>On: <?php the_time('F j, Y'); ?></li>
				
				<?php if (get_field('link_to_news_post.')):?>		
				<li>News article: <a href="<?php the_field('link_to_news_post.') ; ?>">Click here.</a></li>
				<?php endif ?>
			</ul>
			</div>
			<div class="single-gallery-padding">
			<?php echo the_content(); ?>
			</div>
		<?php endwhile; else: ?>
			<p>Sorry there is no post under this name</p>
		<?php endif; ?>

		<br>
		<br>
		<br>
		<br>
		<h5><i>Comments</i> </h5>
		<?php do_action(seo_facebook_comments);?>

	</div>

</div>


<?php get_footer(); ?>