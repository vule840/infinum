<?php
function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), false);
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    wp_enqueue_script( 'owl-carusel', get_stylesheet_directory_uri() . '/js/owl.carousel.js', array(), $the_theme->get( 'Version' ), true );
    wp_enqueue_script( 'skripte', get_stylesheet_directory_uri() . '/js/skripte.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
// svg support
function cc_mime_types($mimes) {
 $mimes['svg'] = 'image/svg+xml';
 return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


// add custom class to tag
function add_class_the_tags($html){
    $postid = get_the_ID();
    $html = str_replace('<a','<a class="tags_class"',$html);
    return $html;
}
add_filter('the_tags','add_class_the_tags');


//dodaj novvi sidebar
        register_sidebar( array(
            'name'          => __( 'newsletter', 'understrap' ),
            'id'            => 'newsletter',
            'description'   => 'newsletter widget area',
            'before_widget' => '<aside id="%1$s" class="widget">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );






add_shortcode('my_blockquote', 'my_blockquote');
function my_blockquote($atts, $content) {
    return '<div class="span3 quote well">'.PHP_EOL
        .'<i class="icon-quote-left icon-2x pull-left icon-muted"></i>'.PHP_EOL
        .'<blockquote class="lead">'.$content.'</blockquote>'.PHP_EOL
        .'</div>';
}      

// Send Gill to get paint
/*add_action( 'loop_start' , 'send_gill_to_get_paint', 10 , 2 );
function send_gill_to_get_paint(  ) {

    echo 'Gill, please go to the store and get some paint. Thank you!';
  
}*/