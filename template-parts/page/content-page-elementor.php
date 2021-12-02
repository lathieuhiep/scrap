<?php while ( have_posts() ) : the_post() ; ?>
    <div class="site-page-content">
        <?php
        the_content();
        scrap_link_page();
        ?>
    </div>
<?php endwhile; ?>