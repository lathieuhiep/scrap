<?php if( is_active_sidebar( 'scrap-sidebar-main' ) ): ?>

    <aside class="<?php echo esc_attr( scrap_col_sidebar() ); ?> site-sidebar order-1">
        <?php dynamic_sidebar( 'scrap-sidebar-main' ); ?>
    </aside>

<?php endif; ?>