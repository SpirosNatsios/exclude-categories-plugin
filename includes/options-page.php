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
            <a class="button button-primary" href="<?php echo admin_url('edit-tags.php?taxonomy=product_cat&post_type=product'); ?>">Exclude categories from specific products</a>
            <a class="button button-primary" href="<?php echo admin_url('edit-tags.php?taxonomy=product_cat'); ?>">Exclude categories from Shop page</a>
            <a class="button button-primary" href="<?php echo admin_url('admin.php?page=wc-settings&tab=products&section=display'); ?>">Exclude categories from Shop page widget</a>
        </div>
    </div>
    <?php
}



?>