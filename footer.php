<?php 
/**
 * @Packge     : Dentist
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
// Block direct access
if( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

/**
 * Footer Area
 *
 * @Footer
 * @Back To Top Button
 *
 * @Hook dentist_footer
 *
 * @Hooked  dentist_footer_area 10
 * @Hooked  dentist_back_to_top 20
 *
 */

do_action( 'dentist_footer' );

wp_footer(); 
?>
</body>
</html>