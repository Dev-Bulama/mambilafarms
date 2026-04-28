<?php
/**
 * Mambilla Legacy Farms — Theme Functions
 */

// ─── THEME SETUP ─────────────────────────────────────────────────────────────
function mambila_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo', array(
        'height'      => 40,
        'width'       => 40,
        'flex-height' => true,
        'flex-width'  => true,
    ) );
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list',
        'gallery', 'caption', 'style', 'script',
    ) );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'editor-styles' );
    add_editor_style( 'assets/css/theme.css' );

    register_nav_menus( array(
        'primary'          => __( 'Primary Navigation', 'mambilafarms' ),
        'footer-navigate'  => __( 'Footer Navigate Menu', 'mambilafarms' ),
        'footer-invest'    => __( 'Footer Invest Menu', 'mambilafarms' ),
    ) );
}
add_action( 'after_setup_theme', 'mambila_setup' );

// ─── ENQUEUE ASSETS ──────────────────────────────────────────────────────────
function mambila_enqueue_assets() {
    wp_enqueue_style(
        'mambila-fonts',
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap',
        array(),
        null
    );

    wp_enqueue_style(
        'mambila-theme',
        get_template_directory_uri() . '/assets/css/theme.css',
        array( 'mambila-fonts' ),
        '1.0.0'
    );

    wp_enqueue_script(
        'mambila-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        '1.0.0',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'mambila_enqueue_assets' );

// ─── FOOTER WIDGET AREA ──────────────────────────────────────────────────────
function mambila_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Footer Widget Area', 'mambilafarms' ),
        'id'            => 'footer-widget-area',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5>',
        'after_title'   => '</h5>',
    ) );
}
add_action( 'widgets_init', 'mambila_widgets_init' );

// ─── CUSTOM NAV WALKER (flat <a> tags, no ul/li) ─────────────────────────────
class Mambila_Flat_Walker extends Walker_Nav_Menu {

    public function start_lvl( &$output, $depth = 0, $args = null ) {}
    public function end_lvl( &$output, $depth = 0, $args = null ) {}

    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes = (array) $item->classes;
        $active  = ( in_array( 'current-menu-item', $classes, true )
                  || in_array( 'current-menu-ancestor', $classes, true )
                  || in_array( 'current-page-ancestor', $classes, true ) )
                  ? 'on' : '';
        $output .= '<a href="' . esc_url( $item->url ) . '"'
                 . ( $active ? ' class="' . esc_attr( $active ) . '"' : '' )
                 . '>' . esc_html( $item->title ) . '</a>';
    }

    public function end_el( &$output, $item, $depth = 0, $args = null ) {}
}

// ─── FALLBACK NAV (when no menu is assigned) ─────────────────────────────────
function mambila_fallback_nav() {
    $links = array(
        home_url( '/' )          => 'Home',
        home_url( '/about/' )    => 'About',
        home_url( '/whatwedo/' ) => 'What We Do',
        home_url( '/tiers/' )    => 'Invest',
        home_url( '/contact/' )  => 'Contact',
    );
    foreach ( $links as $url => $label ) {
        echo '<a href="' . esc_url( $url ) . '">' . esc_html( $label ) . '</a>';
    }
}

// ─── ELEMENTOR COMPATIBILITY ─────────────────────────────────────────────────
// Ensure wp_head and wp_footer fire on Elementor canvas/popup templates
add_action( 'elementor/page_templates/canvas/before_content', 'wp_head' );
add_action( 'elementor/page_templates/canvas/after_content',  'wp_footer' );
