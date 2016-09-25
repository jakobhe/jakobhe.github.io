<?php

	global $mt_options;
	$feed_url = '';
	$feed_url = $mt_options['feedburner'];
	if (empty($feed_url)) { $feed_url = get_bloginfo('rss2_url'); }
	$phone = html_entity_decode($mt_options['header_phone_text']);
	$email = html_entity_decode($mt_options['header_email_text']);
	
?>
<!DOCTYPE HTML>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 10)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />

	<!-- Favicons -->
	<?php if(!empty($mt_options['custom_favicon']['url'])) { ?>
	<link rel="shortcut icon" href="<?php echo $mt_options['custom_favicon']['url']; ?>">
	<?php } else { ?>
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri().'/favicon.png'; ?>">
	<?php } ?>

	<!-- Mobile Specific Metas -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Feeds & Pingback -->
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php echo $feed_url; ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!-- WP Head -->
	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<?php if( !is_page_template( 'template-blank.php' ) ) : ?>

<header class="header-wrapper">	
	<div class="container">
		<?php if($mt_options['header_top'] == 1) { ?>
		<div class="header-top">
			<?php if (!empty($phone)) { echo '<span class="header-info phone">'.do_shortcode($phone).'</span>'; } ?>
			<?php if (!empty($email)) { echo '<span class="header-info email">'.do_shortcode($email).'</span>'; } ?>
			<?php if($mt_options['header_top_nav'] == 1) { ?>
			<nav class="top-navigation-wrapper" role="navigation">
				<ul id="mt-top-nav">
					<?php 
					if(has_nav_menu('top-menu')) {
						wp_nav_menu( array('theme_location' => 'top-menu', 'container' => '', 'items_wrap' => '%3$s' ) ); 
					} else {
						echo '<li><a href="#">' . __( 'Please set Your menu', 'mthemes' ) . '</a></li>';
					}
					?>
				</ul>
			</nav><!-- / .navigation-wrapper -->
			<?php } ?>
		</div>
		<?php } ?>
		<div class="header">

			<a class="logo" href="<?php echo home_url(); ?>">
			<?php if(!empty($mt_options['logo']['url'])) { ?>
				<img class="default-logo" src="<?php echo $mt_options['logo']['url']; ?>" alt="<?php bloginfo('name'); ?>" />
				<img class="retina-logo" src="<?php echo $mt_options['retina_logo']['url']; ?>" alt="<?php bloginfo('name'); ?>" />
			<?php } else { ?>
				<img src="<?php echo get_template_directory_uri().'/images/logo.png'; ?>" alt="logo" />	
			<?php } ?>
			</a>

			<nav class="navigation-wrapper" role="navigation">
				<a class="mt-mobile-nav-trigger btn btn-default btn-lg" href="#"><i class="fa fa-2x fa-bars"></i></a>
				<ul id="mt-main-nav" class="sf-menu underlined">
					<?php 
					if(has_nav_menu('primary-menu')) {
						wp_nav_menu( array('theme_location' => 'primary-menu', 'container' => '', 'items_wrap' => '%3$s' ) ); 
					} else {
						echo '<li><a href="#">' . __( 'Please set Your menu', 'mthemes' ) . '</a></li>';
					}
					?>
				</ul>
				<ul class="sf-menu-mobile">
					<?php 
					if(has_nav_menu('primary-menu')) {
						wp_nav_menu( array('theme_location' => 'primary-menu', 'container' => '', 'items_wrap' => '%3$s' ) ); 
					}
					?>
				</ul>
			</nav><!-- / .navigation-wrapper -->			
			
		</div><!-- / .header -->
	</div><!-- / .container -->
</header><!-- / .header-wrapper -->

<?php endif; // !template-blank.php ?>

<div class="content-wrapper">