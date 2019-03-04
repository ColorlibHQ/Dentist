<?php
namespace Dentistelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Dentist elementor few words section widget.
 *
 * @since 1.0
 */

class Dentist_Blog extends Widget_Base {

	public function get_name() {
		return 'dentist-blog';
	}

	public function get_title() {
		return __( 'Blog', 'dentist' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_categories() {
		return [ 'dentist-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Blog content ------------------------------
        $this->start_controls_section(
            'blog_content',
            [
                'label' => __( 'Blgo', 'dentist' ),
            ]
        );
        $this->add_control(
            'blog_sectiontitle',
            [
                'label'       => esc_html__( 'Section Title', 'dentist' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'blog_sectionsubtitle',
            [
                'label'       => esc_html__( 'Section Sub Title', 'dentist' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXTAREA,
            ]
        );
        $this->add_control(
            'blog_limit',
            [
                'label'     => esc_html__( 'Post Limit', 'dentist' ),
                'type'      => Controls_Manager::TEXT,
                'default'   => 4
            ]
        );

        $this->end_controls_section(); // End few words content

        //------------------------------ Style Section ------------------------------
        $this->start_controls_section(
            'style_section', [
                'label' => __( 'Style Section Heading', 'dentist' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Section Title Color', 'dentist' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222',
                'selectors' => [
                    '{{WRAPPER}} .title h1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'color_sectsubtitle', [
                'label'     => __( 'Section Sub Title Color', 'dentist' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //------------------------------ Style text ------------------------------
        $this->start_controls_section(
            'style_content', [
                'label' => __( 'Style Content', 'dentist' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_blogtitle', [
                'label'     => __( 'Blog Title Color', 'dentist' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222',
                'selectors' => [
                    '{{WRAPPER}} .single-blog h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_blogtitlehov', [
                'label'     => __( 'Blog Title Hover Color', 'dentist' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#67bc00',
                'selectors' => [
                    '{{WRAPPER}} .single-blog:hover h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_blog_date', [
                'label'     => __( 'Blog Date Color', 'dentist' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .single-blog .date' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_blog_date_bg', [
                'label'     => __( 'Blog Date Background Color', 'dentist' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#000',
                'selectors' => [
                    '{{WRAPPER}} .single-blog .date' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_blogtext', [
                'label'     => __( 'Blog Text Color', 'dentist' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .single-blog p'                    => 'color: {{VALUE}};',
                    '{{WRAPPER}} .single-blog .meta-bottom p'       => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();

    ?>

    <section class="blog-area section-gap" id="blog">
        <div class="container">
            <?php
            // Section Heading
            dentist_section_heading( $settings['blog_sectiontitle'], $settings['blog_sectionsubtitle'] );

            // Blog
            dentist_blog_section( $settings['blog_limit'] );

            ?>

        </div>  
    </section>    
    <?php

        }
	
}
