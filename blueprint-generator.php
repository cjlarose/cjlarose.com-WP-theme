<?php
/**
 * Template Name: Blueprint Generator
 *
 * Custom template for blueprint generator
 *
 */

get_header(); ?>


<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<article class="<?php echo get_post_type(); ?>">
					<?php if ( is_front_page() ) { ?>
						<h2><?php the_title(); ?></h2>
					<?php } else { ?>	
						<h1><?php the_title(); ?></h1>
					<?php } ?>

<?php
echo do_shortcode('[include file="blueprintgenerator/index.php"]');
?>

<div class="span-16 prepend-4">
						<?php the_content(); ?>
<p>
						<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '', '' ); ?>
</p>
		<section id="comments">
						<?php comments_template( '', true ); ?>
		</section>
</div>
	</article>
<?php endwhile; ?>



<?php get_footer(); ?>