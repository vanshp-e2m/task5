# PixeSaaS Theme

A custom WordPress theme for the PixeSaaS fintech landing page, built with ACF Flexible Content and fully responsive design.

## Requirements

- WordPress 6.0+
- PHP 8.0+
- Advanced Custom Fields Pro (ACF)

## Installation

1. Place the `pixesaas` folder in `wp-content/themes/`
2. Install and activate Advanced Custom Fields (ACF) plugin
3. Go to WordPress Admin > Appearance > Themes
4. Activate the PixeSaaS theme
5. ACF field groups will auto-load from `acf-json/` folder

## Theme Structure

```
pixesaas/
├── style.css                  # Main theme stylesheet
├── functions.php              # Theme functions & hooks
├── header.php                 # Theme header
├── footer.php                 # Theme footer
├── index.php                  # Main template
├── page.php                   # Page template (flexible content)
├── acf-json/                  # ACF field group definitions
│   └── group_page_sections.json
├── template-parts/
│   └── sections/              # Section templates
│       ├── section-hero.php
│       ├── section-features.php
│       ├── section-stats.php
│       ├── section-pricing.php
│       └── section-blog.php
├── assets/
│   ├── scss/                  # SCSS source files
│   │   └── style.scss
│   └── js/
│       └── main.js            # JavaScript
└── js/
    └── main.js
```

## Features

### Page Sections (ACF Flexible Content)

1. **Hero** - Main hero section with heading, subheading, image, and CTAs
2. **Features** - Feature list with image and description items
3. **Stats** - Statistics display with numbers and labels
4. **Pricing** - Pricing cards with features and CTAs
5. **Blog** - Dynamic blog posts section

### Design Details

- **Color Scheme**: Based on Figma design tokens
- **Typography**: Inter font family with responsive sizing
- **Spacing**: 160px gutters, 80px section padding
- **Responsive**: Mobile, tablet, and desktop breakpoints
- **Accessibility**: Semantic HTML, ARIA labels

## Custom Post Types

### Project CPT

- **Slug**: `project`
- **Archive**: `/project/`
- **Taxonomy**: `project_type`
- **Supports**: title, editor, thumbnail, excerpt
- **REST**: Enabled (`/wp-json/wp/v2/project`)

## ACF Field Groups

### Page Sections

Located in `acf-json/group_page_sections.json`, with layouts for:
- Hero (heading, subheading, image, CTA buttons)
- Features (heading, repeater of items with image)
- Stats (heading, repeater of stat items, images)
- Pricing (heading, repeater of pricing cards)
- Blog (heading, post count)

## Development

### Compiling SCSS

```bash
cd wp-content/themes/pixesaas
sass assets/scss/style.scss style.css
```

Or for watch mode:
```bash
sass --watch assets/scss:. 
```

### Enqueuing Scripts

Scripts are loaded in `functions.php`:
- Main stylesheet: `style.css`
- JavaScript: `js/main.js`

## Responsive Design

- **Desktop**: 1440px (1120px content, 160px gutters)
- **Tablet**: 768px and below (24px gutters)
- **Mobile**: 480px and below (stacked layouts)

## Creating Pages

1. Go to WordPress Admin > Pages > Add New
2. Fill in the page title and content
3. Scroll to "Page Sections" (ACF Flexible Content)
4. Click "Add Section" and choose a layout
5. Fill in the section details
6. Save and publish

## Customization

All colors, fonts, and spacing are defined in `assets/scss/style.scss` and can be customized by editing the variables at the top of the file.

## Notes

- Images are exported from Figma and should be optimized
- Blog section dynamically pulls latest posts with featured images
- All text is editable via ACF in wp-admin
- No hardcoded content — everything is flexible
