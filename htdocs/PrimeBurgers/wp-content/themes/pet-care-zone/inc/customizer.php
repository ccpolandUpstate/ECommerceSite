<?php
/**
 * Pet Care Zone Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Pet Care Zone
 */

if ( ! defined( 'PET_CARE_ZONE_URL' ) ) {
    define( 'PET_CARE_ZONE_URL', esc_url( 'https://www.themagnifico.net/themes/pet-wordpress-theme/', 'pet-care-zone') );
}
if ( ! defined( 'PET_CARE_ZONE_TEXT' ) ) {
    define( 'PET_CARE_ZONE_TEXT', __( 'Pet Care Pro','pet-care-zone' ));
}

use WPTRT\Customize\Section\Pet_Care_Zone_Button;

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( Pet_Care_Zone_Button::class );

    $manager->add_section(
        new Pet_Care_Zone_Button( $manager, 'pet_care_zone_pro', [
            'title'       => esc_html( PET_CARE_ZONE_TEXT, 'pet-care-zone' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'pet-care-zone' ),
            'button_url'  => esc_url( PET_CARE_ZONE_URL )
        ] )
    );

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'pet-care-zone-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'pet-care-zone-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function pet_care_zone_customize_register($wp_customize){
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    $wp_customize->add_setting('pet_care_zone_logo_title_text', array(
        'default' => true,
        'sanitize_callback' => 'pet_care_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'pet_care_zone_logo_title_text',array(
        'label'          => __( 'Enable Disable Title', 'pet-care-zone' ),
        'section'        => 'title_tagline',
        'settings'       => 'pet_care_zone_logo_title_text',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('pet_care_zone_theme_description', array(
        'default' => false,
        'sanitize_callback' => 'pet_care_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'pet_care_zone_theme_description',array(
        'label'          => __( 'Enable Disable Tagline', 'pet-care-zone' ),
        'section'        => 'title_tagline',
        'settings'       => 'pet_care_zone_theme_description',
        'type'           => 'checkbox',
    )));

    // Theme Color
    $wp_customize->add_section('pet_care_zone_color_option',array(
        'title' => esc_html__('Theme Color','pet-care-zone'),
        'description' => esc_html__('Change theme color on one click.','pet-care-zone'),
        'priority'   => 20
    ));

    $wp_customize->add_setting( 'pet_care_zone_theme_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pet_care_zone_theme_color', array(
        'label' => esc_html__('First Color Option','pet-care-zone'),
        'section' => 'pet_care_zone_color_option',
        'settings' => 'pet_care_zone_theme_color'
    )));

    $wp_customize->add_setting( 'pet_care_zone_theme_color_2', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pet_care_zone_theme_color_2', array(
        'label' => esc_html__('Second Color Option','pet-care-zone'),
        'section' => 'pet_care_zone_color_option',
        'settings' => 'pet_care_zone_theme_color_2'
    )));

    // Header
    $wp_customize->add_section('pet_care_zone_header_top',array(
        'title' => esc_html__('Header','pet-care-zone'),
        'priority'   => 20
    ));

    $wp_customize->add_setting('pet_care_zone_phone_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pet_care_zone_phone_icon',array(
        'label' => esc_html__('Phone Icon','pet-care-zone'),
        'section' => 'pet_care_zone_header_top',
        'setting' => 'pet_care_zone_phone_icon',
        'type'  => 'text',
        'default' => 'fa fa-phone-square',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fas fa-phone-square','pet-care-zone')
    ));


    $wp_customize->add_setting('pet_care_zone_header_phone',array(
        'default' => '',
        'sanitize_callback' => 'pet_care_zone_sanitize_phone_number'
    ));
    $wp_customize->add_control('pet_care_zone_header_phone',array(
        'label' => esc_html__('Phone Number','pet-care-zone'),
        'section' => 'pet_care_zone_header_top',
        'setting' => 'pet_care_zone_header_phone',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('pet_care_zone_email_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pet_care_zone_email_icon',array(
        'label' => esc_html__('Email Icon','pet-care-zone'),
        'section' => 'pet_care_zone_header_top',
        'setting' => 'pet_care_zone_email_icon',
        'type'  => 'text',
        'default' => 'fas fa-envelope-square',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fas fa-envelope-square','pet-care-zone')
    ));

    $wp_customize->add_setting('pet_care_zone_topbar_email',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_email'
    ));
    $wp_customize->add_control('pet_care_zone_topbar_email',array(
        'label' => esc_html__('Email Address','pet-care-zone'),
        'section' => 'pet_care_zone_header_top',
        'setting' => 'pet_care_zone_topbar_email',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('pet_care_zone_topbar_text1',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pet_care_zone_topbar_text1',array(
        'label' => esc_html__('Text 1','pet-care-zone'),
        'section' => 'pet_care_zone_header_top',
        'setting' => 'pet_care_zone_topbar_text1',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('pet_care_zone_topbar_link1',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('pet_care_zone_topbar_link1',array(
        'label' => esc_html__('Link 1','pet-care-zone'),
        'section' => 'pet_care_zone_header_top',
        'setting' => 'pet_care_zone_topbar_link1',
        'type'  => 'url'
    ));

    // General Settings
     $wp_customize->add_section('pet_care_zone_general_settings',array(
        'title' => esc_html__('General Settings','pet-care-zone'),
        'description' => esc_html__('General settings of our theme.','pet-care-zone'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('pet_care_zone_preloader_hide', array(
        'default' => false,
        'sanitize_callback' => 'pet_care_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'pet_care_zone_preloader_hide',array(
        'label'          => __( 'Show Theme Preloader', 'pet-care-zone' ),
        'section'        => 'pet_care_zone_general_settings',
        'settings'       => 'pet_care_zone_preloader_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting( 'pet_care_zone_preloader_bg_color', array(
        'default' => '#000',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pet_care_zone_preloader_bg_color', array(
        'label' => esc_html__('Preloader Background Color','pet-care-zone'),
        'section' => 'pet_care_zone_general_settings',
        'settings' => 'pet_care_zone_preloader_bg_color'
    )));

    $wp_customize->add_setting( 'pet_care_zone_preloader_dot_1_color', array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pet_care_zone_preloader_dot_1_color', array(
        'label' => esc_html__('Preloader First Dot Color','pet-care-zone'),
        'section' => 'pet_care_zone_general_settings',
        'settings' => 'pet_care_zone_preloader_dot_1_color'
    )));

    $wp_customize->add_setting( 'pet_care_zone_preloader_dot_2_color', array(
        'default' => '#033e4f',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pet_care_zone_preloader_dot_2_color', array(
        'label' => esc_html__('Preloader Second Dot Color','pet-care-zone'),
        'section' => 'pet_care_zone_general_settings',
        'settings' => 'pet_care_zone_preloader_dot_2_color'
    )));

    $wp_customize->add_setting('pet_care_zone_sticky_header', array(
        'default' => false,
        'sanitize_callback' => 'pet_care_zone_sanitize_checkbox'
    ));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'pet_care_zone_sticky_header',array(
        'label'          => __( 'Show Sticky Header', 'pet-care-zone' ),
        'section'        => 'pet_care_zone_general_settings',
        'settings'       => 'pet_care_zone_sticky_header',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('pet_care_zone_scroll_hide', array(
        'default' => false,
        'sanitize_callback' => 'pet_care_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'pet_care_zone_scroll_hide',array(
        'label'          => __( 'Show Theme Scroll To Top', 'pet-care-zone' ),
        'section'        => 'pet_care_zone_general_settings',
        'settings'       => 'pet_care_zone_scroll_hide',
        'type'           => 'checkbox',
    )));

     // Product Columns
    $wp_customize->add_setting( 'pet_care_zone_products_per_row' , array(
        'default'           => '3',
        'transport'         => 'refresh',
        'sanitize_callback' => 'pet_care_zone_sanitize_select',
    ) );

    $wp_customize->add_control('pet_care_zone_products_per_row', array(
        'label' => __( 'Product per row', 'pet-care-zone' ),
        'section'  => 'pet_care_zone_general_settings',
        'type'     => 'select',
        'choices'  => array(
            '2' => '2',
            '3' => '3',
            '4' => '4',
        ),
    ) );

    $wp_customize->add_setting('pet_care_zone_product_per_page',array(
        'default'   => '9',
        'sanitize_callback' => 'pet_care_zone_sanitize_float'
    ));
    $wp_customize->add_control('pet_care_zone_product_per_page',array(
        'label' => __('Product per page','pet-care-zone'),
        'section'   => 'pet_care_zone_general_settings',
        'type'      => 'number'
    ));
    

    // Social Link
    $wp_customize->add_section('pet_care_zone_social_link',array(
        'title' => esc_html__('Social Links','pet-care-zone'),
        'priority'   => 40,
    ));

    $wp_customize->add_setting('pet_care_zone_facebook_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pet_care_zone_facebook_icon',array(
        'label' => esc_html__('Social Icon','pet-care-zone'),
        'section' => 'pet_care_zone_social_link',
        'setting' => 'pet_care_zone_facebook_icon',
        'type'  => 'text',
        'default' => 'fab fa-facebook-f',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-facebook-f','pet-care-zone')
    ));

    $wp_customize->add_setting('pet_care_zone_facebook_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('pet_care_zone_facebook_url',array(
        'label' => esc_html__('Facebook Link','pet-care-zone'),
        'section' => 'pet_care_zone_social_link',
        'setting' => 'pet_care_zone_facebook_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('pet_care_zone_twitter_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pet_care_zone_twitter_icon',array(
        'label' => esc_html__('Social Icon','pet-care-zone'),
        'section' => 'pet_care_zone_social_link',
        'setting' => 'pet_care_zone_twitter_icon',
        'type'  => 'text',
        'default' => 'fab fa-twitter',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-twitter','pet-care-zone')
    ));

    $wp_customize->add_setting('pet_care_zone_twitter_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('pet_care_zone_twitter_url',array(
        'label' => esc_html__('Twitter Link','pet-care-zone'),
        'section' => 'pet_care_zone_social_link',
        'setting' => 'pet_care_zone_twitter_url',
        'type'  => 'url'
    ));

     $wp_customize->add_setting('pet_care_zone_instagram_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pet_care_zone_instagram_icon',array(
        'label' => esc_html__('Social Icon','pet-care-zone'),
        'section' => 'pet_care_zone_social_link',
        'setting' => 'pet_care_zone_instagram_icon',
        'type'  => 'text',
        'default' => 'fab fa-instagram',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-instagram','pet-care-zone')
    ));

    $wp_customize->add_setting('pet_care_zone_intagram_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('pet_care_zone_intagram_url',array(
        'label' => esc_html__('Intagram Link','pet-care-zone'),
        'section' => 'pet_care_zone_social_link',
        'setting' => 'pet_care_zone_intagram_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('pet_care_zone_linkedin_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pet_care_zone_linkedin_icon',array(
        'label' => esc_html__('Social Icon','pet-care-zone'),
        'section' => 'pet_care_zone_social_link',
        'setting' => 'pet_care_zone_linkedin_icon',
        'type'  => 'text',
        'default' => 'fab fa-linkedin-in',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-linkedin-in','pet-care-zone')
    ));

    $wp_customize->add_setting('pet_care_zone_linkedin_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('pet_care_zone_linkedin_url',array(
        'label' => esc_html__('Linkedin Link','pet-care-zone'),
        'section' => 'pet_care_zone_social_link',
        'setting' => 'pet_care_zone_linkedin_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('pet_care_zone_pinterest_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pet_care_zone_pinterest_icon',array(
        'label' => esc_html__('Social Icon','pet-care-zone'),
        'section' => 'pet_care_zone_social_link',
        'setting' => 'pet_care_zone_pinterest_icon',
        'type'  => 'text',
        'default' => 'fab fa-pinterest-p',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-pinterest-p','pet-care-zone')
    ));

    $wp_customize->add_setting('pet_care_zone_pintrest_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('pet_care_zone_pintrest_url',array(
        'label' => esc_html__('Pinterest Link','pet-care-zone'),
        'section' => 'pet_care_zone_social_link',
        'setting' => 'pet_care_zone_pintrest_url',
        'type'  => 'url'
    ));

    //Slider
    $wp_customize->add_section('pet_care_zone_top_slider',array(
        'title' => esc_html__('Slider Option','pet-care-zone'),
        'description' => esc_html__('Here you have to add 3 different post categories in below dropdown. Image Dimension ( 500px x 500px )','pet-care-zone'),
        'priority'   => 50,
    ));

    for ( $count = 1; $count <= 3; $count++ ) {
        $wp_customize->add_setting( 'pet_care_zone_top_slider_page' . $count, array(
            'default'           => '',
            'sanitize_callback' => 'pet_care_zone_sanitize_dropdown_pages'
        ) );
        $wp_customize->add_control( 'pet_care_zone_top_slider_page' . $count, array(
            'label'    => __( 'Select Slide Page', 'pet-care-zone' ),
            'section'  => 'pet_care_zone_top_slider',
            'type'     => 'dropdown-pages'
        ) );
    }

    $wp_customize->add_setting('pet_care_zone_topbar_email_link', array(
        'default' => false,
        'sanitize_callback' => 'pet_care_zone_sanitize_checkbox'
    ));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'pet_care_zone_topbar_email_link',array(
        'label'          => __( 'Show Sticky Header', 'pet-care-zone' ),
        'section'        => 'pet_care_zone_top_slider',
        'settings'       => 'pet_care_zone_topbar_email_link',
        'type'           => 'checkbox',
    )));

    //Product
    $wp_customize->add_section('pet_care_zone_product_category',array(
        'title' => esc_html__('Featured Product','pet-care-zone'),
        'description' => esc_html__('Here you have to select product category which will display perticular featured product in the home page.','pet-care-zone'),
        'priority'   => 60,
    ));

    $args = array(
       'type'                     => 'product',
        'child_of'                 => 0,
        'parent'                   => '',
        'orderby'                  => 'term_group',
        'order'                    => 'ASC',
        'hide_empty'               => false,
        'hierarchical'             => 1,
        'number'                   => '',
        'taxonomy'                 => 'product_cat',
        'pad_counts'               => false
    );
    $categories = get_categories( $args );
    $cats = array();
    $i = 0;
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cats[$category->slug] = $category->name;
    }
    $wp_customize->add_setting('pet_care_zone_pet_product',array(
        'sanitize_callback' => 'pet_care_zone_sanitize_select',
    ));
    $wp_customize->add_control('pet_care_zone_pet_product',array(
        'type'    => 'select',
        'choices' => $cats,
        'label' => __('Select Product Category','pet-care-zone'),
        'section' => 'pet_care_zone_product_category',
    ));

    // Footer
    $wp_customize->add_section('pet_care_zone_site_footer_section', array(
        'title' => esc_html__('Footer', 'pet-care-zone'),
        'priority'   => 70,
    ));

    $wp_customize->add_setting('pet_care_zone_footer_text_setting', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('pet_care_zone_footer_text_setting', array(
        'label' => __('Replace the footer text', 'pet-care-zone'),
        'section' => 'pet_care_zone_site_footer_section',
        'priority' => 1,
        'type' => 'text',
    ));
}
add_action('customize_register', 'pet_care_zone_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function pet_care_zone_customize_partial_blogname(){
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function pet_care_zone_customize_partial_blogdescription(){
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function pet_care_zone_customize_preview_js(){
    wp_enqueue_script('pet-care-zone-customizer', esc_url(get_template_directory_uri()) . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'pet_care_zone_customize_preview_js');
