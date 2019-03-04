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
class Dentist_Testimonial extends Widget_Base {

	public function get_name() {
		return 'dentist-testimonial';
	}

	public function get_title() {
		return __( 'Testimonial', 'dentist' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'dentist-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // Testimonial Heading
		$this->start_controls_section(
			'testimonial_heading',
			[
				'label' => __( 'Testimonial Section Heading', 'dentist' ),
			]
		);
		$this->add_control(
			'sect_title', [
				'label' => __( 'Title', 'dentist' ),
				'type'  => Controls_Manager::TEXT,
				'label_block' => true

			]
		);
		$this->add_control(
			'sect_subtitle', [
				'label' => __( 'Sub Title', 'dentist' ),
				'type'  => Controls_Manager::TEXTAREA,
				'label_block' => true

			]
		);

		$this->end_controls_section(); // End section top content


		// ----------------------------------------  Customers review content ------------------------------
		$this->start_controls_section(
			'customersreview_content',
			[
				'label' => __( 'Customers Review', 'dentist' ),
			]
		);
		$this->add_control(
			'select_style', [
				'label'     => __( 'Testimonial Style', 'dentist' ),
				'type'      => Controls_Manager::SELECT,
                'options'   => [
                     'style_1'  => esc_html__('Carousel Style', 'dentist'),
                     'style_2'  => esc_html__('Column Style', 'dentist')
                ],
                'default'   => 'style_1'

			]
		);

		$this->add_control(
            'review_slider', [
                'label' => __( 'Create Review', 'dentist' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Name', 'dentist' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Name'
                    ],
                    [
                        'name'  => 'designation',
                        'label' => __( 'Desiganation', 'dentist' ),
                        'type'  => Controls_Manager::TEXT,
                        'default' => __('CEO at Google', 'dentist')
                    ],
                    [
                        'name'  => 'desc',
                        'label' => __( 'Descriptions', 'dentist' ),
                        'type'  => Controls_Manager::WYSIWYG,
                        'default'   => __('Accessories Here you can find the best computeraccessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory', 'dentist')
                    ],
                    [
                        'name'  => 'img',
                        'label' => __( 'Image', 'dentist' ),
                        'type'  => Controls_Manager::MEDIA,
                    ]
                ],
            ]
		);

		$this->end_controls_section(); // End exibition content

        /**
         * Style Tab
         *
         */
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

        /*------------------------------ Background Style ------------------------------*/
		$this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'dentist' ),
                'tab' => Controls_Manager::TAB_STYLE,
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
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .testomial-area',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    // call load widget script
    $this->load_widget_script();

    ?>
    <?php
        if( $settings['select_style'] == 'style_2' ) {
            ?>
            <section class="feedback-area-area pt-120">
                <div class="container">
                    <div class="row">
                        <?php
                        if ( is_array( $settings['review_slider'] ) && count( $settings['review_slider'] ) > 0 ):
                            foreach ( $settings['review_slider'] as $review ): ?>
                                <div class="col-lg-4">
                                    <div class="single-feedback">
	                                    <?php
	                                    if ( ! empty( $review['img']['url'] ) ) {
		                                    echo dentist_img_tag(
			                                    array(
				                                    'url'   => esc_url( $review['img']['url'] ),
				                                    'class' => esc_attr( 'mx-auto' )
			                                    )
		                                    );
	                                    }
	                                    
	                                    // Description
	                                    if ( ! empty( $review['desc'] ) ) {
		                                    echo dentist_get_textareahtml_output( $review['desc'] );
	                                    } ?>
                                        <a href="#">
                                            <?php
                                            // Name =======
                                            if ( ! empty( $review['label'] ) ) {
                                                echo dentist_heading_tag(
                                                    array(
                                                        'tag'  => 'h5',
                                                        'text' => esc_html( $review['label'] ),
                                                        'class' => esc_attr('text-uppercase')
                                                    )
                                                );
                                            } ?>
                                        </a>
                                        <?php
                                        // designation
                                        if ( ! empty( $review['designation'] ) ) {
	                                        echo dentist_paragraph_tag(
		                                        array(
			                                        'text' => esc_html( $review['designation'] )
		                                        )
	                                        );
                                        }
                                        ?>
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
        else{
	        ?>
            <section class="testomial-area section-gap" id="testimonail">
                <div class="container">
			        <?php
			        // Section Heading
			        dentist_section_heading( $settings['sect_title'], $settings['sect_subtitle'] );
			        ?>
                    <div class="row">
                        <div class="active-testimonial-carusel">
					        <?php
					        if ( is_array( $settings['review_slider'] ) && count( $settings['review_slider'] ) > 0 ):
						        foreach ( $settings['review_slider'] as $review ):
							        ?>
                                    <div class="single-testimonial item">
								        <?php
								        if ( ! empty( $review['img']['url'] ) ) {
									        echo dentist_img_tag(
										        array(
											        'url'   => esc_url( $review['img']['url'] ),
											        'class' => esc_attr( 'mx-auto' )
										        )
									        );
								        }
								        ?>
                                        <div class="desc">
									        <?php
									        // Description
									        if ( ! empty( $review['desc'] ) ) {
										        echo dentist_get_textareahtml_output( $review['desc'] );
									        } ?>
                                        </div>
								        <?php
								        // Name =======
								        if ( ! empty( $review['label'] ) ) {
									        echo dentist_heading_tag(
										        array(
											        'tag'  => 'h5',
											        'text' => esc_html( $review['label'] ),
										        )
									        );
								        }
								        //
								        if ( ! empty( $review['designation'] ) ) {
									        echo dentist_paragraph_tag(
										        array(
											        'text' => esc_html( $review['designation'] )
										        )
									        );
								        } ?>
                                    </div>
						        <?php
						        endforeach;
					        endif;
					        ?>
                        </div>
                    </div>
                </div>
            </section>
	        <?php
        }


    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){

            $('.active-testimonial-carusel').owlCarousel({
                items: 3,
                loop: true,
                margin: 30,
                dots: true,
                autoplay: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    480: {
                        items: 1,
                    },
                    768: {
                        items: 2,
                    },
                    961: {
                        items: 3,
                    }
                }
            });

        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
