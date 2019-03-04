<?php
namespace Dentistelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


/**
 *
 * Dentist elementor about page section widget.
 *
 * @since 1.0
 */
class Dentist_Contact_Section extends Widget_Base {

    public function get_name() {
        return 'dentist-contact-section';
    }

    public function get_title() {
        return __( 'Contact Section', 'dentist' );
    }

    public function get_icon() {
        return 'eicon-mail';
    }

    public function get_categories() {
        return [ 'dentist-elements' ];
    }

    protected function _register_controls() {

        $repeater = new \Elementor\Repeater();

        // ----------------------------------------  Contact Info  ------------------------------
        
        $this->start_controls_section(
            'contact_sec',
            [
                'label' => esc_html__( 'Contact Section Feature Image', 'dentist' ),
            ]
        );
	    $this->add_group_control(
		    Group_Control_Background::get_type(),
		    [
			    'name' => 'bgimg',
			    'label' => __( 'Feature Image', 'dentist' ),
			    'types' => [ 'classic' ],
			    'selector' => '{{WRAPPER}} .appoinment-area:after',
		    ]
	    );

        $this->end_controls_section(); // End Contact Info

        // ----------------------------------------  Contact Form  ------------------------------
        
        $this->start_controls_section(
            'contact_form',
            [
                'label' => __( 'Contact Form', 'dentist' ),
            ]
        );
	    $this->add_control(
		    'content_title',
		    [
			    'label'         => esc_html__( 'Title', 'dentist' ),
			    'type'          => Controls_Manager::TEXT,
			    'label_block'   => true,
			    'default'       => __( 'Book an Appoinment', 'dentist' )
		    ]
	    );
        $this->add_control(
            'contact_formshortcode',
            [
                'label'     => esc_html__( 'Form Shortcode', 'dentist' ),
                'type'      => Controls_Manager::TEXT,
                'label_block' => true
            ]
        );
        $this->end_controls_section(); // End Contact Form


        /**
         * Style Tab
         * ------------------------------ Style ------------------------------
         *
         */
        $this->start_controls_section(
            'style_content_color', [
                'label' => __( 'Style Content Color', 'dentist' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_form_title', [
                'label'     => __( 'Form title color', 'dentist' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .appoinment-right h1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_fbtntextcolor', [
                'label'     => __( 'Form Button Label color', 'dentist' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .primary-btn.primary' => 'color: {{VALUE}};',
                ],
            ]
        );
	    $this->add_group_control(
		    Group_Control_Background::get_type(),
		    [
			    'name' => 'btn_bg_color',
			    'label' => __( 'Button Background Color', 'dentist' ),
			    'types' => [ 'gradient' ],
			    'selector' => '{{WRAPPER}} .primary-btn.primary',
		    ]
	    );

	    $this->add_control(
		    'fbtn_hover_color', [
			    'label'     => __( 'Form Button hover Label color', 'dentist' ),
			    'type'      => Controls_Manager::COLOR,
			    'default'   => '#fff',
			    'selectors' => [
				    '{{WRAPPER}} .primary-btn.primary:hover' => 'color: {{VALUE}};',
			    ],
		    ]
	    );
	    $this->add_control(
		    'fbtn_hover_bg', [
			    'label'     => __( 'Form Button hover background color', 'dentist' ),
			    'type'      => Controls_Manager::COLOR,
			    'default'   => '#00000000',
			    'selectors' => [
				    '{{WRAPPER}} .primary-btn.primary:hover' => 'background: {{VALUE}};',
			    ],
		    ]
	    );
        $this->end_controls_section();



    }

    protected function render() {

    $settings = $this->get_settings();

    ?>
        <section class="appoinment-area section-gap relative">
            <div class="container">
                <div class="row align-items-center justify-content-end">
                    <div class="col-lg-6 no-padding appoinment-right">
	                    <?php
                        // Title
                        if( ! empty( $settings['content_title'] ) ){
                            echo dentist_heading_tag(
                                array(
                                    'tag'   => 'h1',
                                    'text'  =>  $settings['content_title']
                                )
                            );
                        }

                        // Contact Form
                        if( !empty( $settings['contact_formshortcode'] ) ){
	                        echo do_shortcode( $settings['contact_formshortcode'] );
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>

    <?php
    }
}
