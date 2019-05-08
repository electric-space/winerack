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
 *
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
            
                <div class="uk-width-5-6@m first-section uk-align-center">
                    
                <?php
                        
                    // main gallery page
                    if( is_page(10) ){;?>
                        
                        
                        
                        <div class="main-gallery-wrapper" uk-lightbox>
                            
                        <?php
                            if( $gallery = get_field('page_gallery')){
                    			$n=0;
                    			$c = count($gallery);
                    			
                    			for( $n=0; $n<$c; $n++ ){
                        			$url = $gallery[$n]['image']['url'];
                        			$url2 = $gallery[$n+1]['image']['url'];
                        			$thumb = $gallery[$n]['image']['sizes']['maingallery'];
                        			$thumb2 = $gallery[$n+1]['image']['sizes']['maingallery'];
                        			
                        			echo '<div class="row">';
                        			echo '<div><div  class="image-wrap" style="background-image: url('.$thumb.')"><a href="'.$url.'"></a></div></div>';
                                    echo '<div><div  class="image-wrap" style="background-image: url('.$thumb2.')"><a href="'.$url2.'"></a></div></div>';
                                    echo '</div>';
                                    
                                    $n++;
    
                    			}
    
                			};?>
                			
                			
            			    <h2 class="nologo uk-text-center">Films</h2>
            			    
            			
                			    
                            <?php if( $films = get_field('vimeo_links') ): ;?>
                            <?php 
                                
                                foreach( $films as $film ){;?>
                                    
                                    <div class="row video--wrapper">
                                        <div>
                                            <div class="image-wrap">
                                			        <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/<?php echo $film['vimeo_id'] ;?>?title=0&byline=0&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>
                                                                			 
                                            </div>
                                            <p class="video-credit"><?php echo $film['video_credit'] ;?></p>
                                        </div>
                                    </div>
                                    
                            <?php } ;?>
                            
                            
                            <script src="https://player.vimeo.com/api/player.js"></script>
                                
                            
                			<?php endif ;?>
                                
                            
                            
                            
                            <h2 class="nologo">Panorama</h2>
                            
                            
                            <div class="row pano--wrapper">
                                <div class="image-wrap uk-width-1-1">
                                    <iframe src="<?php bloginfo('template_directory');?>/panorama/panorama_wr/wr.php"></iframe>
                                </div>
                                <p class="video-credit">Credit: Eric Orme, Place Photography</p>
                            </div>
                            
                            
                            
                            
                            
                			
                			
                            
                        </div> 
                            
                    <?php    
                        
                    //contact
                    }else{
                        	
                        if(have_posts()) : 
                            
                            while(have_posts()) : the_post(); 
                    
                                the_content();
                                
                            endwhile;
                            
                        else:
                    
                            echo '<p>Sorry there are no posts.</p>';
                    
                        endif;
                            
                    };?>
                    
                        
                    
                </div>
                
            </div>
        
        </div>
        
        <div class="right-column"></div>
        
    </main><!-- #main -->
        
<?php get_footer();?>