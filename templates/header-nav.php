
<header id="header">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-4 header-top-left no-padding">
                    <?php
                    // Header Logo
                    echo dentist_theme_logo();
                    ?>
                </div>
                <div class="col-lg-6 col-sm-6 col-8 header-top-right no-padding">
                    <?php if( dentist_opt( 'dentist-header-top-phone' ) ) {
                        echo '<a href="tel:'. dentist_opt( 'dentist-header-top-phone' ) .'">'. dentist_opt( 'dentist-header-top-phone' ) .'</a>';
                    }
                    if( dentist_opt( 'dentist-header-top-email' ) ) {
                        echo '<a href="mailto:'. dentist_opt( 'dentist-header-top-email' ) .'">'. dentist_opt( 'dentist-header-top-email' ) .'</a>';
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <?php
    $menu_container =  has_nav_menu( 'primary-menu' ) || has_nav_menu( 'social-menu' ) ? 'main-menu' : 'no-menu-active';
    ?>
    <div class="container <?php echo esc_attr( $menu_container ) ?>">
        <div class="row align-items-center justify-content-between d-flex">
            
                <?php
                if( has_nav_menu( 'primary-menu' ) ) {
                    echo '<nav id="nav-menu-container">';
                    $args = array(
                        'theme_location' => 'primary-menu',
                        'container'      => '',
                        'depth'          => 2,
                        'menu_class'     => 'nav-menu',
                        'fallback_cb'    => 'dentist_bootstrap_navwalker::fallback',
                        'walker'         => new dentist_bootstrap_navwalker(),
                    );  
                    wp_nav_menu( $args );
                    echo '</nav>';
                }

                //Social Menu
                if( has_nav_menu( 'social-menu' ) ){
                    echo '<div class="menu-social-icons">';
                    $args = array(
                        'theme_location' => 'social-menu',
                        'container'      => '',
                        'depth'          => 1,
                        'menu_class'     => 'nav-social',
                        'fallback_cb'    => 'dentist_social_navwalker::fallback',
                        'walker'         => new dentist_social_navwalker(),
                    );
                    wp_nav_menu( $args );
                    echo ' </div>';
                }
                ?>           
        </div>
    </div>
</header><!-- #header -->
