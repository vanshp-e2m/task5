<?php
$heading = get_sub_field('heading');
$items = get_sub_field('items');
$image_id = get_sub_field('image');
?>

<section class="section-features" id="<?php echo esc_attr(pixesaas_section_anchor()); ?>">
	<div class="container">
		<div class="features-layout">
			<?php if ($image_id) : ?>
				<div class="features-image">
					<?php echo wp_get_attachment_image($image_id, 'full'); ?>
				</div>
			<?php endif; ?>

			<div class="features-content">
				<?php if ($heading) : ?>
					<h2><?php echo wp_kses_post($heading); ?></h2>
				<?php endif; ?>

				<?php if ($items) : ?>
					<div class="features-list">
						<?php foreach ($items as $item) : ?>
							<div class="feature-item">
								<?php if ($item['title']) : ?>
									<h3><?php echo esc_html($item['title']); ?></h3>
								<?php endif; ?>
								<?php if ($item['description']) : ?>
									<p><?php echo wp_kses_post($item['description']); ?></p>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>

				<a href="#" class="link-more"><?php esc_html_e('Learn more', 'pixesaas'); ?></a>
			</div>
		</div>
	</div>
</section>
