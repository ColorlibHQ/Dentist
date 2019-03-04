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
 * Dentist elementor about us section widget.
 *
 * @since 1.0
 */
class Dentist_Banner extends Widget_Base {

	public function get_name() {
		return 'dentist-banner';
	}

	public function get_title() {
		return __( 'Banner', 'dentist' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	public function get_categories() {
		return [ 'dentist-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  content ------------------------------
        $this->start_controls_section(
            'banner_content',
            [
                'label' => __( 'Banner Section Content', 'dentist' ),
            ]
        );
        $this->add_control(
            'banner_titleone',
            [
                'label'         => esc_html__( 'Title ', 'dentist' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => esc_html__( 'All things need to dentist', 'dentist' ),
                'label_block'   => true
            ]
        );
        $this->add_control(
            'banner_subtitle',
            [
                'label'         => esc_html__( 'Sub Title', 'dentist' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => esc_html__( 'Don’t look further, This is our Leader', 'dentist' ),
                'label_block'   => true
            ]
        );
        $this->add_control(
            'banner_desc',
            [
                'label'         => esc_html__( 'Description', 'dentist' ),
                'type'          => Controls_Manager::WYSIWYG,
                'default'       => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim. sed do eiusmod tempor incididunt.', 'dentist' ),
            ]
        );
        $this->add_control(
            'banner_btnlabel',
            [
                'label'         => esc_html__( 'Button Label', 'dentist' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Get Started', 'dentist' )
            ]
        );
        $this->add_control(
            'banner_btnurl',
            [
                'label'         => esc_html__( 'Button Url', 'dentist' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false
            ]
        );

        $this->end_controls_section(); // End content

        //------------------------------ Style title ------------------------------
        $this->start_controls_section(
            'style_textcolor', [
                'label' => __( 'Style Content', 'dentist' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_titleone', [
                'label'     => __( 'Title #1 Color', 'dentist' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .banner-content h6' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_titleone',
                'selector'  => '{{WRAPPER}} .banner-content h6',
            ]
        );
        $this->add_control(
            'color_titletwo', [
                'label'     => __( 'Title #2 Color', 'dentist' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .banner-content h1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_titletwo',
                'selector'  => '{{WRAPPER}} .banner-content h1',
            ]
        );
        $this->add_control(
            'color_desc', [
                'label'     => __( 'Description Color', 'dentist' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .banner-content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_desc',
                'selector'  => '{{WRAPPER}} .banner-content p',
            ]
        );

        $this->end_controls_section();

        //------------------------------ Style button ------------------------------
        $this->start_controls_section(
            'style_btn', [
                'label' => __( 'Style Button', 'dentist' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_btnlabel', [
                'label'     => __( 'Button Label Color', 'dentist' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222',
                'selectors' => [
                    '{{WRAPPER}} .banner-content .header-btn' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhoverlabel', [
                'label'     => __( 'Button Hover Label Color', 'dentist' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .banner-content .primary-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnborder', [
                'label'     => __( 'Button Border Color', 'dentist' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .banner-content .header-btn' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhovborder', [
                'label'     => __( 'Button Hover Border Color', 'dentist' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .banner-content .header-btn:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnbg', [
                'label'       => __( 'Button Background Color', 'dentist' ),
                'type'        => Controls_Manager::COLOR,
                'default'     => '#fff',
                'selectors'   => [
                    '{{WRAPPER}} .banner-content .header-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhovbg', [
                'label'     => __( 'Button Hover Background Color', 'dentist' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => 'rgba(255,255,255,0)',
                'selectors' => [
                    '{{WRAPPER}} .banner-content .header-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Background Style ------------------------------
         *
         */
        $this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'dentist' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'bg_overlay',
            [
                'label' => __( 'Overlay', 'dentist' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'dentist' ),
                'label_off' => __( 'Hide', 'dentist' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'sect_ooverlay_bgcolor',
            [
                'label'     => __( 'Overlay Color', 'dentist' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'bg_overlay' => 'yes'
                ]
            ]
        );
		$this->add_control(
			'sectionoverlaybg', [
				'label'     => __( 'Button Hover Background Color', 'dentist' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => 'rgba(4,9,30,0.85)',
				'selectors' => [
					'{{WRAPPER}} .banner-area .overlay-bg' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'bg_overlay' => 'yes'
				]
			]
		);

        $this->add_control(
            'section_bgheading',
            [
                'label'     => __( 'Background Settings', 'dentist' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'dentist' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .banner-area',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    // call load widget script
    $this->load_widget_script();

    ?>

    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row fullscreen d-flex justify-content-center align-items-center">
                <div class="banner-content col-lg-9 col-md-12 justify-content-center">
                    <?php 
                    // Banner Sub Title
                    if( ! empty( $settings['banner_subtitle'] ) ) {
                        echo dentist_heading_tag(
                            array(
                                'tag'   => 'h6',
                                'text'  => esc_html( $settings['banner_subtitle'] ),
                                'class' => esc_attr( 'text-uppercase' )
                            )
                        );
                    }
                    // Banner Title
                    if( ! empty( $settings['banner_titleone'] ) ) {
                        echo dentist_heading_tag(
                            array(
                                'tag'   => 'h1',
                                'text'  => esc_html( $settings['banner_titleone'] )
                            )
                        );
                    }
                    // Description
                    if( ! empty( $settings['banner_desc'] ) ) {
                            echo dentist_get_textareahtml_output( $settings['banner_desc'] );
                    }
                    // Button
                    if( ! empty( $settings[ 'banner_btnlabel' ] ) && !empty( $settings['banner_btnurl']['url'] ) ) {
                        echo dentist_anchor_tag(
                            array(
                                'url'   => esc_url( $settings['banner_btnurl']['url'] ),
                                'text'  => esc_html( $settings['banner_btnlabel'] ),
                                'class' => esc_attr( 'primary-btn header-btn text-uppercase mt-10' )
                            )
                        );
                    }
                    ?>
                </div>

            </div>
        </div>
    </section>

    <?php

    }
    
    public function load_widget_script() {
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            var window_width = $(window).width(),
                window_height = window.innerHeight,
                header_height = $(".default-header").height(),
                header_height_static = $(".site-header.static").outerHeight(),
                fitscreen = window_height - header_height;

            $(".fullscreen").css("height", window_height)
            $(".fitscreen").css("height", fitscreen);
        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
