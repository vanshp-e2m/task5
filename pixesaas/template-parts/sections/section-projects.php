<?php
/**
 * Latest Projects - follows the Blog Section card design (Figma node 1:3878).
 *
 * This occupies the design's editorial-cards slot but queries the project CPT,
 * so the section is driven by real content rather than fixed fields. Card
 * anatomy matches the design: a category badge over the image, then the title,
 * then a date and arrow in the footer.
 */

$heading_line1 = get_sub_field('heading_line1');
$heading_line2 = get_sub_field('heading_line2');
$number        = (int) (get_sub_field('number') ?: 3);
$arrow         = get_sub_field('arrow_icon');

$arrow_url = $arrow ? wp_get_attachment_image_url($arrow, 'full') : '';

$projects_query = new WP_Query(array(
	'post_type'           => 'project',
	'post_status'         => 'publish',
	'posts_per_page'      => $number,
	'orderby'             => 'date',
	'order'               => 'DESC',
	'no_found_rows'       => true,
	'ignore_sticky_posts' => true,
));
?>

<section class="section-projects" id="<?php echo esc_attr(pixesaas_section_anchor()); ?>">
	<div class="projects">

		<?php if ($heading_line1 || $heading_line2) : ?>
			<h2 class="projects__heading">
				<?php if ($heading_line1) : ?>
					<span><?php echo esc_html($heading_line1); ?></span>
				<?php endif; ?>
				<?php if ($heading_line2) : ?>
					<span><?php echo esc_html($heading_line2); ?></span>
				<?php endif; ?>
			</h2>
		<?php endif; ?>

		<?php if ($projects_query->have_posts()) : ?>
			<div class="post-card-row">
				<?php while ($projects_query->have_posts()) :
					$projects_query->the_post();

					$terms = get_the_terms(get_the_ID(), 'project_type');
					$term  = ($terms && !is_wp_error($terms)) ? $terms[0]->name : '';
					?>
					<article class="post-card">

						<div class="post-card__media">
							<?php if (has_post_thumbnail()) : ?>
								<?php the_post_thumbnail('medium_large', array('class' => 'post-card__image')); ?>
							<?php endif; ?>

							<?php if ($term) : ?>
								<span class="post-card__tag"><?php echo esc_html($term); ?></span>
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
											/* translators: %s: project title */
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
			<p class="projects__empty">
				<?php esc_html_e('No projects published yet.', 'pixesaas'); ?>
				<a href="<?php echo esc_url(admin_url('post-new.php?post_type=project')); ?>">
					<?php esc_html_e('Add one', 'pixesaas'); ?>
				</a>
			</p>
		<?php endif; ?>

	</div>
</section>
