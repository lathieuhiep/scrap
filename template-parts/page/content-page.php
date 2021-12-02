<div class="container">
    <?php while ( have_posts() ) : the_post(); ?>
        <div class="site-page-content">
            <?php
            the_content();
            scrap_link_page();
            ?>
        </div>
    <?php
        scrap_comment_form();
    endwhile;
    ?>
</div>