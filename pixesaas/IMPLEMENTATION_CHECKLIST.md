# PixeSaaS Theme - Implementation Checklist

## ✅ Theme Files Created

### Core Theme Files
- [x] `style.css` - Main theme stylesheet (compiled from SCSS)
- [x] `functions.php` - Theme functions, CPT registration, ACF hooks
- [x] `header.php` - Theme header with navbar
- [x] `footer.php` - Theme footer
- [x] `index.php` - Main template fallback
- [x] `page.php` - Page template with ACF Flexible Content

### Template Parts (Sections)
- [x] `template-parts/sections/section-hero.php`
- [x] `template-parts/sections/section-features.php`
- [x] `template-parts/sections/section-stats.php`
- [x] `template-parts/sections/section-pricing.php`
- [x] `template-parts/sections/section-blog.php`

### Styling
- [x] `assets/scss/style.scss` - SCSS source
- [x] `style.css` - Compiled CSS (ready to use)

### Scripts
- [x] `js/main.js` - JavaScript utilities

### Configuration
- [x] `acf-json/group_page_sections.json` - ACF field definitions

### Documentation
- [x] `README.md` - Theme overview
- [x] `SETUP_GUIDE.md` - Installation & setup instructions
- [x] `DECISION_NOTE.md` - Coded vs. Elementor analysis
- [x] `ROBUSTNESS_TESTING.md` - Edge case testing report

## 📋 Pre-Activation Checklist

### Prerequisites
- [ ] WordPress 6.0+ installed
- [ ] PHP 8.0+ enabled
- [ ] Advanced Custom Fields (ACF) plugin available

### Step 1: Install ACF Plugin
```
Plugins > Add New > Search "Advanced Custom Fields" > Install & Activate
```

### Step 2: Verify Theme Directory
```
wp-content/themes/pixesaas/ ← Should exist with all files above
```

### Step 3: Check Permissions
```bash
# Ensure write permissions
chmod -R 755 wp-content/themes/pixesaas/
chmod -R 755 wp-content/themes/pixesaas/acf-json/
```

### Step 4: Activate Theme
```
Admin > Appearance > Themes > PixeSaaS > Activate
```

### Step 5: Verify ACF Sync
```
Admin > Custom Fields > Tools > JSON
Should see "Sync available" for group_page_sections
Click to sync/import
```

## 🚀 Quick Start: Create Your First Page

### 1. Create Page
```
Pages > Add New
Title: "Home"
```

### 2. Add Hero Section
```
Scroll to "Page Sections"
Click "Add Section"
Select "Hero"

Fill in:
- Heading: "Your page title"
- Subheading: "Supporting text"
- Image: Upload/select hero image
- CTA Buttons: Add buttons
  - Button 1: "Primary" style
  - Button 2: "Secondary" style

Save
```

### 3. Add Features Section
```
Click "Add Section"
Select "Features"

Fill in:
- Heading: "Key Features"
- Items: Click "Add Item" (repeater)
  - Item 1: Title + Description
  - Item 2: Title + Description
- Image: Feature image

Save
```

### 4. Add Stats Section
```
Click "Add Section"
Select "Stats"

Fill in:
- Heading: "Our Impact"
- Stats: Click "Add Stat"
  - Stat 1: "20%" and "Increase in retention"
  - Stat 2: "1.5X" and "User base growth"
- Images: Upload supporting images

Save
```

### 5. Add Pricing Section
```
Click "Add Section"
Select "Pricing"

Fill in:
- Heading: "Simple Pricing"
- Cards: Click "Add Card"
  - Basic: $100/year
  - Exclusive: $200/year
  - Premium: $300/year

Save
```

### 6. Add Blog Section
```
Click "Add Section"
Select "Blog"

Fill in:
- Heading: "Latest Posts"
- Number: 3 (pulls latest 3 blog posts)

Save
```

### 7. Publish
```
Click "Publish"
View page on front end
```

## 🎨 Theme Customization

### Colors
Edit `assets/scss/style.scss`:
```scss
$black: #000000;
$white: #ffffff;
$grey: #666666;
$border-color: #C4C4C4;
// ... edit and recompile
```

Recompile:
```bash
cd wp-content/themes/pixesaas
sass assets/scss/style.scss style.css
```

### Typography
Edit font sizes in `assets/scss/style.scss`:
```scss
h1 { font-size: 76px; }
h2 { font-size: 61px; }
// ... update as needed
```

### Spacing
Edit layout variables in `assets/scss/style.scss`:
```scss
$gutter: 160px;       // Side padding
$section-padding: 80px; // Top/bottom of sections
```

## 🖼️ Adding Images

### Using Figma Assets
The Figma design includes 55+ exported assets. To use them:

1. Download from: https://www.figma.com/design/wNBd1zI2ZrRRx0CMP0aKJ5/
2. Upload to WordPress Media Library
3. Select in ACF fields

### Image Recommendations
- **Hero**: 1200×600px or larger
- **Features**: 500×500px
- **Stats**: 400×400px
- **Pricing Cards**: 300×200px
- **Blog**: 800×500px (featured image)

## 📊 Creating Blog Posts

To populate the blog section:

1. Posts > Add New
2. Add title and content
3. Set Featured Image (required for blog section display)
4. Publish

Blog section will automatically pull latest posts.

## 🔧 Creating Projects

To use the Project CPT:

1. Projects > Add New
2. Add title and description
3. Set featured image (optional)
4. Assign Project Type (optional taxonomy)
5. Publish

Projects are REST-enabled: `/wp-json/wp/v2/project`

## 🌐 Navigation Menu

### Add Custom Logo
```
Appearance > Customize > Site Identity > Logo
Upload and save
```

### Setup Navigation
```
Appearance > Menus
Create menu "Main Menu"
Add pages/links:
- Home (your homepage)
- Services
- Pricing
- Career
Set display location to "Primary Menu"
```

### Login Link
The navbar automatically includes:
- Login link (goes to wp-login.php)
- Get Started button (static, no link yet)

Edit in `header.php` to customize.

## ✨ Optional Enhancements

### Add Custom Logo in Footer
Edit `footer.php`:
```php
<img src="<?php echo esc_url(get_theme_file_uri('/assets/images/logo.svg')); ?>" alt="PixeSaaS">
```

### Enable Social Links in Footer
Edit the `social-links` list in `footer.php`:
```html
<a href="https://facebook.com/pixesaas" aria-label="Facebook">f</a>
<a href="https://twitter.com/pixesaas" aria-label="Twitter">𝕏</a>
```

### Add Google Fonts (Optional)
In `functions.php`:
```php
wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');
```

Note: Inter is already set as fallback stack in CSS.

## 🐛 Troubleshooting

### Theme Not Appearing
- [ ] Check `wp-content/themes/pixesaas/` exists
- [ ] Check `style.css` header is present
- [ ] Clear browser cache

### ACF Not Loading
- [ ] Install Advanced Custom Fields plugin
- [ ] Go to Custom Fields > Tools > Sync
- [ ] Check `acf-json/` folder permissions

### Images Not Showing
- [ ] Verify image is in WordPress Media Library
- [ ] Check image URL with Chrome DevTools
- [ ] Ensure upload folder is writable

### Styling Issues
- [ ] Clear browser cache (Ctrl+Shift+Delete)
- [ ] Check if minification plugin is enabled
- [ ] Verify CSS is loaded: View Page Source > look for style.css

### Section Not Rendering
- [ ] Check if ACF field has required fields filled
- [ ] Verify template file exists (e.g., `section-hero.php`)
- [ ] Check WordPress debug log: `wp-content/debug.log`

## 📦 Backup & Deployment

### Backup Before Launch
```bash
# Back up theme
zip -r pixesaas-theme.zip wp-content/themes/pixesaas/

# Back up ACF JSON
cp -r wp-content/themes/pixesaas/acf-json/ acf-json-backup/
```

### Deploy to Production
```bash
# Copy theme
scp -r pixesaas/ user@host:/path/to/wp-content/themes/

# ACF JSON will auto-sync on activation
```

## 🎯 Performance Tips

1. **Image Optimization**
   - Use TinyPNG or Smush before uploading
   - WebP format for modern browsers
   - Lazy load for below-fold images

2. **Caching**
   - Install W3 Total Cache or WP Super Cache
   - Enable GZIP compression
   - Set expires headers on images

3. **Minification**
   - Minify CSS/JS with plugin or build tool
   - Remove unused styles from SCSS

## 📞 Support Resources

- **ACF Docs**: https://www.advancedcustomfields.com/resources/
- **WordPress Theme Dev**: https://developer.wordpress.org/themes/
- **Figma Design**: See FIGMA-REFERENCE.md in theme folder

## ✅ Launch Checklist

Before going live:

- [ ] All sections filled with real content
- [ ] Images optimized and uploaded
- [ ] Navigation menu created and assigned
- [ ] Custom logo uploaded (if using)
- [ ] Homepage set under Settings > Reading
- [ ] Caching plugin installed
- [ ] Tested on desktop, tablet, mobile
- [ ] All links working (CTAs, nav, footer)
- [ ] Blog posts created (if using blog section)
- [ ] SSL certificate installed (HTTPS)
- [ ] Backups created
- [ ] Google Analytics set up (optional)
- [ ] SEO settings configured (optional)

## 📝 Version Info

- **Theme Version**: 1.0.0
- **WordPress Required**: 6.0+
- **PHP Required**: 8.0+
- **ACF Version**: 6.0+
- **Creation Date**: 2026-09-14

---

**Theme ready for activation. Follow the Quick Start above to create your first page.**
