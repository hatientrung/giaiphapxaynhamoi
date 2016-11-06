<?php
/**
 * The template for displaying the home page panel. Requires SiteOrigin page builder plugin.
 *
 * Template Name: Page Builder Home
 *
 * @package vantage
 * @since vantage 1.0
 * @see http://siteorigin.com/page-builder/
 * @license GPL 2.0
 */
get_header();
?>

<div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">
        <div class="entry-content">
            <?php if (is_active_sidebar('block-services')) : ?>
                <?php dynamic_sidebar('block-services'); ?>
            <?php endif; ?>
<!--             <?php
            //if (is_page()) {
                the_post();
                the_content();
           // } else if (function_exists('siteorigin_panels_render'))
            //    echo siteorigin_panels_render('home');
           // else
            //    echo siteorigin_panels_lite_home_render();
            ?> -->
        </div>
        <!-- after block service put here -->
        <div class="thiet_ke1">
            <section class="banner-section">
                <div class="container">
                    <h2>Thiết kế nhà - thư ngỏ<a class="button-one" href="#">click here</a></h2>
                </div>
            </section>
        </div>
    </div><!-- #content .site-content -->
</div><!-- #primary .content-area -->

<?php get_footer(); ?>