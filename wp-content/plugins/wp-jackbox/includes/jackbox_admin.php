<?php

	function jackbox_admin() {
		
		global $jackbox_options;

		$hover = $jackbox_options["hover"];
		$flashing = $jackbox_options["flash-video"];
		$useThumbs = $jackbox_options["use-thumbs"];
		$useTips = $jackbox_options["use-tooltips"];
		$fullScale = $jackbox_options["full-scale"];
		$customCSS = $jackbox_options["custom-css"];
		$social = $jackbox_options["social-buttons"];
		$autoplay = $jackbox_options["autoplay-video"];
		$hideThumbs = $jackbox_options["thumbs-hidden"];
		$deepLinking = $jackbox_options["deep-linking"];
		$showDesc = $jackbox_options["show-description"];
		$minified = $jackbox_options["minified-scripts"];
		$canonical = $jackbox_options["remove-canonical"];
		
		ob_start(); ?>

		<div class="wrap jackbox-content jackbox-wrapper">

			<h2><?php _e("JackBox Admin", "jackbox_domain"); ?></h2>

			<form class="jackbox-form" method="post" action="options.php">

				<?php settings_fields("jackbox_settings_group"); ?>

				<p>
					<?php _e("Deep Linking", "jackbox_domain"); ?> <span data-title="<?php _e("Deeplinking will create unique urls for every item", "jackbox_domain"); ?>" class="jackbox-question">?</span><br />
					<span class="jackbox-box">
                        <input name="jackbox_settings[deep-linking]" type="radio" value="yes" <?php if($deepLinking === "yes") echo "checked"; ?> /> <?php _e("yes", "jackbox_domain"); ?>
                        <input name="jackbox_settings[deep-linking]" type="radio" value="no" <?php if($deepLinking === "no") echo "checked"; ?> /> <?php _e("no", "jackbox_domain"); ?>
                    </span>
				</p>

                <hr />

				<p>
					<?php _e("Show Description by Default", "jackbox_domain"); ?> <span data-title="<?php _e("Show item descriptions automatically for each item", "jackbox_domain"); ?>" class="jackbox-question">?</span><br />
					<span class="jackbox-box">
                        <input name="jackbox_settings[show-description]" type="radio" value="yes" <?php if($showDesc === "yes") echo "checked"; ?> /> <?php _e("yes", "jackbox_domain"); ?>
                        <input name="jackbox_settings[show-description]" type="radio" value="no" <?php if($showDesc === "no") echo "checked"; ?> /> <?php _e("no", "jackbox_domain"); ?>
                    </span>
				</p>

                <hr />

				<p>
					<?php _e("Fullscreen Scales Content", "jackbox_domain"); ?> <span data-title="<?php _e("Content will become larger in fullscreen", "jackbox_domain"); ?>" class="jackbox-question">?</span><br />
					<span class="jackbox-box">
                        <input name="jackbox_settings[full-scale]" type="radio" value="yes" <?php if($fullScale === "yes") echo "checked"; ?> /> <?php _e("yes", "jackbox_domain"); ?>
                        <input name="jackbox_settings[full-scale]" type="radio" value="no" <?php if($fullScale === "no") echo "checked"; ?> /> <?php _e("no", "jackbox_domain"); ?>
                    </span>
				</p>

                <hr />

				<p>
					<?php _e("Thumb Hover Effect", "jackbox_domain"); ?> <span data-title="<?php _e("Choose from one of the 9 built-in hover effects for your thumbnails", "jackbox_domain"); ?>" class="jackbox-question">?</span><br />
					<select name="jackbox_settings[hover]">
						<option value="none" <?php if($hover === "none") echo "selected"; ?>><?php _e("no hover", "jackbox_domain"); ?></option>
						<option value="black-magnify" <?php if($hover === "black-magnify") echo "selected"; ?>><?php _e("black-magnify", "jackbox_domain"); ?></option>
						<option value="black-play" <?php if($hover === "black-play") echo "selected"; ?>><?php _e("black-play", "jackbox_domain"); ?></option>
						<option value="black-document" <?php if($hover === "black-document") echo "selected"; ?>><?php _e("black-document", "jackbox_domain"); ?></option>
						<option value="white-magnify" <?php if($hover === "white-magnify") echo "selected"; ?>><?php _e("white-magnify", "jackbox_domain"); ?></option>
						<option value="white-play" <?php if($hover === "white-play") echo "selected"; ?>><?php _e("white-play", "jackbox_domain"); ?></option>
						<option value="white-document" <?php if($hover === "white-document") echo "selected"; ?>><?php _e("white-document", "jackbox_domain"); ?></option>
						<option value="blur-magnify" <?php if($hover === "blur-magnify") echo "selected"; ?>><?php _e("blur-magnify", "jackbox_domain"); ?></option>
                        <option value="blur-play" <?php if($hover === "blur-play") echo "selected"; ?>><?php _e("blur-play", "jackbox_domain"); ?></option>
                        <option value="blur-document" <?php if($hover === "blur-document") echo "selected"; ?>><?php _e("blur-document", "jackbox_domain"); ?></option>
					</select>
				</p>

                <hr />

				<p>
					<?php _e("Use Thumbnails", "jackbox_domain"); ?> <span data-title="<?php _e("Use thumbnail gallery inside the lightbox", "jackbox_domain"); ?>" class="jackbox-question">?</span><br />
					<span class="jackbox-box">
                        <input name="jackbox_settings[use-thumbs]" type="radio" value="yes" <?php if($useThumbs === "yes") echo "checked"; ?> /> <?php _e("yes", "jackbox_domain"); ?>
                        <input name="jackbox_settings[use-thumbs]" type="radio" value="no" <?php if($useThumbs === "no") echo "checked"; ?> /> <?php _e("no", "jackbox_domain"); ?>
                    </span>
				</p>
                
                <hr />

				<p>
					<?php _e("Use Thumbnail Tooltips", "jackbox_domain"); ?> <span data-title="<?php _e("Use tooltips for the thumbnail gallery", "jackbox_domain"); ?>" class="jackbox-question">?</span><br />
					<span class="jackbox-box">
                        <input name="jackbox_settings[use-tooltips]" type="radio" value="yes" <?php if($useTips === "yes") echo "checked"; ?> /> <?php _e("yes", "jackbox_domain"); ?>
                        <input name="jackbox_settings[use-tooltips]" type="radio" value="no" <?php if($useTips === "no") echo "checked"; ?> /> <?php _e("no", "jackbox_domain"); ?>
                    </span>
				</p>
                
                <hr />

				<p>
					<?php _e("Thumbnails Start Hidden", "jackbox_domain"); ?> <span data-title="<?php _e("Hide the thumbnail gallery at first", "jackbox_domain"); ?>" class="jackbox-question">?</span><br />
					<span class="jackbox-box">
                        <input name="jackbox_settings[thumbs-hidden]" type="radio" value="yes" <?php if($hideThumbs === "yes") echo "checked"; ?> /> <?php _e("yes", "jackbox_domain"); ?>
                        <input name="jackbox_settings[thumbs-hidden]" type="radio" value="no" <?php if($hideThumbs === "no") echo "checked"; ?> /> <?php _e("no", "jackbox_domain"); ?>
                    </span>
				</p>
                
                <hr />

				<p>
					<?php _e("Thumbnail Width", "jackbox_domain"); ?> <span data-title="<?php _e("Default thumbnail width in pixels", "jackbox_domain"); ?>" class="jackbox-question">?</span><br />
					<input name="jackbox_settings[thumb-width]" type="text" class="jackbox-small" value="<?php echo $jackbox_options["thumb-width"]; ?>" />
				</p>
                
                <hr />

				<p>
					<?php _e("Thumbnail Height", "jackbox_domain"); ?> <span data-title="<?php _e("Default thumbnail height in pixels", "jackbox_domain"); ?>" class="jackbox-question">?</span><br />
					<input name="jackbox_settings[thumb-height]" type="text" class="jackbox-small" value="<?php echo $jackbox_options["thumb-height"]; ?>" />
				</p>
                
                <hr />

				<p>
					<?php _e("Autoplay Video", "jackbox_domain"); ?> <span data-title="<?php _e("Autoplay local, Youtube and Vimeo video by default", "jackbox_domain"); ?>" class="jackbox-question">?</span><br />
					<span class="jackbox-box">
                        <input name="jackbox_settings[autoplay-video]" type="radio" value="yes" <?php if($autoplay === "yes") echo "checked"; ?> /> <?php _e("yes", "jackbox_domain"); ?>
                        <input name="jackbox_settings[autoplay-video]" type="radio" value="no" <?php if($autoplay === "no") echo "checked"; ?> /> <?php _e("no", "jackbox_domain"); ?>
                    </span>
				</p>
                
                <hr />

				<p>
					<?php _e("Default Video Width", "jackbox_domain"); ?> <span data-title="<?php _e("Value will be used for all non-image items", "jackbox_domain"); ?>" class="jackbox-question">?</span><br />
					<input name="jackbox_settings[video-width]" type="text" class="jackbox-small" value="<?php echo $jackbox_options['video-width']; ?>" />
				</p>
                
                <hr />

				<p>
					<?php _e("Default Video Height", "jackbox_domain"); ?> <span data-title="<?php _e("Value will be used for all non-image items", "jackbox_domain"); ?>" class="jackbox-question">?</span><br />
					<input name="jackbox_settings[video-height]" type="text" class="jackbox-small" value="<?php echo $jackbox_options['video-height']; ?>" />
				</p>
                
                <hr />

				<p>
					<?php _e("Flash Video has Priority", "jackbox_domain"); ?> <span data-title="<?php _e("Choose Flash with mobile backup, or HTML5 with Flash backup", "jackbox_domain"); ?>" class="jackbox-question">?</span><br />
					<span class="jackbox-box">
                        <input name="jackbox_settings[flash-video]" type="radio" value="yes" <?php if($flashing === "yes") echo "checked"; ?> /> <?php _e("yes", "jackbox_domain"); ?>
                        <input name="jackbox_settings[flash-video]" type="radio" value="no" <?php if($flashing === "no") echo "checked"; ?> /> <?php _e("no", "jackbox_domain"); ?>
                    </span>
				</p>
                
                <hr />
                
                <p>
					<?php _e("Use Social Buttons", "jackbox_domain"); ?> <span data-title="<?php _e("Choose to use the social buttons", "jackbox_domain"); ?>" class="jackbox-question">?</span><br />
					<span class="jackbox-box">
                        <input name="jackbox_settings[social-buttons]" type="radio" value="yes" <?php if($social === "yes") echo "checked"; ?> /> <?php _e("yes", "jackbox_domain"); ?>
                        <input name="jackbox_settings[social-buttons]" type="radio" value="no" <?php if($social === "no") echo "checked"; ?> /> <?php _e("no", "jackbox_domain"); ?>
                    </span>
				</p>
                
                <hr />
                
                <p>
					<?php _e("Load Minified Scripts", "jackbox_domain"); ?> <span data-title="<?php _e("If you've modified the JavaScript at all, change this to 'no'", "jackbox_domain"); ?>" class="jackbox-question">?</span><br />
					<span class="jackbox-box">
                        <input name="jackbox_settings[minified-scripts]" type="radio" value="yes" <?php if($minified === "yes") echo "checked"; ?> /> <?php _e("yes", "jackbox_domain"); ?>
                        <input name="jackbox_settings[minified-scripts]" type="radio" value="no" <?php if($minified === "no") echo "checked"; ?> /> <?php _e("no", "jackbox_domain"); ?>
                    </span>
				</p>
                
                <hr />
                
                <p>
					<?php _e("Disable Canonical Tag", "jackbox_domain"); ?> <span data-title="<?php _e("Disabling this tag is necessary for the Facebook Share button to work correctly", "jackbox_domain"); ?>" class="jackbox-question">?</span><br />
					<span class="jackbox-box">
                        <input name="jackbox_settings[remove-canonical]" type="radio" value="yes" <?php if($canonical === "yes") echo "checked"; ?> /> <?php _e("yes", "jackbox_domain"); ?>
                        <input name="jackbox_settings[remove-canonical]" type="radio" value="no" <?php if($canonical === "no") echo "checked"; ?> /> <?php _e("no", "jackbox_domain"); ?>
                    </span>
				</p>
                
                <hr />
                
                <p>
					<?php _e("Custom CSS", "jackbox_domain"); ?> <span data-title="<?php _e("Any CSS written here will get added to the lightbox", "jackbox_domain"); ?>" class="jackbox-question">?</span><br />
                    <textarea name="jackbox_settings[custom-css]"><?php if($customCSS !== "") echo $customCSS; ?></textarea>
				</p>
                
                <hr />
				
				<p class="submit_jb">
                	<input type="hidden" name="jackbox_settings[domain]" value="<?php echo plugins_url("wp-jackbox/"); ?>" />
                	<input type="submit" class="button-primary" value="<?php _e("Submit Settings", "jackbox_domain"); ?>" />
                </p>

			</form>

		</div>
        
		<?php echo ob_get_clean();

	}
	
	function jackbox_admin_scripts() {
		
		wp_enqueue_style("jackbox_header", "http://fonts.googleapis.com/css?family=Dancing+Script");
		wp_enqueue_style("jackbox_css", plugins_url("wp-jackbox/css/jackbox_wp.css"));
		
		wp_enqueue_script("jquery");
		
	}

	function jackbox_add_admin() {

		add_options_page("JackBox", "JackBox", "manage_options", "jackbox_admin", "jackbox_admin"); 

	}

	function jackbox_register() {

		register_setting("jackbox_settings_group", "jackbox_settings");

	}
	
	add_action("admin_enqueue_scripts", "jackbox_admin_scripts");	
	add_action("admin_init", "jackbox_register");
	add_action("admin_menu", "jackbox_add_admin");


?>