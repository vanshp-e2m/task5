<?php
/**
 * Blog Section - Figma node 1:3878.
 *
 * Uses the shared editorial card. The badge over each image carries the post's
 * primary category (the design shows "Cash", "Cards", "Transfers"), and the
 * footer pairs the publish date with an arrow.
 */

$heading_line1 = get_sub_field('heading_line1');
$heading_line2 = get_sub_field('heading_line2');
$number        = (int) (get_sub_field('number') ?: 3);
$card_order    = get_sub_field('card_order');
$arrow         = get_sub_field('arrow_icon');

$arrow_url = $arrow ? wp_get_attachment_image_url($arrow, 'full') : '';

// In manual mode the Order value drives the row, with newest-first as the
// tiebreak so posts left at the default 0 still read sensibly.
$order_args = $card_order === 'menu_order'
	? array('menu_order' => 'ASC', 'date' => 'DESC')
	: array('date' => 'DESC');

$blog_query = new WP_Query(array(
	'post_type'           => 'post',
	'post_status'         => 'publish',
	'posts_per_page'      => $number,
	'orderby'             => $order_args,
	'no_found_rows'       => true,
	'ignore_sticky_posts' => true,
));
?>

<section class="section-blog" id="<?php echo esc_attr(pixesaas_section_anchor()); ?>">
	<div class="blog">

		<?php if ($heading_line1 || $heading_line2) : ?>
			<h2 class="blog__heading">
				<?php if ($heading_line1) : ?>
					<span><?php echo esc_html($heading_line1); ?></span>
				<?php endif; ?>
				<?php if ($heading_line2) : ?>
					<span><?php echo esc_html($heading_line2); ?></span>
				<?php endif; ?>
			</h2>
		<?php endif; ?>

		<?php if ($blog_query->have_posts()) : ?>
			<div class="post-card-row">
				<?php while ($blog_query->have_posts()) :
					$blog_query->the_post();

					// Skip the default "Uncategorized" term so the badge is only
					// shown when a real category has been assigned.
					$category = '';
					foreach (get_the_category() as $cat) {
						if ($cat->slug !== 'uncategorized') {
							$category = $cat->name;
							break;
						}
					}
					?>
					<article class="post-card">

						<div class="post-card__media">
							<?php if (has_post_thumbnail()) : ?>
								<?php the_post_thumbnail('medium_large', array('class' => 'post-card__image')); ?>
							<?php endif; ?>

							<?php if ($category) : ?>
								<span class="post-card__tag"><?php echo esc_html($category); ?></span>
							<?php endif; ?>
						</div>

						<div class="post-card__details">
							<h3 class="post-card__title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h3>

							<div class="post-card__meta">
								<span class="post-card__date"><?php echo esc_html(get_the_date('M j, Y')); ?></span>

								<a class="post-card__arrow" href="<?php the_permalink(); ?>">
									<span class="screen-reader-text">
										<?php
										printf(
											/* translators: %s: post title */
											esc_html__('Read more about %s', 'pixesaas'),
											the_title_attribute(array('echo' => false))
										);
										?>
									</span>
									<?php if ($arrow_url) : ?>
										<img src="<?php echo esc_url($arrow_url); ?>" alt="" aria-hidden="true" />
									<?php endif; ?>
								</a>
							</div>
						</div>

					</article>
				<?php endwhile; ?>
			</div>
			<?php wp_reset_postdata(); ?>

		<?php elseif (current_user_can('edit_posts')) : ?>
			<p class="blog__empty">
				<?php esc_html_e('No posts published yet.', 'pixesaas'); ?>
				<a href="<?php echo esc_url(admin_url('post-new.php')); ?>">
					<?php esc_html_e('Add one', 'pixesaas'); ?>
				</a>
			</p>
		<?php endif; ?>

	</div>
</section>
