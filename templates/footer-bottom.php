<?php 
// Copy right text
$url = 'https://colorlib.com/';
$copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'dentist' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );

$footerWidget = dentist_opt( 'dentist-widget-toggle-settings', false );
$footer_bottom = ! empty( $footerWidget ) ? 'footer-bottom' : '';
?>

<div class="copyright-text">
    <div class="container">
        <div class="row d-flex justify-content-between <?php echo esc_attr( $footer_bottom ) ?>">
            <p class="col-lg-8 col-sm-6 footer-text m-0"><?php echo wp_kses_post( dentist_opt( 'dentist-copyright-text-settings', $copyText ) ); ?></p>
            <?php
            if( has_nav_menu( 'social-menu' ) ) {
                echo '<div class="col-lg-4 col-sm-6">';
                    $args = array(
                        'theme_location' => 'social-menu',
                        'container'      => '',
                        'depth'          => 1,
                        'menu_class'     => 'footer-social',
                        'fallback_cb'    => 'dentist_social_navwalker::fallback',
                        'walker'         => new dentist_social_navwalker(),
                    );  
                    wp_nav_menu( $args );
                echo '</div>';
            }
            ?>
        </div>                      
    </div>
</div>