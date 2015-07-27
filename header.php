<!doctype html>
<!-- header.php -->
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">

	<link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
	<link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="top"></div>

	<div id="navbar" class="navbar navbar-inverse navbar-transparent navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">

				<?php
					if (is_front_page()) {
						$home_url = '#top';
					} else {
						$home_url = home_url();
					}
				?>

				<?php if (get_header_image() != ''): ?>
					<a href="<?php echo $home_url; ?>">
						<img class="site-logo" src="<?php header_image(); ?>" alt="<?php echo get_bloginfo('title'); ?>" />
					</a>
				<?php else: ?>
					<!-- <a href="<?php home_url(); ?>" class="navbar-brand"> -->
					<a href="<?php echo $home_url; ?>" class="navbar-brand">
						<?php echo get_bloginfo('title'); ?>
					</a>
				<?php endif; ?>

				<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>

			<?php
				wp_nav_menu( array(
					'theme_location'    => 'main-menu',
					'depth'             => 1,
					'container'         => 'div',
					'container_class'   => 'collapse navbar-collapse',
					'container_id'      => 'navbar-main',
					'menu_class'        => 'nav navbar-nav navbar-right',
					'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
					'walker'            => new wp_bootstrap_navwalker())
				);
			?>

		</div>
	</div>
