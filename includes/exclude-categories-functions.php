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


    function exclude_product_category_from_related_products($related_posts, $product_id, $args){

        $term_ids = get_option('related_products_excluded_categories', array());

        if (!empty($term_ids)){
            $excluded_categories = wc_get_products( array(
                'status' => 'publish',
                'limit' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'term_id',
                        'terms' => $term_ids,
                        'operator' => 'IN'
                    ),
                ),
                'return' => 'ids',
            ));
        }
        else {
            $excluded_categories = array();
        }


        return array_diff($related_posts,$excluded_categories);
    }
    

    add_filter( 'woocommerce_product_categories_widget_args', 'exclude_categories_from_product_categories_widget' );
    add_action( 'woocommerce_product_query', 'exclude_product_category_from_shop_page',999 );  
    add_filter( 'woocommerce_related_products', 'exclude_product_category_from_related_products', 10, 3 );

?>