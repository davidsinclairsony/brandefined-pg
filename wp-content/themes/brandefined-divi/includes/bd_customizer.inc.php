<?php

function bd_create_custom_controls() {
    if (class_exists('WP_Customize_Control')) {
        class BD_Social_Icon_Control extends WP_Customize_Control {
            /**
             * Render the control's content.
             */
            public function render_content() { 
            $network = strtolower($this->label);
            $network = str_replace(' ', '-', $network);
            $icon_class = 'bd-icon-' . $network;
            $setting_class = $network . '-setting';
            ?>
       		    <div class="bd-social-icons">
           		    <label>
           		        <span class="bd-social-icon-control-title"><?php echo esc_html($this->label); ?></span>
           		        <div class="input-group">
           		            <div class="bd-input-icon <?php echo esc_html($icon_class); ?>">
           		                <input class="bd-social-icon-input <?php echo esc_html($setting_class); ?>" <?php $this->link(); ?> value="<?php echo esc_attr($this->value()); ?>" type="text">
           		            </div>
           		        </div>
           		    </label>
       		    </div>
       		 <?php
            }
        }
        class BD_Custom_Range_Control extends WP_Customize_Control {
            public function render_content() { ?>
                <li id="customize-control-bd_social_icon_header_size" class="customize-control customize-control-range">
                    <label>
                        <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                        <small class="description customize-control-description"><?php echo esc_html($this->description); ?></small>
                        <input class="bd-custom-range" 
                               type="range" 
                               min="<?php echo $this->input_attrs['min'] ?>" 
                               max="<?php echo $this->input_attrs['max'] ?>" 
                               step="<?php echo $this->input_attrs['step'] ?>" 
                               class="test-class test" style="color: #0a0;" 
                               value="" <?php $this->link(); ?>>
                        <input class="bd-custom-range-value" type="text" <?php $this->link(); ?> value="<?php get_theme_mod('bd_social_icon_header_size');?>">
                    </label>
                </li>
            <?php  
            }
        }
    }
}

function brandefined_customize_setup($wp_customize)
{
    bd_create_custom_controls();
    
    /* Secondary Header Icon Size */
    $wp_customize->add_setting( 'bd_social_icon_header_size', array( 
    	 'default'       	=> '',
    	 'sanitize_callback' => 'esc_attr',
    	 'transport' => 'postMessage'
    ) );
    $wp_customize->add_control( new BD_Custom_Range_Control( $wp_customize, 'bd_social_icon_header_size', array(
      'type' => 'range',
      'section' => 'bd_social_icons',
      'label' => __( 'Secondary Header Icon Size' ),
      'description' => __( 'Sets the size of social icons in the top bar.' ),
      'input_attrs' => array(
        'min' => 14,
        'max' => 24,
        'step' => 1,
      ),
    ) ) );
    
    /* Footer Icon Size */
    $wp_customize->add_setting( 'bd_social_icon_footer_size', array( 
    	 'default'       	=> '',
    	 'sanitize_callback' => 'esc_attr',
    	 'transport' => 'postMessage'
    ) );
    $wp_customize->add_control( new BD_Custom_Range_Control( $wp_customize, 'bd_social_icon_footer_size', array(
      'type' => 'range',
      'section' => 'bd_social_icons',
      'label' => __( 'Footer Icon Size' ),
      'description' => __( 'Sets the size of social icons in the footer.' ),
      'input_attrs' => array(
        'min' => 14,
        'max' => 24,
        'step' => 1,
      ),
    ) ) );
    
    
    /* Social Icons */
    $wp_customize->add_section( 'bd_social_icons', array(
   	 'title' => __( 'Social Icons' ),
   	 'priority' => 10
    ) );
    
    // Facebook        
    $wp_customize->add_setting( 'bd_social_icon_facebook', array( 
    	 'default'       	=> '',
    	 'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( new BD_Social_Icon_Control( $wp_customize, 'bd_social_icon_facebook', array(
    	 'label'   	=> __( 'Facebook', 'Brandefined' ),
    	 'section' 	=> 'bd_social_icons',
    ) ) );
    
    // Google Plus        
    $wp_customize->add_setting( 'bd_social_icon_googleplus', array( 
    	 'default'       	=> '',
    	 'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( new BD_Social_Icon_Control( $wp_customize, 'bd_social_icon_googleplus', array(
    	 'label'   	=> __( 'Google Plus', 'Brandefined' ),
    	 'section' 	=> 'bd_social_icons',
    ) ) );
    
    // Twitter        
    $wp_customize->add_setting( 'bd_social_icon_twitter', array( 
    	 'default'       	=> '',
    	 'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( new BD_Social_Icon_Control( $wp_customize, 'bd_social_icon_twitter', array(
    	 'label'   	=> __( 'Twitter', 'Brandefined' ),
    	 'section' 	=> 'bd_social_icons',
    ) ) );
    
    // Pinterest        
    $wp_customize->add_setting( 'bd_social_icon_pinterest', array( 
    	 'default'       	=> '',
    	 'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( new BD_Social_Icon_Control( $wp_customize, 'bd_social_icon_pinterest', array(
    	 'label'   	=> __( 'Pinterest', 'Brandefined' ),
    	 'section' 	=> 'bd_social_icons',
    ) ) );
    
    // Youtube        
    $wp_customize->add_setting( 'bd_social_icon_youtube', array( 
    	 'default'       	=> '',
    	 'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( new BD_Social_Icon_Control( $wp_customize, 'bd_social_icon_youtube', array(
    	 'label'   	=> __( 'Youtube', 'Brandefined' ),
    	 'section' 	=> 'bd_social_icons',
    ) ) );
    
    // Linkedin        
    $wp_customize->add_setting( 'bd_social_icon_linkedin', array( 
    	 'default'       	=> '',
    	 'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( new BD_Social_Icon_Control( $wp_customize, 'bd_social_icon_linkedin', array(
    	 'label'   	=> __( 'Linkedin', 'Brandefined' ),
    	 'section' 	=> 'bd_social_icons',
    ) ) );
    
    // Instagram        
    $wp_customize->add_setting( 'bd_social_icon_instagram', array( 
    	 'default'       	=> '',
    	 'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( new BD_Social_Icon_Control( $wp_customize, 'bd_social_icon_instagram', array(
    	 'label'   	=> __( 'Instagram', 'Brandefined' ),
    	 'section' 	=> 'bd_social_icons',
    ) ) );
    
    // Tumblr        
    $wp_customize->add_setting( 'bd_social_icon_tumblr', array( 
    	 'default'       	=> '',
    	 'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( new BD_Social_Icon_Control( $wp_customize, 'bd_social_icon_tumblr', array(
    	 'label'   	=> __( 'Tumblr', 'Brandefined' ),
    	 'section' 	=> 'bd_social_icons',
    ) ) );
    
    // Snapchat        
    $wp_customize->add_setting( 'bd_social_icon_snapchat', array( 
    	 'default'       	=> '',
    	 'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( new BD_Social_Icon_Control( $wp_customize, 'bd_social_icon_snapchat', array(
    	 'label'   	=> __( 'Snapchat', 'Brandefined' ),
    	 'section' 	=> 'bd_social_icons',
    ) ) );
    
    // Yelp        
    $wp_customize->add_setting( 'bd_social_icon_yelp', array( 
    	 'default'       	=> '',
    	 'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( new BD_Social_Icon_Control( $wp_customize, 'bd_social_icon_yelp', array(
    	 'label'   	=> __( 'Yelp', 'Brandefined' ),
    	 'section' 	=> 'bd_social_icons',
    ) ) );
    
    // Yahoo        
    $wp_customize->add_setting( 'bd_social_icon_yahoo', array( 
    	 'default'       	=> '',
    	 'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( new BD_Social_Icon_Control( $wp_customize, 'bd_social_icon_yahoo', array(
    	 'label'   	=> __( 'Yahoo', 'Brandefined' ),
    	 'section' 	=> 'bd_social_icons',
    ) ) );
    
    // Vimeo        
    $wp_customize->add_setting( 'bd_social_icon_vimeo', array( 
    	 'default'       	=> '',
    	 'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( new BD_Social_Icon_Control( $wp_customize, 'bd_social_icon_vimeo', array(
    	 'label'   	=> __( 'Vimeo', 'Brandefined' ),
    	 'section' 	=> 'bd_social_icons',
    ) ) );
    
    // Etsy        
    $wp_customize->add_setting( 'bd_social_icon_etsy', array( 
    	 'default'       	=> '',
    	 'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( new BD_Social_Icon_Control( $wp_customize, 'bd_social_icon_etsy', array(
    	 'label'   	=> __( 'Etsy', 'Brandefined' ),
    	 'section' 	=> 'bd_social_icons',
    ) ) );
    
    // Paypal        
    $wp_customize->add_setting( 'bd_social_icon_paypal', array( 
    	 'default'       	=> '',
    	 'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( new BD_Social_Icon_Control( $wp_customize, 'bd_social_icon_paypal', array(
    	 'label'   	=> __( 'Paypal', 'Brandefined' ),
    	 'section' 	=> 'bd_social_icons',
    ) ) );
    
    // Periscope        
    $wp_customize->add_setting( 'bd_social_icon_periscope', array( 
    	 'default'       	=> '',
    	 'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( new BD_Social_Icon_Control( $wp_customize, 'bd_social_icon_periscope', array(
    	 'label'   	=> __( 'Periscope', 'Brandefined' ),
    	 'section' 	=> 'bd_social_icons',
    ) ) );
    
    // Picasa        
    $wp_customize->add_setting( 'bd_social_icon_picasa', array( 
    	 'default'       	=> '',
    	 'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( new BD_Social_Icon_Control( $wp_customize, 'bd_social_icon_picasa', array(
    	 'label'   	=> __( 'Picasa', 'Brandefined' ),
    	 'section' 	=> 'bd_social_icons',
    ) ) );
    
    // Soundcloud        
    $wp_customize->add_setting( 'bd_social_icon_soundcloud', array( 
    	 'default'       	=> '',
    	 'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( new BD_Social_Icon_Control( $wp_customize, 'bd_social_icon_soundcloud', array(
    	 'label'   	=> __( 'Soundcloud', 'Brandefined' ),
    	 'section' 	=> 'bd_social_icons',
    ) ) );
    
    // Squarespace        
    $wp_customize->add_setting( 'bd_social_icon_squarespace', array( 
    	 'default'       	=> '',
    	 'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( new BD_Social_Icon_Control( $wp_customize, 'bd_social_icon_squarespace', array(
    	 'label'   	=> __( 'Squarespace', 'Brandefined' ),
    	 'section' 	=> 'bd_social_icons',
    ) ) );
    
    // Ebay        
    $wp_customize->add_setting( 'bd_social_icon_ebay', array( 
    	 'default'       	=> '',
    	 'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( new BD_Social_Icon_Control( $wp_customize, 'bd_social_icon_ebay', array(
    	 'label'   	=> __( 'Ebay', 'Brandefined' ),
    	 'section' 	=> 'bd_social_icons',
    ) ) );
    
    // Artsy        
    $wp_customize->add_setting( 'bd_social_icon_artsy', array( 
    	 'default'       	=> '',
    	 'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( new BD_Social_Icon_Control( $wp_customize, 'bd_social_icon_artsy', array(
    	 'label'   	=> __( 'Artsy', 'Brandefined' ),
    	 'section' 	=> 'bd_social_icons',
    ) ) );
    
    // Skype        
    $wp_customize->add_setting( 'bd_social_icon_skype', array( 
    	 'default'       	=> '',
    	 'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( new BD_Social_Icon_Control( $wp_customize, 'bd_social_icon_skype', array(
    	 'label'   	=> __( 'Skype', 'Brandefined' ),
    	 'section' 	=> 'bd_social_icons',
    ) ) );
    
    // Flickr        
    $wp_customize->add_setting( 'bd_social_icon_flickr', array( 
    	 'default'       	=> '',
    	 'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( new BD_Social_Icon_Control( $wp_customize, 'bd_social_icon_flickr', array(
    	 'label'   	=> __( 'Flickr', 'Brandefined' ),
    	 'section' 	=> 'bd_social_icons',
    ) ) );
    
    // Myspace        
    $wp_customize->add_setting( 'bd_social_icon_myspace', array( 
    	 'default'       	=> '',
    	 'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( new BD_Social_Icon_Control( $wp_customize, 'bd_social_icon_myspace', array(
    	 'label'   	=> __( 'Myspace', 'Brandefined' ),
    	 'section' 	=> 'bd_social_icons',
    ) ) );
    
    // Dribbble        
    $wp_customize->add_setting( 'bd_social_icon_dribbble', array( 
    	 'default'       	=> '',
    	 'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( new BD_Social_Icon_Control( $wp_customize, 'bd_social_icon_dribbble', array(
    	 'label'   	=> __( 'Dribbble', 'Brandefined' ),
    	 'section' 	=> 'bd_social_icons',
    ) ) );
    
    // Rss        
    $wp_customize->add_setting( 'bd_social_icon_rss', array( 
    	 'default'       	=> '',
    	 'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( new BD_Social_Icon_Control( $wp_customize, 'bd_social_icon_rss', array(
    	 'label'   	=> __( 'Rss', 'Brandefined' ),
    	 'section' 	=> 'bd_social_icons',
    ) ) );
    
    // Wordpress        
    $wp_customize->add_setting( 'bd_social_icon_wordpress', array( 
    	 'default'       	=> '',
    	 'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( new BD_Social_Icon_Control( $wp_customize, 'bd_social_icon_wordpress', array(
    	 'label'   	=> __( 'Wordpress', 'Brandefined' ),
    	 'section' 	=> 'bd_social_icons',
    ) ) );
    
    // Custom CSS Field
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
add_action('customize_register', 'brandefined_customize_setup');

function brandefined_customizer_styles()
{
    
    wp_enqueue_style( 'bd-social-icons-styles', CHILD_THEME_DIR . '/includes/customizer/bd_customizer.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'brandefined_customizer_styles' );
function brandefined_customizer_scripts()
{
    wp_register_script('brandefined-customizer-scripts', CHILD_THEME_DIR . '/js/brandefined_customizer.js', array(
        'jquery'
    ), '', true);
    wp_enqueue_script('brandefined-customizer-scripts', CHILD_THEME_DIR . '/js/brandefined_customizer.js', array(
        'jquery'
    ), '', true);
}
add_action( 'customize_preview_init', 'brandefined_customizer_scripts' );

function brandefined_custom_css()
{
    
    if(get_theme_mod('bd_social_icon_header_size')) {
        $headerIconSize  = '#top-header .bd-social-icons li > a { ' ;
        $headerIconSize .= 'font-size: ' . get_theme_mod('bd_social_icon_header_size') . 'px;}';
    } else {
        $headerIconSize = '';
    }
    if(get_theme_mod('bd_social_icon_footer_size')) {
        $footerIconSize  = '#footer-bottom .et-social-icon a { ' ;
        $footerIconSize .= 'font-size: ' . get_theme_mod('bd_social_icon_footer_size') . 'px;}';
    } else {
        $footerIconSize = '';
    }
    $output  = '<style type="text/css" id="brandefined-custom-css">' ;
    $output .= $headerIconSize;
    $output .= $footerIconSize;
    $output .= get_theme_mod('brandefined_custom_css', '');
    $output .= '</style>';
    
    echo $output;
}
add_action('wp_head', 'brandefined_custom_css');