<?php 

/*

	Template Name: committee_type Page


*/


get_header(); ?>
<div class="container">
	<ol class="col-md-4 breadcrumb">
		<li><a href="<?php echo get_site_url(); ?>">Home</a></li>
		<li class="active">Committee</li>
	</ol>
</div>


<div class="container">
	<div class="col-md-4 background-wrap">
			<?php if ( have_posts() ) : while ( have_posts()  ) : the_post(); ?>
			<br>

			<?php the_content(); ?>
			<br>

			<?php endwhile; else: ?>

			<p>Add some information on the committee page.</p>

	<?php endif; ?>
	</div>
	<div class="col-md-8 overflow-committee">
		<div >
			<?php 

			$args = array (
				'post_type' => 'committee_post',
				'orderby'	=> 'menu_order',
				'order'		=> 'ASC'

				);

			$the_query = new WP_Query( $args );

			?>
			<?php if ( have_posts() ) : while ( $the_query->have_posts()  ) : $the_query -> the_post(); ?>
				<div class="col-md-4">
										<?php $string1 = get_field('contact_information'); ?>
					<?php $string = strip_tags($string1);?>
					<center>
					<img class="img-responsive portrait" data-placement="bottom" data-container="body" title="" data-content="<?php echo $string ?>" data-original-title="A Title" src="<?php the_field('committee_member_picture');?>">
					<?php edit_post_link(); ?>
					</center>

			</div>
			<div class="col-md-8 well">



					<?php 
					echo '<b class="">';
					echo the_field('title_of_committee_member');
					echo '</b>';
					echo ':&nbsp;&nbsp;&nbsp;';
					echo the_field('name_of_committee_member');
					?>
					<a class="pull-right show-when-large" href="contact-us">Contact Me</a>
					<br class="show-when-small">
					<a class="pull-left show-when-small" href="contact-us">Contact Me</a>
					<br>

					<?php the_field('info_on_committee_member') ?>
					<br>
					<br>
					<br>

			
			</div>
			<?php endwhile; endif; ?>
		</div>
	</div>				
</div>





<script>
var $popover = $('[data-toggle=popover]').popover();
//first event handler for bad button
$(document).on("click", function (e) {
    var $target = $(e.target),
        isPopover = $(e.target).is('[data-toggle=popover]'),
        inPopover = $(e.target).closest('.popover').length > 0

    //Does nothing, only prints on console and wastes memory. BAD CODE, REMOVE IT
    $('.bad').click(function () { 
        console.log('clicked');
        return false;
    });

    //hide only if clicked on button or inside popover
    if (!isPopover && !inPopover) $popover.popover('hide');
});
</script>

<?php get_footer(); ?>