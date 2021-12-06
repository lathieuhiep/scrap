<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class scrap_widget_price_table extends Widget_Base {

	public function get_categories() {
		return array( 'scrap_widgets' );
	}

	public function get_name() {
		return 'scrap-price-table';
	}

	public function get_title() {
		return esc_html__( 'Price Table', 'scrap' );
	}

	public function get_icon() {
		return 'eicon-price-table';
	}

	protected function _register_controls() {

		// Content
		$this->start_controls_section(
			'content_price_table',
			[
				'label' => __( 'Content', 'scrap' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'list_title', [
				'label' => esc_html__( 'Title', 'scrap' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Personal' , 'scrap' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_price',
			[
				'label'         =>  esc_html__( 'Price', 'scrap' ),
				'type'          =>  Controls_Manager::TEXT,
				'default'       =>  '50+',
				'label_block'   =>  false
			]
		);

		$repeater->add_control(
			'list_price_currency',
			[
				'label'         =>  esc_html__( 'Price Currency', 'scrap' ),
				'type'          =>  Controls_Manager::TEXT,
				'default'       =>  '$',
				'label_block'   =>  false
			]
		);

		$repeater->add_control(
			'list_info',
			[
				'label'         =>  esc_html__( 'info', 'scrap' ),
				'type'          =>  Controls_Manager::TEXTAREA,
				'default'       =>  '',
				'label_block'   =>  true
			]
		);

		$repeater->add_control(
			'list_sub_title', [
				'label' => esc_html__( 'Sub Title', 'scrap' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'per month per website' , 'scrap' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_feature', [
				'label' => esc_html__( 'Feature', 'scrap' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => '',
				'label_block' => true,
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

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		?>

		<div class="element-price-table">
            <?php foreach ( $settings['list'] as $item ) : ?>
                <div class="item">
                    <div class="header">
                        <?php if ( $item['list_title'] ): ?>
                            <h4 class="title">
                                <?php echo wp_kses_post( $item['list_title'] ) ?>
                            </h4>
                        <?php endif; ?>

                        <?php if ( $item['list_price'] ): ?>
                            <div class="price">
                                    <span class="price-amount">
                                        <span class="price-currency">
                                            <?php echo esc_html( $item['list_price_currency'] ) ?>
                                        </span>

                                        <?php echo esc_html( $item['list_price'] ) ?>
                                    </span>

                                <?php if ( $item['list_info'] ): ?>
                                    <span class="" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo esc_attr( $item['list_info'] ) ?>">
                                            <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/icon-info.webp' ) ) ?>" alt="info">
                                        </span>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <?php
                        if ( $item['list_sub_title'] ):
                            $sub_title_array = explode("\n", $item['list_sub_title']);
                            ?>

                            <div class="sub-title">
                                <?php foreach ( $sub_title_array as $item_sub_title ): ?>
                                    <p>
                                        <?php echo esc_html( $item_sub_title ); ?>
                                    </p>
                                <?php endforeach; ?>
                            </div>

                        <?php endif; ?>
                    </div>

                    <?php
                    if ( $item['list_feature'] ):
                        $feature_array = explode("\n", $item['list_feature']);
                        ?>
                        <ul class="feature">
                            <?php foreach ( $feature_array as $item_feature ): ?>
                                <li>
                                    <?php echo esc_html( $item_feature ); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
		</div>

		<?php

	}
}

Plugin::instance()->widgets_manager->register_widget_type( new scrap_widget_price_table );