<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * Template Name: Page Sections
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package winerack
 */

get_header();?>


<?php
    
    $hero = false;
    
    if( get_the_post_thumbnail_url() ) {
        
        $hero = true;
        
        echo '<div class="banner" style="background-image: url('.get_the_post_thumbnail_url().')">';
            if( !is_page(677) ){ // help to buy
                the_title( '<h1 class="entry-title">', '</h1>' );
            }else{
                echo '<img src="'.home_url().'/wp-content/uploads/2019/04/Asset-3.svg" alt="Help to buy logo" width="240" class="help-to-buy-logo" />';
            }
        echo '</div>';
    
    };?>    
    



<main id="main" class="site-main bgtile <?php if(!$hero) echo ' nobanner' ;?>">
    
    <div class="left-column"></div>
    
    <?php gridwrapper( array('open', 'uk-margin-remove') );?>
    
        <?php if( !$hero )  the_title( '<h1 class="entry-title">', '</h1>' ) ;?>
        
            <?php if( is_page(677) ): // help to buy page ;?>
            
                <div class="uk-width-1-1 first-section">
                    <?php the_content() ;?>
                </div>
            
            
            <?php endif ;?>
        
        
        
            <div class="uk-width-5-6@m uk-align-center first-section">
                
                <?php include(locate_template('support/partials/page-columns.php'));?>
                
                
            </div>
            
    
    <?php gridwrapper( array('close') );?>
    
    <div class="right-column"></div>

    
</main><!-- #main -->
        
<?php get_footer();?>