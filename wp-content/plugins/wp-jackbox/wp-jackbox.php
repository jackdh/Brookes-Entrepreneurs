<?php

	/*
	Plugin Name: JackBox
	Plugin URI: http://www.codingjack.com/jackbox_wp/
	Description: Responsive lightbox with real social sharing &nbsp;|&nbsp; <a href="options-general.php?page=jackbox_admin">Edit Settings</a> &nbsp;|&nbsp; <a href="http://www.youtube.com/playlist?list=PLN8tXRxQci2ZFMg7Y1kNiWLDV9YwawlcM&feature=view_all">Watch Videos</a>
	Version: 1.0
	Author: CodingJack
	Author URI: http://www.codingjack.com/
	*/

	$jackbox_options = get_option("jackbox_settings");

	if(!$jackbox_options) {

		$jackbox_options["hover"] = "none";
		$jackbox_options["custom-css"] = "";
		$jackbox_options["full-scale"] = "yes";
		$jackbox_options["flash-video"] = "no";
		$jackbox_options["use-thumbs"] = "yes";
		$jackbox_options["thumb-width"] = "75";
		$jackbox_options["thumb-height"] = "50";
		$jackbox_options["video-width"] = "958";
		$jackbox_options["video-height"] = "538";
		$jackbox_options["deep-linking"] = "yes";
		$jackbox_options["use-tooltips"] = "yes";
		$jackbox_options["thumbs-hidden"] = "no";
		$jackbox_options["autoplay-video"] = "no";
		$jackbox_options["social-buttons"] = "yes";
		$jackbox_options["show-description"] = "no";
		$jackbox_options["minified-scripts"] = "yes";
		$jackbox_options["remove-canonical"] = "yes";
		$jackbox_options["domain"] = plugins_url("wp-jackbox/");

		add_option("jackbox_settings", $jackbox_options);

	}

	function deactivate_jackbox() {

		delete_option("jackbox_settings");

	}

	if(!is_admin()) {

		include("includes/jackbox_scripts.php");

	}

	else {

		include("includes/jackbox_tiny_mce.php");
		include("includes/jackbox_admin.php");
		
		register_deactivation_hook( __FILE__, "deactivate_jackbox");
		
	}

?>