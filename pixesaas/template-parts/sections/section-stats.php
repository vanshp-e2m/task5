<?php
$heading = get_sub_field('heading');
$description = get_sub_field('description');
$stats = get_sub_field('stats');
$images = get_sub_field('images');
?>

<section class="section-stats" id="<?php echo esc_attr(pixesaas_section_anchor()); ?>">
	<div class="container">
		<div class="stats-header">
			<?php if ($heading) : ?>
				<h2><?php echo wp_kses_post($heading); ?></h2>
			<?php endif; ?>
			<?php if ($description) : ?>
				<p><?php echo wp_kses_post($description); ?></p>
			<?php endif; ?>
		</div>

		<div class="stats-content">
			<?php if ($stats) : ?>
				<div class="stats-grid">
					<?php foreach ($stats as $stat) : ?>
						<div class="stat-item">
							<div class="stat-number"><?php echo esc_html($stat['number']); ?></div>
							<div class="stat-label"><?php echo esc_html($stat['label']); ?></div>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<?php if ($images) : ?>
				<div class="stats-images">
					<?php foreach ($images as $image) : ?>
						<?php if ($image['image']) : ?>
							<div class="stats-image">
								<?php echo wp_get_attachment_image($image['image'], 'medium'); ?>
							</div>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
