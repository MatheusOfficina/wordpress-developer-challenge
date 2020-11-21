<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/img/favicon.ico" />
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
    <header>
        <div class="container d-flex align-items-center d-sm-justify-content-center d-md-justify-content-between">
            <div class="logo">
                <a href="<?php echo get_home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" alt="<?php bloginfo('name'); ?>"></a>   
                </a>
            </div>
            <div class="header-menu d-none d-md-block">
                <?php theme_menu('main_menu'); ?>
            </div>         
        </div>
    </header>
  