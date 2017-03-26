<?php get_header(); ?> 

<?php if ( have_posts() ) : while ( have_posts()  ) : the_post(); ?>


	<div class="container">
		<h1><?php the_title(); ?></h1>
		<hr>
		<center>

			<div class="container">

				<div class="well">

                    Sorry this page does not exist!

				</div>
			</div>
		</center>   
	</div>

<?php endwhile; endif; ?>




<?php get_footer(); ?>