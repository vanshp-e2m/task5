<?php
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<?php
		$logo_text  = get_field('nav_logo_text', 'option') ?: get_bloginfo('name');
		$login_text = get_field('nav_login_text', 'option') ?: __('Login', 'pixesaas');
		$login_link = get_field('nav_login_link', 'option') ?: wp_login_url();
		$cta_text   = get_field('nav_cta_text', 'option') ?: __('Get started', 'pixesaas');
		$cta_link   = get_field('nav_cta_link', 'option') ?: '#';
		?>
		<header id="masthead" class="site-header">
			<nav class="navbar" aria-label="<?php esc_attr_e('Primary', 'pixesaas'); ?>">

				<a class="navbar__logo" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
					<span class="navbar__logo-mark" aria-hidden="true">
						<img src="<?php echo esc_url(pixesaas_nav_logo_mark_url()); ?>" alt="" width="41" height="41" />
					</span>
					<span class="navbar__logo-text"><?php echo esc_html($logo_text); ?></span>
				</a>

				<button class="navbar__toggle" type="button"
				        aria-expanded="false"
				        aria-controls="navbar-collapse"
				        aria-label="<?php esc_attr_e('Toggle menu', 'pixesaas'); ?>">
					<span class="navbar__toggle-bar"></span>
					<span class="navbar__toggle-bar"></span>
					<span class="navbar__toggle-bar"></span>
				</button>

				<div class="navbar__collapse" id="navbar-collapse">
					<?php
					wp_nav_menu(array(
						'theme_location'  => 'primary',
						'container'       => 'div',
						'container_class' => 'navbar__menu',
						'menu_class'      => 'navbar__menu-list',
						'depth'           => 1,
						'fallback_cb'     => false,
					));
					?>

					<div class="navbar__actions">
						<a class="navbar__login" href="<?php echo esc_url($login_link); ?>"><?php echo esc_html($login_text); ?></a>
						<a class="navbar__cta" href="<?php echo esc_url($cta_link); ?>"><?php echo esc_html($cta_text); ?></a>
					</div>
				</div>

			</nav>
		</header>
