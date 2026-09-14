<?php
/**
 * PixeSaaS Theme functions and definitions
 */

if (!function_exists('pixesaas_setup')) :
	function pixesaas_setup() {
		load_theme_textdomain('pixesaas', get_template_directory() . '/languages');
		add_theme_support('automatic-feed-links');
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));
		add_theme_support('customize-selective-refresh-widgets');

		register_nav_menus(array(
			'primary' => esc_html__('Primary Menu', 'pixesaas'),
		));

		// Exposes the Order field on posts so the Blog Section's manual card
		// order can actually be set from the editor.
		add_post_type_support('post', 'page-attributes');
	}
endif;
add_action('after_setup_theme', 'pixesaas_setup');

function pixesaas_widgets_init() {
	register_sidebar(array(
		'name'          => esc_html__('Primary Sidebar', 'pixesaas'),
		'id'            => 'primary-sidebar',
		'description'   => esc_html__('Main sidebar', 'pixesaas'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
}
add_action('widgets_init', 'pixesaas_widgets_init');

function pixesaas_scripts() {
	// The design uses Inter exclusively, at 300/400/500/600.
	wp_enqueue_style(
		'pixesaas-inter',
		'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap',
		array(),
		null
	);

	$css = get_template_directory() . '/style.css';
	wp_enqueue_style(
		'pixesaas-style',
		get_stylesheet_uri(),
		array('pixesaas-inter'),
		file_exists($css) ? filemtime($css) : '1.0.0'
	);

	$js = get_template_directory() . '/js/main.js';
	wp_enqueue_script(
		'pixesaas-script',
		get_template_directory_uri() . '/js/main.js',
		array(),
		file_exists($js) ? filemtime($js) : '1.0.0',
		true
	);
}
add_action('wp_enqueue_scripts', 'pixesaas_scripts');

function pixesaas_resource_hints($hints, $relation) {
	if ($relation === 'preconnect') {
		$hints[] = array('href' => 'https://fonts.googleapis.com');
		$hints[] = array('href' => 'https://fonts.gstatic.com', 'crossorigin' => '');
	}
	return $hints;
}
add_filter('wp_resource_hints', 'pixesaas_resource_hints', 10, 2);

/**
 * Anchor id for the current flexible-content row.
 *
 * Menus need stable link targets, so the id is editable per section. Without a
 * value it falls back to the layout name plus the row index, which keeps ids
 * unique when the same layout is used more than once on a page.
 */
function pixesaas_section_anchor() {
	$id = get_sub_field('anchor_id');

	if (!$id) {
		$id = get_row_layout() . '-' . get_row_index();
	}

	return sanitize_title($id);
}

/**
 * Navbar logo mark, falling back to the bundled Figma export.
 *
 * Editors can override it from Theme Options; without that the theme still
 * ships the designed asset rather than rendering an empty box.
 */
function pixesaas_nav_logo_mark_url() {
	$id = function_exists('get_field') ? get_field('nav_logo_icon', 'option') : 0;

	if ($id) {
		$url = wp_get_attachment_image_url($id, 'full');
		if ($url) {
			return $url;
		}
	}

	return get_template_directory_uri() . '/assets/images/imgMaskGroup.svg';
}

// ACF JSON Load/Save
function pixesaas_acf_json_load_point($paths) {
	$paths[] = get_template_directory() . '/acf-json';
	return $paths;
}
add_filter('acf/settings/load_json', 'pixesaas_acf_json_load_point');

function pixesaas_acf_json_save_point($path) {
	return get_template_directory() . '/acf-json';
}
add_filter('acf/settings/save_json', 'pixesaas_acf_json_save_point');

// Register ACF Options Page for theme chrome (navbar, footer, copyright).
// Registered on acf/init rather than at file scope: calling this while
// functions.php loads runs before `init` and trips WordPress 6.7's
// _load_textdomain_just_in_time notice for the `acf` text domain.
function pixesaas_register_options_page() {
	if (!function_exists('acf_add_options_page')) {
		return;
	}

	acf_add_options_page(array(
		'page_title' => __('Theme Options', 'pixesaas'),
		'menu_title' => __('Theme Options', 'pixesaas'),
		'menu_slug'  => 'pixesaas-theme-options',
		'capability' => 'manage_options',
	));
}
add_action('acf/init', 'pixesaas_register_options_page');

// Register Project CPT
function pixesaas_register_project_cpt() {
	$labels = array(
		'name'                  => _x('Projects', 'Post Type General Name', 'pixesaas'),
		'singular_name'         => _x('Project', 'Post Type Singular Name', 'pixesaas'),
		'menu_name'             => __('Projects', 'pixesaas'),
		'all_items'             => __('All Projects', 'pixesaas'),
		'view_item'             => __('View Project', 'pixesaas'),
		'add_new_item'          => __('Add New Project', 'pixesaas'),
		'edit_item'             => __('Edit Project', 'pixesaas'),
		'update_item'           => __('Update Project', 'pixesaas'),
		'search_items'          => __('Search Projects', 'pixesaas'),
	);

	$args = array(
		'label'             => __('Projects', 'pixesaas'),
		'labels'            => $labels,
		'public'            => true,
		'publicly_queryable' => true,
		'show_ui'           => true,
		'show_in_menu'      => true,
		'query_var'         => true,
		'rewrite'           => array('slug' => 'project'),
		'capability_type'   => 'post',
		'has_archive'       => true,
		'hierarchical'      => false,
		'menu_position'     => 5,
		'supports'          => array('title', 'editor', 'thumbnail', 'excerpt'),
		'show_in_rest'      => true,
		'rest_base'         => 'project',
	);

	register_post_type('project', $args);
}
add_action('init', 'pixesaas_register_project_cpt');

// Register Project Taxonomy
function pixesaas_register_project_taxonomy() {
	$labels = array(
		'name'              => _x('Project Types', 'taxonomy general name', 'pixesaas'),
		'singular_name'     => _x('Project Type', 'taxonomy singular name', 'pixesaas'),
		'menu_name'         => __('Project Types', 'pixesaas'),
		'all_items'         => __('All Project Types', 'pixesaas'),
		'edit_item'         => __('Edit Project Type', 'pixesaas'),
		'update_item'       => __('Update Project Type', 'pixesaas'),
		'add_new_item'      => __('Add New Project Type', 'pixesaas'),
		'new_item_name'     => __('New Project Type Name', 'pixesaas'),
		'search_items'      => __('Search Project Types', 'pixesaas'),
	);

	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'publicly_queryable' => true,
		'hierarchical'      => true,
		'show_ui'           => true,
		'show_in_rest'      => true,
		'query_var'         => true,
		'rewrite'           => array('slug' => 'project-type'),
	);

	register_taxonomy('project_type', array('project'), $args);
}
add_action('init', 'pixesaas_register_project_taxonomy');

// Helper function to get image by name
function pixesaas_get_asset_image($image_id, $alt = '', $class = '') {
	if (!$image_id) {
		return '';
	}

	$image_url = wp_get_attachment_image_url($image_id, 'full');
	if (!$image_url) {
		return '';
	}

	return sprintf(
		'<img src="%s" alt="%s"%s />',
		esc_url($image_url),
		esc_attr($alt),
		$class ? ' class="' . esc_attr($class) . '"' : ''
	);
}

// Flush rewrite rules on theme activation
function pixesaas_on_activation() {
	pixesaas_register_project_cpt();
	pixesaas_register_project_taxonomy();
	flush_rewrite_rules();
}
add_action('after_switch_theme', 'pixesaas_on_activation');

// Load template parts
if (!function_exists('pixesaas_get_template_part')) {
	function pixesaas_get_template_part($slug, $name = null) {
		$templates = array();
		$name      = (string) $name;
		if ('' !== $name) {
			$templates[] = "{$slug}-{$name}.php";
		}
		$templates[] = "{$slug}.php";

		locate_template($templates, true, false);
	}
}

/**
 * Allow SVG in the media library.
 *
 * SVG is XML and can carry <script> or on* handlers, so an uploaded file is a
 * stored-XSS vector for anyone who opens it directly. Uploads are therefore
 * limited to users who can already install code, and the markup is stripped of
 * script-bearing constructs on the way in.
 */
function pixesaas_allow_svg_upload($mimes) {
	if (current_user_can('unfiltered_upload') || current_user_can('manage_options')) {
		$mimes['svg']  = 'image/svg+xml';
		$mimes['svgz'] = 'image/svg+xml';
	}
	return $mimes;
}
add_filter('upload_mimes', 'pixesaas_allow_svg_upload');

function pixesaas_sanitize_svg_upload($file) {
	if (empty($file['type']) || $file['type'] !== 'image/svg+xml' || empty($file['tmp_name'])) {
		return $file;
	}

	$svg = file_get_contents($file['tmp_name']);
	if ($svg === false) {
		return $file;
	}

	$clean = pixesaas_strip_svg_scripts($svg);
	if ($clean !== $svg) {
		file_put_contents($file['tmp_name'], $clean);
	}

	return $file;
}
add_filter('wp_handle_upload_prefilter', 'pixesaas_sanitize_svg_upload');

function pixesaas_strip_svg_scripts($svg) {
	// Script and foreign-content elements.
	$svg = preg_replace('#<\s*(script|foreignObject|iframe|embed|object|handler|set)\b[^>]*>.*?<\s*/\s*\1\s*>#is', '', $svg);
	$svg = preg_replace('#<\s*(script|foreignObject|iframe|embed|object|handler|set)\b[^>]*/?\s*>#is', '', $svg);
	// Inline event handlers.
	$svg = preg_replace('#\s+on[a-z]+\s*=\s*(".*?"|\'.*?\'|[^\s>]+)#is', '', $svg);
	// javascript: / data: URLs in href and xlink:href.
	$svg = preg_replace('#\s+(?:xlink:)?href\s*=\s*(["\'])\s*(?:javascript|data)\s*:[^"\']*\1#is', '', $svg);
	// External entity declarations.
	$svg = preg_replace('#<!DOCTYPE[^>]*>#is', '', $svg);
	$svg = preg_replace('#<!ENTITY[^>]*>#is', '', $svg);

	return $svg;
}

/**
 * Give SVG attachments intrinsic dimensions.
 *
 * WordPress cannot read width/height from SVG, so wp_get_attachment_image()
 * emits no size attributes and the browser falls back to a 300x150 default,
 * which collapses inline icons. Parse the viewBox instead.
 */
function pixesaas_svg_image_downsize($out, $id, $size) {
	if (get_post_mime_type($id) !== 'image/svg+xml') {
		return $out;
	}

	$url  = wp_get_attachment_url($id);
	$meta = wp_get_attachment_metadata($id);
	$w    = !empty($meta['width']) ? (int) $meta['width'] : 0;
	$h    = !empty($meta['height']) ? (int) $meta['height'] : 0;

	if (!$w || !$h) {
		return array($url, 0, 0, false);
	}

	// Scale to the requested size while preserving the aspect ratio.
	if (is_array($size)) {
		$req_w = (int) $size[0];
		$req_h = (int) $size[1];
	} else {
		$req_w = (int) get_option($size . '_size_w', 0);
		$req_h = (int) get_option($size . '_size_h', 0);
	}

	if ($req_w && $req_h && ($w > $req_w || $h > $req_h)) {
		$scale = min($req_w / $w, $req_h / $h);
		$w     = (int) round($w * $scale);
		$h     = (int) round($h * $scale);
	}

	return array($url, $w, $h, false);
}
add_filter('image_downsize', 'pixesaas_svg_image_downsize', 10, 3);
