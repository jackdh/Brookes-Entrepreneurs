<?php 

/*

	Template Name: Contact us Page


*/



get_header(); ?>

<div class="container">
	<ol class="col-md-4 breadcrumb">
		<li><a href="<?php echo get_site_url(); ?>">Home</a></li>
		<li  class="active">Contact Us</li>
	</ol>
</div>

<div class="container">
<div class="col-md-4 background-wrap">
	<h5>How to get in contact</h5>
	<?php the_field('info');?>
	
	<!-- contact -->
	<h5 class="clickme">Get in touch</h5>
		<br>
		<a href="mailto:<?php the_field('contact_us_email')?>?Subject=<?php the_field('contact_us_subject')?>" target="_top" >
		<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="tooltip" data-placement="top" id="right" title="<?php the_field('contact_us_email');?>" >Email Us!</button>
		</a>

	<!-- contact -->

	<!-- Mailing List -->
	<h5 style="padding-top:25px;">Join our mailing list</h5>
	<?php the_field('mailing_list') ?>



<!-- Begin MailChimp Signup Form -->
		<?php echo yksemeProcessSnippet('393aaa0f74', 'Submit'); ?>


<!--End mc_embed_signup-->

<h5>Social Networking</h5>
<div class="glyths">
	<a href="https://www.facebook.com/BrookesEntrepreneurs"><span><i class="fa fa-lg fa-facebook icon-hover-sign" data-toggle="tooltip" data-placement="bottom" title="Facebook"></i></span></a>
	<a href="https://twitter.com/OxfordBrookesBE"><span><i class="fa fa-lg fa-twitter icon-hover-sign" data-toggle="tooltip" data-placement="bottom" title="Twitter" ></i></span></a>
	<a href="http://www.youtube.com/obentrepreneurs"><span><i class="fa fa-lg fa-youtube-play icon-hover-sign" data-toggle="tooltip" data-placement="bottom" title="Youtube"></i></span></a>
</div>

<!-- push -->



</div>


<div class="col-md-7 col-md-offset-1 overflow-contact-us">
	<?php 
	$args = array (
		'post_type' => 'contact_us',
		'orderby'	=> 'menu_order',
		'order'		=> 'ASC'

		);

	$the_query = new WP_Query( $args );
	?>
			<?php if ( have_posts() ) : while ( $the_query->have_posts()  ) : $the_query -> the_post(); ?>
				<div class="container well" style="width:100%;">
					<div class="col-lg-4"  >

					<img class="img-responsive" src="<?php the_field('profile_picture');?>" style="height: 100px;border-radius:20px;margin-bottom:20px;">
					<div style="overflow: auto;">
					
					<!-- EMAIL -->
					<?php if( get_field( "email" ) ): ?>
						<a href="mailto:<?php the_field('email');?>" data-toggle="popover" data-container="body" data-content="<?php the_field('email');?>" >Email Me</a><br>
					<?php endif;?>
					
					
					<!-- FACEBOOK -->
					<?php if( get_field( "facebook" ) ): ?>
						<a href="<?php the_field('facebook');?>" target="_blank" data-toggle="popover" data-container="body" data-content="<?php the_field('facebook');?>">Facebook</a><br>
					<?php endif;?>
					
					<!-- PHONE -->
					<?php if( get_field( "phone" ) ): ?>
						<?php the_field('phone');?><br>
					<?php endif;?>
					
					<?php if( get_field( "linkedin_profile" ) ): ?>
				    	<a href="<?php the_field( "linkedin_profile" );?>" target="_blank" data-toggle="popover" data-container="body" data-content="<?php the_field('linkedin_profile');?>">Linkedin</a><br>
					<?php endif;?>

					<?php if( get_field( "twitter_account" ) ): ?>
				    	<a href="<?php the_field( "twitter_account" ); ?>" target="_blank" data-toggle="popover" data-container="body" data-content="<?php the_field('twitter_account');?>">Twitter</a> 
					<br>
					<?php endif;?>
					<?php edit_post_link(); ?>


					</div>
					</div>
					<div class="col-lg-8">
					<?php 
					echo '<b class="">';
					echo the_field('title_of_person');
					echo '</b>';
					echo ':&nbsp;&nbsp;&nbsp;';
					echo the_field('name_of_person');
					?>
					<br>
					<br>
					<p style="text-align:justify;line-height: 1.1;"><?php the_field('summary');?></p>
					</div>
				</div>


		<?php endwhile; endif; ?>
</div>


</div>


<?php get_footer(); ?>