<!-- This is the off-canvas sidebar -->

<a href="#mobile-nav" uk-toggle="target: #mobile-nav" class="uk-align-right burger-bar uk-margin-remove" uk-icon="icon: menu"></a>


<div class="uk-offcanvas-content">

    <div id="mobile-nav" uk-offcanvas="flip: true; overlay: true">
    
        <div class="uk-offcanvas-bar">
                
                <a class="uk-offcanvas-close" uk-close></a>

            
            <?php
    			wp_nav_menu( array(
    				'theme_location' => 'menu-1',
    				'menu_id'        => '',
    				'container'      => '',
    				'menu_class'     => 'mobile-menu'
    			) );?>
    	
        </div>
    </div>
    
</div>