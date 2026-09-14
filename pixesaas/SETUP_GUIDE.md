# PixeSaaS Theme Setup Guide

## Prerequisites

Before activating the theme, ensure you have:

1. WordPress 6.0 or higher
2. PHP 8.0 or higher
3. Advanced Custom Fields (ACF) plugin installed and activated

## Step 1: Install ACF Plugin

The theme requires ACF to manage flexible content sections.

### Option A: From WordPress Admin
1. Go to Plugins > Add New
2. Search for "Advanced Custom Fields"
3. Click "Install Now" on the official ACF plugin by Elliot Condon
4. Click "Activate"

### Option B: Manual Installation
1. Download from https://wordpress.org/plugins/advanced-custom-fields/
2. Extract to `wp-content/plugins/`
3. Activate from Plugins menu

## Step 2: Activate the Theme

1. Go to Appearance > Themes
2. Find "PixeSaaS" in the theme list
3. Click "Activate"

## Step 3: Verify ACF Field Groups

1. Go to Custom Fields > Field Groups
2. You should see "Page Sections" field group
3. If not present, go to Custom Fields > Tools
4. Under "JSON", you should see an option to import from `acf-json/`
5. Click to sync/import

## Step 4: Register a Custom Logo (Optional)

1. Go to Appearance > Customize
2. Click on "Site Identity"
3. Upload a custom logo
4. Save changes

## Step 5: Create Your First Page

### Create a Page with Sections

1. Go to Pages > Add New
2. Enter a page title (e.g., "Home")
3. Scroll down to "Page Sections" (ACF Flexible Content)
4. Click "Add Section"
5. Choose a layout:

#### Hero Section
- **Heading**: Main title (e.g., "Ensure the Well-being of Your Financial Planning")
- **Subheading**: Supporting text
- **Image**: Hero image (required)
- **CTA Buttons**: Add multiple buttons with text, link, and style

#### Features Section
- **Heading**: Section title
- **Items**: Add repeater items with title and description
- **Image**: Feature image

#### Stats Section
- **Heading**: Section title
- **Description**: Body text
- **Stats**: Add repeater items with number and label
- **Images**: Add images via repeater

#### Pricing Section
- **Heading**: Section title
- **Cards**: Add repeater items with:
  - Title (e.g., "Basic")
  - Price (e.g., "$100 / per year")
  - Features (bullet list)
  - Image
  - CTA text

#### Blog Section
- **Heading**: Section title
- **Number of Posts**: How many recent posts to display (default: 3)

6. Click "Publish"

## Step 6: Set as Homepage (Optional)

1. Go to Settings > Reading
2. Under "Your homepage displays", select "A static page"
3. Set "Homepage" to the page you created
4. Click "Save Changes"

## Customizing the Theme

### Colors

Edit `assets/scss/style.scss` and modify the color variables at the top:

```scss
$black: #000000;
$white: #ffffff;
$grey: #666666;
// ... other colors
```

Then recompile:
```bash
sass assets/scss/style.scss style.css
```

### Typography

Modify font sizes and weights in `assets/scss/style.scss`:

```scss
h1 { font-size: 76px; font-weight: 500; }
h2 { font-size: 61px; font-weight: 600; }
// ... etc
```

### Spacing

Adjust layout spacing in `assets/scss/style.scss`:

```scss
$gutter: 160px;           // Side padding
$section-padding: 80px;   // Top/bottom padding
$tablet: 768px;           // Tablet breakpoint
$mobile: 480px;           // Mobile breakpoint
```

## Adding Images to Sections

For the best results:

1. Images should be properly sized (see Figma design reference)
2. Use descriptive alt text
3. Optimize images before uploading for performance
4. Recommended tools: TinyPNG, ShortPixel, or Smush

## Creating Blog Posts

1. Go to Posts > Add New
2. Add a title and content
3. Set a featured image (used in blog section)
4. Click "Publish"

The blog section will automatically pull the latest posts based on the count you set.

## Creating Projects (CPT)

The theme includes a "Project" custom post type:

1. Go to Projects > Add New
2. Add title and description
3. Set a featured image (optional)
4. Assign a Project Type (category) if needed
5. Publish

### Using Projects with Sections

You can create a custom section template to display projects:

1. Copy `template-parts/sections/section-blog.php`
2. Rename to `section-projects.php`
3. Change the query:
```php
$args = array(
	'post_type'      => 'project',
	'posts_per_page' => $number,
	'tax_query'      => array(
		array(
			'taxonomy' => 'project_type',
			'field'    => 'slug',
			'terms'    => 'featured',
		),
	),
);
```

## Troubleshooting

### Theme Not Showing in Themes List

- Check that `style.css` header is properly formatted
- Ensure `functions.php` doesn't have syntax errors
- Clear any caching plugins

### ACF Field Groups Not Loading

- Install and activate ACF plugin
- Go to Custom Fields > Tools > Sync to import from `acf-json/`
- Check file permissions on `acf-json/` folder

### Images Not Displaying

- Ensure images are uploaded to WordPress Media Library
- Check image URLs are correct
- Verify file permissions on uploads folder

### Responsive Issues

- Clear browser cache (Ctrl+Shift+Delete)
- Test in incognito/private mode
- Check mobile viewport is set in header.php

## Performance Tips

1. Optimize images before uploading
2. Use a caching plugin (WP Super Cache, W3 Total Cache)
3. Minify CSS and JavaScript
4. Enable GZIP compression
5. Use a CDN for images if needed

## Additional Resources

- [ACF Documentation](https://www.advancedcustomfields.com/resources/)
- [WordPress Theme Development](https://developer.wordpress.org/themes/)
- [Figma Design Reference](./FIGMA-REFERENCE.md)

## Support

For issues or questions about the theme:

1. Check the README.md for feature overview
2. Review the FIGMA-REFERENCE.md for design specifications
3. Check WordPress debug log in `wp-content/debug.log`
4. Verify all plugins and WordPress are updated
