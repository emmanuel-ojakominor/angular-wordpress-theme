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
    <main>
        <div class="container">
            <!-- WordPress Static Home Page ('AppRoot') contains "<app-root></app-root>"  -->
            <?php while(have_posts()) : the_post(); ?>
                <div><?php the_title(); ?></div>
                <div><?php the_content(); ?></div>
            <?php endwhile; ?>
        </div>
    </main>
</body>
<?php wp_footer(); ?>
</html>