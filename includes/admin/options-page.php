<?php

function exclude_categories_options_page()
{
    if (!current_user_can('manage_options')) {
        return;
    }
    ?>
    <div class="big-container">
        <div class="small-container">
            <h1>Exclude Categories</h1>
            <p>Please select from below where you would like products belonging to specific categories not to be displayed</p>
            <div class="page-buttons">
                <a class="page-button" href="<?php echo admin_url('admin.php?page=shop-page'); ?>">Exclude categories from Shop page</a>
                <a class="page-button" href="<?php echo admin_url('admin.php?page=shop-page-widget'); ?>">Exclude categories from Shop page widget</a>
                <a class="page-button" href="<?php echo admin_url('admin.php?page=related-products'); ?>">Exclude categories from Related Products</a>
            </div>
        </div>
    </div>
    <?php
}

?>