<?php
/**
 * The home widget areas.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?>

<?php if ( is_active_sidebar( 'home-widget-area' ) ) : ?>
					<ul class="xoxo">
						<?php dynamic_sidebar( 'home-widget-area' ); ?>
					</ul>
<?php endif; ?>