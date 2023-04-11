<?php

function exclude_categories_options_page()
{
    if (!current_user_can('manage_options')) {
        return;
    }
    ?>
    <div class="wrap">
        <h1>Select from where you want to exclude categories</h1>
        <p>Please select the option from below where you want to exclude the categories:</p>
        <br>
        <div class="options-buttons">
            <a class="button button-primary" href="<?php echo admin_url('admin.php?page=shop-page'); ?>">Exclude categories from Shop page</a>
            <a class="button button-primary" href="<?php echo admin_url('admin.php?page=shop-page-widget'); ?>">Exclude categories from Shop page widget</a>
            <a class="button button-primary" href="<?php echo admin_url('admin.php?page=related-products'); ?>">Exclude categories from Related Products</a>
        </div>
    </div>
    <?php
}



?>