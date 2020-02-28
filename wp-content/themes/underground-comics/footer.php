<?php

/**
 * The main template file
 *
 *
 * @package Underground Comics
 */

?>

<footer>
    <section class="copyright">
        <div class="container">
            <div class="row">
                <div class="copyright-text col-12 col-md-6">Copyright</div>
                <div class="footer-menu col-12 col-md-6 text-left text-md-right">
                    <?php wp_nav_menu(
                        array(
                            'theme_location'      =>  'underground_comics_footer_menu'
                        )
                    ); ?>
                </div>
            </div>
        </div>
    </section>
    <div class="container-fluid footer_container">
        <div class="row">
            <div class="col-md-5 col-12">
                <img src="<?php echo get_stylesheet_directory_URI(); ?>/img/batman.png" alt="Batman" class="batman">
            </div>
            <div class="col-md-7 col-12">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <ul>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                        </div>
                        <div class="col-md-4 col-12">
                            <ul>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                        </div>
                        <div class="col-md-4 col-12">
                            <ul>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
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