<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>
<div class="span-15 append-1">
	<article class="<?php echo get_post_type(); ?>">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

					<?php //previous_post_link( '%link', '' . _x( '&larr;', 'Previous post link', 'twentyten' ) . ' %title' ); ?>
					<?php //next_post_link( '%link', '%title ' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '' ); ?>

<?php if ($post_url = get_post_meta($post->ID, 'url', true)): ?>

	<div class="span-15 last">
		<div class="span-11">
			<h1><?php the_title(); ?></h1>
		</div>
		<div class="span-4 last">
			<a href="<?php echo $post_url; ?>" class="button" id="visit-project">Visit Site</a>
		</div>
	</div>

<?php else: ?>
	<h1><?php the_title(); ?></h1>
<?php endif; ?>

	<p class="post-meta"><?php echo get_the_date(); ?> | <?php comments_number( 'No comments', '1 comment', '% comments' ); ?></p>
	
	<?php global $more; $more = 0; ?>
	<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); ?>
	<a href="<?php echo $large_image_url[0]; ?>" rel="lightbox">
            <?php the_post_thumbnail( 'project-super' ); ?>
        </a>
	
	
						<?php $more = 1; ?>
						<?php the_content('', TRUE); ?>
						<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>

<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyten_author_bio_avatar_size', 60 ) ); ?>
							<h2><?php printf( esc_attr__( 'About %s', 'twentyten' ), get_the_author() ); ?></h2>
							<?php the_author_meta( 'description' ); ?>
							<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
								<?php printf( __( 'View all posts by %s &rarr;', 'twentyten' ), get_the_author() ); ?>
							</a>
<?php endif; ?>

						<?php twentyten_posted_in(); ?>
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '', '' ); ?>

				<?php previous_post_link( '%link', '' . _x( '&larr;', 'Previous post link', 'twentyten' ) . ' %title' ); ?>
				<?php next_post_link( '%link', '%title ' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '' ); ?>
	</article>
				<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>
</div>

<div class="span-8 last">
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>