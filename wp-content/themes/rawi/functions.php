<?php

/**
* USUŃ WP EMOJI
*/
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );


/**
* DODAJ WIDŻETY
*/

function my_register_sidebars() {
    /* Register widget. */
    register_sidebar(
        array(
            'id'            => 'telefon',
            'name'          => __( 'Telefon kontaktowy' ),
            'description'   => __( 'Telefon kontaktowy' ),
        )
    );

    /* Register widget. */
    register_sidebar(
        array(
            'id'            => 'godzinyotwarcia',
            'name'          => __( 'Godziny otwarcia' ),
            'description'   => __( 'Godziny otwarcia' ),
        )
    );

    /* Register widget. */
    register_sidebar(
        array(
            'id'            => 'adres',
            'name'          => __( 'Adres' ),
            'description'   => __( 'Adres' ),
        )
    );
}

add_action( 'widgets_init', 'my_register_sidebars' );


/**
* WYŁĄCZ TE NOWE WIDŻETY NA LITOŚĆ BOSKĄ
*/

function example_theme_support() {
    remove_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'example_theme_support' );


/**
* WYŁĄCZ GUTENBERGA ALE TYLKO NA STRONACH
*/

add_filter( 'use_block_editor_for_post_type', 'prefix_disable_gutenberg', 10, 2 );
function prefix_disable_gutenberg( $current_status, $post_type ) {
    if ( 'page' === $post_type ) return false;
    return $current_status;
}


/**
* WIELKOŚCI FEATURED IMAGES I NIE TYLKO
*/

add_theme_support( 'post-thumbnails' ); 

// without parameter -> Post Thumbnail (as set by theme using set_post_thumbnail_size())
the_post_thumbnail();

the_post_thumbnail('thumbnail');       // Thumbnail (default 150px x 150px max)
the_post_thumbnail('medium');          // Medium resolution (default 300px x 300px max)
the_post_thumbnail('medium_large');    // Medium Large resolution (default 768px x 0px max)
the_post_thumbnail('large');           // Large resolution (default 1024px x 1024px max)
the_post_thumbnail('full');            // Original image resolution (unmodified)

the_post_thumbnail(array(360,360) );  // Other resolutions

add_image_size('aktualnosc', 380, 380);

the_post_thumbnail('post-thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image', 'alt' => get_the_title()]);

function wpdocs_post_image_html( $html, $post_id, $post_image_id ) {
    $html = '<a href="' . get_permalink( $post_id ) . '" alt="' . esc_attr( get_the_title( $post_id ) ) . '">' . $html . '</a>';
    return $html;
}
add_filter( 'post_thumbnail_html', 'wpdocs_post_image_html', 10, 3 );


/**
* MENU
*/

function register_my_menus() {
  register_nav_menus(
    array(
      'main-menu' => esc_html__( 'Main Menu' )
     )
   );
 }
 add_action( 'init', 'register_my_menus' );


/**
* STYLIZACJA LOGIN PAGE
*/

function modify_logo() {
    $logo_style = '<style type="text/css">';
    $logo_style .= 'h1 a {background-image: url(/wp-content/themes/animed/inc/logologin.png) !important;}';
    $logo_style .= '</style>';
    echo $logo_style;
}
add_action('login_head', 'modify_logo');

function custom_login_url() {
    return 'https://animedlodz.pl';
}
add_filter('login_headerurl', 'custom_login_url');

function custom_login_css() {
    wp_enqueue_style('login-styles', get_template_directory_uri() . '/css/customlogin.css');
}
add_action('login_enqueue_scripts', 'custom_login_css');

/**
*WYŁĄCZ KOMENTARZE
*/

// Disable support for comments and trackbacks in post types
function df_disable_comments_post_types_support() {
    $post_types = get_post_types();
    foreach ($post_types as $post_type) {
        if(post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
}
add_action('admin_init', 'df_disable_comments_post_types_support');

// Close comments on the front-end
function df_disable_comments_status() {
    return false;
}
add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);

// Hide existing comments
function df_disable_comments_hide_existing_comments($comments) {
    $comments = array();
    return $comments;
}
add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);

// Remove comments page in menu
function df_disable_comments_admin_menu() {
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'df_disable_comments_admin_menu');

// Redirect any user trying to access comments page
function df_disable_comments_admin_menu_redirect() {
    global $pagenow;
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url()); exit;
    }
}
add_action('admin_init', 'df_disable_comments_admin_menu_redirect');

// Remove comments metabox from dashboard
function df_disable_comments_dashboard() {
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'df_disable_comments_dashboard');

// Remove comments links from admin bar
function df_disable_comments_admin_bar() {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
}
add_action('init', 'df_disable_comments_admin_bar');


/**
* NASI LEKARZE - AKODREON
*/

function nasilekarze_register() {
    $labels = array(
        'name' => _x('Nasi lekarze', 'post type general name'),
        'singular_name' => _x('Nasi lekarze', 'post type singular name'),
        'add_new' => _x('Dodaj', 'persons'),
        'add_new_item' => __('Dodaj'),
        'edit_item' => __('Edytuj'),
        'new_item' => __('Nowy'),
        'view_item' => __('Zobacz'),
        'search_items' => __('Szukaj'),
        'not_found' =>  __('Nic nie znaleziono'),
        'not_found_in_trash' => __('Nie ma nic w koszu'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        // 'taxonomies' => array( 'category' ),
        // 'rewrite' => true,
        'rewrite'     => array( 'slug' => 'nasilekarze' ), // my custom slug
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor'),
        'menu_icon' => 'dashicons-businessperson',
        'show_in_rest' => false,
      ); 

    register_post_type( 'nasilekarze' , $args );
}
add_action('init', 'nasilekarze_register');


/**
* DODAJ MOŻLIWOŚĆ SORTOWANIA CUSTOM POST TYPE
*/

function add_attributes_to_post() {
    add_post_type_support('szkoly', 'page-attributes');
}
add_action('init', 'add_attributes_to_post');

function change_post_order($query) {
    if($query->is_main_query()) {
        $query->set('orderby', 'menu_order');
    }
}
add_action('pre_get_posts', 'change_post_order');

/**
* DŁUGOŚĆ ZAJAWKI
*/

function mytheme_custom_excerpt_length( $length ) {
    return 10000;
}
add_filter( 'excerpt_length', 'mytheme_custom_excerpt_length', 999 );



/**
* ZEZWÓL REDAKTOROM NA EDYCJĘ MENU
*/

// get the the role object
$role_object = get_role( 'editor' );

// add $cap capability to this role object
$role_object->add_cap( 'edit_theme_options' );


/**
* MENIU
*/

/* dodaj ikonkę w przypadku rozwijanego menu */

function add_right_icon_to_mobile_nav_item( $args, $item, $depth ) {
$is_custom_mobile_menu = isset( $args->theme_location ) && $args->theme_location === 'main-menu';
$args->after = '';
if ( in_array( 'menu-item-has-children', $item->classes, true ) && $is_custom_mobile_menu ) {
$args->after = '<button type="button" class="mobile-menu-item-icon" aria-expanded="false" aria-label="' . esc_attr__( 'Open the menu', 'textdomain' ) . '"><span class="screen-reader-text">' . esc_html__( 'Show sub menu', 'textdomain' ) . '</span>' . '</button>';
}
return $args;
}
add_filter( 'nav_menu_item_args', 'add_right_icon_to_mobile_nav_item', 10, 3 );
