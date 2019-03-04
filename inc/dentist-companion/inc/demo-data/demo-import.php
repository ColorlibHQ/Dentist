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

// demo import file
function dentist_import_files() {
	
	$demoImg = '<img src="'. DENTIST_COMPANION_DD_DIR_URL . 'screen-image.png' .' " alt="'.esc_attr__( 'Demo Preview Imgae', 'dentist' ).'" />';
	
  return array(
    array(
      'import_file_name'             => 'Dentist Demo',
      'local_import_file'            => DENTIST_COMPANION_DEMO_DIR_PATH .'dentist-demo.xml',
      'local_import_widget_file'     => DENTIST_COMPANION_DEMO_DIR_PATH .'dentist-widgets-demo.json',
      'import_customizer_file_url'   => DENTIST_COMPANION_DD_DIR_URL . 'dentist-customizer.dat',
      'import_notice' => $demoImg,
    ),
  );
}
add_filter( 'pt-ocdi/import_files', 'dentist_import_files' );
	
// demo import setup
function dentist_after_import_setup() {
	// Assign menus to their locations.
    $main_menu    = get_term_by( 'name', 'Primary Menu', 'nav_menu' );
	$social_menu    = get_term_by( 'name', 'Social Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
            'primary-menu' => $main_menu->term_id,
            'social-menu'  => $social_menu->term_id
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home' );
	$blog_page_id  = get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );
	update_option( 'dentist_demodata_import', 'yes' );

}
add_action( 'pt-ocdi/after_import', 'dentist_after_import_setup' );

//disable the branding notice after successful demo import
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

//change the location, title and other parameters of the plugin page
function dentist_import_plugin_page_setup( $default_settings ) {
	$default_settings['parent_slug'] = 'themes.php';
	$default_settings['page_title']  = esc_html__( 'One Click Demo Import' , 'dentist' );
	$default_settings['menu_title']  = esc_html__( 'Import Demo Data' , 'dentist' );
	$default_settings['capability']  = 'import';
	$default_settings['menu_slug']   = 'dentist-demo-import';

	return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'dentist_import_plugin_page_setup' );

// Enqueue scripts
function dentist_demo_import_custom_scripts(){
	
	
	if( isset( $_GET['page'] ) && $_GET['page'] == 'dentist-demo-import' ){
		// style
		wp_enqueue_style( 'dentist-demo-import', DENTIST_COMPANION_DD_DIR_URL . 'css/demo-import.css', array(), '1.0', false );
	}
	
	
}
add_action( 'admin_enqueue_scripts', 'dentist_demo_import_custom_scripts' );



?>