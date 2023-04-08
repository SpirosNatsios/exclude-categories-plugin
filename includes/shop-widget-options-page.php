<?php

function shop_page_widget_options_page()
{
    if (!current_user_can('manage_options')) {
        return;
    }

    $excluded_categories = get_option('excluded_categories', array());
    $categories = get_terms(
        array(
            'taxonomy' => 'product_cat',
            'hide_empty' => false,
        )
    );
    ?>
    <div class="wrap">
        <h1>
            <?php echo esc_html(get_admin_page_title()); ?>
        </h1>
        <form action="options.php" method="post">
            <?php settings_fields('exclude_categories_options_group'); ?>
            <?php do_settings_sections('exclude_categories_options_group'); ?>
            <table class="form-table">
                <tbody>
                    <tr valign="top">
                        <th scope="row">
                            <?php _e('Excluded Categories', 'excluded_categories'); ?>
                        </th>
                        <td>
                            <?php foreach ($categories as $category): ?>
                                <label>
                                    <input type="checkbox" name="excluded_categories[]"
                                        value="<?php echo esc_attr($category->term_id); ?>" <?php if (is_array($excluded_categories) && in_array($category->term_id, $excluded_categories))
                                               echo 'checked="checked"'; ?>>
                                    <?php echo esc_html($category->name); ?>
                                </label><br>
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