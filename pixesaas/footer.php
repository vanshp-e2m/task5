<?php
/**
 * Footer - Figma nodes 1:3911 (Footer) and 1:3951 (copyright bar).
 *
 * The link columns come from a repeater; the contact column is separate
 * because it holds an email address and the social icon row rather than a
 * plain link list.
 */

$cta_heading = get_field('footer_cta_heading', 'option');
$cta_text    = get_field('footer_cta_button_text', 'option');
$cta_link    = get_field('footer_cta_button_link', 'option');

$contact_title = get_field('footer_contact_title', 'option');
$contact_email = get_field('footer_contact_email', 'option');
$socials       = get_field('footer_social_links', 'option');

$copyright   = get_field('copyright_text', 'option');
$legal_links = get_field('legal_links', 'option');
?>

	</div><!-- #page -->

	<footer id="colophon" class="site-footer">
		<div class="footer">

			<?php if ($cta_heading || $cta_text) : ?>
				<div class="footer__cta">
					<?php if ($cta_heading) : ?>
						<h2 class="footer__cta-heading"><?php echo esc_html($cta_heading); ?></h2>
					<?php endif; ?>

					<?php if ($cta_text) : ?>
						<a class="footer__cta-button" href="<?php echo esc_url($cta_link ?: '#'); ?>">
							<?php echo esc_html($cta_text); ?>
						</a>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<?php if (have_rows('footer_columns', 'option')) : ?>
				<?php while (have_rows('footer_columns', 'option')) : the_row();
					$column_title = get_sub_field('column_title');
					$links        = get_sub_field('links');
					?>
					<nav class="footer__column" <?php echo $column_title ? 'aria-label="' . esc_attr($column_title) . '"' : ''; ?>>
						<?php if ($column_title) : ?>
							<h3 class="footer__column-title"><?php echo esc_html($column_title); ?></h3>
						<?php endif; ?>

						<?php if ($links) : ?>
							<ul class="footer__links">
								<?php foreach ($links as $link) :
									if (empty($link['link_text'])) {
										continue;
									}
									?>
									<li class="footer__link">
										<a href="<?php echo esc_url($link['link_url'] ?: '#'); ?>">
											<?php echo esc_html($link['link_text']); ?>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</nav>
				<?php endwhile; ?>
			<?php endif; ?>

			<?php if ($contact_title || $contact_email || $socials) : ?>
				<div class="footer__column footer__contact">
					<?php if ($contact_title) : ?>
						<h3 class="footer__column-title"><?php echo esc_html($contact_title); ?></h3>
					<?php endif; ?>

					<div class="footer__contact-body">
						<?php if ($contact_email) : ?>
							<a class="footer__email" href="<?php echo esc_url('mailto:' . $contact_email); ?>">
								<?php echo esc_html($contact_email); ?>
							</a>
						<?php endif; ?>

						<?php if ($socials) : ?>
							<ul class="footer__socials">
								<?php foreach ($socials as $social) :
									if (empty($social['url'])) {
										continue;
									}
									$icon_url = !empty($social['icon'])
										? wp_get_attachment_image_url($social['icon'], 'full')
										: '';
									$label = $social['platform'] ?: __('Social profile', 'pixesaas');
									?>
									<li class="footer__social">
										<a href="<?php echo esc_url($social['url']); ?>" rel="noopener noreferrer" target="_blank">
											<span class="screen-reader-text"><?php echo esc_html(ucfirst($label)); ?></span>
											<?php if ($icon_url) : ?>
												<img src="<?php echo esc_url($icon_url); ?>" alt="" aria-hidden="true" />
											<?php endif; ?>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>

		</div>
	</footer>

	<?php if ($copyright || $legal_links) : ?>
		<div class="site-colophon">
			<div class="colophon">
				<?php if ($copyright) : ?>
					<p class="colophon__text"><?php echo esc_html($copyright); ?></p>
				<?php endif; ?>

				<?php if ($legal_links) : ?>
					<ul class="colophon__links">
						<?php foreach ($legal_links as $link) :
							if (empty($link['link_text'])) {
								continue;
							}
							?>
							<li>
								<a href="<?php echo esc_url($link['link_url'] ?: '#'); ?>">
									<?php echo esc_html($link['link_text']); ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>

	<?php wp_footer(); ?>
</body>
</html>
