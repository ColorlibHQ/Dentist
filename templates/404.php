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
?>

<div id="f0f" class="pd--100-0">
	<div class="container">
		<div class="row">
			<div class="f0f--content text-center col-md-12">
				<div class="inner-fof">
					<div class="inner-child-fof">
						<?php 
						$errorText = esc_html__( 'Oops 404 Error!', 'dentist' );
						// Error text
						echo '<h1 class="h1 mb-15">'.esc_html( dentist_opt( 'dentist_fof_text_one', $errorText ) ).'</h1>';

						// Wrong text block
						$wrongText = esc_html__( 'Either something went wrong or the page dosen\'t exist anymore.', 'dentist'  );

						$wrongText = dentist_opt( 'dentist_fof_text_two', $wrongText );
				
						echo dentist_paragraph_tag(
							array(
								'text' 	 => sprintf( '%s', esc_html( $wrongText ) ),
							)
						);

						?>
						<div class="row">
							<div class="col-md-6 offset-3">
								<?php 
									// Search Form
									get_search_form();
								?>
							</div>
						</div>
						<?php 
							echo dentist_anchor_tag(
							array(
								'url' 	 => esc_url( site_url( '/' ) ),
								'text' 	 => esc_html__( 'Back To Home page', 'dentist' ),
								'class'	 => 'primary-btn mt-20'
							)
						);
						?>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>