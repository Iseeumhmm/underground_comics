<?php

/**
 * The main template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Underground Comics
 */
// Register custom Navigation Walker
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
// 
require_once get_template_directory() . '/inc/customizer.php';

/**
 * Show cart contents / total Ajax
 */
add_filter('woocommerce_add_to_cart_fragments', 'underground_comic_woocommerce_header_add_to_cart_fragment');

// Remove Sku and Category from products
// add_filter( 'wc_product_sku_enabled', '__return_false' );

// Remove single product tabs
add_filter('woocommerce_product_tabs', 'woo_remove_product_tabs', 98);

function woo_remove_product_tabs($tabs)
{
    unset($tabs['description']);          // Remove the description tab
    unset($tabs['reviews']);          // Remove the reviews tab
    unset($tabs['additional_information']);   // Remove the additional information tab
    return $tabs;
}

function show_stock()
{
    global $product;
    if ($product->get_stock_quantity()) {
        echo '<div class="in-stock">Stock: ' . number_format($product->get_stock_quantity(), 0, '', '').'</div>';
    }
}

add_action('woocommerce_single_product_summary', 'show_stock', 15);


// Custom Attribute Single Products
add_action('woocommerce_single_product_summary', 'custom_template_single_author', 5);
function custom_template_single_author()
{
    global $product;

    $author = $product->get_attribute('author');

    echo '<h1 class="single_product-author">';
    if ($author)
        echo 'By: ' . $author;
    echo '</h1>';
}

// Reorder Single products items
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);


add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);

// Change Related Products to Related Items

// Change WooCommerce "Related products" text

add_filter('gettext', 'change_rp_text', 10, 3);
add_filter('ngettext', 'change_rp_text', 10, 3);

function change_rp_text($translated, $text, $domain)
{
    if ($text === 'Related products' && $domain === 'woocommerce') {
        $translated = esc_html__('Related Items', $domain);
    }
    return $translated;
}

// Woo Commerce Category Description Removals

// remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);




function underground_comic_woocommerce_header_add_to_cart_fragment($fragments)
{
    global $woocommerce;

    ob_start();

?>
    <span class="items"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
<?php
    $fragments['span.items'] = ob_get_clean();
    return $fragments;
}

function underground_comic_scripts()
{
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/inc/bootstrap.min.js', array('jquery'), '4.4.1', true);
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/inc/bootstrap.min.css', array(), '4.4.1', 'all');
    wp_enqueue_style('underground-comics-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css'), 'all');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,700');

    //Flex Slider Javascript and CSS
    // wp_enqueue_style( 'underground-comics-style', get_stylesheet_uri(), array(), '1.0', 'all' );

    wp_enqueue_script('script-js', get_template_directory_uri() . '/inc/script.js', array(), '', true);
}
add_action('wp_enqueue_scripts', 'underground_comic_scripts');

function underground_comic_config()
{
    register_nav_menus(
        array(
            'underground_comic_collections_menu' => 'Underground Comics Collections Menu',
            'underground_comic_cart_menu' => 'Underground Comics Cart Menu'
        )
    );
    add_theme_support('woocommerce', array(
        'thumbnail_image_width'     =>  255,
        'single_image_width'        =>  255,
        'product_grid'              =>  array(
            'default_rows'          =>  10,
            'min_rows'              =>  5,
            'max_rows'              =>  10,
            'default_columns'       =>  1,
            'min_columns'           =>  1,
            'max_columns'           =>  1
        )
    ));
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    add_theme_support('custom-logo', array(
        'height'        =>  103,
        'width'         =>  400,
        'flex_height'   =>  true,
        'flex_width'    =>  true
    ));

    add_image_size('underground-comics-slider', 1920, 800, array('center', 'center'));

    if (!isset($content_width)) {
        $content_width = 600;
    }
}
add_action('after_setup_theme', 'underground_comic_config', 0);

// Import file that contains WooCommerce Modifications
if (class_exists('WooCommerce')) {
    require get_template_directory() . '/inc/wc-modifications.php';
}
