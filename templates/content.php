<?php
/**
 * @Packge     : Politis
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

// Block direct access
if( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// Post Item Start
?>


<div id="<?php the_ID(); ?>" <?php post_class( esc_attr( 'single-post row' ) ); ?>>

    <div class="col-lg-3 col-md-3 meta-details">
		<?php

		/**
		 * Blog Post Meta
		 * @Hook  dentist_blog_single_meta
		 *
		 * @Hooked dentist_blog_single_meta_cb
		 *
		 */
		do_action( 'dentist_blog_single_meta' );

		?>
    </div>
    <div class="col-lg-9 col-md-9 blog-content">
        <div class="feature-img">
			<?php
			/**
			 * Blog Post thumbnail
			 * @Hook  dentist_blog_posts_thumb
			 *
			 * @Hooked dentist_blog_posts_thumb_cb
			 *
			 *
			 */
			do_action( 'dentist_blog_posts_thumb' );
			?>
        </div>
		<?php
		/**
		 * Blog Post title
		 * @Hook  dentist_blog_posts_title
		 *
		 * @Hooked dentist_blog_posts_title_cb
		 *
		 *
		 */
		do_action( 'dentist_blog_posts_title' );

		/**
		 * Blog Excerpt With read more button
		 * @Hook  dentist_blog_posts_excerpt
		 *
		 * @Hooked dentist_blog_posts_excerpt_cb
		 *
		 *
		 */
		do_action( 'dentist_blog_posts_excerpt' );
		?>
    </div>

</div>