<?php 
    
/**
 * Slider code for UiKit and custom fields    
 */
?>

<?php 
    
    if( $slider = get_field('slide') ): ;?>

    <section class="banner">
    
        <div class="uk-position-relative" uk-slideshow="autoplay: false; max-height:660">
            
            <div class="uk-visible-toggle">
            
                <ul class="uk-slideshow-items">
        
                <?php 
            	    foreach( $slider as $slide )
            	    {
                        echo '<li class="slide">
                                
                                <img src="'.$slide['image']['url'].'" alt="'.$slide['image']['alt'].'" uk-cover />';
                                        
                                if( $slide['caption'] )
                                {   
                                    echo '<div class="uk-width-1-2@m uk-position-center  uk-text-center uk-overlay uk-dark">';
                                    echo '<div class="caption-copy">'.$slide['caption'].'</div>';
                                    echo '</div>';
                                };
                                
                        echo '</li>';
                        
                    };?>
            
                </ul>
                
                
                
            </div>
            
            <ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-margin"></ul>
            
        </div>
        
    </section>
    
    <?php endif ;?>
    
    
    