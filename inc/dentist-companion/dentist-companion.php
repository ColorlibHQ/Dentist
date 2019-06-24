<?php
/**
 * @Packge     : Dentist Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

if( !defined( 'WPINC' ) ){
    die;
}

/*************************
    Define Constant
*************************/

// Define version constant
if( ! defined( 'DENTIST_COMPANION_VERSION' ) ) {
    define( 'DENTIST_COMPANION_VERSION', '1.0' );
}

// Define dir path constant
if( ! defined( 'DENTIST_COMPANION_DIR_PATH' ) ) {
    define( 'DENTIST_COMPANION_DIR_PATH',  get_parent_theme_file_path().'/inc/dentist-companion/' );
}

// Define inc dir path constant
if( ! defined( 'DENTIST_COMPANION_INC_DIR_PATH' ) ) {
    define( 'DENTIST_COMPANION_INC_DIR_PATH', DENTIST_COMPANION_DIR_PATH . 'inc/' );
}

// Define sidebar widgets dir path constant
if( ! defined( 'DENTIST_COMPANION_SW_DIR_PATH' ) ) {
    define( 'DENTIST_COMPANION_SW_DIR_PATH', DENTIST_COMPANION_INC_DIR_PATH . 'sidebar-widgets/' );
}

// Define elementor widgets dir path constant
if( ! defined( 'DENTIST_COMPANION_EW_DIR_PATH' ) ) {
    define( 'DENTIST_COMPANION_EW_DIR_PATH', DENTIST_COMPANION_INC_DIR_PATH . 'elementor-widgets/' );
}

// Define demo data dir path constant
if( ! defined( 'DENTIST_COMPANION_DEMO_DIR_PATH' ) ) {
    define( 'DENTIST_COMPANION_DEMO_DIR_PATH', DENTIST_COMPANION_INC_DIR_PATH . 'demo-data/' );
}

// Define plugin dir url constant
if( ! defined( 'DENTIST_THEME_DIR_URL' ) ) {
    define( 'DENTIST_THEME_DIR_URL', get_template_directory_uri() );
}

// Define inc dir url constant
if( ! defined( 'DENTIST_COMPANION_DIR_URL' ) ) {
    define( 'DENTIST_COMPANION_DIR_URL', DENTIST_THEME_DIR_URL . '/inc/dentist-companion/' );
}

// Define inc dir url constant
if( ! defined( 'DENTIST_COMPANION_INC_DIR_URL' ) ) {
    define( 'DENTIST_COMPANION_INC_DIR_URL', DENTIST_COMPANION_DIR_URL . '/inc/' );
}

// Define elementor-widgets dir url constant
if( ! defined( 'DENTIST_COMPANION_EW_DIR_URL' ) ) {
    define( 'DENTIST_COMPANION_EW_DIR_URL', DENTIST_COMPANION_INC_DIR_URL . 'elementor-widgets/' );
}

// Define demo data dir url constant
if( ! defined( 'DENTIST_COMPANION_DD_DIR_URL' ) ) {
    define( 'DENTIST_COMPANION_DD_DIR_URL', DENTIST_COMPANION_INC_DIR_URL . 'demo-data/' );
}

// Define demo data dir url constant
if( ! defined( 'DENTIST_COMPANION_META_DIR_URL' ) ) {
    define( 'DENTIST_COMPANION_META_DIR_URL', DENTIST_COMPANION_INC_DIR_URL . 'dentist-meta/' );
}


$current_theme = wp_get_theme();

$is_parent = $current_theme->parent();

if( ( 'Dentist' ==  $current_theme->get( 'Name' ) ) || ( $is_parent && 'Dentist' == $is_parent->get( 'Name' ) ) ) {
    require_once DENTIST_COMPANION_DIR_PATH . 'dentist-init.php';
} else {

    add_action( 'admin_notices', 'dentist_companion_admin_notice', 99 );
    function dentist_companion_admin_notice() {
        $url = 'https://wordpress.org/themes/dentist/';
    ?>
        <div class="notice-warning notice">
            <p><?php printf( __( 'In order to use the <strong>Dentist Companion</strong> plugin you have to also install the %1$sDentist Theme%2$s', 'dentist' ), '<a href="' . esc_url( $url ) . '" target="_blank">', '</a>' ); ?></p>
        </div>
        <?php
    }
}
