<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>

<header class="header">
    <div class="header__content">
        <nav class="navbar navbar-expand-md navbar-light row">
            <?php if($logo = get_field('logo', 'options')): ?>
                <div class="header__logo col-4 col-md-2 col-xl-1">
                    <a href="#"><img class="img-contain" src="<?php echo $logo['sizes']['medium'] ?>" alt="logo"></img></a>
                </div>
            <?php endif; ?>

                <?php wp_nav_menu(
                    array(
                        'menu' => 'header',
                        'container' => 'div',
                        'container_class'   => 'collapse navbar-collapse header__menu col-lg-9 col-xl-8',
                        'container_id'      => 'navbarMenuContent',
                        'menu_class'        => 'nav justify-content-start',
                        'link_before' => '<span class="nav-link px-2">',
                        'link_after' => '</span>',
                    )); ?>

            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarMenuContent" aria-controls="navbarMenuContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-dark"></span>
                <span class="close text-dark mr-1">&times</span>
            </button>

            <div class="header__button col-md-3 col-xl-3 text-right">
                <button class="btn button-menu rounded-pill">
                    <?php
                    $link = get_field('get_start_button_text', 'options');
                    if( $link ):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <a class="text-dark" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>
                </button>
            </div>
        </nav>
    </div>
</header>
