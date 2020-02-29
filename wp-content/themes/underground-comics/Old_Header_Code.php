<?php if (class_exists('WooCommerce')) : ?>
    <div class="brand col-md-3 col-12 col-lg-2 text-center text-md-left">
        <a href="<?php echo home_url('/'); ?>">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <p class="site-title"><?php bloginfo('title') ?></p>
                <span><?php bloginfo('description') ?></span>
            <?php endif; ?>
        </a>
    </div>
    <div class="second-column col-md-9 col-12 col-lg-10">
        <div class="row">
            <div class="account col-12">
                <div class="navbar-expand">
                    <ul class="navbar-nav float-left">
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
                <div class="cart text-right">
                    <a href="<?php echo wc_get_cart_url(); ?>"><span class="cart-icon"></span></a>
                    <span class="items"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                </div>
            </div>
            <div class="col-12">
                <nav class="main-menu navbar navbar-expand-md navbar-light" role="navigation">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <?php
                    wp_nav_menu(array(
                        'theme_location'    => 'underground_comics_main_menu',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_class'   => 'collapse navbar-collapse',
                        'container_id'      => 'bs-example-navbar-collapse-1',
                        'menu_class'        => 'nav navbar-nav',
                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'            => new WP_Bootstrap_Navwalker(),
                    ));
                    ?>
                </nav>
            </div>
        </div>
    </div>
<?php endif; ?>









<section class="search">
    <div class="container">
        <div class="text-center d-md-dflex align-items-center">
            <?php get_search_form(); ?>
        </div>
    </div>
</section>





// Slider

<section class="slider">
            <!-- Place somewhere in the <body> of your page -->
            <div class="flexslider">
                <ul class="slides">
                    <?php

                    for ($i = 0; $i <= 3; $i++) :
                        $slider_page[$i]        = get_theme_mod('set_slider_page' . $i);
                        $slider_button_text[$i] = get_theme_mod('set_slider_button_text' . $i);
                        $slider_button_url[$i]  = get_theme_mod('set_slider_button_url' . $i);
                    endfor;

                    $args = array(
                        'post_type'             =>  'page',
                        'posts_per_page'        =>  3,
                        'post__in'              =>  $slider_page,
                        'orderby'               =>  'post__in'
                    );

                    $slider_loop = new WP_Query($args);
                    $j = 1;
                    if ($slider_loop->have_posts()) :
                        while ($slider_loop->have_posts()) :
                            $slider_loop->the_post();

                    ?>
                            <li>
                                <?php the_post_thumbnail('underground-comics-slider', array('class' => 'img-fluid')) ?>
                                <div class="container">
                                    <div class="slider-details-container">
                                        <div class="slider-title">
                                            <h1><?php the_title(); ?></h1>
                                        </div>
                                        <div class="slider-description">
                                            <div class="subtitle"><?php the_content(); ?></div>
                                            <a href="<?php echo $slider_button_url[$j]; ?>" class="link"><?php echo $slider_button_text[$j]; ?></a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                    <?php
                            $j++;
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </ul>
            </div>
        </section>


        <!-- Blog -->

        <section class="lab-blog">
            <div class="container">
                <div class="row">
                    <?php
                    if (have_posts()) :
                        while (have_posts()) : the_post();
                    ?>
                            <article>
                                <h2><?php the_title(); ?></h2>
                                <div><?php the_content(); ?></div>
                            </article>
                        <?php
                        endwhile;
                    else :
                        ?>
                        <p>Nothing to Display</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>


<!-- 
        POPULAR PRODUCTS -->

        <?php if (class_exists('WooCommerce')) : ?>
            <section class="popular-products">
                <?php
                $popular_limit              = get_theme_mod('set_popular_max_num', 4);
                $popular_columns            = get_theme_mod('set_popular_max_col', 4);
                $new_arrivals_limit         = get_theme_mod('set_new_arrivals_max_num', 4);
                $new_arrivals_columns       = get_theme_mod('set_new_arrivals_max_col', 4);
                ?>
                <div class="container">
                    <h2>Popular Products</h2>
                    <?php echo do_shortcode('[products limit=" ' . $popular_limit . ' " columns=" ' . $popular_columns . ' " orderby="popularity"]'); ?>
                </div>
            </section>
            <section class="new-arrivals">
                <div class="container">
                    <h2>New Arrival</h2>
                    <?php echo do_shortcode('[products limit=" ' . $new_arrivals_limit . ' " columns=" ' . $new_arrivals_columns . ' " orderby="popularity"]'); ?>
                </div>
            </section>

        <?php endif; ?>