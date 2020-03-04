<?php
/*
Template Name: Home Page
*/

get_header();
?>
<div class="content-area">
    <main>
        <div class="container-fluid ml-0 mr-0 p-0">
            <div class="underground_banner"></div>
        </div>
        <section class="video_featured">
            <div class="container">
                <div class="row video">
                    <?php
                    $video = get_theme_mod('set_home_video', '');
                    ?>
                    <?php echo do_shortcode('[video src=' . $video . ']'); ?>

                </div>
                <div class="row featured">
                    <?php
                    $showdeal           = get_theme_mod('set_show_featured_item', 0);
                    $feature            = get_theme_mod('set_featured', 0);
                    $featureAuthor            = get_theme_mod('set_featured_author', '');
                    $currency           = get_woocommerce_currency_symbol();
                    $regular            = get_post_meta($feature, '_regular_price', true);
                    $sale               = get_post_meta($feature, '_sale_price', true);
                    $post = get_post($feature);
                    // echo '<pre style="color: white;">' . var_export($data, true) . '</pre>';
                    $discount_percentage = 0;
                    if ($showdeal == 1 && (!empty($feature))) :
                        if ($sale > 0 && $regular > 0) {

                            $discount_percentage = absint(100 - (($sale / $regular) * 100));
                        }
                    ?>

                        <section class="Featured">
                            <div class="container">
                                <div class="row d-flex" onClick="goToProduct('<?php echo get_permalink($feature); ?>');">
                                        <div class="featured-img col-lg-6 col-12 p-0 ml-auto text-center">
                                            <?php echo get_the_post_thumbnail($feature, 'large', array('class' => 'img-fluid')); ?>
                                        </div>
                                        <div class="featured-desc col-lg-6 col-12">
                                            <h2>Featured</h2>
                                            <div class="summary entry-summary">
                                                <a href="<?php echo get_permalink($feature); ?>">
                                                    <h1 class="product_title entry-title"><?php echo get_the_title($feature); ?></h1>
                                                </a>
                                                <h1 class="featured-author single_product-author">By: <?php echo $featureAuthor ?></h1>

                                                <div class="woocommerce-product-details__short-description">
                                                    <?php echo $post->post_content; ?>
                                                </div>
                                                <a class="add-to-cart" href="<?php echo esc_url('?add-to-cart=' . $feature) ?>">
                                                    <button name="add-to-cart" value=<?php echo $feature ?> class="featured-button">Add to cart</button>
                                                </a>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                        </section>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <section>
            <div class="underground_comics-brands container-fluid m-0">
                <div class="row">
                    <div class="dc col-md-6 col-12 d-flex">
                        <a href="<?php echo get_site_url(); ?>/product-category/dc/">
                            <img src="<?php echo get_stylesheet_directory_URI(); ?>/img/brand_logos/dc-comics-logo.png" alt="DC Logo" class="img-dc">
                        </a>
                    </div>
                    <div class="marvel col-md-6 col-12 d-flex">
                        <a href="<?php echo get_site_url(); ?>/product-category/marvel/">
                            <img src="<?php echo get_stylesheet_directory_URI(); ?>/img/brand_logos/marvel-comics-logo.png" alt="Marvel Logo" class="img-dc">
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="valliant col-md-4 col-12 d-flex">
                        <a href="<?php echo get_site_url(); ?>/product-category/valiant/">
                            <img src="<?php echo get_stylesheet_directory_URI(); ?>/img/brand_logos/valiant-comics-logo.png" alt="Valliant Logo" class="img-dc">
                        </a>
                    </div>
                    <div class="_image col-md-4 col-12 d-flex">
                        <a href="<?php echo get_site_url(); ?>/product-category/image/">
                            <img src="<?php echo get_stylesheet_directory_URI(); ?>/img/brand_logos/image-comics-logo.png" alt="Image Logo" class="img-dc">
                        </a>
                    </div>
                    <div class="darkhorse col-md-4 col-12 d-flex">
                        <a href="<?php echo get_site_url(); ?>/product-category/dark-horse/">
                            <img src="<?php echo get_stylesheet_directory_URI(); ?>/img/brand_logos/dark-horse-comics-logo.png" alt="Dark Horse Logo" class="img-dc">
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <a href="<?php echo get_site_url(); ?>/product-category/assorted/">
                    <div class="collections_container d-flex w-100 align-items-center justify-content-center">
                        <h1>View our assorded collectibles</h1>
                    </div>
                </a>
            </div>
        </section>
    </main>
</div>
<?php get_footer(); ?>