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


//add new unicorn post type

 if ( ! function_exists('better_unicorn') ) {

// Register Custom Post Type
function better_unicorn() {

    $labels = array(
        'name'                  => _x( 'better_unicorns', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'better_unicorn', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'better unicorn', 'text_domain' ),
        'name_admin_bar'        => __( 'New unicorns', 'text_domain' ),
        'archives'              => __( 'Item Archives', 'text_domain' ),
        'attributes'            => __( 'Item Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
        'all_items'             => __( 'All Items', 'text_domain' ),
        'add_new_item'          => __( 'Add New Item', 'text_domain' ),
        'add_new'               => __( 'Add New unicorn', 'text_domain' ),
        'new_item'              => __( 'New Item', 'text_domain' ),
        'edit_item'             => __( 'Edit Item', 'text_domain' ),
        'update_item'           => __( 'Update Item', 'text_domain' ),
        'view_item'             => __( 'View Item', 'text_domain' ),
        'view_items'            => __( 'View Items', 'text_domain' ),
        'search_items'          => __( 'Search Item', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
        'items_list'            => __( 'Items list', 'text_domain' ),
        'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'better_unicorn', 'text_domain' ),
        'description'           => __( 'better_unicorn', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'better_unicorn', $args );

}
add_action( 'init', 'better_unicorn', 0 );

} 



add_shortcode('my_blockquote', 'my_blockquote');
function my_blockquote($atts, $content) {
    return '<div class="span3 quote well">'.PHP_EOL
        .'<i class="icon-quote-left icon-2x pull-left icon-muted"></i>'.PHP_EOL
        .'<blockquote class="lead">'.$content.'</blockquote>'.PHP_EOL
        .'</div>';
}      

// Send Gill to get paint
add_action( 'loop_start' , 'send_gill_to_get_paint', 10 , 2 );
function send_gill_to_get_paint(  ) {
  // If $gill_has_keys and $gill_has_car are both true
  
    echo 'Gill, please go to the store and get some paint. Thank you!';
  
}