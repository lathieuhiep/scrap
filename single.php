<?php
get_header();

global $scrap_options;

$scrap_opt_single_post_sidebar = $scrap_options['scrap_opt_single_post_sidebar'] ?? 'right';

$scrap_class_col_content = scrap_col_use_sidebar( $scrap_opt_single_post_sidebar, 'scrap-sidebar-main' );

get_template_part( 'template-parts/breadcrumbs/inc', 'breadcrumbs' );
?>

<div class="site-container site-single">
    <div class="container">
        <div class="row">
            <div class="<?php echo esc_attr( $scrap_class_col_content ); ?>">

                <?php
                if ( have_posts() ) : while (have_posts()) : the_post();

                    get_template_part( 'template-parts/post/content','single' );

                    endwhile;
                endif;
                ?>

            </div>

            <?php
            if ( $scrap_opt_single_post_sidebar !== 'hide' ) :
	            get_sidebar();
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>

