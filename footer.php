<?php
/**
* The template for displaying the footer
*
* Contains the closing of the #content div and all content after
*
* @package UnderStrap
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php wp_footer(); ?>

<section class="footer" id="contact">
    <div class="footer__wrapper">
        <div class="container pr-md-0">
            <div class="row footer-content">
                <div class="col-12 col-md-2 pl-3 pl-xxl-0">
                    <?php if($logo = get_field('logo', 'options')): ?>
                        <div class="footer__logo">
                            <a href="#"><img class="img-contain" src="<?php echo $logo['sizes']['medium'] ?>" alt="logo"></img></a>
                        </div>
                    <?php endif; ?>
                    <?php if($footer_copyright = get_field('footer_copyright', 'options')): ?>
                        <p class="footer__copyright"><?php echo $footer_copyright ;?></p>
                    <?php endif; ?>
                </div>

                <div class="col-12 col-md-2 footer__menu">
                    <?php if($footer_menu_title = get_field('footer_menu_title', 'options')): ?>
                        <h6 class="footer-title"><?php echo $footer_menu_title ;?></h6>
                    <?php endif; ?>

                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location'  => 'primary',
                            'container_class' => '',
                            'container_id'    => '',
                            'menu_class'      => 'navbar-nav ml-auto',
                            'fallback_cb'     => '',
                            'menu_id'         => 'main-menu',
                            'link_before' => '<span class="nav-link">',
                            'link_after' => '</span>',
                        )
                    );
                    ?>
                </div>

                <div class="col-12 col-md-3 footer__contacts pl-md-0">
                    <?php if($footer_info_title = get_field('footer_info_title', 'options')): ?>
                        <h6 class="footer-title"><?php echo $footer_info_title ;?></h6>
                    <?php endif; ?>

                    <?php if( have_rows('contacts_footer', 'options') ): ?>
                        <?php while( have_rows('contacts_footer', 'options') ) : the_row(); ?>

                                <?php
                                $link = get_sub_field('contact_footer', 'options');
                                if( $link ):
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>
                                    <a class="text-decoration-none d-inline-block contact-link"
                                       href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                                        <?php echo esc_html( $link_title ); ?>
                                    </a>
                                <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="col-12 col-xxl-3 footer__social d-flex pr-0">
                    <?php if( have_rows('footer_social_links', 'options') ): ?>
                        <?php while( have_rows('footer_social_links', 'options')) : the_row();
                            $footer_social_link_icon = get_sub_field('footer_social_link_icon');
                            $footer_social_icon = get_sub_field('footer_social_icon'); ?>
                            <div class="social-wrapper rounded-circle bg-light position-relative">
                                <a class="" href="<?php echo $footer_social_link_icon; ?>" target="_blank">
                                    <img class="social-wrapper__icon position-absolute" src="<?php echo $footer_social_icon; ?>">
                                </a>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>


</body>

</html>
