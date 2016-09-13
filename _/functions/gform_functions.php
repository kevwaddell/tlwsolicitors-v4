<?php
add_filter( 'gform_ajax_spinner_url', 'tgm_io_custom_gforms_spinner' );

function tgm_io_custom_gforms_spinner( $src ) {

    return get_stylesheet_directory_uri() . '/_/img/ajax-loader.gif';
    
}

add_filter("gform_field_value_src", "populate_affiliate");

function populate_affiliate($value){
	if ( isset($_COOKIE['src']) ) {
	return $_COOKIE["src"];	
	}
}

add_filter("gform_field_value_gclid", "populate_gclid");

function populate_gclid($value){
	if ( isset($_COOKIE['gclid']) ) {
	return $_COOKIE["gclid"];	
	}
}

?>