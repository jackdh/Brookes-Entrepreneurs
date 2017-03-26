<?php 

/*

	Template Name: sponsors Page


*/


get_header(); ?>

<div class="container">
<div class="container">
	<ol class="col-md-4 breadcrumb">
		<li><a href="<?php echo get_site_url(); ?>">Home</a></li>
		<li  class="active">Sponsors</li>
	</ol>
</div>
<br>
<br>
<br>
<div class="container">

		<?php 

		$args = array (
			'post_type' => 'sponsor',
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

					<div class="col-md-3"<?php if($counter % 2 != 0): ?> <?php echo 'style="display:none;"' ?> <?php endif ?> >
						<a href="<?php the_field('picture_link');?>">
							<img class="img-responsive" src="<?php the_field('picture');?>" style="height: 200px; border-radius:20px;margin-bottom:20px;">
						</a>
						
						
					</div> 

					<div class="col-md-8" style="word-wrap: break-word;">
						<?php echo '<b class="membership-title-size">'; echo the_field('sponsor_name'); echo '</b>'; ?> <br>
						<br>
							<?php the_field('info_on_sponsor');?>
							<?php if(get_field('contact_information')):?>
								<b>Contact Information</b>
							<?php endif;?>
							
							<p><?php the_field('contact_information')?></p>
						

					</div>

					<div class="col-md-4"<?php if($counter % 2 == 0): ?> <?php echo 'style="display:none;"' ?> <?php endif ?> >
						<a href="<?php the_field('picture_link');?>">
							<img class="img-responsive" src="<?php the_field('picture');?>" style="height: 200px; border-radius:20px;margin-bottom:20px;">
						</a>
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

<?php get_footer(); ?>