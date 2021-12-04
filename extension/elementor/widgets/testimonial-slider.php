<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class scrap_widget_testimonial_slider extends Widget_Base {

    public function get_categories() {
        return array( 'scrap_widgets' );
    }

    public function get_name() {
        return 'scrap-testimonial-slider';
    }

    public function get_title() {
        return esc_html__( 'Testimonial Slider', 'scrap' );
    }

    public function get_icon() {
        return 'eicon-user-circle-o';
    }

    public function get_script_depends() {
        return ['scrap-elementor-custom'];
    }

    protected function _register_controls() {

        // Content testimonial
        $this->start_controls_section(
            'content_testimonial',
            [
                'label' => __( 'Content', 'scrap' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'list_title', [
                'label' => esc_html__( 'Name', 'scrap' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'John Doe' , 'scrap' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'list_position',
            [
                'label'         =>  esc_html__( 'Position', 'scrap' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'Codetic', 'scrap' ),
                'label_block'   =>  true
            ]
        );

	    $repeater->add_control(
		    'list_rate',
		    [
			    'label'     =>  esc_html__( 'Rate', 'scrap' ),
			    'type'      =>  Controls_Manager::SELECT,
			    'default'   =>  '5',
			    'options'   =>  [
				    '1' =>  1,
				    '2' =>  2,
				    '3' =>  3,
				    '4' =>  4,
				    '5' =>  5
			    ],
		    ]
	    );

        $repeater->add_control(
            'list_image',
            [
                'label' => esc_html__( 'Choose Image', 'scrap' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'list_description',
            [
                'label' => esc_html__( 'Description', 'scrap' ),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__( 'GEMs are robotics algorithm for modules that built & optimized for NVIDIA AGX Data should underlie every business decision. Data should underlie every business Yet too often some very down the certain routes.', 'scrap' ),
                'placeholder' => esc_html__( 'Type your description here', 'scrap' ),
            ]
        );

        $this->add_control(
            'list',
            [
                'label' => esc_html__( 'List', 'scrap' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => __( 'Title #1', 'scrap' ),
                    ],
                    [
                        'list_title' => __( 'Title #2', 'scrap' ),
                    ],
                ],
                'title_field' => '{{{ list_title }}}',
            ]
        );

        $this->end_controls_section();

        // Content additional options
        $this->start_controls_section(
            'content_additional_options',
            [
                'label' => __( 'Additional Options', 'scrap' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'loop',
            [
                'type'          =>  Controls_Manager::SWITCHER,
                'label'         =>  esc_html__('Loop Slider ?', 'scrap'),
                'label_off'     =>  esc_html__('No', 'scrap'),
                'label_on'      =>  esc_html__('Yes', 'scrap'),
                'return_value'  =>  'yes',
                'default'       =>  'yes',
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label'         =>  esc_html__('Autoplay?', 'scrap'),
                'type'          =>  Controls_Manager::SWITCHER,
                'label_off'     =>  esc_html__('No', 'scrap'),
                'label_on'      =>  esc_html__('Yes', 'scrap'),
                'return_value'  =>  'yes',
                'default'       =>  'no',
            ]
        );

        $this->add_control(
            'nav',
            [
                'label'         =>  esc_html__('Nav Slider', 'scrap'),
                'type'          =>  Controls_Manager::SWITCHER,
                'label_on'      =>  esc_html__('Yes', 'scrap'),
                'label_off'     =>  esc_html__('No', 'scrap'),
                'return_value'  =>  'yes',
                'default'       =>  'yes',
            ]
        );

        $this->add_control(
            'dots',
            [
                'label'         =>  esc_html__('Dots Slider', 'scrap'),
                'type'          =>  Controls_Manager::SWITCHER,
                'label_on'      =>  esc_html__('Yes', 'scrap'),
                'label_off'     =>  esc_html__('No', 'scrap'),
                'return_value'  =>  'yes',
                'default'       =>  'yes',
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $data_settings_owl = [
            'loop' => ('yes' === $settings['loop']),
            'nav' => ('yes' === $settings['nav']),
            'dots' => ('yes' === $settings['dots']),
            'margin' => 20,
            'autoplay' => ('yes' === $settings['autoplay']),
            'responsive' => [
	            '0' => array(
		            'items'     =>  1,
		            'margin'    =>  0
	            ),
	            '768' => array(
		            'items'     =>  2,
	            ),
            ]
        ];
    ?>

        <div class="element-testimonial-slider">
            <div class="custom-owl-carousel owl-carousel owl-theme" data-settings-owl='<?php echo wp_json_encode( $data_settings_owl ) ; ?>'>
                <?php
                foreach ( $settings['list'] as $item ) :
                    $imageId = $item['list_image']['id'];
                ?>

                    <div class="item d-flex elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); ?>">
                        <div class="item__image flex-shrink-0">
                            <figure>
	                            <?php
	                            if ( $imageId ) :
		                            echo wp_get_attachment_image( $item['list_image']['id'], array('150', '150') );
	                            else:
		                            ?>
                                    <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/user-avatar.png' ) ) ?>" alt="<?php echo esc_attr( $item['list_title'] ); ?>" />
	                            <?php endif; ?>
                            </figure>
                        </div>

                        <div class="item__content flex-shrink-1">
                            <div class="desc">
                                <?php echo wp_kses_post( $item['list_description'] ) ?>
                            </div>

                            <div class="rate">
                                <?php
                                for ( $i = 1; $i <= 5; $i++ ) :

	                                $classGray = '';
                                    if ( $item['list_rate'] != 5 && $i > $item['list_rate'] ) {
                                        $classGray = ' color-grey';
                                    }

                                ?>
                                    <i class="fas fa-star<?php echo esc_attr( $classGray ); ?>"></i>
                                <?php endfor; ?>
                            </div>

                            <div class="name">
                                <?php echo esc_html( $item['list_title'] ); ?>
                            </div>

                            <div class="position">
                                <?php echo esc_html( $item['list_position'] ); ?>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>

    <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new scrap_widget_testimonial_slider );