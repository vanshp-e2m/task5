<?php
/**
 * Steps - Figma node 1:3706 (Container 07).
 *
 * The first step is the wide card (node 1:3711, 668px) sharing a tinted
 * wrapper with an illustration that overhangs it by 86px; the remaining steps
 * sit in an even row below (nodes 1:3722 / 1:3731 / 1:3740, 352px each).
 */

$heading   = get_sub_field('heading');
$subtext   = get_sub_field('subtext');
$link_icon = get_sub_field('link_icon');
$steps     = get_sub_field('steps');

$arrow_url = $link_icon ? wp_get_attachment_image_url($link_icon, 'full') : '';

/**
 * One step link, shared by the featured card and the compact ones.
 */
$render_link = static function ($text, $url, $arrow) {
	if (!$text) {
		return;
	}
	?>
	<a class="step-card__link" href="<?php echo esc_url($url ?: '#'); ?>">
		<span><?php echo esc_html($text); ?></span>
		<?php if ($arrow) : ?>
			<img src="<?php echo esc_url($arrow); ?>" alt="" aria-hidden="true" />
		<?php endif; ?>
	</a>
	<?php
};

$featured = $steps ? array_shift($steps) : null;
?>

<section class="section-steps" id="<?php echo esc_attr(pixesaas_section_anchor()); ?>">
	<div class="steps">

		<?php if ($heading) : ?>
			<h2 class="steps__heading"><?php echo esc_html($heading); ?></h2>
		<?php endif; ?>

		<?php if ($subtext) : ?>
			<p class="steps__subtext"><?php echo esc_html($subtext); ?></p>
		<?php endif; ?>

		<?php if ($featured || $steps) : ?>
			<div class="steps__boxes">

				<?php if ($featured) :
					$tint  = $featured['bg_color'] ?: 'green';
					$photo = !empty($featured['photo']) ? wp_get_attachment_image_url($featured['photo'], 'full') : '';
					?>
					<div class="steps__featured step--<?php echo esc_attr($tint); ?>">
						<div class="step-card step-card--wide">
							<div class="step-card__head">
								<?php if (!empty($featured['icon'])) :
									$icon_url = wp_get_attachment_image_url($featured['icon'], 'full');
									if ($icon_url) : ?>
										<span class="step-card__badge step-card__badge--lg">
											<img src="<?php echo esc_url($icon_url); ?>" alt="" aria-hidden="true" />
										</span>
									<?php endif;
								endif; ?>

								<div class="step-card__text">
									<?php if (!empty($featured['title'])) : ?>
										<h3 class="step-card__title"><?php echo esc_html($featured['title']); ?></h3>
									<?php endif; ?>
									<?php if (!empty($featured['body'])) : ?>
										<p class="step-card__body"><?php echo esc_html($featured['body']); ?></p>
									<?php endif; ?>
								</div>
							</div>

							<?php $render_link($featured['link_text'] ?? '', $featured['link_url'] ?? '', $arrow_url); ?>
						</div>

						<?php if ($photo) : ?>
							<div class="steps__illustration">
								<img src="<?php echo esc_url($photo); ?>" alt="" aria-hidden="true" />
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php if ($steps) : ?>
					<div class="steps__row">
						<?php foreach ($steps as $step) :
							$tint = $step['bg_color'] ?: 'blue';
							?>
							<div class="step-card step-card--compact step--<?php echo esc_attr($tint); ?>">
								<div class="step-card__head">
									<?php if (!empty($step['icon'])) :
										$icon_url = wp_get_attachment_image_url($step['icon'], 'full');
										if ($icon_url) : ?>
											<span class="step-card__badge">
												<img src="<?php echo esc_url($icon_url); ?>" alt="" aria-hidden="true" />
											</span>
										<?php endif;
									endif; ?>

									<div class="step-card__text">
										<?php if (!empty($step['title'])) : ?>
											<h3 class="step-card__title"><?php echo esc_html($step['title']); ?></h3>
										<?php endif; ?>
										<?php if (!empty($step['body'])) : ?>
											<p class="step-card__body"><?php echo esc_html($step['body']); ?></p>
										<?php endif; ?>
									</div>
								</div>

								<?php $render_link($step['link_text'] ?? '', $step['link_url'] ?? '', $arrow_url); ?>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>

			</div>
		<?php endif; ?>

	</div>
</section>
