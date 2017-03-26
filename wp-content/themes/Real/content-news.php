<div class="container">


	<?php if ( have_posts() ) : while ( have_posts()  ) : the_post(); ?>



		<div class="container">
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
			<hr>
			<?php the_field('url_link');?>
		</div>
		<div class="container">
		this is some text.
			

		</div>





	<?php endwhile; else: ?>

		<p>There are no posts</p>

	<?php endif; ?>


</div>