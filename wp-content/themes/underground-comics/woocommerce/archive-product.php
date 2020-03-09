<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');
?>
<?php
if (is_product_category()) {
    global $wp_query;
    $cat = $wp_query->get_queried_object();

    $thumbnail_id = get_term_meta($cat->term_id, 'thumbnail_id', true);
    $image = wp_get_attachment_url($thumbnail_id);
    $category = $cat->slug;
    $page = "";
    switch ($category) {
        case "marvel":
            $page = get_stylesheet_directory_uri() . "/img/banners/marvel-banner.jpg";
            break;
        case "valiant":
            $page = get_stylesheet_directory_uri() . "/img/banners/valiant-banner.jpg";
            break;
        case "image":
            $page = get_stylesheet_directory_uri() . "/img/banners/image-banner.jpg";
            break;
        case "dark-horse":
            $page = get_stylesheet_directory_uri() . "/img/banners/dark-horse-banner.jpg";
            break;
        case "dc":
            $page = get_stylesheet_directory_uri() . "/img/banners/dc-banner.jpg";
            break;
        case "assorted":
            $page = get_stylesheet_directory_uri() . "/img/banners/assorted-collectibles-banner.jpg";
            break;
    }
}
?>
<section class="category_page-banner">
    <div class="container-fluid" style="background-image: url('<?php echo $page; ?>');">
        <div id="category_page-banner--image"></div>
    </div>
</section>
<section class="category_page-menu--container">
    <div class="container">
        <div class="row d-flex align-items-end justify-content-center">
            <div class="category_page-icon col-md-3 col-12 p-0">
                <?php
                if (is_product_category()) {

                    echo "<img src='{$image}' alt='Brand Logo'>";
                }
                ?>
            </div>
            <div class="category_page-menu col-md-9 col-12 d-flex align-items-start justify-content-md-start justify-content-center">
                <nav class="main-menu navbar navbar-expand" role="navigation">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbar-collapse-1" aria-controls="navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <?php

                    wp_nav_menu(
                        array(
                            'theme_location' =>  'underground_comic_collections_menu',
                            'depth' => 3,
                            'container' => 'div',
                            'container_class' => 'collapse navbar-collapse',
                            'container_id' => 'navbar-collapse-1',
                            'menu_class' => 'nav navbar-nav',
                            'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                            'walker' => new WP_Bootstrap_Navwalker(),
                        )
                    );
                    ?>
                </nav>
            </div>
        </div>
    </div>
</section>
<?php
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');

?>

<header class="woocommerce-products-header">
    <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
        <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
    <?php endif; ?>

    <?php
    /**
     * Hook: woocommerce_archive_description.
     *
     * @hooked woocommerce_taxonomy_archive_description - 10
     * @hooked woocommerce_product_archive_description - 10
     */
    do_action('woocommerce_archive_description');
    ?>
</header>
<section class="search">
    <?php echo do_shortcode('[wcas-search-form]'); ?>
</section>
<?php
if (woocommerce_product_loop()) {

    /**
     * Hook: woocommerce_before_shop_loop.
     *
     * @hooked woocommerce_output_all_notices - 10
     * @hooked woocommerce_result_count - 20
     * @hooked woocommerce_catalog_ordering - 30
     */
    do_action('woocommerce_before_shop_loop');

    woocommerce_product_loop_start();
?>
    <div class="items_container container p-0">
        <div class="row">
            <?php
            if (wc_get_loop_prop('total')) {
                while (have_posts()) {
                    the_post();

                    /**
                     * Hook: woocommerce_shop_loop.
                     */
                    do_action('woocommerce_shop_loop');

                    wc_get_template_part('content', 'product');
                }
            }
            ?>
        </div>
    </div>
<?php
    woocommerce_product_loop_end();

    /**
     * Hook: woocommerce_after_shop_loop.
     *
     * @hooked woocommerce_pagination - 10
     */
    do_action('woocommerce_after_shop_loop');
} else {
    /**
     * Hook: woocommerce_no_products_found.
     *
     * @hooked wc_no_products_found - 10
     */
    do_action('woocommerce_no_products_found');
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
// do_action('woocommerce_sidebar');
?>
</a>
</div>
<?php
get_footer('shop');

?>