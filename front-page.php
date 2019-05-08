<?php
/**
 * The template for displaying homepage
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package winerack
 */

get_header();?>


    <main id="main" class="bgtile">
        
        <div class="left-column"></div>
        
        <div class="uk-container uk-margin-remove">
            
            <div class="uk-grid" uk-grid>
                
                <div class="uk-width-5-6@m uk-align-center uk-margin-remove-bottom ">
                    
                        
                    <section class="intro uk-clearfix">
                        
                        <?php the_content() ;?>
                        
                    </section>
                        
                
                <?php // get the quarter content from the quarter pages;?>

                    <section class="page-sections">
                        <?php echo get_quarters() ;?>
                    </section>
                        
                    
                    <?php if( $gallery = get_field('gallery') ):
                        
                        $title = strip_tags($gallery['title'], '<a>');?>
    
                        <section class="gallery">
                            
                            <div class="uk-grid" uk-grid>
                            
                                <div class="uk-width-1-1">
                                    <h2><?php echo $title ;?></h2>
                                </div>
                                
                            </div>
                                    
                            <div class=" lightbox--wrapper" uk-grid uk-lightbox="animation:slide">
                                
                                <?php 
                                    
                                        
                                        foreach( $gallery['images'] as $image ){
                                            echo '<div class="uk-width-1-2@s">';
                                            
                                            echo '<a href="'.$image['image']['url'].'"><img src="'.$image['image']['sizes']['homegallery'].'" alt="'.$image['image']['alt'].'"></a>';
                                            
                                            echo '</div>';
                                            
                                            
                                            
                                        };?>
                                
                            </div>
                                
                        </section>
                        
                    <?php endif ;?>
                    
                    
                    
                    <?php if( $location = get_field('location') ):
                        
                        $title   = strip_tags( $location['title'], '<a>') ;
                        $content = $location['location_copy'];
                        $image   = $location['location_image'];?>
                        
    
                        <section class="location">
                            <div class="uk-grid" uk-grid>
                                <div class="uk-width-1-1">
                                    <h2><?php echo $title ;?></h2>
                                </div>
                                
                                <div class="uk-width-1-2@m">
                                    <p><img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'] ;?>"></p>
                                </div>
                                
                                <div class="uk-width-1-2@m">
                                    <?php echo $content ;?>
                                                
                                </div>
                                
                            </div>
                            
                        </section>
                        
                    <?php endif ;?>
                        
                </div>

            </div>

        </div>
        
        <div class="right-column"></div>
    
    </main>
    
        
<?php get_footer();?>

