	<?php 

		$args = array(
				'post_type'  => 'video',
				'posts_per_page' => 1
			);
	$the_query = new WP_Query($args);
	?>


<?php if ( have_posts() ) : while ( $the_query->have_posts()  ) : $the_query -> the_post(); ?>

		<?php 
                $meta = get_post_meta(get_the_ID(), 'video', true);

                $content = apply_filters('the_content', get_field('url_of_video') );

                echo $content;
		?>

<?php endwhile; endif; ?>
