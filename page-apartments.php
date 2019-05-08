<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * Template Name: Apartments
 * @package winerack
 */

get_header();?>


<?php
    
    $hero = false;
    
    if( get_the_post_thumbnail_url() ) {
        
        
        $hero = true;
        
        echo '<div class="banner" style="background-image: url('.get_the_post_thumbnail_url().')">';
            the_title( '<h1 class="entry-title">', '</h1>' );
        echo '</div>';
    };?>    
    


<main id="main" class="site-main bgtile <?php if(!$hero) echo ' nobanner' ;?>">
    
    <div class="left-column"></div>
        
    <div class="uk-container uk-margin-remove">
            
        <div class="uk-grid" uk-grid>

            <?php if( !$hero )  the_title( '<h1 class="entry-title">', '</h1>' ) ;?>
    
                <div class="uk-width-5-6@m uk-align-center first-section">
            
                    <div class="uk-grid" uk-grid>
                        
                        <div class="uk-width-1-1">
                        <?php 
                            if(have_posts()) : 
                            		
                            		while(have_posts()) : the_post(); 
                            
                            			the_content();
                            			
                            		endwhile;
                            		
                            	else:
                            
                            		echo '<p>Sorry there are no posts.</p>';
                            
                                endif;?>
                                
                        </div>
                        
                    </div>
                    
                    <?php  // quad
                        if( $columns = get_field('columns') ){
                            foreach( $columns as $column ){
                                if( $column['acf_fc_layout'] == 'quad_columns'):;?>
                                    <div class="uk-grid uk-margin-large-top uk-text-center floor-plan-icons" uk-grid>
                                        <div class="uk-width-1-4@m">
                                            <?php echo $column['col1'] ;?>
                                        </div>
                                        <div class="uk-width-1-4@m">
                                            <?php echo $column['col2'] ;?>
                                        </div>
                                        <div class="uk-width-1-4@m">
                                            <?php echo $column['col3'] ;?>
                                        </div>
                                        <div class="uk-width-1-4@m">
                                            <?php echo $column['col4'] ;?>
                                        </div>                
                                    </div>
                                
                                <?php endif ;?>
                            
                        <?php } } ;?>

                
                
                    <div class="uk-margin-large-top">
                        <?php echo get_quarters() ;?>
                        </div>
                            
                    
                        
                </div>
            
        </div>
            
    </div>
    
    <div class="right-column"></div>
    
</main><!-- #main -->
        
<?php get_footer();?>