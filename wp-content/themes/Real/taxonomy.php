<?php 

get_header(); ?>



<div class="container">
	<ol class="col-md-4 breadcrumb">
		<li><a href="<?php echo get_site_url(); ?>">Home</a></li>
		<li><a href="<?php echo get_permalink( get_page_by_title( 'news' ) ); ?>">News</a></li>
		<li class="active"><?php $term =	$wp_query->queried_object; echo $term->name; ?></li>
	</ol>
</div>

<div class="container news">

	<div class="col-md-3 show-when-large" style="border-right: 1px solid ccc;">
	<?php $page = get_page_by_title( 'news' ); ?>
		<?php if(get_field('title_of_youtube_video', $page)):?>

			<h5><?php the_field('title_of_youtube_video', $page); ?></h5>
				<?php 
				$meta = get_post_meta(get_the_ID(), 'video', true);
				$content = apply_filters('the_content', get_field('youtube_video_link', $page) );
				echo $content;
				?>
			<?php else: ?>
				<h5><?php the_field('title_if_no_youtube_video', $page);?></h5>
		<?php endif ?>

		<?php

			$content = apply_filters('the_content', $page->post_content); 
			echo $content;
		?>

		<?php dynamic_sidebar('news_taxonomy'); ?>
	</div>

	<div class="col-md-8 col-md-offset-1 overflow-committee">
		<?php if ( have_posts() ) : while ( have_posts()  ) : the_post(); ?>

			<div class=" news-style well" >

				<a href="<?php the_permalink(); ?>"><h4 class="bold-this"><?php the_field('title_of_the_news'); ?>&rarr;</h4></a>

				<ul class="info">
					<li>Posted in: <?php echo get_the_term_list( $post->ID, 'news_type_new','',', '); ?> </li>
					<li>Added by: <?php the_author(); ?></li>
					<li>On: <?php the_time('F j, Y'); ?></li>
				</ul>
				<br><br>
				<br>
				<?php
				$content =  get_field('content_of_the_news');

				if ( strlen($content) > 270) {
				$content =  substr($content, 0, 270);
				$content = $content . " [...]";
				echo $content;
				} else {
					the_field('content_of_the_news');
				}?>

			</div>
		<?php endwhile; endif; ?>


	</div>

</div>


<?php get_footer(); ?>