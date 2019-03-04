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
 * Dentist elementor section widget.
 *
 * @since 1.0
 */
class Dentist_Opening_Hour extends Widget_Base {

	public function get_name() {
		return 'dentist-opening-hour';
	}

	public function get_title() {
		return __( 'Opening Hour', 'dentist' );
	}

	public function get_icon() {
		return 'eicon-clock';
	}

	public function get_categories() {
		return [ 'dentist-elements' ];
	}

	protected function _register_controls() {

        
		// ----------------------------------------  Opening Hour content ------------------------------
		$this->start_controls_section(
			'opening_hour',
			[
				'label' => __( 'Opening Hour', 'dentist' ),
			]
		);
        $this->add_control(
            'title_subt',
            [
                'label'         => esc_html__( 'Title', 'dentist' ),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<h1>Opening Hours</h1> Get ready to cast your vote and select the right one', 'dentist' )
            ]
        );
        $this->add_control(
            'active_status',
            [
                'label'         => esc_html__( 'Active status', 'dentist' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'We are open Now', 'dentist' )
            ]
        );
        $this->add_control(
            'opening_day_time', [
                'label' => __( 'Create Features', 'dentist' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ day }}}',
                'fields' => [
                    [
                        'name'  => 'day',
                        'label' => __( 'Opening Day', 'dentist' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__('Monday - Friday', 'dentist')
                    ],
                    [
                        'name'  => 'time',
                        'label' => __( 'Opening Time', 'dentist' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block'   => true,
                        'default'   => esc_html__('10:00am to 05:00pm', 'dentist')
                    ],
                ],
            ]
        );

		$this->end_controls_section(); // End about content


        //------------------------------ Style Content ------------------------------

        $this->start_controls_section(
            'stylecolor', [
                'label' => __( 'Style Title', 'dentist' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'day_list_color', [
                'label'     => __( 'Day List Color', 'dentist' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222222',
                'selectors' => [
                    '{{WRAPPER}} .open-hour-wrap .date-list .colm-1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'time_list_color', [
                'label'     => __( 'Time List Color', 'dentist' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .open-hour-wrap .date-list .colm-2' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();
    $times = $settings['opening_day_time'];

    ?>
        <section class="open-hour-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 open-hour-wrap">
                        <?php
                        if( ! empty( $settings['title_subt'] ) ) {
	                        echo dentist_get_textareahtml_output( $settings['title_subt'] );
                        }
                        ?>

                        <span class="open-btn"> <span class="circle"></span>
                            <?php
                                if( ! empty( $settings['active_status'] ) ){
                                    echo esc_html( $settings['active_status']  );
                                }
                            ?>
                        </span>
                        <div class="date-list d-flex flex-row justify-content-center">
                            <ul class="colm-1">
                                <?php
                                if( ! empty( $times ) ){
                                    foreach ( $times as $day ){
                                        echo '<li>'. $day['day'] .'</li>';
                                    }
                                }
                                ?>

                            </ul>
                            <ul class="colm-2">
	                            <?php
	                            if( ! empty( $times ) ){
		                            foreach ( $times as $time ){
			                            echo '<li><span>:</span> '. $time['time'] .'</li>';
		                            }
	                            }
	                            ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php

    }

}
