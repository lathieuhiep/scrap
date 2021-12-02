<?php
/*
*---------------------------------------------------------------------
* This file create and contains the template post_type meta elements
*---------------------------------------------------------------------
*/

add_action('init', 'scrap_create_project', 10);

function scrap_create_project() {

    /* Start post type template */
    $labels = array(   
        'name'                  =>  _x( 'Dự án', 'post type general name', 'scrap' ),
        'singular_name'         =>  _x( 'Dự án', 'post type singular name', 'scrap' ),
        'menu_name'             =>  _x( 'Dự án', 'admin menu', 'scrap' ),
        'name_admin_bar'        =>  _x( 'Danh sách Dự án', 'add new on admin bar', 'scrap' ),
        'add_new'               =>  _x( 'Thêm mới', 'Dự án', 'scrap' ),
        'add_new_item'          =>  esc_html__( 'Thêm Dự án', 'scrap' ),
        'edit_item'             =>  esc_html__( 'Sửa Dự án', 'scrap' ),
        'new_item'              =>  esc_html__( 'Dự án mới', 'scrap' ),
        'view_item'             =>  esc_html__( 'Xem dự án', 'scrap' ),
        'all_items'             =>  esc_html__( 'Tất cả dự án', 'scrap' ),
        'search_items'          =>  esc_html__( 'Tìm kiếm dự án', 'scrap' ),
        'not_found'             =>  esc_html__( 'Không tìm thấy', 'scrap' ),
        'not_found_in_trash'    =>  esc_html__( 'Không tìm thấy trong thùng rác', 'scrap' ),
        'parent_item_colon'     =>  ''
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'menu_icon'          => 'dashicons-open-folder',
        'capability_type'    => 'post',
        'rewrite'            => array('slug' => 'du-an' ),
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    );

    register_post_type('scrap_project', $args );
    /* End post type template */

    /* Start taxonomy */
    $taxonomy_labels = array(
        'name'              => _x( 'Danh mục dự án', 'taxonomy general name', 'scrap' ),
        'singular_name'     => _x( 'Danh mục dự án', 'taxonomy singular name', 'scrap' ),
        'search_items'      => __( 'Tìm kiếm danh mục', 'scrap' ),
        'all_items'         => __( 'Tất cả danh mục', 'scrap' ),
        'parent_item'       => __( 'Danh mục cha', 'scrap' ),
        'parent_item_colon' => __( 'Danh mục cha:', 'scrap' ),
        'edit_item'         => __( 'Sửa', 'scrap' ),
        'update_item'       => __( 'Cập nhật', 'scrap' ),
        'add_new_item'      => __( 'Thêm mới', 'scrap' ),
        'new_item_name'     => __( 'Tên mới', 'scrap' ),
        'menu_name'         => __( 'Danh mục', 'scrap' ),
    );

    $taxonomy_args = array(

        'labels'            => $taxonomy_labels,
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'danh-muc-du-an' ),
    );

    register_taxonomy( 'scrap_project_cat', array( 'scrap_project' ), $taxonomy_args );
    /* End taxonomy */

}