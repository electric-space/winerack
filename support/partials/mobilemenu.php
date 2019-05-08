<!-- This is the off-canvas sidebar -->


<a href="#offcanvas-overlay" uk-toggle uk-icon="icon: menu" class="open-menu"></a>
<p class="menu-title"><a href="#offcanvas-overlay" class="open-menu" uk-toggle>menu</a></p>

<div id="offcanvas-overlay" uk-offcanvas="flip: true">
    
    <div class="uk-offcanvas-bar">
        
        <div class="close-wrapper">
            <a class="close-menu uk-offcanvas-close" uk-close>Close</a>
        </div>
        
        
        <?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => '',
				'container'      => '',
				'menu_class'     => 'mobile-menu'
			) );?>
    </div>
</div>