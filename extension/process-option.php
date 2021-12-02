<?php
    /*
     * Method process option
     * # option 1: config font
     * # option 2: process config theme
    */
    if( !is_admin() ):

        add_action( 'wp_head','scrap_config_theme' );

        function scrap_config_theme() {

            if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) :

                    global $scrap_options;
                    $scrap_favicon = $scrap_options['scrap_opt_favicon_upload']['url'];

                    if( $scrap_favicon != '' ) :

                        echo '<link rel="shortcut icon" href="' . esc_url( $scrap_favicon ) . '" type="image/x-icon" />';

                    endif;

            endif;
        }

        // Method add custom css, Css custom add here
        // Inline css add here
        /**
         * Enqueues front-end CSS for the custom css.
         *
         * @see wp_add_inline_style()
         */

        add_action( 'wp_enqueue_scripts', 'scrap_custom_css', 99 );

        function scrap_custom_css() {

            global $scrap_options;

            $scrap_typo_selecter_1   =   $scrap_options['scrap_opt_custom_typography_1_selector'];

            $scrap_typo1_font_family   =   $scrap_options['scrap_opt_custom_typography_1']['font-family'];

            $scrap_css_style = '';

            if ( $scrap_typo1_font_family != '' ) :
                $scrap_css_style .= ' '.esc_attr( $scrap_typo_selecter_1 ).' { font-family: '.balanceTags( $scrap_typo1_font_family, true ).' }';
            endif;

            if ( $scrap_css_style != '' ) :
                wp_add_inline_style( 'scrap-style', $scrap_css_style );
            endif;

        }

    endif;
