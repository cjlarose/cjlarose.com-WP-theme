<?php
/**
 * Template Name: Site Archive
 * 
 * A custom home template
 *
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <article>
    <h1><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
    
    <?php the_content(); ?>
    
    <?php
        $post_query = new WP_Query(array(
        'post_type' => 'site',
        'posts_per_page' => 5
    ));
    ?>
    <ul id="site-list">
    <?php $counter = 0; ?>
    <?php if ( $post_query->have_posts() ) while ( $post_query->have_posts() ) : $counter++; $post_query->the_post(); ?>
        <li class="span-7<?php echo ($counter % 3 == 0)?" last":""; ?>">
        <h3><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
        <?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); ?>
        <a href="<?php echo $large_image_url[0]; ?>" rel="lightbox" title="<?php echo strip_tags(get_the_content()); ?>">
            <?php the_post_thumbnail( 'site-large' ); ?>
        </a>
        <?php //the_excerpt(); ?>
        
        </li>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
    </ul>
    </article>

<?php endwhile; ?>
<?php //wp_reset_postdata(); ?>

<?php get_footer(); ?>