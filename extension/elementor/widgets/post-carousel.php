<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

use Elementor\Core\Schemes;

class scrap_widget_post_carousel extends Widget_Base {

    public function get_categories() {
        return array( 'scrap_widgets' );
    }

    public function get_name() {
        return 'scrap-post-carousel';
    }

    public function get_title() {
        return esc_html__( 'Posts Carousel', 'scrap' );
    }

    public function get_icon() {
        return 'eicon-slider-push';
    }

    public function get_script_depends() {
        return ['scrap-elementor-custom'];
    }

    protected function _register_controls() {

        // Content query
        $this->start_controls_section(
            'content_query',
            [
                'label' => esc_html__( 'Query', 'scrap' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'select_cat',
            [
                'label'         =>  esc_html__( 'Select Category', 'scrap' ),
                'type'          =>  Controls_Manager::SELECT2,
                'options'       =>  scrap_check_get_cat( 'category' ),
                'multiple'      =>  true,
                'label_block'   =>  true
            ]
        );

        $this->add_control(
            'limit',
            [
                'label'     =>  esc_html__( 'Number of Posts', 'scrap' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  6,
                'min'       =>  1,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'order_by',
            [
                'label'     =>  esc_html__( 'Order By', 'scrap' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'   =>  'id',
                'options'   =>  [
                    'id'    =>  esc_html__( 'Post ID', 'scrap' ),
                    'title' =>  esc_html__( 'Title', 'scrap' ),
                    'date'  =>  esc_html__( 'Date', 'scrap' ),
                    'rand'  =>  esc_html__( 'Random', 'scrap' ),
                ],
            ]
        );

        $this->add_control(
            'order',
            [
                'label'     =>  esc_html__( 'Order', 'scrap' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'   =>  'ASC',
                'options'   =>  [
                    'ASC'   =>  esc_html__( 'Ascending', 'scrap' ),
                    'DESC'  =>  esc_html__( 'Descending', 'scrap' ),
                ],
            ]
        );

        $this->add_control(
            'show_excerpt',
            [
                'label'     =>  esc_html__( 'Show excerpt', 'scrap' ),
                'type'      =>  Controls_Manager::CHOOSE,
                'options'   =>  [
                    'show' => [
                        'title' =>  esc_html__( 'Yes', 'scrap' ),
                        'icon'  =>  'eicon-check',
                    ],

                    'hide' => [
                        'title' =>  esc_html__( 'No', 'scrap' ),
                        'icon'  =>  'eicon-ban',
                    ],
                ],
                'default' => 'show'
            ]
        );

        $this->add_control(
            'excerpt_length',
            [
                'label'     =>  esc_html__( 'Excerpt Words', 'scrap' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  '10',
                'condition' =>  [
                    'show_excerpt' => 'show',
                ],
            ]
        );

        $this->end_controls_section();

        // Content additional options
        $this->start_controls_section(
            'content_additional_options',
            [
                'label' => esc_html__( 'Additional Options', 'scrap' ),
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

	    $this->add_control(
		    'margin_item',
		    [
			    'label'     =>  esc_html__( 'Space Between Item', 'scrap' ),
			    'type'      =>  Controls_Manager::NUMBER,
			    'default'   =>  30,
			    'min'       =>  0,
			    'max'       =>  100,
			    'step'      =>  1,
		    ]
	    );

	    $this->add_control(
		    'min_width_1200',
		    [
			    'label'     =>  esc_html__( 'Min Width 1200px', 'scrap' ),
			    'type'      =>  Controls_Manager::HEADING,
			    'separator' =>  'before',
		    ]
	    );

	    $this->add_control(
		    'item',
		    [
			    'label'     =>  esc_html__( 'Number of Item', 'scrap' ),
			    'type'      =>  Controls_Manager::NUMBER,
			    'default'   =>  3,
			    'min'       =>  1,
			    'max'       =>  100,
			    'step'      =>  1,
		    ]
	    );

	    $this->add_control(
		    'min_width_992',
		    [
			    'label'     =>  esc_html__( 'Min Width 992px', 'scrap' ),
			    'type'      =>  Controls_Manager::HEADING,
			    'separator' =>  'before',
		    ]
	    );

	    $this->add_control(
		    'item_992',
		    [
			    'label'     =>  esc_html__( 'Number of Item', 'scrap' ),
			    'type'      =>  Controls_Manager::NUMBER,
			    'default'   =>  2,
			    'min'       =>  1,
			    'max'       =>  100,
			    'step'      =>  1,
		    ]
	    );

	    $this->add_control(
		    'min_width_768',
		    [
			    'label'     =>  esc_html__( 'Min Width 768px', 'scrap' ),
			    'type'      =>  Controls_Manager::HEADING,
			    'separator' =>  'before',
		    ]
	    );

	    $this->add_control(
		    'item_768',
		    [
			    'label'     =>  esc_html__( 'Number of Item', 'scrap' ),
			    'type'      =>  Controls_Manager::NUMBER,
			    'default'   =>  2,
			    'min'       =>  1,
			    'max'       =>  100,
			    'step'      =>  1,
		    ]
	    );

	    $this->add_control(
		    'min_width_568',
		    [
			    'label'     =>  esc_html__( 'Min Width 568px', 'scrap' ),
			    'type'      =>  Controls_Manager::HEADING,
			    'separator' =>  'before',
		    ]
	    );

	    $this->add_control(
		    'item_568',
		    [
			    'label'     =>  esc_html__( 'Number of Item', 'scrap' ),
			    'type'      =>  Controls_Manager::NUMBER,
			    'default'   =>  2,
			    'min'       =>  1,
			    'max'       =>  100,
			    'step'      =>  1,
		    ]
	    );

	    $this->add_control(
		    'margin_item_568',
		    [
			    'label'     =>  esc_html__( 'Space Between Item', 'scrap' ),
			    'type'      =>  Controls_Manager::NUMBER,
			    'default'   =>  15,
			    'min'       =>  0,
			    'max'       =>  100,
			    'step'      =>  1,
		    ]
	    );

	    $this->add_control(
		    'max_width_567',
		    [
			    'label'     =>  esc_html__( 'Max Width 567px', 'scrap' ),
			    'type'      =>  Controls_Manager::HEADING,
			    'separator' =>  'before',
		    ]
	    );

	    $this->add_control(
		    'item_567',
		    [
			    'label'     =>  esc_html__( 'Number of Item', 'scrap' ),
			    'type'      =>  Controls_Manager::NUMBER,
			    'default'   =>  1,
			    'min'       =>  1,
			    'max'       =>  100,
			    'step'      =>  1,
		    ]
	    );

	    $this->add_control(
		    'margin_item_567',
		    [
			    'label'     =>  esc_html__( 'Space Between Item', 'scrap' ),
			    'type'      =>  Controls_Manager::NUMBER,
			    'default'   =>  0,
			    'min'       =>  0,
			    'max'       =>  100,
			    'step'      =>  1,
		    ]
	    );

        $this->end_controls_section();

        // Style title
        $this->start_controls_section(
            'style_title',
            [
                'label' => esc_html__( 'Title', 'scrap' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'     =>  esc_html__( 'Color', 'scrap' ),
                'type'      =>  Controls_Manager::COLOR,
                'default'   =>  '',
                'selectors' =>  [
                    '{{WRAPPER}} .element-post-carousel .item-post__content .title a'   =>  'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_color_hover',
            [
                'label'     =>  esc_html__( 'Color Hover', 'scrap' ),
                'type'      =>  Controls_Manager::COLOR,
                'default'   =>  '',
                'selectors' =>  [
                    '{{WRAPPER}} .element-post-carousel .item-post__content .title a:hover'   =>  'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .element-post-carousel .item-post__content .title',
            ]
        );

        $this->add_control(
            'title_alignment',
            [
                'label'     =>  esc_html__( 'Title Alignment', 'scrap' ),
                'type'      =>  Controls_Manager::CHOOSE,
                'options'   =>  [
                    'left'  =>  [
                        'title' =>  esc_html__( 'Left', 'scrap' ),
                        'icon'  =>  'eicon-text-align-left',
                    ],

                    'center' => [
                        'title' =>  esc_html__( 'Center', 'scrap' ),
                        'icon'  =>  'eicon-text-align-center',
                    ],

                    'right' => [
                        'title' =>  esc_html__( 'Right', 'scrap' ),
                        'icon'  =>  'eicon-text-align-right',
                    ],

                    'justify'=> [
                        'title' =>  esc_html__( 'Justified', 'scrap' ),
                        'icon'  =>  'eicon-text-align-justify',
                    ],
                ],
                'toggle'    =>  true,
                'selectors' =>  [
                    '{{WRAPPER}} .element-post-carousel .item-post__content .title'   =>  'text-align: {{VALUE}};',
                ]
            ]
        );

        $this->end_controls_section();

        // Style excerpt
        $this->start_controls_section(
            'style_excerpt',
            [
                'label' => esc_html__( 'Excerpt', 'scrap' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' =>  [
                    'show_excerpt' => 'show',
                ],
            ]
        );

        $this->add_control(
            'excerpt_color',
            [
                'label'     =>  esc_html__( 'Color', 'scrap' ),
                'type'      =>  Controls_Manager::COLOR,
                'default'   =>  '',
                'selectors' =>  [
                    '{{WRAPPER}} .element-post-carousel .item-post__content .desc p'   =>  'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'excerpt_typography',
                'selector' => '{{WRAPPER}} .element-post-carousel .item-post__content .desc p',
            ]
        );

        $this->add_control(
            'excerpt_alignment',
            [
                'label'     =>  esc_html__( 'Excerpt Alignment', 'scrap' ),
                'type'      =>  Controls_Manager::CHOOSE,
                'options'   =>  [
                    'left'  =>  [
                        'title' =>  esc_html__( 'Left', 'scrap' ),
                        'icon'  =>  'eicon-text-align-left',
                    ],

                    'center' => [
                        'title' =>  esc_html__( 'Center', 'scrap' ),
                        'icon'  =>  'eicon-text-align-center',
                    ],

                    'right' => [
                        'title' =>  esc_html__( 'Right', 'scrap' ),
                        'icon'  =>  'eicon-text-align-right',
                    ],

                    'justify'=> [
                        'title' =>  esc_html__( 'Justified', 'scrap' ),
                        'icon'  =>  'eicon-text-align-justify',
                    ],
                ],
                'toggle'    =>  true,
                'selectors' =>  [
                    '{{WRAPPER}} .element-post-carousel .item-post__content .desc p'   =>  'text-align: {{VALUE}};',
                ]
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings       =   $this->get_settings_for_display();
        $cat_post       =   $settings['select_cat'];
        $limit_post     =   $settings['limit'];
        $order_by_post  =   $settings['order_by'];
        $order_post     =   $settings['order'];

	    $data_settings_owl  =   [
		    'loop'          =>  ( 'yes' === $settings['loop'] ),
		    'nav'           =>  ( 'yes' === $settings['nav'] ),
		    'dots'          =>  ( 'yes' === $settings['dots'] ),
		    'margin'        =>  $settings['margin_item'],
		    'autoplay'      =>  ( 'yes' === $settings['autoplay'] ),
		    'responsive'    => [
			    '0' => array(
				    'items'     =>  $settings['item_567'],
				    'margin'    =>  $settings['margin_item_567']
			    ),

			    '576' => array(
				    'items'     =>  $settings['item_568'],
				    'margin'    =>  $settings['margin_item_568']
			    ),

			    '768' => array(
				    'items'     =>  $settings['item_768']
			    ),

			    '992' => array(
				    'items'     =>  $settings['item_992']
			    ),

			    '1200' => array(
				    'items'     =>  $settings['item']
			    ),
		    ],
	    ];

        // Query
        $args = array(
            'post_type'             =>  'post',
            'posts_per_page'        =>  $limit_post,
            'orderby'               =>  $order_by_post,
            'order'                 =>  $order_post,
            'cat'                   =>  $cat_post,
            'ignore_sticky_posts'   =>  1,
        );

        $query = new \ WP_Query( $args );

        if ( $query->have_posts() ) :

    ?>
        <div class="element-post-carousel">
            <div class="custom-owl-carousel custom-equal-height-owl owl-carousel owl-theme" data-settings-owl='<?php echo wp_json_encode( $data_settings_owl ) ; ?>'>
                <?php while ( $query->have_posts() ): $query->the_post(); ?>

                    <div class="item-post">
                        <div class="item-post__thumbnail">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php
                                if ( has_post_thumbnail() ) :
                                    the_post_thumbnail( 'large' );
                                else:
                                ?>
                                    <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/no-image.png' ) ) ?>" alt="<?php the_title(); ?>" />
                                <?php endif; ?>
                            </a>
                        </div>

                        <div class="item-post__content">
                            <h2 class="title">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>

                            <?php if ( $settings['show_excerpt'] == 'show' ) : ?>

                                <div class="desc">
                                    <p>
                                        <?php
                                        if ( has_excerpt() ) :
                                            echo esc_html( wp_trim_words( get_the_excerpt(), $settings['excerpt_length'], '...' ) );
                                        else:
                                            echo esc_html( wp_trim_words( get_the_content(), $settings['excerpt_length'], '...' ) );
                                        endif;
                                        ?>
                                    </p>
                                </div>

                            <?php endif; ?>
                        </div>
                    </div>

                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
    <?php

        endif;
    }

    protected function _content_template() {}

}

Plugin::instance()->widgets_manager->register_widget_type( new scrap_widget_post_carousel );