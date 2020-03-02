<?php

/**
 * The main template file
 * 
 *
 * @package Underground Comics
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="page" class="site">
        <header>
            <section class="top-bar">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-12 text-md-left text-center">
                            <a href="<?php echo home_url('/'); ?>">
                                <?php if (has_custom_logo()) : ?>
                                    <?php the_custom_logo(); ?>
                                <?php else : ?>
                                    <p class="site-title"><?php bloginfo('title') ?></p>
                                    <span><?php bloginfo('description') ?></span>
                                <?php endif; ?>
                            </a>
                        </div>
                        <div class="col-md-6 col-12 text-md-right">
                            <div class="d-flex">
                                <div class="navbar-expand ml-auto mr-1">
                                    <ul class="navbar-nav">
                                        <?php if (is_user_logged_in()) : ?>
                                            <li>
                                                <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))) ?>" class="nav-link">My Account</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo esc_url(wp_logout_url(get_permalink(get_option('woocommerce_myaccount_page_id')))) ?>" class="nav-link">Log Out</a>
                                            </li>
                                        <?php else : ?>
                                            <li>
                                                <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))) ?>" class="nav-link">Login / Register</a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <div class="cart text-right d-flex align-items-center">
                                    <a href="<?php echo wc_get_cart_url(); ?>"><span class="cart-icon"></span></a>
                                    <span class="items"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </header>