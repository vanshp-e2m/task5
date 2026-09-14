<?php
/**
 * Global presence - Figma node 1:235 (Container 06).
 *
 * The map is 1265px wide, so this section deliberately breaks out of the
 * 1120px content column and centres on the full frame instead.
 */

$heading  = get_sub_field('heading');
$map      = get_sub_field('map_image');
$counters = get_sub_field('counters');
?>

<section class="section-global-presence" id="<?php echo esc_attr(pixesaas_section_anchor()); ?>">
	<div class="global-presence">

		<?php if ($heading) : ?>
			<h2 class="global-presence__heading"><?php echo esc_html($heading); ?></h2>
		<?php endif; ?>

		<?php if ($map) :
			$map_url = wp_get_attachment_image_url($map, 'full');
			if ($map_url) : ?>
				<div class="global-presence__map">
					<img src="<?php echo esc_url($map_url); ?>" alt="" aria-hidden="true" />
				</div>
			<?php endif;
		endif; ?>

		<?php if ($counters) : ?>
			<div class="presence-counters">
				<?php foreach ($counters as $counter) : ?>
					<div class="presence-counter">
						<?php if (!empty($counter['value'])) : ?>
							<p class="presence-counter__value"><?php echo esc_html($counter['value']); ?></p>
						<?php endif; ?>
						<?php if (!empty($counter['label'])) : ?>
							<p class="presence-counter__label"><?php echo esc_html($counter['label']); ?></p>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

	</div>
</section>
