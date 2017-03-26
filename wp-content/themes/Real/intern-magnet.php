<?php 

/*

	Template Name: Intern-magnet Page


*/



get_header(); ?>

<!-- BREADCRUMBS! -->
<div class="container">
	<ol class="col-md-4 breadcrumb">
		<li><a href="<?php echo get_site_url(); ?>">Home</a></li>
		<li  class="active">Intern Magnet</li>
	</ol>
	<div class="col-md-7 col-md-offset-1 intern-magnet-header">
		<h1>Intern Magnet</h1>

	</div>
</div>
<div class="container video">
<div class="col-md-4 background-wrap">
	<h5>Intern Magnet</h5>
	<div class="video-page">
	<?php the_field( 'left_side' );?>
	</div>


</div>

<div class="col-md-7 col-md-offset-1">

<?php if ( have_posts() ) : while ( have_posts()  ) : the_post(); ?>

			<?php the_content(); ?>

			<?php endwhile; else: ?>

			<p>Add some information on the intern magnet page.</p>

		<?php endif; ?>


</div>
</div>

<?php get_footer(); ?>