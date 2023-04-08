<?php

add_filter( 'woocommerce_product_categories_widget_args', 'exclude_categories_from_product_categories_widget' );
function exclude_categories_from_product_categories_widget( $args ) {
// Enter the id of the category you want to exclude in place of '30'
$excluded_categories = get_option('excluded_categories', array());
$args['exclude'] = $excluded_categories;
        return $args;
}

?>