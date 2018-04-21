<?php
/**
 * MyFirstTheme's functions and definitions
 *
 * @package wordpress-theme
 * @since wordpress-theme 1.0
 */
 
/**
 * First, let's set the maximum content width based on the theme's design and stylesheet.
 * This will limit the width of all uploaded images and embeds.
 */
if ( ! isset( $content_width ) )
    $content_width = 800; /* pixels */
 
if ( ! function_exists( 'my_first_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function my_first_theme_setup() {
 
    /**
     * Make theme available for translation.
     * Translations can be placed in the /languages/ directory.
     */
    load_theme_textdomain( 'myfirsttheme', get_template_directory() . '/languages' );
 
    /**
     * Add default posts and comments RSS feed links to <head>.
     */
    add_theme_support( 'automatic-feed-links' );
 
    /**
     * Enable support for post thumbnails and featured images.
     */
    add_theme_support( 'post-thumbnails' );
 
    /**
     * Add support for two custom navigation menus.
     */
    register_nav_menus( array(
        'primary'   => __( 'Primary Menu', 'myfirsttheme' ),
        'secondary' => __('Secondary Menu', 'myfirsttheme' )
    ) );
 
    /**
     * Enable support for the following post formats:
     * aside, gallery, quote, image, and video
     */
    add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );
}
endif; // myfirsttheme_setup

add_action( 'after_setup_theme', 'my_first_theme_setup' );



// function theme_enqueue_styles() {

//     wp_enqueue_style( 'bootstrap', '' );

// }

// add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' ); 

function current_page(){
    global $wp; 
    return $current_page = explode('/',home_url( $wp->request )); 
}

function time_elapsed_string($datetime, $full = false) {
 
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);
 
    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;
 
    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }
 
    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function _facebook_feeds(){
    
    $data  = file_get_contents("https://graph.facebook.com/darktechph/feed?access_token=EAAP9hArvboQBAHfsZC59DH9lrwTWkV3ZCeuyKhVVtN9BwkEs5AiT3ZByRTOJZBrSUHglGUIeuoBT79EDugDfnbzmjZCLU2T8wveC6rYWLcJEBE7iqKljqp0v2NPfRfZArgru3hij9dMY4i7VjHtlLDpCBA5qX6bltGrSk6bUd61yoO3lfAMs7y&limit=10&fields=created_time,from,link,message,picture,type,attachments,source,shares,likes.summary(true),comments.summary(true)");
    
    $data = json_decode($data, true); 
    
    $feed_item_count = count($data['data']);

    $facebookFeeds = array();
    for($x=0; $x<$feed_item_count; $x++){
        $id = $data['data'][$x]['id'];
        $post_id_arr = explode('_', $id);
        $post_id = $post_id_arr[1]; 

        $message = $data['data'][$x]['message'];

        $link = $data['data'][$x]['link'];

        $created_time = $data['data'][$x]['created_time'];  
        
        $picture = $data['data'][$x]['attachments']['data'][0]['media']['image']['src']; 

        $shares = $data['data'][$x]['shares']['count'];

        $likes = $data['data'][$x]['likes']['summary']['total_count'];

        $comments = $data['data'][$x]['comments']['summary']['total_count'];
        
        $converted_date_time = date( 'Y-m-d H:i:s', strtotime($created_time));
        $ago_value = time_elapsed_string($converted_date_time);

        $facebookFeeds[] = array(
            'id'    => $post_id,
            'message' => $message,
            'link'  => $link,
            'created_time'  => $ago_value,
            'image'     => $picture,
            'shares' => $shares, 
            'likes' => $likes,
            'comments' => $comments
        ); 
    }
    return $facebookFeeds;
}
