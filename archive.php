<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package winerack
 */

get_header();?>
    
    <main id="main" class="site-main nobanner bgtile">
        
        <div class="left-column"></div>
        
        <?php gridwrapper( array('open', 'uk-margin-remove') );?>
        
            <div class="uk-width-4-5@m uk-align-center">

        		<?php if ( have_posts() ) : ?>
        
        			<header class="page-header">
        				<?php
        				the_archive_title( '<h1 class="page-title">', '</h1>' );
        				the_archive_description( '<div class="archive-description">', '</div>' );
        				?>
        			</header><!-- .page-header -->
        
        			<?php
        			/* Start the Loop */
        			while ( have_posts() ) :
        				the_post();
        
        				/*
        				 * Include the Post-Type-specific template for the content.
        				 * If you want to override this in a child theme, then include a file
        				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
        				 */
        				get_template_part( 'template-parts/content', get_post_type() );
        
        			endwhile;
        
        			the_posts_navigation();
        
        		else :
        
        			get_template_part( 'template-parts/content', 'none' );
        
        		endif;?>
        		
            </div>
            
        <?php gridwrapper( array('close') );?>
        
        <div class="right-column"></div>

    </main><!-- #main -->

    
<?php get_footer(); ;?>
