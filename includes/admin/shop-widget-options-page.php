<?php

function shop_page_widget_options_page()
{
    if (!current_user_can('manage_options')) {
        return;
    }

    $excluded_categories = get_option('shop_page_widget_excluded_categories', array());
    $categories = get_terms(
        array(
            'taxonomy' => 'product_cat',
            'hide_empty' => true,
            'parent' => 0
        )
    );
    ?>
    <div class="wrap">
        <h1>
            <?php echo esc_html(get_admin_page_title()); ?>
        </h1>
        
        <form action="options.php" method="post">
            <?php settings_fields('shop_page_widget_options_group'); ?>
            <?php do_settings_sections('shop_page_widget_options_group'); ?>
            <h2>Select the categories you want excluded from the shop page widget</h2>
            <table class="form-table">
                <tbody>
                    <tr valign="top">
                        <th scope="row">
                            <?php _e('Categories', 'shop_page_widget_excluded_categories'); ?>
                        </th>
                        <td>
                            <?php foreach ($categories as $category): ?>
                                <label>
                                    <input type="checkbox" name="shop_page_widget_excluded_categories[]"
                                        value="<?php echo esc_attr($category->term_id); ?>" <?php if (is_array($excluded_categories) && in_array($category->term_id, $excluded_categories))
                                               echo 'checked="checked"'; ?>>
                                    <?php echo esc_html($category->name); ?>
                                </label><br>
                                <?php
                                $children = get_term_children($category->term_id, 'product_cat');
                                if (!empty($children)) {
                                    foreach ($children as $child) {
                                        $child_term = get_term_by('id', $child, 'product_cat');
                                        ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;<label>
                                            <input type="checkbox" name="shop_page_widget_excluded_categories[]"
                                                   value="<?php echo esc_attr($child_term->term_id); ?>" <?php if (is_array($excluded_categories) && in_array($child_term->term_id, $excluded_categories))
                                            echo 'checked="checked"'; ?>>
                                            <?php echo esc_html($child_term->name); ?>
                                        </label><br>
                                    <?php
                                    }
                                }
                                ?>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php submit_button(); ?>
        </form>

    </div>
    <?php
}

?>
