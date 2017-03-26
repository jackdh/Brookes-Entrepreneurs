<?php

/*

Template Name: Photo's Page


*/


get_header(); ?>

<?php 
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array (
	'post_type' => 'photo_gallery',
	'posts_per_page' => 5,
	'paged' => $paged
	);
$the_query = new WP_Query( $args );
?>	


<div class="container">
	<ol class="col-md-4 breadcrumb">
		<li><a href="<?php echo get_site_url(); ?>">Home</a></li>
		<li  class="active">Photos</li>
	</ol>
	<div class ="col-md-2 col-md-offset-6" >
		<?php
			$big = 999999999; // need an unlikely integer

			echo paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $the_query->max_num_pages
				) );
		?>
		</div>
</div>


<div class="container photos">

	<div class="col-md-3">
	<?php dynamic_sidebar('photo_taxonomy'); ?>;

	</div>
	<div class=" col-md-8 col-md-offset-1">

		<?php if ( have_posts() ) : while ( $the_query->have_posts()  ) : $the_query -> the_post(); ?>

			<div class="well">

				<div class="col-md-4">
					<div>

						<img class="img-responsive portrait-events" src="<?php the_field("face_photo");?>" style="height: 140px;border-radius:20px;"> 

					</div>
				</div>

				<div class="col-md-8">
					<h4 style="font-weight: bold;text-transform: capitalize;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					<ul style="padding-left:20px;">
					<?php if ( get_the_term_list( $post->ID, 'photo_type') ):?>
						<li>Posted in: <?php echo get_the_term_list( $post->ID, 'photo_type','',', '); ?> </li>
					<?php endif ?>
						<li>Posted on: <?php the_time('F j, Y'); ?></li>
						<?php if (get_field('link_to_news_post.')):?>
						<li>News article: <a href="<?php the_field('link_to_news_post.') ; ?>">Click here.</a></li>
						<?php endif ?>
					</ul>
				<?php if (get_field('summary_of_gallary')):?>
				<h5>Summary:</h5>
				<?php the_field('summary_of_gallary');?>
				<?php else: ?>
					<h5></h5>
				<?php endif ?>
				<p><a href="<?php the_permalink(); ?>">Click here to view the gallery. &rarr;</a></p>
				</div>

				</div>



		<?php endwhile; endif; ?>

<div class ="pull-right" >
		<?php
			$big = 999999999; // need an unlikely integer

			echo paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $the_query->max_num_pages
				) );
		?>
		</div>

</div>

</div>
<?php get_footer();?>