<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php bloginfo('name'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <h1 class="site-title">
                    <?php if ( ! empty( get_bloginfo( 'name' ) ) ) : ?>
                        <?php bloginfo( 'name' ); ?>
                    <?php endif; ?>
                </h1>
                <p class="site-description">
                    <?php echo get_bloginfo( 'description' ); ?>
                </p>
            </a>
            <button class="navbar-toggler"
                    type="button" data-toggle="collapse"
                    data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav">
                    <?php if ( has_nav_menu( 'main-menu' ) ) : ?>
                        <?php wp_nav_menu(
                            array(
                                'theme_location' => 'main-menu',
                                'menu_class'     => 'main-menu navbar-nav ml-auto',
                            ));
                        ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
</header>