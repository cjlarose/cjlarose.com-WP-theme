<ul class="xoxo">
    <li>
        <h3>Latest Projects</h3>
        <?php
                $post_query = new WP_Query(array(
                'post_type' => 'project',
                'posts_per_page' => 10
        ));
        ?>
        <ul id="footer-project-list">
        <?php $counter = 0; ?>
        <?php if ( $post_query->have_posts() ) while ( $post_query->have_posts() ) : $counter++; $post_query->the_post(); ?>
            <li class="span-4<?php echo ($counter % 2 == 0)?" last":""; ?>">
            
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'project-thumbnail', array('title' => get_the_title()) ); ?>
            </a>
            <?php //the_excerpt(); ?>
            
            </li>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
        </ul>
    </li>
</ul>