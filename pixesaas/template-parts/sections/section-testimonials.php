<?php
/**
 * Testimonials - Figma node 1:3820 (Container 09).
 *
 * The quote badge is a sibling above each card with a -42px bottom margin
 * (node 1:3824), so it straddles the card's top edge.
 */

$heading      = get_sub_field('heading');
$quote_icon   = get_sub_field('quote_icon');
$testimonials = get_sub_field('testimonials');

$badge_url = $quote_icon ? wp_get_attachment_image_url($quote_icon, 'full') : '';
?>

<section class="section-testimonials" id="<?php echo esc_attr(pixesaas_section_anchor()); ?>">
	<div class="testimonials">

		<?php if ($heading) : ?>
			<h2 class="testimonials__heading"><?php echo esc_html($heading); ?></h2>
		<?php endif; ?>

		<?php if ($testimonials) : ?>
			<div class="testimonials__row">
				<?php foreach ($testimonials as $item) : ?>
					<figure class="testimonial">
						<?php if ($badge_url) : ?>
							<img class="testimonial__badge" src="<?php echo esc_url($badge_url); ?>" alt="" aria-hidden="true" />
						<?php endif; ?>

						<div class="testimonial__card">
							<?php if (!empty($item['quote'])) : ?>
								<blockquote class="testimonial__quote"><?php echo esc_html($item['quote']); ?></blockquote>
							<?php endif; ?>

							<?php if (!empty($item['avatar']) || !empty($item['author_name'])) : ?>
								<figcaption class="testimonial__author">
									<?php if (!empty($item['avatar'])) :
										$avatar_url = wp_get_attachment_image_url($item['avatar'], 'medium');
										if ($avatar_url) : ?>
											<img class="testimonial__avatar" src="<?php echo esc_url($avatar_url); ?>" alt="" aria-hidden="true" />
										<?php endif;
									endif; ?>

									<div class="testimonial__id">
										<?php if (!empty($item['author_name'])) : ?>
											<p class="testimonial__name"><?php echo esc_html($item['author_name']); ?></p>
										<?php endif; ?>
										<?php if (!empty($item['author_title'])) : ?>
											<p class="testimonial__role"><?php echo esc_html($item['author_title']); ?></p>
										<?php endif; ?>
									</div>
								</figcaption>
							<?php endif; ?>
						</div>
					</figure>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

	</div>
</section>
