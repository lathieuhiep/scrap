<?php
get_header();

$scrap_check_elementor =   get_post_meta( get_the_ID(), '_elementor_edit_mode', true );

$scrap_class_elementor =   '';

if ( $scrap_check_elementor ) :
    $scrap_class_elementor =   ' site-container-elementor';
endif;
?>

    <main class="site-container<?php echo esc_attr( $scrap_class_elementor ); ?>">
        <?php
        if ( $scrap_check_elementor ) :
            get_template_part('template-parts/page/content','page-elementor');
        else:
            get_template_part('template-parts/page/content','page');
        endif;
        ?>
    </main>

<?php 

get_footer();