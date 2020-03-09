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
                        <div class="col-md-6 col-12 text-right">
                            <div class="d-flex justify-content-md-end justify-content-center align-items-center mt-3 mt-md-0">

                                <?php
                                $displayCart = get_theme_mod('set_cart', false);
                                $email = get_theme_mod('set_footer_email', '');
                                if ($displayCart == true) :
                                ?>
                                    <div class="cart text-right d-flex align-items-center">
                                        <a id="cart-icon" href="<?php echo wc_get_cart_url(); ?>"><span class="cart-icon"></span></a>
                                        <span class="items"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                                    </div>

                                    <?php
                                else :
                                    if (is_front_page() != true ) :
                                    ?>
                                        <div class="substitute_cart">
                                            <a id="substitute-cart-link" href="mailto:<?php echo $email; ?>">Contact For More Info</a>
                                        </div>
                                <?php
                                    endif;
                                endif;

                                ?>
                                <nav class="main-menu navbar navbar-expand-lg ml-3" role="navigation">
                                    <!-- Brand and toggle get grouped for better mobile display -->
                                    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbar-collapse-main" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div id="navbar-collapse-main" class="collapse navbar-collapse">
                                        <ul id="menu-collections" class="nav navbar-nav">
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
                                </nav>


                                <!-- <div class="navbar-expand ml-auto mr-1">
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
                                </div> -->

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </header>