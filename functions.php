<?php 
/**
 * @Packge 	   : Dentist
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
// Block direct access
if( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


/**
 *
 * Define constant
 *
 */
 
// Base URI
if( ! defined( 'DENTIST_DIR_URI' ) ) {
	define( 'DENTIST_DIR_URI', get_template_directory_uri().'/' );
}

// assets URI
if( ! defined( 'DENTIST_DIR_ASSETS_URI' ) ) {
	define( 'DENTIST_DIR_ASSETS_URI', DENTIST_DIR_URI.'assets/' );
}

// Css File URI
if( ! defined( 'DENTIST_DIR_CSS_URI' ) ) {
	define( 'DENTIST_DIR_CSS_URI', DENTIST_DIR_ASSETS_URI .'css/' );
}

// Js File URI
if( ! defined( 'DENTIST_DIR_JS_URI' ) ) {
	define( 'DENTIST_DIR_JS_URI', DENTIST_DIR_ASSETS_URI .'js/' );
}

// Base Directory
if( ! defined( 'DENTIST_DIR_PATH' ) ) {
	define( 'DENTIST_DIR_PATH', get_parent_theme_file_path().'/' );
}

//Inc Folder Directory
if( ! defined( 'DENTIST_DIR_PATH_INC' ) ) {
	define( 'DENTIST_DIR_PATH_INC', DENTIST_DIR_PATH.'inc/' );
}

//Dentist libraries Folder Directory
if( ! defined( 'DENTIST_DIR_PATH_LIBS' ) ) {
	define( 'DENTIST_DIR_PATH_LIBS', DENTIST_DIR_PATH_INC.'libraries/' );
}

//Classes Folder Directory
if( ! defined( 'DENTIST_DIR_PATH_CLASSES' ) ) {
	define( 'DENTIST_DIR_PATH_CLASSES', DENTIST_DIR_PATH_INC.'classes/' );
}

//Hooks Folder Directory
if( ! defined( 'DENTIST_DIR_PATH_HOOKS' ) ) {
	define( 'DENTIST_DIR_PATH_HOOKS', DENTIST_DIR_PATH_INC.'hooks/' );
}

//Widgets Folder Directory
if( ! defined( 'DENTIST_DIR_PATH_WIDGET' ) ) {
	define( 'DENTIST_DIR_PATH_WIDGET', DENTIST_DIR_PATH_INC.'widgets/' );
}




/**
 * Include File
 *
 */

require_once( DENTIST_DIR_PATH_INC . 'dentist-companion/dentist-companion.php' );
require_once( DENTIST_DIR_PATH_INC . 'breadcrumbs.php' );
require_once( DENTIST_DIR_PATH_INC . 'category-meta.php' );
require_once( DENTIST_DIR_PATH_INC . 'widgets-reg.php' );
require_once( DENTIST_DIR_PATH_INC . 'wp_bootstrap_navwalker.php' );
require_once( DENTIST_DIR_PATH_INC . 'dentist-functions.php' );
require_once( DENTIST_DIR_PATH_INC . 'commoncss.php' );
require_once( DENTIST_DIR_PATH_INC . 'support-functions.php' );
require_once( DENTIST_DIR_PATH_INC . 'wp-html-helper.php' );
require_once( DENTIST_DIR_PATH_INC . 'customizer/customizer.php' );
require_once( DENTIST_DIR_PATH_CLASSES . 'Class-Enqueue.php' );
require_once( DENTIST_DIR_PATH_CLASSES . 'Class-Config.php' );
require_once( DENTIST_DIR_PATH_HOOKS . 'hooks.php' );
require_once( DENTIST_DIR_PATH_HOOKS . 'hooks-functions.php' );
require_once( DENTIST_DIR_PATH_INC . 'class-epsilon-dashboard-autoloader.php' );
require_once( DENTIST_DIR_PATH_INC . 'class-epsilon-init-dashboard.php' );


/**
 * Instantiate Dentist object
 *
 * Inside this object:
 * Enqueue scripts, Google font, Theme support features, Epsilon Dashboard .
 *
 */

$obj = new Dentist();
