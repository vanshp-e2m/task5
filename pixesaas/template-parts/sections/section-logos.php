<?php
/**
 * Logo wall - Figma node 1:3841 (Container 10).
 *
 * The tiles are flat exports: the black panel, rounded corners and wordmark
 * are all baked into each PNG, so there is nothing to style on them beyond
 * their box.
 */

$heading = get_sub_field('heading');
$logos   = get_sub_field('logos');
?>

<section class="section-logos" id="<?php echo esc_attr(pixesaas_section_anchor()); ?>">
	<div class="logos">

		<?php if ($heading) : ?>
			<h2 class="logos__heading"><?php echo esc_html($heading); ?></h2>
		<?php endif; ?>

		<?php if ($logos) : ?>
			<ul class="logos__grid">
				<?php foreach ($logos as $logo) :
					if (empty($logo['logo_image'])) {
						continue;
					}
					$url = wp_get_attachment_image_url($logo['logo_image'], 'full');
					if (!$url) {
						continue;
					}
					$name = $logo['logo_name'] ?? '';
					?>
					<li class="logos__item">
						<img src="<?php echo esc_url($url); ?>"
						     alt="<?php echo esc_attr($name); ?>"
						     <?php echo $name === '' ? 'aria-hidden="true"' : ''; ?> />
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

	</div>
</section>
