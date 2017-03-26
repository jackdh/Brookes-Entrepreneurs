<?php get_header(); ?>


<h1>Category: <?php single_cat_title(); ?></h1>

sad

	<?php if ( have_posts() ) : while ( have_posts()  ) : the_post(); ?>

		<?php get_template_part ( 'content', 'post' );?>

	<?php endwhile; else: ?>

		<p>There are no have_posts</p>

	<?php endif; ?>
</div>


<?php get_footer(); ?>