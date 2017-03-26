<?php 

/*

	Template Name: Membership Page


*/



get_header(); ?>

<div class="container">
<div class="container">
	<ol class="col-md-4 breadcrumb">
		<li><a href="<?php echo get_site_url(); ?>">Home</a></li>
		<li  class="active">Membership</li>
	</ol>
</div>
<br>
<br>
<br>
<div class="container">

		<?php 

		$args = array (
			'post_type' => 'membership_post',
			'orderby'	=> 'menu_order',
			'order'		=> 'ASC'

			);

		$the_query = new WP_Query( $args );

		?>

		<?php 
			$counter = 1;

		?>
		<?php if ( have_posts() ) : while ( $the_query->have_posts()  ) : $the_query -> the_post(); ?>


			<div class="row ">

					<div class="col-md-3"
					<?php if($counter % 2 != 0): ?>
						<?php echo 'style="display:none;"' ?>
					<?php endif ?>
					>
					<img class="img-responsive" src="<?php the_field('image_for_featurette');?>" style="height: 200px; border-radius:20px;margin-bottom:20px;">
					</div> 

					<div class="col-md-8">

					<?php 
					echo '<b class="membership-title-size">';
					echo the_field('title_of_featurette');
					echo '</b>';
					?>
					<br>
					<br>
					<p style="text-align:justify;line-height: 1.1;"><?php the_field('description_of_featurette');?></p>

					</div>

					<div class="col-md-4"
					<?php if($counter % 2 == 0): ?>
						<?php echo 'style="display:none;"' ?>
					<?php endif ?>
					>
					<img class="img-responsive membership-image" src="<?php the_field('image_for_featurette');?>">
					</div>
					

			</div>
			<br>
			<br>
				<hr>
			<br>
			<br>


		<?php
			$counter++;
		?>
		<?php endwhile; endif; ?>
</div>
</div>
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-body">
					<?php echo do_shortcode('[gravityform id=3 title=false description=false ajax=true tabindex=49]' );?>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>


<?php get_footer(); ?>