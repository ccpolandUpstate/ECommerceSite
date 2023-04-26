<?php
/**
 * Animal Pet Care functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Animal Pet Care
 */

if ( ! defined( 'PET_CARE_ZONE_URL' ) ) {
    define( 'PET_CARE_ZONE_URL', esc_url( 'https://www.themagnifico.net/themes/pet-care-wordpress-theme/', 'animal-pet-care') );
}
if ( ! defined( 'PET_CARE_ZONE_TEXT' ) ) {
    define( 'PET_CARE_ZONE_TEXT', __( 'Animal Pet Care Pro','animal-pet-care' ));
}
if ( ! defined( 'PET_CARE_ZONE_CONTACT_SUPPORT' ) ) {
define('PET_CARE_ZONE_CONTACT_SUPPORT',__('https://wordpress.org/support/theme/animal-pet-care','animal-pet-care'));
}
if ( ! defined( 'PET_CARE_ZONE_REVIEW' ) ) {
define('PET_CARE_ZONE_REVIEW',__('https://wordpress.org/support/theme/animal-pet-care/reviews/#new-post','animal-pet-care'));
}
if ( ! defined( 'PET_CARE_ZONE_LIVE_DEMO' ) ) {
define('PET_CARE_ZONE_LIVE_DEMO',__('https://www.themagnifico.net/demo/animal-pet-care/','animal-pet-care'));
}
if ( ! defined( 'PET_CARE_ZONE_GET_PREMIUM_PRO' ) ) {
define('PET_CARE_ZONE_GET_PREMIUM_PRO',__('https://www.themagnifico.net/themes/pet-care-wordpress-theme/','animal-pet-care'));
}
if ( ! defined( 'PET_CARE_ZONE_PRO_DOC' ) ) {
define('PET_CARE_ZONE_PRO_DOC',__('https://www.themagnifico.net/eard/wathiqa/animal-pet-care-pro-doc/','animal-pet-care'));
}

function animal_pet_care_enqueue_styles() {
    wp_enqueue_style( 'bootstrap-css', esc_url(get_template_directory_uri()) . '/assets/css/bootstrap.css');
    $animal_pet_care_parentcss = 'pet-care-zone-style';
    $animal_pet_care_theme = wp_get_theme(); wp_enqueue_style( $animal_pet_care_parentcss, get_template_directory_uri() . '/style.css', array(), $animal_pet_care_theme->parent()->get('Version'));
    wp_enqueue_style( 'animal-pet-care-style', get_stylesheet_uri(), array( $animal_pet_care_parentcss ), $animal_pet_care_theme->get('Version'));

    wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );
}


add_action( 'wp_enqueue_scripts', 'animal_pet_care_enqueue_styles' );

function animal_pet_care_admin_scripts() {
    // demo CSS
    wp_enqueue_style( 'animal-pet-care-demo-css', get_theme_file_uri( 'assets/css/demo.css' ) );
}
add_action( 'admin_enqueue_scripts', 'animal_pet_care_admin_scripts' );

function animal_pet_care_theme_color() {

    $animal_pet_care_theme_color_css = '';
    $pet_care_zone_theme_color = get_theme_mod('pet_care_zone_theme_color');
    $pet_care_zone_theme_color_2 = get_theme_mod('pet_care_zone_theme_color_2');
    $pet_care_zone_preloader_bg_color = get_theme_mod('pet_care_zone_preloader_bg_color');
    $pet_care_zone_preloader_dot_1_color = get_theme_mod('pet_care_zone_preloader_dot_1_color');
    $pet_care_zone_preloader_dot_2_color = get_theme_mod('pet_care_zone_preloader_dot_2_color');

    if(get_theme_mod('pet_care_zone_preloader_bg_color') == '') {
        $pet_care_zone_preloader_bg_color = '#000';
    }
    if(get_theme_mod('pet_care_zone_preloader_dot_1_color') == '') {
        $pet_care_zone_preloader_dot_1_color = '#fff';
    }
    if(get_theme_mod('pet_care_zone_preloader_dot_2_color') == '') {
        $pet_care_zone_preloader_dot_2_color = '#7e4c4f';
    }

    $animal_pet_care_theme_color_css = '
        .top-info,.comment-respond input#submit,#colophon,.main-navigation .sub-menu,.sidebar h5,#button,.sidebar input[type="submit"], .sidebar button[type="submit"],.sidebar .tagcloud a:hover,.post-navigation .nav-previous a:hover, .post-navigation .nav-next a:hover, .posts-navigation .nav-previous a:hover, .posts-navigation .nav-next a:hover,.woocommerce .woocommerce-ordering select,.pro-button a, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.woocommerce-account .woocommerce-MyAccount-navigation ul li,.toggle-nav i,span.onsale,.addtocart a:hover,.social-link i.fab.fa-linkedin-in,.featured-cat,.woocommerce a.added_to_cart,.social-link i.fab.fa-facebook-f, .social-link i.fab.fa-twitter, .social-link i.fab.fa-instagram, .social-link i.fab.fa-linkedin-in, .social-link i.fab.fa-pinterest-p{
            background: '.esc_attr($pet_care_zone_theme_color).';
         }
        h1, h2, h3, h4, h5, h6,.article-box a,.sidebar ul li a:hover,p.price, .woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price,.navbar-brand a,.slider-btn a:hover, .main-navigation .menu > li > a {
            color: '.esc_attr($pet_care_zone_theme_color).';
         }

        .post-navigation .nav-previous a:hover, .post-navigation .nav-next a:hover, .posts-navigation .nav-previous a:hover, .posts-navigation .nav-next a:hover,.addtocart a:hover {
            border-color: '.esc_attr($pet_care_zone_theme_color).';
         }
        .wp-block-quote, .wp-block-quote:not(.is-large):not(.is-style-large), .wp-block-pullquote {
            border-color: '.esc_attr($pet_care_zone_theme_color).'!important;
         }
         @media screen and (max-width:1000px){
             .sidenav {
            background: '.esc_attr($pet_care_zone_theme_color).';
            }
         }
        .topbtn,.main-navigation .sub-menu > li > a:hover, .main-navigation .sub-menu > li > a:focus,.pro-button a:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.woocommerce ul.products li.product .onsale, .woocommerce span.onsale,#button:hover, #button:active,.comment-respond input#submit:hover,.woocommerce a.added_to_cart:hover,.social-link i.fab.fa-facebook-f:hover, .social-link i.fab.fa-twitter:hover, .social-link i.fab.fa-instagram:hover, .social-link i.fab.fa-linkedin-in:hover, .social-link i.fab.fa-pinterest-p:hover,.slider-btn a {
            background: '.esc_attr($pet_care_zone_theme_color_2).';
         }
         .woocommerce .star-rating span::before, .woocommerce ul.products li.product .star-rating, .woocommerce .star-rating,.box-category a,a, .main-navigation .menu > li > a:hover{
            color: '.esc_attr($pet_care_zone_theme_color_2).';
         }
         .loading{
            background-color: '.esc_attr($pet_care_zone_preloader_bg_color).';
         }
         @keyframes loading {
          0%,
          100% {
            transform: translatey(-2.5rem);
            background-color: '.esc_attr($pet_care_zone_preloader_dot_1_color).';
          }
          50% {
            transform: translatey(2.5rem);
            background-color: '.esc_attr($pet_care_zone_preloader_dot_2_color).';
          }
        }
    ';
    wp_add_inline_style( 'animal-pet-care-style',$animal_pet_care_theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'animal_pet_care_theme_color' );

function animal_pet_care_customize_register($wp_customize){

    // Slider
    $wp_customize->add_section('animal_pet_care_top_slider',array(
        'title' => esc_html__('Slider Option','animal-pet-care'),
        'description' => esc_html__('Here you have to select page in below dropdown. Image Dimension ( 1800px x 600px )','animal-pet-care'),
        'priority'   => 50,
    ));

    for ( $pet_care_zone_count = 1; $pet_care_zone_count <= 3; $pet_care_zone_count++ ) {
        $wp_customize->add_setting( 'animal_pet_care_top_slider_page' . $pet_care_zone_count, array(
            'default'           => '',
            'sanitize_callback' => 'pet_care_zone_sanitize_dropdown_pages'
        ) );
        $wp_customize->add_control( 'animal_pet_care_top_slider_page' . $pet_care_zone_count, array(
            'label'    => __( 'Select Slide Page', 'animal-pet-care' ),
            'section'  => 'animal_pet_care_top_slider',
            'type'     => 'dropdown-pages'
        ) );
    }

    // Our Services
    $wp_customize->add_section('animal_pet_care_services_section',array(
        'title' => esc_html__('Our Services','animal-pet-care'),
        'description' => esc_html__('Here you have to select category which will display perticular services in the home page.','animal-pet-care'),
        'priority' => 70,
    ));

    $wp_customize->add_setting('animal_pet_care_services_title',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('animal_pet_care_services_title',array(
        'label' => esc_html__('Section Title','animal-pet-care'),
        'section' => 'animal_pet_care_services_section',
        'setting' => 'animal_pet_care_services_title',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('animal_pet_care_services_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('animal_pet_care_services_text',array(
        'label' => esc_html__('Section Text','animal-pet-care'),
        'section' => 'animal_pet_care_services_section',
        'setting' => 'animal_pet_care_services_text',
        'type'  => 'text'
    ));

    $categories = get_categories();
    $cat_post = array();
    $cat_post[]= 'select';
    $i = 0;
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cat_post[$category->slug] = $category->name;
    }

    $wp_customize->add_setting('animal_pet_care_services_sec_category',array(
        'default'   => 'select',
        'sanitize_callback' => 'pet_care_zone_sanitize_select',
    ));
    $wp_customize->add_control('animal_pet_care_services_sec_category',array(
        'type'    => 'select',
        'choices' => $cat_post,
        'label' => __('Select Category to display services','animal-pet-care'),
        'section' => 'animal_pet_care_services_section',
    ));

    $wp_customize->add_setting('animal_pet_care_services_per_page',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('animal_pet_care_services_per_page',array(
        'label' => esc_html__('No Of Icons','animal-pet-care'),
        'section' => 'animal_pet_care_services_section',
        'setting' => 'animal_pet_care_services_per_page',
        'type'  => 'text'
    ));

    $icon = get_theme_mod('animal_pet_care_services_per_page','');
    for ($i=1; $i <= $icon; $i++) {
        $wp_customize->add_setting('animal_pet_care_services_icon'.$i,array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control('animal_pet_care_services_icon'.$i,array(
            'label' => esc_html__('Icon ','animal-pet-care').$i,
            'section' => 'animal_pet_care_services_section',
            'setting' => 'animal_pet_care_services_icon'.$i,
            'type'  => 'text'
        ));
    }
}
add_action('customize_register', 'animal_pet_care_customize_register');

if ( ! function_exists( 'animal_pet_care_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function animal_pet_care_setup() {

        add_theme_support( 'responsive-embeds' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        add_image_size('animal-pet-care-featured-header-image', 2000, 660, true);

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'pet_care_zone_custom_background_args', array(
            'default-color' => '',
            'default-image' => '',
        ) ) );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 50,
            'width'       => 50,
            'flex-width'  => true,
        ) );

        add_editor_style( array( '/editor-style.css' ) );

        add_theme_support( 'align-wide' );

        add_theme_support( 'wp-block-styles' );
    }
endif;
add_action( 'after_setup_theme', 'animal_pet_care_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function animal_pet_care_widgets_init() {
        register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'animal-pet-care' ),
        'id'            => 'sidebar',
        'description'   => esc_html__( 'Add widgets here.', 'animal-pet-care' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ) );
}
add_action( 'widgets_init', 'animal_pet_care_widgets_init' );

function animal_pet_care_remove_customize_register() {
    global $wp_customize;
    $wp_customize->remove_section( 'pet_care_zone_top_slider' );
}

add_action( 'customize_register', 'animal_pet_care_remove_customize_register', 11 );
