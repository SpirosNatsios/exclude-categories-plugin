<?php

// add_filter( 'woocommerce_product_categories_widget_args', 'exclude_categories_from_product_categories_widget' );
// function exclude_categories_from_product_categories_widget( $args ) {
// // Enter the id of the category you want to exclude in place of '30'
// $excluded_categories = get_option( 'b3p1_excluded_categories', array() );
// $args['exclude'] = $excluded_categories;
//         return $args;
// }

// add_filter( 'woocommerce_product_categories_widget_args', 'exclude_categories_from_product_categories_widget' );


// function exclude_product_category_from_shop_page( $q ) {

//     $tax_query = (array) $q->get( 'tax_query' );

//     $tax_query[] = array(
//            'taxonomy' => 'product_cat',
//            'field' => 'slug',
//            'terms' =>  get_option( 'myplugin_exclude_categories_shop', array() ),
//            'operator' => 'NOT IN'
//     );
//     $q->set( 'tax_query', $tax_query );

// }

// function exclude_categories_from_product_categories_widget( $args ) {
//     $excluded_categories = get_option( 'myplugin_exclude_categories_shop', array() );
//     $args['exclude'] = implode( ',', get_terms( 'product_cat', array( 'slug' => $excluded_categories, 'fields' => 'ids' ) ) );
//     return $args;
// }

// function exclude_product_category_from_related_products( $related_posts, $product_id, $args  ){
    

//     $exclude_ids = wc_get_products( array(
//         'status'    => 'publish',
//         'limit'     => -1,
//         'category'  => get_option( 'myplugin_exclude_categories_shop', array() ),
//         'return'    => 'ids',
//     ) );

//     return array_diff( $related_posts, $exclude_ids );
// }
// add_action( 'woocommerce_product_query', 'exclude_product_category_from_shop_page',999 );  
// add_filter( 'woocommerce_product_categories_widget_args', 'exclude_categories_from_product_categories_widget' );
// add_filter( 'woocommerce_related_products', 'exclude_product_category_from_related_products', 10, 3 );

?>