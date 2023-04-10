<?php


function exclude_categories_from_product_categories_widget( $args ) {
        $excluded_categories = get_option('shop_page_widget_excluded_categories', array());
        $args['exclude'] = $excluded_categories;
                return $args;
}

function exclude_product_category_from_shop_page( $q ) {
         $tax_query = (array) $q->get( 'tax_query' );
        $excluded_categories = get_option( 'shop_page_excluded_categories', array() );
    
        $tax_query[] = array(
            'taxonomy' => 'product_cat',
            'field' => 'term_id',
            'terms' => $excluded_categories,
            'operator' => 'NOT IN'
        );
    
        $q->set( 'tax_query', $tax_query );
    }

    add_filter( 'woocommerce_product_categories_widget_args', 'exclude_categories_from_product_categories_widget' );
    add_action( 'woocommerce_product_query', 'exclude_product_category_from_shop_page',999 );  
?>