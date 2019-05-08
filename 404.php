<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package winerack
 */

get_header();?>

<?php
    
    $hero = false;

    if( get_the_post_thumbnail_url(8) ) {
        $hero = true;
        
        echo '<div class="banner" style="background-image: url('.get_the_post_thumbnail_url(8).')">';
        echo '<h1>Missing page</h1>';
        echo '</div>';
        
    };?>



    <main id="main" class="bgtile site-main <?php if(!$hero) echo ' nobanner' ;?>">
        
        <div class="left-column"></div>
        
        <?php gridwrapper( array('open', 'uk-margin-remove') );?>
        
            <div class="uk-width-4-5@m uk-align-center">
        
		        <section class="error-404 not-found">
			
        			<header class="page-header">
        				
        				<h1 class="page-title"><?php esc_html_e( 'Sorry that page can&rsquo;t be found.', 'winerack' );?></h1>
        			</header><!-- .page-header -->

                    <div class="page-content">
                        <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'winerack' ); ?></p>

                        <?php //get_search_form(); ?>
                    
                    </div>

				
                </section><!-- .error-404 -->
		        
            </div>
		    
		 <?php gridwrapper( array('close') );?>
		
        <div class="right-column"></div>

	</main><!-- #main -->
		
    
<?php get_footer();?>
