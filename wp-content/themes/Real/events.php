<?php

/*

	Template Name: Events Page


*/

get_header(); ?>
<?php 
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array (
	'post_type' => 'event_page',
	'posts_per_page' => 4,
	'paged' => $paged
	);
$the_query = new WP_Query( $args );
?>	

<div class="container">
	<ol class="col-md-4 breadcrumb">
		<li><a href="<?php echo get_site_url(); ?>">Home</a></li>
		<li  class="active">Events</li>
	</ol>
	<div class ="col-md-2 col-md-offset-6" >
	<div class="show-when-large">
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
		<h5>Events</h5>
		<div class="video-page">
		<?php if ( have_posts() ) : while ( have_posts()  ) : the_post(); ?>
			<br>

			<?php the_content(); ?>
			<br>

			<?php endwhile; else: ?>

			<p>Add some information on the Events page.</p>

		<?php endif; ?>
		</div>
		<h5>Want to find out more?</h5>
		<p style="text-align:center;">Head over to out Eventbrite Profile page</p>
		<a href="http://www.eventbrite.co.uk/o/brookes-entrepreneurs-6036359793">
			<button type="button" class="btn btn-primary btn-lg btn-block">EventBrite&rarr;</button>
		</a>
	</div>

	<div class="col-md-8 overflow-committee">

		
			<?php 
			$args = array (
				'post_type' => 'event_page',
				);

			$the_query = new WP_Query( $args );;

			?>

			<?php if ( have_posts() ) : while ( $the_query->have_posts()  ) : $the_query -> the_post(); ?>
				<div class="col-md-8 events-page well" style="width:100%;">
				<?php $id = get_field('id_of_the_event');?>
				<div class="col-md-4">
					<img class="img-responsive portrait-events" src="<?php echo get_event($id, 'logo')?>" style="height: 140px;border-radius:20px;">
					<div class="date-and-time-events">
						<li><span><?php echo get_event($id, 'time'); ?></span></li>
						<li><span><?php echo get_event($id, 'date'); ?></span></li>
						<li><span style = "font-weight: bold;"><?php echo get_event($id, 'status'); ?></span></li>
					</div>
				</div>
				<div class="col-md-8">
				<h5 class="h5events"><?php echo get_event($id, 'title');?></h5>
					<br />
				<p><?php echo get_event($id, 'description');?></p>
				<a href="<?php echo get_event($id,'url');?>">Book tickets & Find out more &rarr;</a>
				<br>
			
			</div>
			</div>
			<?php endwhile; endif; ?>
	</div>
	</div>
</div>
<?php get_footer(); ?>