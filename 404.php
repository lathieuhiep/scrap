<?php
get_header();

global $scrap_options;

$scrap_title = $scrap_options['scrap_opt_404_title'];
$scrap_content = $scrap_options['scrap_opt_404_editor'];
$scrap_background = $scrap_options['scrap_opt_404_background']['id'];

?>

<div class="site-error text-center">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-6">
                <figure class="site-error__image404">
                    <?php
                    if( !empty( $scrap_background ) ):
                        echo wp_get_attachment_image( $scrap_background, 'full' );
                    else:
                        echo'<img src="'.esc_url( get_theme_file_uri( '/assets/images/404.jpg' ) ).'" alt="'.get_bloginfo('title').'" />';
                    endif;
                    ?>
                </figure>
            </div>

            <div class="col-md-6">
                <h1 class="site-title-404">
                    <?php
                    if ( $scrap_title != '' ):
                        echo esc_html( $scrap_title );
                    else:
                        esc_html_e( 'Awww...Do Not Cry', 'scrap' );
                    endif;
                    ?>
                </h1>

                <div id="site-error-content">
                    <?php
                    if ( $scrap_content != '' ) :
                        echo wp_kses_post( $scrap_content );
                    else:
                    ?>
                        <p>
                            <?php esc_html_e( 'It is just a 404 Error!', 'scrap' ); ?>
                            <br />
                            <?php esc_html_e( 'What you are looking for may have been misplaced', 'scrap' ); ?>
                            <br />
                            <?php esc_html_e( 'in Long Term Memory.', 'scrap' ); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div id="site-error-back-home">
                    <a href="<?php echo esc_url( get_home_url('/') ); ?>" title="<?php echo esc_html__('Go to the Home Page', 'scrap'); ?>">
                        <?php esc_html_e('Go to the Home Page', 'scrap'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>