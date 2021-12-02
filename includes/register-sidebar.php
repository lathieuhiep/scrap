<?php
/**
 * Register Sidebar
 */
add_action( 'widgets_init', 'scrap_widgets_init');

function scrap_widgets_init() {

	$scrap_widgets_arr  =   array(

		'scrap-sidebar-main'    =>  array(
			'name'              =>  esc_html__( 'Sidebar Main', 'scrap' ),
			'description'       =>  esc_html__( 'Display sidebar right or left on all page.', 'scrap' )
		),

		'scrap-sidebar-wc' =>  array(
			'name'              =>  esc_html__( 'Sidebar Woocommerce', 'scrap' ),
			'description'       =>  esc_html__( 'Display sidebar on page shop.', 'scrap' )
		),

		'scrap-sidebar-footer-multi-column-1'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 1', 'scrap' ),
			'description'       =>  esc_html__('Display footer column 1 on all page.', 'scrap' )
		),

		'scrap-sidebar-footer-multi-column-2'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 2', 'scrap' ),
			'description'       =>  esc_html__('Display footer column 2 on all page.', 'scrap' )
		),

		'scrap-sidebar-footer-multi-column-3'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 3', 'scrap' ),
			'description'       =>  esc_html__('Display footer column 3 on all page.', 'scrap' )
		),

		'scrap-sidebar-footer-multi-column-4'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 4', 'scrap' ),
			'description'       =>  esc_html__('Display footer column 4 on all page.', 'scrap' )
		)

	);

	foreach ( $scrap_widgets_arr as $scrap_widgets_id => $scrap_widgets_value ) :

		register_sidebar( array(
			'name'          =>  esc_attr( $scrap_widgets_value['name'] ),
			'id'            =>  esc_attr( $scrap_widgets_id ),
			'description'   =>  esc_attr( $scrap_widgets_value['description'] ),
			'before_widget' =>  '<section id="%1$s" class="widget %2$s">',
			'after_widget'  =>  '</section>',
			'before_title'  =>  '<h2 class="widget-title">',
			'after_title'   =>  '</h2>'
		));

	endforeach;

}