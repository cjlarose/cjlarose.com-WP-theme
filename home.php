<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>
<div class="span-15 append-1">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<article class="<?php echo get_post_type(); ?>">
					<?php if ( is_front_page() ) { ?>
						<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<?php } else { ?>	
						<h1><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
					<?php } ?>				
<p class="post-meta"><?php echo get_the_date(); ?> | <?php comments_number( 'No comments', '1 comment', '% comments' ); ?></p>
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>
						<p><?php edit_post_link( __( 'Edit', 'twentyten' ), '', '' ); ?></p>

				<?php comments_template( '', true ); ?>
</article>
<?php endwhile; ?>

</div>

<div class="span-6 box last">
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>