<?php

add_action('admin_menu', 'exclude_categories_add_menu');
add_action('admin_init', 'exclude_categories_register_settings');

function exclude_categories_add_menu()
{
    add_menu_page(
        'Excluded Categories',
        'Excluded Categories',
        'manage_options',
        'exclude-categories',
        'exclude_categories_options_page'
    );

    add_submenu_page(
        'exclude-categories',
        'Shop Page Widget',
        'Shop Page Widget',
        'manage_options',
        'shop-page-widget',
        'shop_page_widget_options_page'
    );
}

function exclude_categories_register_settings()
{
    register_setting(
        'exclude_categories_options_group',
        'excluded_categories'
    );
}

?>