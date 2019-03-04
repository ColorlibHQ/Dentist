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
 * Before Wrapper
 *
 * @Preloader
 *
 */
add_action( 'dentist_preloader', 'dentist_site_preloader', 10 );

/**
 * Header
 *
 * @Header Menu
 * @Header Bottom
 * 
 */

add_action( 'dentist_header', 'dentist_header_cb', 10 );

/**
 * Hook for footer
 *
 */
add_action( 'dentist_footer', 'dentist_footer_area', 10 );
add_action( 'dentist_footer', 'dentist_back_to_top', 20 );

/**
 * Hook for Blog, single, page, search, archive pages wrapper.
 */
add_action( 'dentist_wrp_start', 'dentist_wrp_start_cb', 10 );
add_action( 'dentist_wrp_end', 'dentist_wrp_end_cb', 10 );

/**
 * Hook for Page wrapper.
 */
add_action( 'dentist_page_wrp_start', 'dentist_page_wrp_start_cb', 10 );
add_action( 'dentist_page_wrp_end', 'dentist_page_wrp_end_cb', 10 );

/**
 * Hook for Blog, single, search, archive pages column.
 */
add_action( 'dentist_blog_col_start', 'dentist_blog_col_start_cb', 10 );
add_action( 'dentist_blog_col_end', 'dentist_blog_col_end_cb', 10 );

/**
 * Hook for Page column.
 */
add_action( 'dentist_page_col_start', 'dentist_page_col_start_cb', 10 );
add_action( 'dentist_page_col_end', 'dentist_page_col_end_cb', 10 );

/**
 * Hook for blog posts thumbnail.
 */
add_action( 'dentist_blog_posts_thumb', 'dentist_blog_posts_thumb_cb', 10 );

/**
 * Hook for blog posts title.
 */
add_action( 'dentist_blog_posts_title', 'dentist_blog_posts_title_cb', 10 );

/**
 * Hook for blog posts meta.
 */
add_action( 'dentist_blog_posts_meta', 'dentist_blog_posts_meta_cb', 10 );

/**
 * Hook for blog posts bottom meta.
 */
add_action( 'dentist_blog_posts_bottom_meta', 'dentist_blog_posts_bottom_meta_cb', 10 );

/**
 * Hook for blog posts excerpt.
 */
add_action( 'dentist_blog_posts_excerpt', 'dentist_blog_posts_excerpt_cb', 10 );

/**
 * Hook for blog posts content.
 */
add_action( 'dentist_blog_posts_content', 'dentist_blog_posts_content_cb', 10 );

/**
 * Hook for blog sidebar.
 */
add_action( 'dentist_blog_sidebar', 'dentist_blog_sidebar_cb', 10 );

/**
 * Hook for page sidebar.
 */
add_action( 'dentist_page_sidebar', 'dentist_page_sidebar_cb', 10 );

/**
 * Hook for blog single post social share option.
 */
add_action( 'dentist_blog_posts_share', 'dentist_blog_posts_share_cb', 10 );

/**
 * Hook for blog single post meta category, tag, next - previous link and comments form.
 */
add_action( 'dentist_blog_single_meta', 'dentist_blog_single_meta_cb', 10 );

/**
 * Hook for blog single footer nav next - previous link and comments form.
 */
add_action( 'dentist_blog_single_footer_nav', 'dentist_blog_single_footer_nav_cb', 10 );

/**
 * Hook for page content.
 */
add_action( 'dentist_page_content', 'dentist_page_content_cb', 10 );


/**
 * Hook for 404 page.
 */
add_action( 'dentist_fof', 'dentist_fof_cb', 10 );
