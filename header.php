<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package winerack
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	

	
	
</head>

<body <?php body_class(); ?>>
	
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'winerack' ); ?></a>
	
	<header id="masthead" class="site-header">
    	
            <div class="uk-container uk-height-1-1">
                <div class="uk-grid uk-flex uk-flex-middle uk-flex-center uk-height-1-1">
                    
                    <div class="uk-width-1-3@m uk-width-2-3">
                        <a href="<?php echo home_url() ;?>"><img src="<?php bloginfo('template_directory') ;?>/images/wr_logotype.svg" alt="The Winerack Apartments" class="logo-type" /></a>
                    </div>

                    <div class="uk-width-2-3@m uk-width-1-3 uk-flex uk-flex-middle uk-flex-right">
                        <nav id="site-navigation" class="main-navigation">
                            <?php get_template_part('support/partials/mobilemenu') ;?>
                        </nav>
                    </div>
                </div>
            </div>

	</header><!-- #masthead -->
	
    <?php if( is_front_page() ): ;?>
    
        <?php get_template_part('support/partials/slideshow-uikit') ;?>
    <?php endif ;?>


	
	

