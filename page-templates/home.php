<?php
/**
 * Template Name: Home Page
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

        <?php $hero_section_bgimage = get_field('hero_section_bgimage') ?>
        <section class="hero" id="home" style="background-image: url('<?php echo $hero_section_bgimage ?>'); ">
            <div class="container d-flex flex-column justify-content-center">

                <div class="row hero-section__title ">
                    <div class="col-11 col-md-8 col-lg-6 mx-auto mx-lg-0">
                        <?php if ($hero_section_title = get_field('hero_section_title')): ?>
                            <h1 class="mb-34 h1"><?php echo $hero_section_title ?></h1>
                        <?php endif; ?>
                    </div>
                    <div class="hero-section__content col-7 mx-auto mx-lg-0 ">

                        <?php if ($hero_section_subtitle = get_field('hero_section_subtitle')): ?>
                            <p class="hero-section__subtitle text-light "><?php echo $hero_section_subtitle ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>




    <?php endwhile; ?>
<?php endif; ?>

<?php

get_footer();
