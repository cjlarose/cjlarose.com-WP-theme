<?php
/**
 * Template Name: Home
 *
 * A custom home template
 *
 */

get_header(); ?>

<div id="banner" class="span-24">
    
    <div class="span-11 append-1">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
    
    <?php endwhile; ?>
        <a class="button" href="<?php echo home_url('/portfolio'); ?>">Check out my portfolio</a>
    </div>
    
    <div class="span-12 last">
        <a href="<?php echo home_url('/portfolio'); ?>">
            <img src="<?php bloginfo('template_url'); ?>/images/amer-pat-preview.jpg" alt="Design thumbnail of the website for the American Patriot Party" />
        </a>
    </div>
    
</div>
<hr />
<div id="from-my-blog" class="span-24">
    
   
    
    <div class="span-15 append-1">
         <h2>From my blog</h2>
        <?php
        $post_query = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 3
        ));
        ?>
        
        <?php if ( $post_query->have_posts() ) while ( $post_query->have_posts() ) : $post_query->the_post(); ?>
            <article>
            <h3><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
            
            <p class="post-meta"><?php echo get_the_date(); ?> | <?php comments_number( 'No comments', '1 comment', '% comments' ); ?></p>
            
            <?php the_excerpt(); ?>
            </article>
        
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    </div>
    
    <div class="span-6 box last">
        <?php get_sidebar('home'); ?>
    </div>
    
</div>

<?php get_footer(); ?>