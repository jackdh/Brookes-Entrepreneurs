<?php 

require_once("bootstrap-walker.php");
add_filter( 'optin_monster_mailchimp_double', '__return_false' );
// can add more just below like normal


//Bootstrap Nav bar
function theboot_main_nav() {
     wp_nav_menu(
       array(
       'menu' => 'Main_menu',
       'menu_class' => 'nav navbar-nav',
       'theme_location' => 'main_nav',
       'container' => 'false',
       'fallback_cb' => 'theboot_main_nav_fallback',
       'depth' => '3',
       'walker' => new Bootstrap_Walker()
       )
     );
}

function theboot_main_nav_fallback() {

}

function show_post($path) {
  $post = get_page_by_path($path);
  $content = apply_filters('the_content', $post->post_content);
  echo $content;
}


//Load theme css
function theme_styles() {
	wp_enqueue_style( 'main', get_template_directory_uri() . '/style.css' );

}


function wpbootstrap_scripts_with_jquery() {
	// Register the script like this for a theme:
	wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ) );
	wp_enqueue_script( 'custom-script' );
}

function theme_js() {
  wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/flexslider.js', array('jquery'), '', true );
  if (is_page ('contact-us')){
  wp_enqueue_script( 'myscript_js', get_template_directory_uri() . '/js/mailchimp.js', array('jquery'), '', true );
  wp_enqueue_script( 'myscript_js', get_template_directory_uri() . '/js/popovers.js', array('jquery'), '', true );
  }
}

// get the the role object - editor, author, etc. (or any specially created role)
$role = get_role('editor');

// // add a capability to this role object - The 'edit_theme_options' enables Dashboard APPEARANCE and Sub-Menus
//             of Themes, Widgets, Menus, and Backgrounds for users with that role
$role->add_cap('edit_theme_options');

// For more CAP types and info, go to wordpress.org - Search for:  ROLES and CAPABILITIES


add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );
add_action( 'wp_enqueue_scripts', 'theme_styles',true );
add_action( 'wp_enqueue_scripts', 'theme_js' );
add_theme_support( 'menus' );

function create_widget( $name, $id, $description ) {
	$args = array(
			'name'          => __( $name),
			'id'            => $id,
			'description'   => $description,
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h5>',
			'after_title'   => '</h5>' 
		);
	
		register_sidebar( $args );
}

create_widget('Left Footer', 'footer_left', 'Displays in the left corner' );
create_widget('Middle Footer', 'footer_middle', 'Displays in the middle' );
create_widget('Right Footer', 'footer_right', 'Displays in the right corner' );
create_widget('videos_taxonomy', 'videos_taxonomy', 'USE THIS TO CHANGE FEATURED YOUTUBE' );
create_widget('news_taxonomy', 'news_taxonomy', 'displays the catagories' );
create_widget('photo_taxonomy', 'photo_taxonomy', 'Photo categories.' );
create_widget('meta_footer', 'meta_footer', 'displays meta along bottom' );


function efs_script(){  
  
print '<script type="text/javascript" charset="utf-8"> 
  jQuery(window).load(function() { 
    jQuery(\'.flexslider\').flexslider(); 
  }); 


</script>';

}

function my_cache_user_list_events(){

  $url = 'https://www.eventbrite.com/json/organizer_list_events?app_key=ZEQZUK6SKRWSDSE6VF&user_key=139144264387974352657&id=6036359793&only_display=title,start_date,url,status';
  $file = __DIR__.'/cache/list_of_events.json';

  if (time()-filemtime($file) > 1 * 3600) {
    // file older than 1 hours
    $data = file_get_contents($url);
    file_put_contents($file, $data);
  } else {
    // file younger than 1 hours
    $data = file_get_contents($file);
  }
  return json_decode($data);
}

function eb_widget($ret){
  $obj = my_cache_user_list_events();
  if ($ret == "title") {
    return  end($obj->events)->event->title;
  }
  if ($ret == "url") {
    return  end($obj->events)->event->url;
  } 
  if ($ret == "start_date") {
    return  end($obj->events)->event->start_date;
  }
  if ($ret == "status"){
    return end($obj->events)->event->status;
  }
}



function my_cache_get_event($id){
  $url = 'https://www.eventbrite.com/json/event_get?app_key=ZEQZUK6SKRWSDSE6VF&user_key=139144264387974352657&id='.$id.'&only_display=title,description,start_date,end_date,url,status,venue,logo';
  $file = __DIR__.'/cache/user_event_cache_id_'.$id.'.json';

  if (time()-filemtime($file) > 1 * 3600) {
    // file older than 1 hours
    $data = file_get_contents($url);
    file_put_contents($file, $data);
  } else {
    // file younger than 1 hours
    $data = file_get_contents($file);
  }
  return json_decode($data);

}




function get_event($id, $ret) {
  $obj = my_cache_get_event($id);
  if ($ret == 'logo') {
    return ($obj->event->logo);
  }
  if ($ret == 'title') {
    return ($obj->event->title);
  }
  if ($ret == 'time') {
    $start = ($obj->event->start_date);
    $end = ($obj->event->end_date);
    $start = substr($start,11,-3);
    $end = substr($end, 11,-3);
    return $start.' - '.$end;
  }
  if ($ret == 'date') {
    $date = ($obj->event->start_date);
    return substr($date, 0,11);
  }
  if ($ret == 'description') {
    $desc = ($obj->event->description);
    $desc = strip_tags($desc);
    $desc = substr($desc, 0, 270);
    $desc = $desc . " ...";
    return $desc;
  }
  if ($ret == 'url') {
    return ($obj->event->url);
  }

  if ($ret == 'status') {
    return ($obj->event->status);
  }

}

function getYouTubeIdFromURL($url)
{
  $url_string = parse_url($url, PHP_URL_QUERY);
  parse_str($url_string, $args);
  return isset($args['v']) ? $args['v'] : false;
}



// filter the Gravity Forms button type
add_filter("gform_submit_button", "form_submit_button", 10, 2);

function form_submit_button($button, $form){
    return "<button class='btn btn-primary' id='gform_submit_button_{$form["id"]}'><span>Check out with PayPal</span></button>";
}

?>
