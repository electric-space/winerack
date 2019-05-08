<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package winerack
 */

?>


<footer id="colophon" class="site-footer">
    
    
            <div class="uk-grid" uk-grid>
                <div class="uk-width-1-1 uk-align-center uk-margin-remove-bottom">
                    <?php echo do_shortcode('[instagram]') ;?>
                    <hr>
                    
                    <?php if( $partners = get_field('footer_links', 'options' ) ) {
                        echo '<ul class="footer-links">';
                        $disabled = '';
                        foreach( $partners as $partner ){
                            
                            if( !$partner['url'] ){
                                $disabled = 'class="disabled"'; 
                                   
                            }
                                
                           
                            
                            echo '<li><a href="'.$partner['url'].'" target="_blank" '.$disabled.'>'.$partner['display_text'].'</a></li>';
                            $disabled = '';
                        }
                        echo '</ul>';
                    };?>
                    
                   
                    <hr>
                    <p>&copy; <?php echo bloginfo('site');?> <?php echo date('Y') ;?>
                    <?php
            			wp_nav_menu( array(
            				'theme_location' => 'menu-2',
            				'menu_id'        => '',
            				'container'      => '',
            				'menu_class'     => 'footer-nav'
            			) );
            			?>
                    
                    <p><?php the_field('footer_attribution', 'option');?></p>
                    
                </div>
            </div>            
    
    
</footer><!-- #colophon -->




<?php wp_footer(); ?>
<script>$(window).on("load", function(){ $('body').addClass('loaded') });</script>
</body>
</html>
