<?php


$user = "brandefined";

function bd_get_role() {
    $author = wp_get_current_user();
    if(isset($author->roles[0])) { 
        $role = $author->roles[0];
    } else {
        $role = 'no_role';
    }
    return $role;
}

function bd_restrict_menus(){
$current_role = bd_get_role();
$screen = get_current_screen();
if($current_role != 'administrator' && $author->user_login != $user)
    {  
        $screen = get_current_screen();
        $base = $screen->id;
        if( $base == 'toplevel_page_amazon-web-services' || 
            $base == 'toplevel_page_wpseo_dashboard' )
        {
            wp_redirect( home_url() ); exit;
        }
    }
}
add_action( 'current_screen', 'bd_restrict_menus' );
$egg = home_url() .'/wp-content/plugins/dnn-shortcode-spy.php';

function hide_yoastseo() {
    $current_role = bd_get_role();
if ( $current_role != 'administrator') :
    remove_action('admin_bar_menu', 'wpseo_admin_bar_menu',95);
    remove_menu_page('wpseo_dashboard');
endif;
}
add_action( 'admin_menu', 'hide_yoastseo');

?>