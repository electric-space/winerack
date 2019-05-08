<?php
/**
 * winerack functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package winerack
 */

if ( ! function_exists( 'winerack_setup' ) ) :

    require( 'support/helper_funcs.php');


	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function winerack_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on winerack, use a find and replace
		 * to change 'winerack' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'winerack', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		
		add_image_size('homegallery', 465, 465, true);
		add_image_size('maingallery', 550, 390, true);
		add_image_size('post', 240, 240, true);
        add_image_size('fullpost', 1148, 415, true);

		
		

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'winerack' ),
			'menu-2' => esc_html__( 'Footer', 'winerack' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'winerack_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'winerack_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function winerack_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'winerack_content_width', 640 );
}
add_action( 'after_setup_theme', 'winerack_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function winerack_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'winerack' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'winerack' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'winerack_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function winerack_scripts() {
	
	
	
    //CSS
	wp_enqueue_style( "winerack-uikit", '//cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.17/css/uikit.min.css', 0, 0, 'screen');
	wp_enqueue_style( 'winerack-style', get_stylesheet_uri() );
                    
    // SCRIPT
    wp_deregister_script('jquery');
	wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js', 0, null, 1);
	wp_enqueue_script( "winerack-uikt", '//cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.17/js/uikit.min.js', array('jquery'), 0, 1);
	wp_enqueue_script( "winerack-uikt-icons", '//cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.17/js/uikit-icons.min.js', 0, 0, 1);
	

    wp_enqueue_script( "winerack-vimeo", '//player.vimeo.com/api/player.js', 0, 0, 0);	

	
	wp_enqueue_script( "winerack-main", get_template_directory_uri().'/js/main.js', array('jquery'), 0, 1);	
	

	wp_enqueue_script( 'winerack-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'winerack-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	
	
}
add_action( 'wp_enqueue_scripts', 'winerack_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}





// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_2( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
// Register our callback to the appropriate filter
//add_filter('mce_buttons_2', 'my_mce_buttons_2');





// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {  
    // Define the style_formats array
    $style_formats = array(  
        // Each array child is a format with it's own settings
        array(  
            'title' => 'Make button',  
            'selector' => 'a',  
            'classes' => 'button'             
        ),
        
        array(  
            'title' => 'Adds a SOLD class',  
            'selector' => 'div',  
            'classes' => 'apt-sold'             
        ),
        
        
    );  
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );  

    return $init_array;  

} 
// Attach callback to 'tiny_mce_before_init' 
//add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );



