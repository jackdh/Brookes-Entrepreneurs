<?php 

get_header(); ?>

<div class="container">
	<ol class="col-md-4 breadcrumb">
		<li><a href="<?php echo get_site_url(); ?>">Home</a></li>
		<li><a href="<?php echo get_permalink( 586 ); ?>">Photos</a></li>
		<li class="active"><?php $term =	$wp_query->queried_object; echo $term->name; ?></li>

	</ol>
</div>


<div class="container">
	<div class="col-md-4">
		<?php dynamic_sidebar('photo_taxonomy'); ?>;
	</div>

	<div class="col-md-8 overflow-committee">

		<?php if ( have_posts() ) : while ( have_posts()  ) : the_post(); ?>
			<div class="well">

				<div class="col-md-4">
					<div>

						<img class="img-responsive portrait-events" src="<?php the_field("face_photo");?>" style="height: 140px;border-radius:20px;"> 

					</div>
				</div>

				<div class="col-md-8">
					<h4 style="font-weight: bold;text-transform: capitalize;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?>&rarr;</a></h4>
					<ul style="padding-left:20px;">
					<?php if ( get_the_term_list( $post->ID, 'photo_type') ):?>
						<li>Posted in: <?php echo get_the_term_list( $post->ID, 'photo_type','',', '); ?> </li>
					<?php endif ?>
						<li>Posted on: <?php the_time('F j, Y'); ?></li>
					</ul>
				<h5>Summary:</h5>
				<?php the_field('summary_of_gallary');?>
				<p><a href="<?php the_permalink(); ?>">Click here to view the gallery. &rarr;</a></p>
				</div>

				</div>
			<?php endwhile; endif; ?>

	</div>


</div>

<?php get_footer(); ?>
