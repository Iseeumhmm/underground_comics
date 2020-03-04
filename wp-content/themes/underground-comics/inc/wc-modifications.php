<?php
function underground_comics_wc_modify()
{
    add_action('woocommerce_before_main_content', 'underground_comics_open_container_row', 5);
    function underground_comics_open_container_row()
    {
        echo '<div class="container shop-content"><div class="row">';
    }

    add_action('woocommerce_after_main_content', 'underground_comics_close_container_row', 5);
    function underground_comics_close_container_row()
    {
        echo '</div></div>';
    }

    remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar');

    // if (is_shop()) {
    //     add_action('woocommerce_before_main_content', 'underground_comics_add_sidebar_tags', 6);
    //     function underground_comics_add_sidebar_tags()
    //     {
    //         echo '<div class="sidebar-shop col-lg-3 col-4 order-2 order-md-1">';
    //     }
    //     add_action('woocommerce_before_main_content', 'woocommerce_get_sidebar', 7);

    //     add_action('woocommerce_before_main_content', 'underground_comics_close_sidebar_tags', 8);
    //     function underground_comics_close_sidebar_tags()
    //     {
    //         echo '</div>';
    //     }
    // }

    // add_action('woocommerce_before_main_content', 'underground_comics_add_shop_tags', 9);
    // function underground_comics_add_shop_tags()
    // {
    //     if (is_shop()) {
    //         echo '<div class="col-lg-9 col-8 order-1 order-md-2">';
    //     } else {
    //         echo '<div class="col">';
    //     }
    // }
    // add_action('woocommerce_after_main_content', 'underground_comics_close_shop_tags', 4);
    // function underground_comics_close_shop_tags()
    // {
    //     echo '</div">';
    // }

    // add_filter( 'woocommerce_show_page_title', 'underground_comics_remove_shop_title' );
    // function underground_comics_remove_shop_title(){
    //     return false;
    // }

    add_action('woocommerce_after_shop_loop_item_title', 'the_excerpt', 1);
}

add_action('wp', 'underground_comics_wc_modify');
