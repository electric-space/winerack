<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package winerack
 */

get_header();?>

    <main id="main" class="site-main nobanner bgtile">
        
        <div class="left-column"></div>
        
        <?php gridwrapper( array('open', 'uk-margin-remove') );?>
        
            <div class="uk-width-4-5@m uk-align-center">

        		<?php
        		while ( have_posts() ) : the_post();
        		
        		    if ( has_post_thumbnail() )the_post_thumbnail('fullpost'); 
        
                    the_title('<h1>', '</h1>');
                    
                    the_content();
                    
                    
        			the_post_navigation();
        
        			// If comments are open or we have at least one comment, load up the comment template.
        			if ( comments_open() || get_comments_number() ) :
        				comments_template();
        			endif;
        
        		endwhile; // End of the loop.?>
        		
            </div>
            
        <?php gridwrapper( array('close') );?>
        
        <div class="right-column"></div>
        
    </main><!-- #main -->

        
<?php get_footer();?>
