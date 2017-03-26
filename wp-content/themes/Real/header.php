<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 */
?>

<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
  <title>
    <?php
      wp_title( '-', true, 'right');
      bloginfo( 'name');
    ?>
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<script type="text/javascript">

 // Add a script element as a child of the body
 function downloadJSAtOnload() {
 var element = document.createElement("script");
 element.src = "deferredfunctions.js";
 document.body.appendChild(element);
 }

 // Check for browser support of event handling capability
 if (window.addEventListener)
 window.addEventListener("load", downloadJSAtOnload, false);
 else if (window.attachEvent)
 window.attachEvent("onload", downloadJSAtOnload);
 else window.onload = downloadJSAtOnload;

</script>



  <?php wp_head(); ?>
</head>

<body>

  <div class="container header">

    <center>
    <a href="<?php echo home_url(); ?>"> <img class="img-responsive" src="<?php echo get_bloginfo('template_url') ?>/images/logo.png"style="
    max-height: 200px;" alt="Brookes Entrepreneurs";></a>
    </center>

  </div>


  <nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>



    <div class="navbar-collapse collapse" id="navbar-ex1-collapse">

      <ul class="nav navbar-nav nav-secondary">
         <?php theboot_main_nav(); ?>
      </ul>

</div>
</div> 
</nav>

<div class="fadein-wrap">