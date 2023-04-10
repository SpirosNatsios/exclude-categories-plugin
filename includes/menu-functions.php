<?php

add_action('admin_menu', 'exclude_categories_add_menu');
add_action('admin_init', 'shop_page_widget_register_settings');

function exclude_categories_add_menu()
{
    add_menu_page(
        'Exclude Categories',
        'Exclude',
        'manage_options',
        'exclude-categories',
        'exclude_categories_options_page',
        'dashicons-superhero-alt'
    );

    add_submenu_page(
        'exclude-categories',
        'Shop Page Widget',
        'Shop Page Widget',
        'manage_options',
        'shop-page-widget',
        'shop_page_widget_options_page'
    );

    add_submenu_page(
        'exclude-categories',
        'Shop Page',
        'Shop Page',
        'manage_options',
        'shop-page',
        'shop_page_options_page'
    );
    
    add_submenu_page(
        'exclude-categories',
        'Related Products',
        'Related Products',
        'manage_options',
        'related-products',
        'related_products_options_page'

    );
}

function shop_page_widget_register_settings()
{
    register_setting(
        'shop_page_widget_options_group',
        'shop_page_widget_excluded_categories'
    );

    register_setting(
        'shop_page_options_group',
        'shop_page_excluded_categories'
    );

    register_setting(
        'related_products_options_group',
        'related_products_excluded_categories'
    );
   
}
 ?>