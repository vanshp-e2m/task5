<?php
/**
 * Free-trial CTA - Figma node 1:3852 (Container 11).
 *
 * The section has top and side padding but no bottom padding, so the phone
 * mockup runs to the section's bottom edge rather than sitting inside it.
 */

$heading       = get_sub_field('heading');
$subtext       = get_sub_field('subtext');
$image         = get_sub_field('image');
$placeholder   = get_sub_field('email_placeholder');
$button_text   = get_sub_field('subscribe_button_text');
$button_link   = get_sub_field('subscribe_link');
$trust_bullets = get_sub_field('trust_bullets');
$app_badges    = get_sub_field('app_badges');

$image_url = $image ? wp_get_attachment_image_url($image, 'full') : '';
?>

<section class="section-cta-promo" id="<?php echo esc_attr(pixesaas_section_anchor()); ?>">
	<div class="cta-promo">

		<?php if ($image_url) : ?>
			<div class="cta-promo__visual">
				<img src="<?php echo esc_url($image_url); ?>" alt="" aria-hidden="true" />
			</div>
		<?php endif; ?>

		<div class="cta-promo__content">

			<?php if ($heading || $subtext) : ?>
				<div class="cta-promo__copy">
					<?php if ($heading) : ?>
						<h2 class="cta-promo__heading"><?php echo esc_html($heading); ?></h2>
					<?php endif; ?>
					<?php if ($subtext) : ?>
						<p class="cta-promo__subtext"><?php echo esc_html($subtext); ?></p>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<?php if ($placeholder || $button_text || $trust_bullets) : ?>
				<div class="cta-promo__signup">
					<?php if ($placeholder || $button_text) : ?>
						<form class="cta-promo__form" action="<?php echo esc_url($button_link ?: home_url('/')); ?>" method="post">
							<?php if ($placeholder) : ?>
								<label class="screen-reader-text" for="cta-promo-email"><?php echo esc_html($placeholder); ?></label>
								<input class="cta-promo__field"
								       id="cta-promo-email"
								       type="email"
								       name="email"
								       placeholder="<?php echo esc_attr($placeholder); ?>" />
							<?php endif; ?>

							<?php if ($button_text) : ?>
								<button class="cta-promo__submit" type="submit"><?php echo esc_html($button_text); ?></button>
							<?php endif; ?>
						</form>
					<?php endif; ?>

					<?php if ($trust_bullets) : ?>
						<ul class="cta-promo__trust">
							<?php foreach ($trust_bullets as $bullet) :
								if (empty($bullet['text'])) {
									continue;
								}
								?>
								<li class="cta-promo__trust-item">
									<?php if (!empty($bullet['icon'])) :
										$icon_url = wp_get_attachment_image_url($bullet['icon'], 'full');
										if ($icon_url) : ?>
											<img src="<?php echo esc_url($icon_url); ?>" alt="" aria-hidden="true" />
										<?php endif;
									endif; ?>
									<span><?php echo esc_html($bullet['text']); ?></span>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<?php if ($app_badges) : ?>
				<ul class="cta-promo__apps">
					<?php foreach ($app_badges as $badge) :
						if (empty($badge['badge_image'])) {
							continue;
						}
						$badge_url = wp_get_attachment_image_url($badge['badge_image'], 'full');
						if (!$badge_url) {
							continue;
						}
						$alt = get_post_meta($badge['badge_image'], '_wp_attachment_image_alt', true);
						?>
						<li class="cta-promo__app">
							<a href="<?php echo esc_url($badge['badge_link'] ?: '#'); ?>">
								<img src="<?php echo esc_url($badge_url); ?>" alt="<?php echo esc_attr($alt); ?>" />
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

		</div>
	</div>
</section>
