<?php

add_filter('rwmb_meta_boxes', 'scrap_register_meta_boxes');

function scrap_register_meta_boxes($scrap_meta_boxes)
{

    $scrap_meta_boxes[] = array(
        'id' => 'scrap_meta_box_post',
        'title' => esc_html__('Post Format', 'scrap'),
        'post_types' => array('post'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(

            array(
                'name' => 'Select Type Image',
                'id' => 'scrap_meta_box_post_select_image',
                'type' => 'select',
                'options' => array(
                    'featured_image' => 'Featured image',
                    'gallery' => 'Gallery',
                ),
            ),

            array(
                'id' => 'scrap_meta_box_post_gallery',
                'name' => 'Gallery',
                'type' => 'image_advanced',
                'force_delete' => false,
                'max_status' => false,
                'image_size' => 'thumbnail',
            ),

            array(
                'id' => 'scrap_meta_box_post_video',
                'name' => 'Video Or Audio',
                'type' => 'oembed',
            ),

        )
    );

    return $scrap_meta_boxes;
}