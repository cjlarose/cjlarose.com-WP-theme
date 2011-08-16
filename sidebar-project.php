<ul class="xoxo">
    <li>
        <h3>Latest Projects</h3>
        <?php
                $post_query = new WP_Query(array(
                'post_type' => 'project',
                'posts_per_page' => 3
        ));
        ?>
        <ul class="sidebar-project-list">

        <?php if ( $post_query->have_posts() ) while ( $post_query->have_posts() ) : $post_query->the_post(); ?>
            <li class="span-6 last">
            
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'project-medium', array('title' => get_the_title()) ); ?>
            </a>
            <?php //the_excerpt(); ?>
            
            </li>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
        </ul>
        
        <a href="<?php echo home_url('/portfolio'); ?>">View complete portfolio</a>
    </li>
</ul>