<?php

/**
 * The main template file
 *
 *
 * @package Underground Comics
 */

?>

<footer>
    <section class="instagram">
        <div class="container-fluid p-0">
            <!-- LightWidget WIDGET --><script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script><iframe src="//lightwidget.com/widgets/90ebc066df105ae68e1dc7579154403c.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe>

        </div>
    </section>
    <div class="container-fluid ftr_container">
        <div class="row">
            <div class="col-xl-5 col-12">
                <img src="<?php echo get_stylesheet_directory_URI(); ?>/img/batman.png" alt="Batman" class="batman">
            </div>
            <div class="col-xl-7 col-12">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-xl-4 col-12">
                            <h2>Collections</h2>
                            <?php wp_nav_menu(
                                array(
                                    'theme_location' =>  'under_ground_comics_footer_menu'
                                )
                            ); ?>
                        </div>
                        <div class="col-xl-4 col-12">
                            <h2>My Cart</h2>
                            <?php wp_nav_menu(
                                array(
                                    'theme_location' =>  'underground_comic_cart_menu'
                                )
                            ); ?>
                        </div>
                        <div class="col-xl-4 col-12">
                            <?php $email = get_theme_mod('set_footer_email', ''); ?>
                            <h2>Contact</h2>
                            <ul>
                                <li>Aylmer, ON Canada</li>
                                <li style="padding: 1rem;"> </li>
                                <li><a href="mailto: <?php echo $email; ?>">Send an email</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>