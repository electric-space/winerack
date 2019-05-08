<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * Template Name: Apartments Inner
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package winerack
 */

get_header();?>


<?php
    
    
    if( get_the_post_thumbnail_url() ) {
        
        global $post;
        $post_slug = $post->post_name;
        
        $n = $post_slug[strlen($post_slug)-1];
        
    
        echo '<div class="banner" style="background-image: url('.get_the_post_thumbnail_url().')">';
        echo '<div class="title-wrapper">';  
        echo '<h1 class="entry-title">Apartments</h1>';
        echo '<img src="'.get_template_directory_uri().'/images/q'.$n.'-sold.svg" width="150" alt="Quarter 2 logo" />';        
        echo '</div>';
        echo '</div>';
    
    };?>    
    



<main id="main" class="site-main bgtile">
    
    <div class="left-column"></div>
    
    <?php gridwrapper( array('open', 'uk-margin-remove') );?>
    
        
            <div class="uk-width-5-6@m uk-align-center">

                <div class="uk-grid" uk-grid>
    
                    <div class="uk-width-1-1 first-section">
                        <?php the_content() ;?>
                    </div>
                </div>
                
            <?php include(locate_template('support/partials/page-columns.php'));?>
            
            <?php the_field('interior_specification', 8) ;?>
                
                
            </div>
            
    
    <?php gridwrapper( array('close') );?>
    
    <div class="right-column"></div>

    
</main><!-- #main -->
        
<?php get_footer();?>