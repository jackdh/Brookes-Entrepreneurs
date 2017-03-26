<?php 

/*

	Template Name: Who_Are_We Page


*/



get_header(); ?>
<div class="container">
	<ol class="col-md-4 breadcrumb">
		<li><a href="<?php echo get_site_url(); ?>">Home</a></li>
		<li class="active">Who are we?</li>
	</ol>
</div>

	<?php if ( have_posts() ) : while ( have_posts()  ) : the_post(); ?>


		<div class="container">
			<div class="col-md-5  who-are-we">
			<center>
    <img class="img-responsive" src="<?php echo get_bloginfo('template_url') ?>/images/logo.png"style="
    max-height: 150px;">
    </center>
				<?php the_field('main_body'); ?>
			</div>
			<div class="col-md-6 col-md-offset-1  who-are-we">
			<div class="who-are-we-video">
				<?php 

                $content = apply_filters('the_content', get_field('top_right_video') );

                echo $content;
				?>
			</div>

				<?php the_field('right_hand_body'); ?>
			</div>		
		</div>

	<?php endwhile; else: ?>

		<p>There are no posts</p>

	<?php endif; ?>

<?php get_footer(); ?>