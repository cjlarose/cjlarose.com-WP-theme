<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 * We filter the output of wp_title() a bit -- see
	 * twentyten_filter_wp_title() in functions.php.
	 */
	wp_title( '|', true, 'right' );

	?></title>
<link href='http://fonts.googleapis.com/css?family=Shanti|PT+Serif' rel='stylesheet' type='text/css'>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="screen, projection" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/blueprint/print.css" type="text/css" media="print" />
<!--[if lt IE 8]>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/blueprint/ie.css" type="text/css" media="screen, projection">
<![endif]-->
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" />
<?php wp_enqueue_script("jquery"); ?>
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
<?php
global $post;
//echo $post->post_name;
if (file_exists(TEMPLATEPATH . '/scripts/' . $post->post_name . '.js')) :
	$script_path = get_bloginfo('template_url') . '/scripts/' . $post->post_name . '.js';
	//echo $script_path;
?>
<script type="text/javascript" src="<?php echo $script_path; ?>"></script>
<?php endif; ?>
</head>

<body <?php body_class(); ?>>
<div id="wrap" class="container">
	
	<div id="hd">
		
		<div id="branding">
			<h1>
				<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php bloginfo( 'name' ); ?>
				</a>
			</h1>
			<p><?php bloginfo( 'description' ); ?></p>
		</div>
	
		<div id="access" role="navigation">
			<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
			<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
		</div><!-- #access -->
		
	</div><!-- #hd -->
	
	<div id="bd" class="span-24">