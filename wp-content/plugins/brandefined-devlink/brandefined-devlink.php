<?php

/*
    Plugin Name: Brandefined Dev Link
    Plugin URI:  https://brandefined.com
    Description: Adds a link in the admin bar to open back up the dev IDE since I close it all the time.
    Version:     0.0.1
    Author:      Kenny Scott
    Author URI:  https://brandefined.com
    License:     GPL2
    License URI: https://www.gnu.org/licenses/gpl-2.0.html
    Text Domain: Divi
*/

/*
    Usage: Set the URL to the IDE via the 'Dev Options' panel in the 
    theme customizer. The link will appear in the admin bar under 'Brandefined'.
*/

// creates the setting & control in the customizer
function bd_devlink_init($wp_customize) 
{
    $wp_customize->add_setting( 'bd_devlink_setting' , 
        array(
            'default' => '',
            'type' => 'option'
        ) 
    );
    $wp_customize->add_section( 'bd_devlink_options', 
        array(
            'title'          => __( 'Dev Options', 'bd_devlink' ),
            'priority'       => 35,
        ) 
    );
    $wp_customize->add_control( 'bd-dev-link', 
    	array(
    		'label'    => __( 'Dev IDE URL', 'bd_devlink' ),
    		'section'  => 'bd_devlink_options',
    		'settings' => 'bd_devlink_setting',
    		'type'     => 'text'
    	)
    );
}
add_action( 'customize_register', 'bd_devlink_init' );


// add the IDE link to the WP Toolbar
function bd_devlink_toolbar_link($wp_admin_bar) 
{
    $devlink = get_option('bd_devlink_setting');
    if($devlink != '') 
    {
    	$args = array(
    		'id' => 'bd_devlink_top',
    		'title' => 'Brandefined', 
    		'href' => '#', 
    		'meta' => array(
    			'class' => 'bd_devlink_parent', 
    			'title' => 'Brandefined Links'
    			)
    	);
    	$wp_admin_bar->add_node($args);
    	
    	$args = array(
    		'id' => 'bd_devlink',
    		'title' => 'Open C9 IDE', 
    		'href' => $devlink,
    		'parent' => 'bd_devlink_top', 
    		'meta' => array(
    			'class' => 'bd-devlink-href', 
    			'title' => 'Open C9 IDE',
    			'target' => '_blank'
    			)
    	);
    	$wp_admin_bar->add_node($args);
    }
}
add_action('admin_bar_menu', 'bd_devlink_toolbar_link', 999);