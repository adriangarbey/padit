<?php
/**
 * Header file for the Padit theme.
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php
wp_body_open();
?>
<header id="header" class="header site-header" role="banner">
    <div class="header-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex align-items-center header-inner-row-1">
                    <?php
                    $logo = get_template_directory_uri() . '/images/logo.svg';
                    ob_start();
                    ?>
                    <div class="header-logo d-flex align-items-center">
                        <div class="header-logo-image">
                            <?php echo get_custom_logo(); ?>
                        </div>
                        <div class="menu-icon-open">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/menu.svg'; ?>" />
                        </div>
                    </div>
                    <div class="header-options flex-1 d-flex align-items-center justify-content-end">
                        <div class="header-search">
                            <form role="search" method="post"
                                  class="header-search-form search-form d-flex align-items-center">
	                            <?php wp_nonce_field('header_search'); ?>
                                <input id="search" type="search"
                                       autocomplete="off"
                                       class="input-search-field"
                                       placeholder="<?php echo esc_attr_x('Buscar...', 'placeholder') ?>"
                                       value="<?php get_search_query() ?>"
                                       name="s"/>
                                <button type="submit" class="closed-search">Buscar</button>
                            </form>
                        </div>
                        <div class="header-social-networks d-flex align-items-center justify-content-end">
                         <?php echo do_shortcode('[redes_sociales]'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-main-menu">
                <div class="col-md-12">
                    <div class="menu-icono-close">
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/close.svg'; ?>" />
                    </div>
	                <?php wp_nav_menu( array( 'theme_location' => 'main_menu' ) ); ?>
                </div>
            </div>
        </div>
    </div>
</header>
