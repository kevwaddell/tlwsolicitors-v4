<?php 

/*
update_option('siteurl','http://tlwsolicitors.dev');
update_option('home','http://tlwsolicitors.dev');
*/

if ( !function_exists(core_mods) ) {
	function core_mods() {
		if ( !is_admin() ) {
			wp_register_style( 'print-styles', get_stylesheet_directory_uri().'/_/css/print-styles.css', array(), filemtime( get_stylesheet_directory().'/_/css/print-styles.css' ), 'print' );
			wp_register_style( 'styles', get_stylesheet_directory_uri().'/_/css/styles.css', array(), filemtime( get_stylesheet_directory().'/_/css/styles.css' ), 'screen' );
			wp_register_script( 'jquery-cookie', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js', array('jquery'), '1.4.1', true );
			wp_register_script( 'slim-scroll', 'https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.6/jquery.slimscroll.min.js', array('jquery'), '1.3.6', true );
			wp_register_script( 'bootstrap-select', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.3/js/bootstrap-select.min.js', array('jquery'), '1.0.0', true );
			wp_register_script( 'wow-js', 'https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js', false, '1.0.0', true );
			wp_register_script( 'sticky-js', get_stylesheet_directory_uri() . '/_/js/jquery.hc-sticky.js', array('jquery'), '1.0.0', true );
			wp_register_script( 'functions', get_stylesheet_directory_uri() . '/_/js/functions.js', array('jquery', 'jquery-ui-core', 'bootstrap-all-min', 'jquery-cookie', 'slim-scroll', 'wow-js'), '1.0.1', true );
			wp_enqueue_style('print-styles');
			wp_enqueue_style('styles');
			wp_enqueue_script('jquery-cookie');
			wp_enqueue_script('slim-scroll');
			wp_enqueue_script('bootstrap-select');
			wp_enqueue_script('wow-js');
			wp_enqueue_script('sticky-js');
			wp_enqueue_script('functions');
			
			//wp_deregister_script( 'jquery' );
		}
	}
	core_mods();
}

add_action( 'after_setup_theme', 'editor_styles' );

if ($_SERVER['SERVER_NAME']=='www.tlwsolicitors.co.uk') {
	function ewp_remove_script_version( $src ){
		return remove_query_arg( 'ver', $src );
	}
	add_filter( 'script_loader_src', 'ewp_remove_script_version', 15, 1 );
	add_filter( 'style_loader_src', 'ewp_remove_script_version', 15, 1 );
}

function editor_styles() {
add_editor_style(get_stylesheet_directory_uri().'/_/css/custom-editor-style.css?v='.filemtime( get_stylesheet_directory().'/_/css/custom-editor-style.css' ) );	
}

add_theme_support('html5', array('search-form'));

if ( function_exists( 'register_nav_menus' ) ) {
		register_nav_menus(
			array(
			  'legal_links_menu' => 'Legal Menu',
			  'social_links_menu' => 'Footer Social Links',
			  'footer_menu_business' => 'Footer Menu Business',
			  'footer_menu_general' => 'Footer Menu General'
			)
		);
}

if ( function_exists( 'register_sidebar' ) ) {
	
	$login_sb_args = array(
	'name'          => "User actions",
	'id'            => "user-actions",
	'description'   => 'Area for logged in user widget',
	'class'         => 'user-links',
	'before_widget' => '',
	'after_widget'  => '',
	'before_title'  => '',
	'after_title'   => '' 
	);
		
	$newsletter_sb_args = array(
	'name'          => "Newsletter Sign-up Form",
	'id'            => "newsletter-signup-form",
	'description'   => 'Newsletter signup widget',
	'class'         => 'contact-form',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3 class="widgettitle">',
	'after_title'   => '</h3>' 
	);
	
	
	register_sidebar( $login_sb_args );
	register_sidebar( $newsletter_sb_args );
}


add_theme_support( 'post-thumbnails', array( 'page', 'post', 'tlw_landing_page' ) );
add_post_type_support( 'page', 'excerpt' );
add_theme_support( 'custom-background' );

/* POST THUMBNAIL FUNCTIONS */

function add_feat_img ( $post ) {	
	
	if (has_post_thumbnail($post->ID)) {
		
		$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
		$attachment = get_post( $post_thumbnail_id );
		$alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true);
		
		//echo '<pre>';print_r($attachment->post_excerpt);echo '</pre>';
		
		
		$img_atts = array(
		'class'	=> "img-responsive"
		);
		
		if (!empty($alt)){
		$img_atts['alt'] = 	trim(strip_tags( $alt ));
		}
		
		if (!empty($attachment->post_title)){
		$img_atts['title'] = 	trim(strip_tags( $attachment->post_title ));
		}
		
		echo get_the_post_thumbnail($post->ID ,'feat-img', $img_atts );
	
	} else {
		
		echo '<img src="'.get_stylesheet_directory_uri().'/_/img/default-featured-img.jpg" title="TLW Solicitors" alt="TLW Solicitors" class="img-responsive">';
		
	}
	
}

function add_wide_feat_img ( $post, $classes = "" ) {	
		
	$post_thumbnail_id = get_post_thumbnail_id( $post );
	$attachment = get_post( $post_thumbnail_id );
	$alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true);
	
	if ($classes != "") {
	$classes = "img-responsive ".$classes;	
	} else {
	$classes = "img-responsive";
	}
	
	$img_atts = array(
	'class'	=> $classes
	);
	
	if (!empty($alt)){
	$img_atts['alt'] = 	trim(strip_tags( $alt ));
	}
	
	if (!empty($attachment->post_title)){
	$img_atts['title'] = 	trim(strip_tags( $attachment->post_title ));
	}
	
	echo get_the_post_thumbnail($post->ID ,'feat-img-wide', $img_atts );
	
}

function add_extra_wide_feat_img ( $post, $classes = "" ) {	
		
	$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
	$attachment = get_post( $post_thumbnail_id );
	$alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true);
	
	if ($classes != "") {
	$classes = "img-responsive ".$classes;	
	} else {
	$classes = "img-responsive";
	}
	
	$img_atts = array(
	'class'	=> $classes
	);
	
	if (!empty($alt)){
	$img_atts['alt'] = 	trim(strip_tags( $alt ));
	}
	
	if (!empty($attachment->post_title)){
	$img_atts['title'] = 	trim(strip_tags( $attachment->post_title ));
	}
	
	echo get_the_post_thumbnail($post->ID ,'feat-img-ex-wide', $img_atts );
	
}

function add_slim_feat_img( $post ) {	
		
	$post_thumbnail_id = get_post_thumbnail_id( $post );
	$slim_feat_img = wp_get_attachment_image_src($post_thumbnail_id, 'feat-img-slim' );
	
	echo $slim_feat_img[0];
	
	//echo '<pre>';print_r( $wide_banner_img[0] );echo '</pre>';
	
}

function add_toolkit_banner_img( $post ) {	
		
	$post_thumbnail_id = get_post_thumbnail_id( $post );
	$banner_feat_img = wp_get_attachment_image_src($post_thumbnail_id, 'full' );
	
	echo $banner_feat_img[0];
	
	//echo '<pre>';print_r( $wide_banner_img[0] );echo '</pre>';
	
}

function add_banner_feat_img( $post ) {	
		
	$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
	$wide_banner_img = wp_get_attachment_image_src($post_thumbnail_id, 'wide-banner-img' );
	
	echo $wide_banner_img[0];
	
	//echo '<pre>';print_r( $wide_banner_img[0] );echo '</pre>';
	
}

/* ---------------------------------- */

// Get the id of a page by its name
function get_page_id($page_name){
	global $wpdb;
	$page_name = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$page_name."'");
	return $page_name;
}

function add_gravityforms_style() {
	global $post;
	$form = get_field('form', $post->ID);
	
	if (!empty($form)) {
		wp_enqueue_style("gforms_css", GFCommon::get_base_url() . "/css/forms.css", null, GFCommon::$version);
	}
	
}
add_action('wp_print_styles', 'add_gravityforms_style');

function custom_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


/* REGISTER FEEDBACK CPT */
include (STYLESHEETPATH . '/_/functions/tlw_feedback_cpt.php');

/* REGISTER TEAMS CPT */
include (STYLESHEETPATH . '/_/functions/tlw_team_cpt.php');

/* REGISTER LANDING PAGE CPT */
include (STYLESHEETPATH . '/_/functions/tlw_landing_pages_cpt.php');

/* REGISTER HOW IT WORKS CPT */
include (STYLESHEETPATH . '/_/functions/tlw_how_it_works_cpt.php');

/* REGISTER FAQ's CPT */
include (STYLESHEETPATH . '/_/functions/tlw_faqs_cpt.php');

/* REGISTER POSITIONS TAX */
include (STYLESHEETPATH . '/_/functions/tlw_positions_tax.php');

/* AFC OPTIONS FUNCTIONS */
include (STYLESHEETPATH . '/_/functions/afc_options_functions.php');

/* FORM ACTIONS */
include (STYLESHEETPATH . '/_/functions/gform_functions.php');

/* AFC SAVE FUNCTIONS */
include (STYLESHEETPATH . '/_/functions/afc_save_post.php');

/* SEND NEWSLETTER TO DOTMAILER */
include (STYLESHEETPATH . '/_/functions/submit_newsletter.php');

/* YOUST ADD TO CONTENT FUNCTION */
include (STYLESHEETPATH . '/_/functions/yoast_functions.php');

function add_gf_cap() {	
   $id = 2;
   $role = new WP_User( $id );
   $role->add_cap( 'gravityforms_edit_forms' );
   $role->add_cap( 'gravityforms_view_entries' );
   $role->add_cap( 'gravityforms_edit_entries' );
   $role->add_cap( 'gravityforms_export_entries' );
   $role->add_cap( 'gravityforms_view_entry_notes' );
   $role->add_cap( 'gravityforms_edit_entry_notes' );
}
add_action( 'admin_init', 'add_gf_cap' );

function truncate($string,$length=100,$append="&hellip;") {
  $string = trim($string);

  if(strlen($string) > $length) {
    $string = wordwrap($string, $length);
    $string = explode("\n", $string, 2);
    $string = $string[0] . $append;
  }

  return $string;
}

function adjust_my_breadcrumbs( $linksarray ) {
	if( is_array( $linksarray ) && count( $linksarray ) > 0 && is_single() ) {
		array_pop( $linksarray );
	}
	return $linksarray;
}
add_filter( 'wpseo_breadcrumb_links', 'adjust_my_breadcrumbs' );

/*
*  AFC Options Page
*/

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );
function my_mce_buttons_2( $buttons ) {
	//echo '<pre>';print_r($buttons);echo '</pre>';
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}

add_filter( 'tiny_mce_before_init', 'my_mce_before_init' );
function my_mce_before_init( $settings ) {

    $style_formats = array(
    	array(
    		'title' => 'Intro',
    		'selector' => 'p',
    		'classes' => 'intro bold'
    	),
    	
    	array(
    		'title' => 'Lead',
    		'selector' => 'p',
    		'classes' => 'lead'
    	),
    	
    	array(
    		'title' => 'Large Intro',
    		'selector' => 'p',
    		'classes' => 'intro lrg'
    	),
    	
    	array(
    		'title' => 'H2 Caps',
    		'selector' => 'h2',
    		'classes' => 'caps'
    	),
    	array(
    		'title' => 'Colour Link',
    		'selector' => 'a',
    		'classes' => 'col-link'
    	),
        array(
        	'title' => 'Red Text',
        	'inline' => 'span',
        	'styles' => array(
        		'color' => '#C60751'
        	)
        ),
        array(
        	'title' => 'Aqua Text',
        	'inline' => 'span',
        	'styles' => array(
        		'color' => '#8BC2BD'
        	)
        ),
        array(
        	'title' => 'Purple Text',
        	'inline' => 'span',
        	'styles' => array(
        		'color' => '#B975DA'
        	)
        ),
        array(
        	'title' => 'Orange Text',
        	'inline' => 'span',
        	'styles' => array(
        		'color' => '#FFAF4E'
        	)
        ),
        array(
        	'title' => 'Pink Text',
        	'inline' => 'span',
        	'styles' => array(
        		'color' => '#EA5777'
        	)
        ),
        array(
        	'title' => 'Blue Text',
        	'inline' => 'span',
        	'styles' => array(
        		'color' => '#2D80A9'
        	)
        )

    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;
    
    add_editor_style();

}

function tlw_theme_get_archives_link ( $link_html ) {
    global $wp;
    static $current_url;
    if ( empty( $current_url ) ) {
        $current_url = add_query_arg( $_SERVER['QUERY_STRING'], '', home_url( $wp->request ) );
    }
    if ( stristr( $link_html, $current_url ) !== false ) {
        $link_html = preg_replace( '/(<[^\s>]+)/', '\1 class="active"', $link_html, 1 );
    }
    return $link_html;
}
add_filter('get_archives_link', 'tlw_theme_get_archives_link');

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

add_filter('ysacf_exclude_fields', function(){
    return array(
        'page_colour',
        'page_icon',
        'hide_title',
        'tel_num_position',
        'form_activated',
        'feedback_active',
        'hiw_active',
        'form',
        'download_active',
        'bk_download_active',
        'faqs_active',
        'dep_head_active',
        'head_of_dep',
        'faqs',
        'faqs_list_or_link',
        'bk_btn_title',
        'active_sections',
        'form_section_title',
        'downloads_section_title',
        'service_section_title',
        'service_section_pgs',
        'blog_section_title',
        'blog_section_articles',
        'banner_bg',
        'banner_video_mp4',
        'banner_video_webm',
        'banner_options'
    );
});

 ?>