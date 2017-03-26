<?php

/*

	Template Name: newsletter Page


*/


get_header(); ?>
<?php 
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array (
	'post_type' => 'newsletter',
	'posts_per_page' => 4,
	'paged' => $paged
	);
$the_query = new WP_Query( $args );
?>	


<!-- BREADCRUMBS! -->
<div class="container">
	<ol class="col-md-4 breadcrumb">
		<li><a href="<?php echo get_site_url(); ?>">Home</a></li>
		<li  class="active">Newsletters</li>
	</ol>
	<div class ="col-md-2 col-md-offset-6" >
	<div class="show-when-large pull-right">
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




<div class="container video">

	<div class="col-md-4 background-wrap">
		<h5>Newsletters.</h5>
		<div class="video-page">

		<?php if ( have_posts() ) : while ( have_posts()  ) : the_post(); ?>
			<br>

			<?php the_content(); ?>
			<br>

			<?php endwhile; else: ?>

			<p>Add some information on the videos page.</p>

		<?php endif; ?>
		</div>
		<!-- Taxonomy -->



	</div>
	<div class="show-when-small " style="padding-bottom:5px;">
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


	<div class="col-md-7 col-md-offset-1">



			<?php if ( have_posts() ) : while ( $the_query->have_posts()  ) : $the_query -> the_post(); ?>
				<div class="well newsletter">

					<div class="col-md-2">
					<img class="img-responsive" src="<?php echo get_bloginfo('template_url') ?>/images/newsletter.png">
					</div>
					<div class="col-md-10">
						<h4 style="font-weight: bold;text-transform: capitalize;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?>&rarr;</a></h4>
						<ul style="padding-left:20px;">
							<li>Posted on: <?php the_time('F j, Y'); ?></li>
						</ul>
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

<!-- update this -->

<?php get_footer();?>