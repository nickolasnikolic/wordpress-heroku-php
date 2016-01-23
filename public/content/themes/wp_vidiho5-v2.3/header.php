<!doctype html>
<!--[if IE 8]><html class="no-js lt-ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php do_action('after_open_body_tag'); ?>

<div id="page">
	<div id="mobile-bar">
		<a class="menu-trigger" href="#mobilemenu"><i class="fa fa-bars"></i></a>
		<p class="mob-title"><?php bloginfo( 'name' ); ?></p>
	</div>
	<div id="mobilemenu"></div>
	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="header-wrap">
						<div class="pre-head">
							<div class="row">
								<div class="col-sm-6">
									<?php ci_e_logo('<h1 class="site-logo">', '</h1>'); ?>
									<?php ci_e_slogan('<p class="site-tagline">', '</p>'); ?>
								</div>

								<?php if ( is_active_sidebar('header-social-widget') ) : ?>
								<div class="col-sm-6">
									<div class="header-socials">
										<?php dynamic_sidebar('header-social-widget'); ?>
									</div>
								</div>
								<?php endif; ?>
							</div>
						</div>

						<nav id="nav">
							<?php
								wp_nav_menu( array(
									'theme_location' => 'ci_main_menu',
									'fallback_cb'    => '',
									'container'      => '',
									'menu_id'        => 'navigation',
									'menu_class'     => 'group'
								) );
							?>
						</nav><!-- #nav -->
					</div>
				</div>
			</div>
		</div>
	</header>