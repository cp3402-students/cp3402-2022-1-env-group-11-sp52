<?php

require get_stylesheet_directory() . '/customizer/customizer.php';

add_action( 'after_setup_theme', 'educational_institute_after_setup_theme' );
function educational_institute_after_setup_theme() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( "responsive-embeds" );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'educational-institute-featured-image', 2000, 1200, true );
    add_image_size( 'educational-institute-thumbnail-avatar', 100, 100, true );

    // Set the default content width.
    $GLOBALS['content_width'] = 525;

    // Add theme support for Custom Logo.
    add_theme_support( 'custom-logo', array(
        'width'       => 250,
        'height'      => 250,
        'flex-width'  => true,
    ) );

    add_theme_support( 'custom-background', array(
        'default-color' => 'ffffff'
    ) );

    add_theme_support( 'html5', array('comment-form','comment-list','gallery','caption',) );

    add_editor_style( array( 'assets/css/editor-style.css') );
}

/**
 * Register widget area.
 */
function educational_institute_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Blog Sidebar', 'educational-institute' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'educational-institute' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Page Sidebar', 'educational-institute' ),
        'id'            => 'sidebar-2',
        'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'educational-institute' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Sidebar 3', 'educational-institute' ),
        'id'            => 'sidebar-3',
        'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'educational-institute' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 1', 'educational-institute' ),
        'id'            => 'footer-1',
        'description'   => __( 'Add widgets here to appear in your footer.', 'educational-institute' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 2', 'educational-institute' ),
        'id'            => 'footer-2',
        'description'   => __( 'Add widgets here to appear in your footer.', 'educational-institute' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 3', 'educational-institute' ),
        'id'            => 'footer-3',
        'description'   => __( 'Add widgets here to appear in your footer.', 'educational-institute' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 4', 'educational-institute' ),
        'id'            => 'footer-4',
        'description'   => __( 'Add widgets here to appear in your footer.', 'educational-institute' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'educational_institute_widgets_init' );

// enqueue styles for child theme
function educational_institute_enqueue_styles() {

    wp_enqueue_style( 'educational-institute-fonts', elearning_education_fonts_url(), array(), null );

    // Bootstrap
    wp_enqueue_style( 'bootstrap-css', get_theme_file_uri( '/assets/css/bootstrap.css' ) );

    // Theme block stylesheet.
    wp_enqueue_style( 'educational-institute-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array( 'educational-institute-child-style' ), '1.0' );

    // enqueue parent styles
    wp_enqueue_style('elearning-education-style', get_template_directory_uri() .'/style.css');

    // enqueue child styles
    wp_enqueue_style('educational-institute-child-style', get_stylesheet_directory_uri() .'/style.css', array('elearning-education-style'));

    wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );
}
add_action('wp_enqueue_scripts', 'educational_institute_enqueue_styles');

function educational_institute_admin_scripts() {
    // Backend CSS
    wp_enqueue_style( 'educational-institute-backend-css', get_theme_file_uri( '/assets/css/customizer.css' ) );
}
add_action( 'admin_enqueue_scripts', 'educational_institute_admin_scripts' );

function educational_institute_header_style() {
    if ( get_header_image() ) :
    $custom_header = "
        .headerbox{
            background-image:url('".esc_url(get_header_image())."');
            background-position: center top;
        }";
        wp_add_inline_style( 'educational-institute-child-style', $custom_header );
    endif;
}
add_action( 'wp_enqueue_scripts', 'educational_institute_header_style' );

if ( ! defined( 'ELEARNING_EDUCATION_PRO_THEME_URL' ) ) {
    define( 'ELEARNING_EDUCATION_PRO_THEME_URL', 'https://www.themespride.com/themes/educational-institute-wordpress-theme/' );
}
if ( ! defined( 'ELEARNING_EDUCATION_PRO_THEME_NAME' ) ) {
    define( 'ELEARNING_EDUCATION_PRO_THEME_NAME', esc_html__( 'Educational Institute Pro', 'educational-institute' ));
}
if ( ! defined( 'ELEARNING_EDUCATION_FREE_THEME_URL' ) ) {
	define( 'ELEARNING_EDUCATION_FREE_THEME_URL', 'https://www.themespride.com/themes/free-educational-wordpress-theme/' );
}
if ( ! defined( 'ELEARNING_EDUCATION_DEMO_THEME_URL' ) ) {
	define( 'ELEARNING_EDUCATION_DEMO_THEME_URL', 'https://www.themespride.com/educational-institute-pro/' );
}
if ( ! defined( 'ELEARNING_EDUCATION_DOCS_THEME_URL' ) ) {
    define( 'ELEARNING_EDUCATION_DOCS_THEME_URL', 'https://themespride.com/demo/docs/educational-institute-lite/' );
}
if ( ! defined( 'ELEARNING_EDUCATION_DOCS_URL' ) ) {
    define( 'ELEARNING_EDUCATION_DOCS_URL', 'https://themespride.com/demo/docs/educational-institute-lite/' );
}
if ( ! defined( 'ELEARNING_EDUCATION_RATE_THEME_URL' ) ) {
    define( 'ELEARNING_EDUCATION_RATE_THEME_URL', 'https://wordpress.org/support/theme/educational-institute/reviews/#new-post' );
}
if ( ! defined( 'ELEARNING_EDUCATION_CHANGELOG_THEME_URL' ) ) {
    define( 'ELEARNING_EDUCATION_CHANGELOG_THEME_URL', get_stylesheet_directory() . '/readme.txt' );
}
if ( ! defined( 'ELEARNING_EDUCATION_SUPPORT_THEME_URL' ) ) {
    define( 'ELEARNING_EDUCATION_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/educational-institute' );
}

define('EDUCATIONAL_INSTITUTE_CREDIT',__('https://www.themespride.com/themes/free-educational-wordpress-theme/','educational-institute') );
if ( ! function_exists( 'educational_institute_credit' ) ) {
    function educational_institute_credit(){
        echo "<a href=".esc_url(EDUCATIONAL_INSTITUTE_CREDIT)." target='_blank'>".esc_html__('Educational Institute WordPress Theme ','educational-institute')."</a>";
    }
}
