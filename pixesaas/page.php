<?php
get_header();
?>

<main id="primary" class="site-main">
	<?php
	while (have_posts()) :
		the_post();

		// Render content for Elementor and standard WordPress content
		the_content();

		// Render ACF Flexible Content sections
		if (have_rows('page_sections')) :
			while (have_rows('page_sections')) : the_row();
				$layout = str_replace('_', '-', get_row_layout());
				pixesaas_get_template_part('template-parts/sections/section', $layout);
			endwhile;
		endif;

	endwhile;
	?>
</main>

<?php
get_footer();
