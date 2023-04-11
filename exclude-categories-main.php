<?php

/**
 * Plugin Name: Exclude Categories
 * Description: 
 * Version: 1.0
 * Author: Spiros Natsios
 * Author URI: https://theblink.gr/
 **/


include_once('includes/exclude-categories-functions.php');
include_once('includes/menu-functions.php');
include_once('includes/admin/options-page.php');
include_once('includes/admin/shop-widget-options-page.php');
include_once('includes/admin/shop-page-options-page.php');
include_once('includes/admin/related-products-options-page.php');
 


function exclude_categories_enqueue_styles() {
    wp_enqueue_style( 'exclude-categories-styles', plugins_url( 'assets/css/options-page.css', __FILE__ ) );
}

add_action( 'admin_enqueue_scripts', 'exclude_categories_enqueue_styles' );
 ?>