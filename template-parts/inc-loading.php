<?php
global $scrap_options;

$scrap_show_loading = $scrap_options['scrap_opt_loading_show'] ?? '1';

if(  $scrap_show_loading == 1 ) :

    $scrap_loading_url  = $scrap_options['scrap_opt_loading_image']['url'];
?>

    <div id="site-loadding" class="d-flex align-items-center justify-content-center">

        <?php  if( $scrap_loading_url !='' ): ?>

            <img class="loading_img" src="<?php echo esc_url( $scrap_loading_url ); ?>" alt="<?php esc_attr_e('loading...','scrap') ?>"  >

        <?php else: ?>

            <img class="loading_img" src="<?php echo esc_url(get_theme_file_uri( '/assets/images/loading.gif' )); ?>" alt="<?php esc_attr_e('loading...','scrap') ?>">

        <?php endif; ?>

    </div>

<?php endif; ?>