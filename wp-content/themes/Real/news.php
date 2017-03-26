<?php

/*

Template Name: News Page


*/


get_header(); ?>

<!-- #push -->
<?php 
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array (
	'post_type' => 'news',
	'posts_per_page' => 3,
	'paged' => $paged
	);
$the_query = new WP_Query( $args );
?>	

<!-- Bread crumbs and pagination -->
<div class="container">
	<ol class="col-md-4 breadcrumb">
		<li><a href="<?php echo get_site_url(); ?>">Home</a></li>
		<li  class="active">News</li>
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
<!-- /Bread crumbs and pagination -->



<div class="container news">

	<div class="col-md-3">

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


	<div class="show-when-small" style="padding-bottom:5px;">
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
	<div class=" col-md-8 col-md-offset-1">

		<?php if ( have_posts() ) : while ( $the_query->have_posts()  ) : $the_query -> the_post(); ?>

			<div class=" news-style well" >

				<a href="<?php the_permalink(); ?>"><h4 class="bold-this"><?php the_field('title_of_the_news'); ?></h4></a>
				<div class="row row-margin-fix">
					<ul class="info">
						<?php if ( get_the_term_list( $post->ID, 'news_type_new') ):?>
							<li>Posted in: <?php echo get_the_term_list( $post->ID, 'news_type_new','',', '); ?> </li>
						<?php endif ?>
						<li>Added by: <?php the_author(); ?></li>
						<li>On: <?php the_time('F j, Y'); ?></li>
						<?php if (get_field('photo_gallery_of_post')):?>
							<li>Photo Gallery: <a href="<?php the_field('photo_gallery_of_post') ?>">Click here.</a></li>
						<?php endif;?>
					</ul>
				</div>
				<br />
				<div class="row row-margin-fix">
				<?php 
				$content =  get_field('content_of_the_news');

				if ( strlen($content) > 270) {
				$content =  substr($content, 0, 270);
				$content = $content . " [...]";
				echo $content;
				} else {
					the_field('content_of_the_news');
				}
				
				?>
				</div>
				<br />
				<a href="<?php the_permalink(); ?>">Read more & Comments &rarr;</a>
				
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


<?php get_footer();?>
<!-- update this -->
