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
            <div class="row">
                <div class="col-md-2 col-12"></div>
                <div class="col-md-2 col-12"></div>
                <div class="col-md-2 col-12"></div>
                <div class="col-md-2 col-12"></div>
                <div class="col-md-2 col-12"></div>
                <div class="col-md-2 col-12"></div>
            </div>
        </div>
    </section>
    <div class="container-fluid ftr_container">
        <div class="row">
            <div class="col-md-5 col-12">
                <img src="<?php echo get_stylesheet_directory_URI(); ?>/img/batman.png" alt="Batman" class="batman">
            </div>
            <div class="col-md-7 col-12">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <h2>My Cart</h2>
                            <?php wp_nav_menu(
                                array(
                                    'theme_location'      =>  'underground_comic_collections_menu'
                                )
                            ); ?>
                        </div>
                        <div class="col-md-4 col-12">
                            <h2>Collections</h2>
                            <?php wp_nav_menu(
                                array(
                                    'theme_location'      =>  'underground_comic_cart_menu'
                                )
                            ); ?>
                        </div>
                        <div class="col-md-4 col-12">
                            <h2>Contact</h2>
                            <ul>
                                <li>Aylmer, ON Canada</li>
                                <li style="padding: 1rem;"> </li>
                                <li>Send an email</li>
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