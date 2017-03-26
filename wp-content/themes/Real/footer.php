<?php wp_footer() ;?>

<div class="container footer">
<div class="row">
	<div class="col-sm-4 footer_left">
	<?php dynamic_sidebar('footer_left') ?>

	</div>
	<div class="col-sm-4 footer_middle">
			<h5>up & coming events</h5>
			<?php if (eb_widget('status') != "Completed"):?>

				<h4><a href="<?php echo eb_widget('url'); ?>"><?php echo eb_widget('title'); ?> &rarr;</a></h4>
				<p>Start date : <?php echo eb_widget('start_date'); ?></p>
				<button type="button" class="btn btn-default"><a href="events">Veiw previous events.</a></button>

		    <?php else: ?>
		    	

		    	<p>There are currently no up and coming events.</p>
		    	<button type="button" class="btn btn-default"><a href="events">Veiw previous events.</a></button>

			<?php endif ?>
	</div>
	
	<div class="col-sm-4 footer_right">
		<h5>Join our Mailing List</h5>
		<!-- echo remove_yksemeProcessSnippet('393aaa0f74', 'Submit');   -->
		<?php dynamic_sidebar('footer_right') ?>

	</div>
	</div>

	<div id="copyright">
		<p>&copy; Copyright <?php echo date('Y'); ?> <a href="http://jackdh.co.uk">Jack DH</a>. All Rights Reserved.</p>
	</div>
	<div class="glyths">
		<a href="https://www.facebook.com/BrookesEntrepreneurs"><span><i class="fa fa-black fa-facebook icon-hover-sign"></i></span></a>
		<a href="https://twitter.com/OxfordBrookesBE"><span><i class="fa fa-twitter icon-hover-sign"></i></span></a>
		<a href="http://www.youtube.com/obentrepreneurs"><span><i class="fa fa-youtube-play icon-hover-sign"></i></span></a>
		<a href="<?php echo home_url(); ?>/webmail"><span><i class="fa fa-envelope icon-hover-sign"></i></span></a>
		<a href="<?php echo get_admin_url( $blog_id, $path, $scheme ); ?>"><span><i class="fa fa-lock icon-hover-sign"></i></span></span></a>
		
	</div>
	<script type="text/javascript" src="/scripts/mailchimp.js"></script>


<script>
	$('[data-toggle="tooltip"').tooltip()
	$('[data-toggle="popover"]').popover({trigger: 'hover','placement': 'right', container: '.container.well', delay: { show: 100, hide: 4000 }});
  	$('#ykfmc-submit_0-393aaa0f74').addClass('btn');
</script>

<!-- push
<?php wp_enqueue_script("jquery"); ?>
		</body>
</html>
