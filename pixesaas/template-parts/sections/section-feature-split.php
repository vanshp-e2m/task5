<?php
/**
 * Feature split - Figma nodes 1:113 (Container 04) and 1:215 (Container 05).
 *
 * Two variants share this layout. `transaction_list` builds the banking-app
 * panel from live fields (node 1:114); `counter_overlay` places stat counters
 * over an exported mockup (node 1:215).
 */

$heading       = get_sub_field('heading');
$body          = get_sub_field('body');
$feature_items = get_sub_field('feature_items');
$cta_text      = get_sub_field('cta_text');
$cta_link      = get_sub_field('cta_link');
$reverse       = get_sub_field('reverse');
$mockup_type   = get_sub_field('mockup_type');
$mockup_image  = get_sub_field('mockup_image');

$classes = 'section-feature-split';
if ($reverse) {
	$classes .= ' section-feature-split--reverse';
}
$classes .= ' section-feature-split--' . sanitize_html_class($mockup_type ?: 'none');
?>

<section class="<?php echo esc_attr($classes); ?>" id="<?php echo esc_attr(pixesaas_section_anchor()); ?>">
	<div class="feature-split">

		<div class="feature-split__visual">
			<?php if ($mockup_type === 'transaction_list') :

				$profile_avatar = get_sub_field('profile_avatar');
				$profile_name   = get_sub_field('profile_name');
				$profile_status = get_sub_field('profile_status');
				$profile_time   = get_sub_field('profile_time');
				$message_text   = get_sub_field('message_text');
				$message_badge  = get_sub_field('message_badge');
				$tabs           = get_sub_field('tabs');
				$sort_label     = get_sub_field('sort_label');
				$sort_icon      = get_sub_field('sort_icon');
				$transactions   = get_sub_field('transaction_items');

				$has_message = $profile_avatar || $profile_name || $message_text;
				$has_list    = $tabs || $sort_label || $transactions;
				?>

				<div class="app-panel">

					<?php if ($has_message) : ?>
						<div class="app-card app-message">
							<div class="app-message__head">
								<div class="app-message__who">
									<?php if ($profile_avatar) :
										$avatar_url = wp_get_attachment_image_url($profile_avatar, 'thumbnail');
										if ($avatar_url) : ?>
											<img class="app-message__avatar" src="<?php echo esc_url($avatar_url); ?>" alt="" aria-hidden="true" />
										<?php endif;
									endif; ?>

									<?php if ($profile_name || $profile_status) : ?>
										<div class="app-message__id">
											<?php if ($profile_name) : ?>
												<p class="app-message__name"><?php echo esc_html($profile_name); ?></p>
											<?php endif; ?>
											<?php if ($profile_status) : ?>
												<p class="app-message__status"><?php echo esc_html($profile_status); ?></p>
											<?php endif; ?>
										</div>
									<?php endif; ?>
								</div>

								<?php if ($profile_time) : ?>
									<p class="app-message__time"><?php echo esc_html($profile_time); ?></p>
								<?php endif; ?>
							</div>

							<?php if ($message_text || $message_badge) : ?>
								<div class="app-message__body">
									<?php if ($message_text) : ?>
										<p class="app-message__text"><?php echo esc_html($message_text); ?></p>
									<?php endif; ?>
									<?php if ($message_badge) : ?>
										<span class="app-message__badge"><?php echo esc_html($message_badge); ?></span>
									<?php endif; ?>
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<?php if ($has_list) : ?>
						<div class="app-card app-list">

							<?php if ($tabs || $sort_label) : ?>
								<div class="app-list__head">
									<?php if ($tabs) : ?>
										<div class="app-list__tabs">
											<?php foreach ($tabs as $i => $tab) :
												if (empty($tab['label'])) {
													continue;
												}
												?>
												<span class="app-list__tab<?php echo $i === 0 ? ' is-active' : ''; ?>">
													<?php echo esc_html($tab['label']); ?>
												</span>
											<?php endforeach; ?>
										</div>
									<?php endif; ?>

									<?php if ($sort_label || $sort_icon) : ?>
										<div class="app-list__sort">
											<?php if ($sort_label) : ?>
												<span><?php echo esc_html($sort_label); ?></span>
											<?php endif; ?>
											<?php if ($sort_icon) :
												$sort_url = wp_get_attachment_image_url($sort_icon, 'full');
												if ($sort_url) : ?>
													<img src="<?php echo esc_url($sort_url); ?>" alt="" aria-hidden="true" />
												<?php endif;
											endif; ?>
										</div>
									<?php endif; ?>
								</div>
							<?php endif; ?>

							<?php if ($transactions) : ?>
								<ul class="app-list__rows">
									<?php foreach ($transactions as $tx) :
										$tile_style = '';
										if (!empty($tx['icon_bg'])) {
											$tile_style .= 'background-color:' . esc_attr($tx['icon_bg']) . ';';
										}
										$inset = isset($tx['icon_inset']) && $tx['icon_inset'] !== '' ? (int) $tx['icon_inset'] : 4;
										?>
										<li class="app-row">
											<div class="app-row__main">
												<?php if (!empty($tx['icon'])) :
													$icon_url = wp_get_attachment_image_url($tx['icon'], 'full');
													if ($icon_url) : ?>
														<span class="app-row__tile"
														      <?php echo $tile_style ? 'style="' . $tile_style . '"' : ''; ?>>
															<img src="<?php echo esc_url($icon_url); ?>"
															     alt="" aria-hidden="true"
															     style="padding:<?php echo (int) $inset; ?>px" />
														</span>
													<?php endif;
												endif; ?>

												<div class="app-row__text">
													<?php if (!empty($tx['title'])) : ?>
														<p class="app-row__title"><?php echo esc_html($tx['title']); ?></p>
													<?php endif; ?>
													<?php if (!empty($tx['category'])) : ?>
														<p class="app-row__category"><?php echo esc_html($tx['category']); ?></p>
													<?php endif; ?>
												</div>
											</div>

											<div class="app-row__meta">
												<?php if (!empty($tx['amount'])) : ?>
													<p class="app-row__amount"><?php echo esc_html($tx['amount']); ?></p>
												<?php endif; ?>
												<?php if (!empty($tx['date'])) : ?>
													<p class="app-row__date"><?php echo esc_html($tx['date']); ?></p>
												<?php endif; ?>
											</div>
										</li>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>

			<?php else :

				$counters = get_sub_field('counter_items');
				?>

				<div class="feature-split__mockup">
					<?php if ($mockup_image) :
						$mockup_url = wp_get_attachment_image_url($mockup_image, 'full');
						if ($mockup_url) : ?>
							<img class="feature-split__mockup-img" src="<?php echo esc_url($mockup_url); ?>" alt="" aria-hidden="true" />
						<?php endif;
					endif; ?>

					<?php if ($counters) : ?>
						<div class="stat-counters">
							<?php
							$last = count($counters) - 1;
							foreach ($counters as $i => $counter) : ?>
								<div class="stat-counter">
									<p class="stat-counter__value">
										<?php if (!empty($counter['value'])) : ?>
											<span class="stat-counter__num"><?php echo esc_html($counter['value']); ?></span>
										<?php endif; ?>
										<?php if (!empty($counter['unit'])) : ?>
											<span class="stat-counter__unit"><?php echo esc_html($counter['unit']); ?></span>
										<?php endif; ?>
									</p>
									<?php if (!empty($counter['label'])) : ?>
										<p class="stat-counter__label"><?php echo esc_html($counter['label']); ?></p>
									<?php endif; ?>
								</div>

								<?php // Node 1:229 is a 1px black strip exported as an image; a CSS hairline is the same rule without the request.
								if ($i !== $last) : ?>
									<span class="stat-counters__rule" aria-hidden="true"></span>
								<?php endif; ?>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>

			<?php endif; ?>
		</div>

		<div class="feature-split__content">
			<?php if ($heading) : ?>
				<h2 class="feature-split__heading"><?php echo esc_html($heading); ?></h2>
			<?php endif; ?>

			<?php if ($body) : ?>
				<p class="feature-split__body"><?php echo esc_html($body); ?></p>
			<?php endif; ?>

			<?php if ($feature_items) : ?>
				<div class="icon-boxes">
					<?php foreach ($feature_items as $item) : ?>
						<div class="icon-box">
							<?php if (!empty($item['icon'])) :
								$fi_url = wp_get_attachment_image_url($item['icon'], 'full');
								if ($fi_url) : ?>
									<span class="icon-box__icon">
										<img src="<?php echo esc_url($fi_url); ?>" alt="" aria-hidden="true" />
									</span>
								<?php endif;
							endif; ?>

							<div class="icon-box__text">
								<?php if (!empty($item['title'])) : ?>
									<h3 class="icon-box__title"><?php echo esc_html($item['title']); ?></h3>
								<?php endif; ?>
								<?php if (!empty($item['body'])) : ?>
									<p class="icon-box__body"><?php echo esc_html($item['body']); ?></p>
								<?php endif; ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<?php if ($cta_text) : ?>
				<a class="feature-split__cta" href="<?php echo esc_url($cta_link ?: '#'); ?>">
					<?php echo esc_html($cta_text); ?>
				</a>
			<?php endif; ?>
		</div>

	</div>
</section>
