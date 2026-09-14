<?php
/**
 * Pricing - Figma node 1:3749 (Container 08).
 *
 * Each card's artwork overlaps the bordered panel below it via a -96px bottom
 * margin (node 1:3761), which is why the panel carries 120px of top padding.
 */

$heading   = get_sub_field('heading');
$monthly   = get_sub_field('toggle_monthly_label');
$annual    = get_sub_field('toggle_annual_label');
$toggle    = get_sub_field('toggle_icon');
$save      = get_sub_field('save_label');
$save_icon = get_sub_field('save_arrow_icon');
$tick      = get_sub_field('tick_icon');
$cards     = get_sub_field('cards');

$tick_url      = $tick ? wp_get_attachment_image_url($tick, 'full') : '';
$toggle_url    = $toggle ? wp_get_attachment_image_url($toggle, 'full') : '';
$save_icon_url = $save_icon ? wp_get_attachment_image_url($save_icon, 'full') : '';

$has_switcher = $monthly || $annual || $toggle_url || $save;
?>

<section class="section-pricing" id="<?php echo esc_attr(pixesaas_section_anchor()); ?>">
	<div class="pricing">

		<div class="pricing__head">
			<?php if ($heading) : ?>
				<h2 class="pricing__heading"><?php echo esc_html($heading); ?></h2>
			<?php endif; ?>

			<?php if ($has_switcher) : ?>
				<div class="pricing__switcher">
					<div class="pricing__toggle">
						<?php if ($monthly) : ?>
							<span class="pricing__toggle-label"><?php echo esc_html($monthly); ?></span>
						<?php endif; ?>

						<?php if ($toggle_url) : ?>
							<img class="pricing__toggle-switch" src="<?php echo esc_url($toggle_url); ?>" alt="" aria-hidden="true" />
						<?php endif; ?>

						<?php if ($annual) : ?>
							<span class="pricing__toggle-label"><?php echo esc_html($annual); ?></span>
						<?php endif; ?>
					</div>

					<?php if ($save_icon_url) : ?>
						<img class="pricing__save-arrow" src="<?php echo esc_url($save_icon_url); ?>" alt="" aria-hidden="true" />
					<?php endif; ?>

					<?php if ($save) : ?>
						<span class="pricing__save"><?php echo esc_html($save); ?></span>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>

		<?php if ($cards) : ?>
			<div class="pricing__cards">
				<?php foreach ($cards as $card) : ?>
					<div class="plan">

						<?php if (!empty($card['image'])) :
							$art_url = wp_get_attachment_image_url($card['image'], 'full');
							if ($art_url) : ?>
								<img class="plan__art" src="<?php echo esc_url($art_url); ?>" alt="" aria-hidden="true" />
							<?php endif;
						endif; ?>

						<div class="plan__panel">
							<?php if (!empty($card['title'])) : ?>
								<h3 class="plan__title"><?php echo esc_html($card['title']); ?></h3>
							<?php endif; ?>

							<?php if (!empty($card['feature_list'])) : ?>
								<ul class="plan__features">
									<?php foreach ($card['feature_list'] as $feature) :
										if (empty($feature['feature_text'])) {
											continue;
										}
										?>
										<li class="plan__feature">
											<?php if ($tick_url) : ?>
												<img src="<?php echo esc_url($tick_url); ?>" alt="" aria-hidden="true" />
											<?php endif; ?>
											<span><?php echo esc_html($feature['feature_text']); ?></span>
										</li>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>

							<?php if (!empty($card['price']) || !empty($card['price_suffix'])) : ?>
								<p class="plan__price">
									<?php if (!empty($card['price'])) : ?>
										<span class="plan__amount"><?php echo esc_html($card['price']); ?></span>
									<?php endif; ?>
									<?php if (!empty($card['price_suffix'])) : ?>
										<span class="plan__period"><?php echo esc_html($card['price_suffix']); ?></span>
									<?php endif; ?>
								</p>
							<?php endif; ?>

							<?php if (!empty($card['description'])) : ?>
								<p class="plan__description"><?php echo esc_html($card['description']); ?></p>
							<?php endif; ?>

							<?php if (!empty($card['cta'])) :
								$cta_href = !empty($card['cta_link']) ? $card['cta_link'] : '#';
								?>
								<a class="plan__cta" href="<?php echo esc_url($cta_href); ?>">
									<?php echo esc_html($card['cta']); ?>
								</a>
							<?php endif; ?>
						</div>

					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

	</div>
</section>
