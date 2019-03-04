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
 * Dentist elementor Team Member section widget.
 *
 * @since 1.0
 */
class Dentist_Team_Member extends Widget_Base {

	public function get_name() {
		return 'dentist-team-member';
	}

	public function get_title() {
		return __( 'Team Member', 'dentist' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'dentist-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Team Section Top content ------------------------------
        $this->start_controls_section(
            'team_sectcontent',
            [
                'label' => __( 'Team Section Top', 'dentist' ),
            ]
        );
        $this->add_control(
            'sect_title', [
                'label' => __( 'Title', 'dentist' ),
                'type' => Controls_Manager::TEXT,

            ]
        );
        $this->add_control(
            'sect_subtitle', [
                'label' => __( 'Sub Title', 'dentist' ),
                'type' => Controls_Manager::TEXTAREA,

            ]
        );

        $this->end_controls_section(); // End section top content
		// ----------------------------------------  Team Member content ------------------------------
		$this->start_controls_section(
			'team_memcontent',
			[
				'label' => __( 'Team Member', 'dentist' ),
			]
		);
		$this->add_control(
            'teamslider', [
                'label' => __( 'Create Team Member', 'dentist' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name' => 'label',
                        'label' => __( 'Name', 'dentist' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Name'
                    ],
                    [
                        'name' => 'desig',
                        'label' => __( 'Designation', 'dentist' ),
                        'type' => Controls_Manager::TEXT,
                    ],
                    [
                        'name' => 'img',
                        'label' => __( 'Photo', 'dentist' ),
                        'type' => Controls_Manager::MEDIA,
                    ]

                ],
            ]
		);

		$this->end_controls_section(); // End Team Member content



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


		//------------------------------ Style Team Member Content ------------------------------
		$this->start_controls_section(
			'style_teaminfo', [
				'label' => __( 'Style Team Member Info', 'dentist' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
            'team_imghov',
            [
                'label' => __( 'Member Image Hover Color', 'dentist' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'memberimghoverbg',
                'label' => __( 'Background', 'dentist' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .team-area .thumb div',
            ]
        );
        //
        $this->add_control(
            'team_nameopt',
            [
                'label' => __( 'Name Style', 'dentist' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_name', [
                'label' => __( 'Name Color', 'dentist' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-team h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_name',
                'selector' => '{{WRAPPER}} .single-team h4',
            ]
        );
        //
        $this->add_control(
            'team_desigopt',
            [
                'label' => __( 'Designation Style', 'dentist' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_desigopt', [
                'label' => __( 'Designation Color', 'dentist' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-team p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_desigopt',
                'selector' => '{{WRAPPER}} .single-team p',
            ]
        );


	}

	protected function render() {

    $settings = $this->get_settings();

    ?>

    <section class="team-area section-gap" id="team">
        <div class="container">
            <?php
            // Section Heading
            dentist_section_heading( $settings['sect_title'], $settings['sect_subtitle'] );
            ?>

            <div class="row justify-content-center d-flex align-items-center">
                <?php 
                if( is_array( $settings['teamslider'] ) && count( $settings['teamslider'] ) > 0 ):
                    foreach( $settings['teamslider'] as $team ):
                             

                ?>
                <div class="col-lg-3 col-md-6 single-team">
                    <div class="thumb">
                        <?php 
                        //
                        if( ! empty( $team['img']['url'] ) ) {

                            echo dentist_img_tag(
                                array(
                                    'url'   => esc_url( $team['img']['url'] ),
                                    'class' => 'img-fluid'
                                )
                            );

                        }
                        ?>

                        <div class="align-items-end justify-content-center d-flex">
		                    <?php
		                    // Designation
		                    if( !empty( $team['desig'] ) ){
			                    echo dentist_paragraph_tag(
				                    array(
					                    'text' => esc_html( $team['desig'] )
				                    )
			                    );
		                    }

		                    // Member Name
		                    if( !empty( $team['label'] ) ){
			                    echo dentist_heading_tag(
				                    array(
					                    'tag'  => 'h4',
					                    'text' => esc_html( $team['label'] )
				                    )
			                    );
		                    }

		                    ?>
                        </div>
                    </div>

                </div>
                <?php
                    endforeach; 
                endif;
                ?>
            </div>
        </div>
    </section>

    <?php

    }
	
}
