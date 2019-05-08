<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package winerack
 */

get_header();?>

<?php
    
    $hero = false;

    if( get_the_post_thumbnail_url(8) ) {
        $hero = true;
        
        echo '<div class="banner" style="background-image: url('.get_the_post_thumbnail_url(8).')">';
        echo '<h1>';
            printf( esc_html__( 'Search Results for: %s', 'winerack' ), get_search_query() );
        echo '</h1>';
        echo '</div>';
        
    };?>


    <main id="main" class="site-main bgtile <?php if(!$hero) echo ' nobanner' ;?>">
        
        <div class="left-column"></div>
        
        <?php gridwrapper( array('open', 'uk-margin-remove') );?>
        
            <div class="uk-width-4-5@m uk-align-center">

    		<?php if ( have_posts() ) : ?>
    
    			<?php
    			/* Start the Loop */
    			while ( have_posts() ) :
    				the_post();
    
    				/**
    				 * Run the loop for the search to output the results.
    				 * If you want to overload this in a child theme then include a file
    				 * called content-search.php and that will be used instead.
    				 */
    				get_template_part( 'template-parts/content', 'search' );
    
    			endwhile;
    
    			the_posts_navigation();
    
    		else :
    
    			get_template_part( 'template-parts/content', 'none' );
    
    		endif;?>
    		
    		
        </div>
    		
		<?php gridwrapper( array('close') );?>
		
		<div class="right-column"></div>

    </main><!-- #main -->


<?php get_footer() ;?>
