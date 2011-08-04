<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?>
	</div><!-- #bd -->
	
	<div id="ft" class="span-24">
<?php
	/* A sidebar in the footer? Yep. You can can customize
	 * your footer with four columns of widgets.
	 */
	//get_sidebar( 'footer' );
?>
	<div class="span-24">
		
		<div class="span-7 colborder">
			<h3>Recent Posts</h3>
			<?php
			$bot_query = new WP_Query( array(
			    'post_type' => 'post',
			    'orderby' => 'date',
			    'posts_per_page' => 10
			) ); ?>
			
			<ul>
			<?php if ( $bot_query->have_posts() ) while ( $bot_query->have_posts() ) : $bot_query->the_post(); ?>
			
			    <li><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></li>
			
			<?php endwhile; ?>
			</ul>
			
			<?php wp_reset_postdata(); ?>
		</div>
		
		<div class="span-8 colborder">
			<h3>Latest Projects</h3>
			<?php
				$post_query = new WP_Query(array(
				'post_type' => 'project',
				'posts_per_page' => 4
			));
			?>
			<ul id="footer-project-list">
			<?php $counter = 0; ?>
			<?php if ( $post_query->have_posts() ) while ( $post_query->have_posts() ) : $counter++; $post_query->the_post(); ?>
			    <li class="span-4<?php echo ($counter % 2 == 0)?" last":""; ?>">
			    
			    <a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'project-thumbnail' ); ?>
			    </a>
			    <?php //the_excerpt(); ?>
			    
			    </li>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
			</ul>
		</div>
		
		<div class="span-7 last">
			<h3>About Chris</h3>
			<p>Nam fermentum cursus urna vitae euismod. Maecenas non urna sit amet tellus ultricies tempus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse euismod commodo nibh ut ultrices. In eu purus non lacus ornare porttitor ac at justo. Aenean nec enim est, id ultrices orci. In rutrum urna lectus. </p>
		</div>
		
	</div>
		
		<div class="span-7 colborder">
			<a class="button" href="<?php echo home_url('/blog'); ?>">Blog</a>
		</div>
		
		<div class="span-8 colborder">
			<a class="button" href="<?php echo home_url('/portfolio'); ?>">Portfolio</a>
		</div>
		
		<div class="span-7 last">
			<a class="button" href="<?php echo home_url('/about-me'); ?>">About</a>
		</div>
		
		
		
<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
	</div><!-- #ft -->
	<p id="copyright" class="prepend-1 append-1">
		<a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		<a href="http://wordpress.org/" title="Semantic Personal Publishing Platform" rel="generator">Proudly powered by WordPress</a>
	</p>
</div><!-- #wrap -->
</body>
</html>