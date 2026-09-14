<?php
/**
 * Hero - Figma nodes 1:44 (Container 02, copy) and 1:52 (Container 03, visual).
 *
 * The design keeps these as two sibling frames but they are one editorial unit,
 * so a single ACF row drives both.
 */

$heading     = get_sub_field('heading');
$subheading  = get_sub_field('subheading');
$cta_buttons = get_sub_field('cta_buttons');

$backdrop       = get_sub_field('bg_image');
$caption_lead   = get_sub_field('visual_caption_lead');
$caption_strong = get_sub_field('visual_caption_strong');

$avatars       = get_sub_field('avatars');
$counter_value = get_sub_field('trust_counter_value');
$counter_label = get_sub_field('trust_counter_label');

$trusted_label = get_sub_field('trusted_by_label');
$trusted_logos = get_sub_field('trusted_logos');

$pay_logo      = get_sub_field('pay_widget_logo');
$pay_brand     = get_sub_field('pay_widget_brand');
$pay_amount    = get_sub_field('pay_widget_amount');
$pay_period    = get_sub_field('pay_widget_period');
$pay_blurb     = get_sub_field('pay_widget_blurb');
$pay_note      = get_sub_field('pay_widget_note');
$pay_sec_amt   = get_sub_field('pay_widget_secondary_amount');
$pay_sec_per   = get_sub_field('pay_widget_secondary_period');
$pay_button    = get_sub_field('pay_widget_button_text');

$has_counter = $avatars || $counter_value || $counter_label;
$has_pay     = $pay_amount || $pay_brand || $pay_blurb || $pay_note;
$has_trusted = $trusted_label || $trusted_logos;
$has_visual  = $backdrop || $caption_lead || $caption_strong || $has_counter || $has_pay || $has_trusted;
?>

<section class="section-hero" id="<?php echo esc_attr(pixesaas_section_anchor()); ?>">
	<div class="hero">
		<?php if ($heading) : ?>
			<h1 class="hero__heading"><?php echo esc_html($heading); ?></h1>
		<?php endif; ?>

		<?php if ($subheading) : ?>
			<p class="hero__subheading"><?php echo esc_html($subheading); ?></p>
		<?php endif; ?>

		<?php if ($cta_buttons) : ?>
			<div class="hero__buttons">
				<?php foreach ($cta_buttons as $button) :
					$style = ($button['button_style'] ?? 'primary') === 'secondary' ? 'secondary' : 'primary';
					if (empty($button['button_text'])) {
						continue;
					}
					?>
					<a class="hero__btn hero__btn--<?php echo esc_attr($style); ?>"
					   href="<?php echo esc_url($button['button_link'] ?: '#'); ?>">
						<?php echo esc_html($button['button_text']); ?>
					</a>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>

<?php if ($has_visual) : ?>
<section class="section-hero-visual">
	<div class="hero-visual">

		<?php if ($backdrop) :
			$backdrop_url = wp_get_attachment_image_url($backdrop, 'full');
			if ($backdrop_url) : ?>
				<img class="hero-visual__backdrop" src="<?php echo esc_url($backdrop_url); ?>" alt="" aria-hidden="true" />
			<?php endif;
		endif; ?>

		<div class="hero-visual__left">
			<?php if ($caption_lead || $caption_strong) : ?>
				<p class="hero-visual__caption">
					<?php if ($caption_lead) : ?>
						<span class="hero-visual__caption-lead"><?php echo esc_html($caption_lead); ?></span>
					<?php endif; ?>
					<?php if ($caption_strong) : ?>
						<span class="hero-visual__caption-strong"><?php echo esc_html($caption_strong); ?></span>
					<?php endif; ?>
				</p>
			<?php endif; ?>

			<?php if ($has_trusted) : ?>
				<div class="hero-visual__trusted">
					<?php if ($trusted_label) : ?>
						<p class="hero-visual__trusted-label"><?php echo esc_html($trusted_label); ?></p>
					<?php endif; ?>

					<?php if ($trusted_logos) : ?>
						<ul class="hero-visual__trusted-logos">
							<?php foreach ($trusted_logos as $logo) :
								if (empty($logo['logo_image'])) {
									continue;
								}
								$logo_url = wp_get_attachment_image_url($logo['logo_image'], 'full');
								if (!$logo_url) {
									continue;
								}
								?>
								<li class="hero-visual__trusted-logo">
									<?php // Blank name means a decorative mark: the adjacent label carries the meaning. ?>
									<img src="<?php echo esc_url($logo_url); ?>"
									     alt="<?php echo esc_attr($logo['logo_name'] ?? ''); ?>"
									     <?php echo empty($logo['logo_name']) ? 'aria-hidden="true"' : ''; ?> />
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>

		<div class="hero-visual__right">
			<?php if ($has_counter) : ?>
				<div class="hero-counter">
					<?php if ($avatars) : ?>
						<div class="hero-counter__avatars">
							<?php foreach ($avatars as $avatar) :
								if (empty($avatar['avatar_image'])) {
									continue;
								}
								$avatar_url = wp_get_attachment_image_url($avatar['avatar_image'], 'thumbnail');
								if (!$avatar_url) {
									continue;
								}
								?>
								<span class="hero-counter__avatar">
									<img src="<?php echo esc_url($avatar_url); ?>" alt="" aria-hidden="true" />
								</span>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

					<?php if ($counter_value || $counter_label) : ?>
						<div class="hero-counter__text">
							<?php if ($counter_value) : ?>
								<p class="hero-counter__value"><?php echo esc_html($counter_value); ?></p>
							<?php endif; ?>
							<?php if ($counter_label) : ?>
								<p class="hero-counter__label"><?php echo esc_html($counter_label); ?></p>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<?php if ($has_pay) : ?>
				<div class="hero-pay">
					<div class="hero-pay__card">
						<div class="hero-pay__top">
							<div class="hero-pay__brand">
								<?php if ($pay_logo) :
									$pay_logo_url = wp_get_attachment_image_url($pay_logo, 'full');
									if ($pay_logo_url) : ?>
										<span class="hero-pay__brand-mark">
											<img src="<?php echo esc_url($pay_logo_url); ?>" alt="" aria-hidden="true" />
										</span>
									<?php endif;
								endif; ?>
								<?php if ($pay_brand) : ?>
									<span class="hero-pay__brand-name"><?php echo esc_html($pay_brand); ?></span>
								<?php endif; ?>
							</div>
							<?php if ($pay_period) : ?>
								<span class="hero-pay__period"><?php echo esc_html($pay_period); ?></span>
							<?php endif; ?>
						</div>

						<?php if ($pay_amount) : ?>
							<p class="hero-pay__amount"><?php echo esc_html($pay_amount); ?></p>
						<?php endif; ?>

						<?php if ($pay_blurb) : ?>
							<p class="hero-pay__blurb"><?php echo esc_html($pay_blurb); ?></p>
						<?php endif; ?>

						<?php if ($pay_note) : ?>
							<p class="hero-pay__note"><?php echo esc_html($pay_note); ?></p>
						<?php endif; ?>

						<?php if ($pay_sec_amt || $pay_sec_per || $pay_button) : ?>
							<div class="hero-pay__row">
								<div class="hero-pay__secondary">
									<?php if ($pay_sec_amt) : ?>
										<span class="hero-pay__secondary-amount"><?php echo esc_html($pay_sec_amt); ?></span>
									<?php endif; ?>
									<?php if ($pay_sec_per) : ?>
										<span class="hero-pay__secondary-period"><?php echo esc_html($pay_sec_per); ?></span>
									<?php endif; ?>
								</div>
								<?php if ($pay_button) : ?>
									<span class="hero-pay__button"><?php echo esc_html($pay_button); ?></span>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>

	</div>
</section>
<?php endif; ?>
