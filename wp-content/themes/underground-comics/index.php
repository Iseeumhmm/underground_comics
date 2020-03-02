<?php

/**
 * The main template file
 *
 *
 * @package Underground Comics
 */
?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/inc/page-php.css">
<?php
get_header();
?>

<div class="content-area">
    <main>
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
    </main>
</div>
<?php get_footer(); ?>