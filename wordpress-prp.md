# Product Requirements Plan: WordPress Docker Environment with Next.js Theme Migration

## Project Overview

**Objective**: Set up a WordPress instance in a Docker environment with MariaDB, convert an existing Next.js design from Lovable.app to a WordPress-compatible theme, and migrate all content from the Next.js application.

**Target Platform**: Docker Compose
**Source**: Next.js application from Lovable.app
**Destination**: WordPress 6.x with custom theme
**Database**: MariaDB (latest)

---

## Requirements

### 1. Environment Setup

#### 1.1 Docker Infrastructure
- [ ] Create Docker Compose configuration with three services:
  - WordPress (latest)
  - MariaDB (latest)
  - phpMyAdmin (latest)
- [ ] Configure persistent volumes for:
  - MySQL data (`./mysql-data`)
  - WordPress content (`./wp-content`)
- [ ] Set up Docker network for inter-container communication
- [ ] Expose WordPress on port 8080
- [ ] Expose phpMyAdmin on port 8081

#### 1.2 WordPress Configuration
- [ ] Configure database connection environment variables
- [ ] Set up WordPress database user with appropriate privileges
- [ ] Configure WordPress to use MariaDB as database backend
- [ ] Enable WordPress debugging mode for development

#### 1.3 Project Structure
```
wordpress-project/
├── docker-compose.yml
├── wp-content/
│   └── themes/
│       └── lovable-theme/
├── mysql-data/
├── import-content.php
├── wordpress-import.json
└── README.md
```

---

## 2. Docker Compose Specification

### 2.1 Required Services

**MariaDB Service:**
- Container name: `wordpress_mariadb`
- Environment variables:
  - `MYSQL_ROOT_PASSWORD`: rootpassword
  - `MYSQL_DATABASE`: wordpress
  - `MYSQL_USER`: wpuser
  - `MYSQL_PASSWORD`: wppassword
- Volume mount: `./mysql-data:/var/lib/mysql`
- Restart policy: always

**WordPress Service:**
- Container name: `wordpress_app`
- Depends on: `db` service
- Port mapping: `8080:80`
- Environment variables:
  - `WORDPRESS_DB_HOST`: db:3306
  - `WORDPRESS_DB_USER`: wpuser
  - `WORDPRESS_DB_PASSWORD`: wppassword
  - `WORDPRESS_DB_NAME`: wordpress
- Volume mount: `./wp-content:/var/www/html/wp-content`
- Restart policy: always

**phpMyAdmin Service:**
- Container name: `wordpress_phpmyadmin`
- Depends on: `db` service
- Port mapping: `8081:80`
- Environment variables:
  - `PMA_HOST`: db
  - `MYSQL_ROOT_PASSWORD`: rootpassword
- Restart policy: always

### 2.2 Network Configuration
- Network name: `wordpress-network`
- Driver: bridge

---

## 3. WordPress Theme Development

### 3.1 Theme Structure Requirements

Create theme directory: `wp-content/themes/lovable-theme/`

#### 3.1.1 Required Core Files
- [ ] `style.css` - Theme metadata and primary styles
- [ ] `index.php` - Main template file (fallback)
- [ ] `functions.php` - Theme configuration and functionality
- [ ] `header.php` - Site header template
- [ ] `footer.php` - Site footer template
- [ ] `page.php` - Single page template
- [ ] `single.php` - Single post template
- [ ] `archive.php` - Archive/listing template
- [ ] `404.php` - Error page template
- [ ] `search.php` - Search results template
- [ ] `sidebar.php` - Sidebar template (if needed)
- [ ] `comments.php` - Comments template (if needed)

#### 3.1.2 Asset Directories
```
lovable-theme/
├── assets/
│   ├── css/
│   │   └── main.css
│   ├── js/
│   │   └── main.js
│   ├── images/
│   └── fonts/
├── template-parts/
│   ├── content.php
│   ├── content-page.php
│   ├── content-none.php
│   └── navigation.php
└── inc/
    ├── custom-post-types.php
    ├── theme-customizer.php
    └── template-functions.php
```

### 3.2 Theme Metadata (style.css)

Required header information:
```css
/*
Theme Name: Lovable Theme
Theme URI: https://yoursite.com
Author: Your Name
Author URI: https://yourname.com
Description: Converted from Next.js Lovable.app design
Version: 1.0.0
Requires at least: 6.0
Tested up to: 6.4
Requires PHP: 7.4
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: lovable-theme
Tags: custom-theme, responsive, modern
*/
```

### 3.3 Theme Functionality (functions.php)

#### 3.3.1 Core Theme Setup
- [ ] Add theme support for:
  - `title-tag`
  - `post-thumbnails`
  - `custom-logo`
  - `html5` (search-form, comment-form, comment-list, gallery, caption)
  - `responsive-embeds`
  - `editor-styles`
- [ ] Register navigation menus:
  - Primary menu
  - Footer menu
- [ ] Set content width
- [ ] Add image sizes (if needed)

#### 3.3.2 Enqueue Scripts and Styles
- [ ] Enqueue theme stylesheet
- [ ] Enqueue custom CSS files from assets
- [ ] Enqueue JavaScript files
- [ ] Add jQuery dependency if needed
- [ ] Use versioning for cache busting

#### 3.3.3 Custom Functions
- [ ] Custom post types registration (if needed)
- [ ] Custom taxonomies (if needed)
- [ ] Widget areas/sidebars registration
- [ ] Custom hooks and filters
- [ ] Security enhancements

---

## 4. Next.js to WordPress Conversion

### 4.1 Component Mapping

Document all Next.js components and their WordPress equivalents:

| Next.js Component | WordPress Template | Notes |
|-------------------|-------------------|-------|
| `_app.js` | `functions.php` | Global configuration |
| `_document.js` | `header.php` + `footer.php` | HTML structure |
| `index.js` | `front-page.php` or `home.php` | Homepage |
| `[slug].js` | `page.php` | Dynamic pages |
| `components/Layout.js` | `header.php` + `footer.php` | Layout wrapper |
| `components/Header.js` | `header.php` | Site header |
| `components/Footer.js` | `footer.php` | Site footer |
| `components/Navigation.js` | `wp_nav_menu()` | Navigation menu |

### 4.2 Conversion Process

#### 4.2.1 Analyze Next.js Structure
- [ ] List all pages in Next.js app
- [ ] Identify all React components
- [ ] Document data fetching methods (getStaticProps, etc.)
- [ ] List all dynamic routes
- [ ] Identify API routes (if any)
- [ ] Document styling approach (CSS Modules, Tailwind, styled-components, etc.)

#### 4.2.2 Extract Styles
- [ ] Export all CSS/SCSS files
- [ ] Remove Next.js-specific syntax
- [ ] Convert CSS Modules to standard CSS
- [ ] Handle Tailwind CSS (include CDN or compile)
- [ ] Update asset paths to WordPress structure
- [ ] Optimize and minify CSS

#### 4.2.3 Convert JavaScript
- [ ] Identify interactive components
- [ ] Convert React state to vanilla JS or jQuery
- [ ] Remove Next.js-specific features (Link, Image, etc.)
- [ ] Adapt event handlers
- [ ] Handle client-side routing
- [ ] Optimize and minify JS

#### 4.2.4 Template Conversion
- [ ] Convert JSX to PHP templates
- [ ] Replace React components with WordPress template tags
- [ ] Implement WordPress Loop where needed
- [ ] Add WordPress conditional tags
- [ ] Implement proper escaping and sanitization

### 4.3 WordPress Template Tags to Implement

#### Header Template
```php
language_attributes()
bloginfo('charset')
wp_head()
body_class()
wp_body_open()
get_custom_logo()
bloginfo('name')
home_url('/')
wp_nav_menu()
```

#### Content Templates
```php
have_posts()
the_post()
the_ID()
post_class()
the_title()
the_content()
the_excerpt()
the_permalink()
the_post_thumbnail()
the_author()
the_date()
the_category()
the_tags()
```

#### Footer Template
```php
wp_footer()
```

---

## 5. Content Migration

### 5.1 Content Inventory

From Next.js application, identify:
- [ ] Number of pages
- [ ] Number of blog posts (if any)
- [ ] Content structure (markdown, JSON, CMS, etc.)
- [ ] Media assets (images, videos, PDFs)
- [ ] Custom data structures
- [ ] Metadata/frontmatter

### 5.2 Export Strategy

#### 5.2.1 If Content is in Files (Markdown/MDX)
Create export script:
```javascript
// export-content.js
const fs = require('fs');
const path = require('path');
const matter = require('gray-matter');

const contentDir = './content'; // Adjust path
const outputFile = './wordpress-import.json';

// Read all content files
// Parse frontmatter and content
// Transform to WordPress-compatible format
// Export as JSON
```

Output format:
```json
[
  {
    "title": "Page Title",
    "content": "Page content...",
    "slug": "page-slug",
    "status": "publish",
    "type": "page",
    "meta": {
      "description": "SEO description",
      "featured_image": "image.jpg"
    }
  }
]
```

#### 5.2.2 If Content is in CMS
- [ ] Use CMS API to fetch all content
- [ ] Transform data to WordPress format
- [ ] Export as JSON or XML

### 5.3 Import Strategy

#### 5.3.1 Manual Import (Small Sites)
- [ ] Create pages via WordPress admin
- [ ] Copy/paste content
- [ ] Upload media via Media Library
- [ ] Set featured images
- [ ] Configure menus

#### 5.3.2 Automated Import (Larger Sites)

**Option A: WordPress Importer Plugin**
- [ ] Install WordPress Importer plugin
- [ ] Prepare WXR (WordPress eXtended RSS) file
- [ ] Import via Tools → Import

**Option B: WP All Import Plugin**
- [ ] Install WP All Import Pro
- [ ] Upload JSON/CSV file
- [ ] Map fields to WordPress
- [ ] Run import

**Option C: Custom Import Script**
Create `import-content.php`:
```php
<?php
require_once('wp-load.php');

$json = file_get_contents('wordpress-import.json');
$items = json_decode($json, true);

foreach ($items as $item) {
    $post_data = array(
        'post_title'    => $item['title'],
        'post_content'  => $item['content'],
        'post_name'     => $item['slug'],
        'post_status'   => $item['status'],
        'post_type'     => $item['type'],
        'post_author'   => 1,
    );
    
    $post_id = wp_insert_post($post_data);
    
    // Handle meta data
    if (isset($item['meta'])) {
        foreach ($item['meta'] as $key => $value) {
            update_post_meta($post_id, $key, $value);
        }
    }
    
    // Handle featured image
    if (isset($item['featured_image'])) {
        // Download and attach image
    }
    
    echo "Imported: {$item['title']} (ID: {$post_id})\n";
}
?>
```

### 5.4 Media Migration
- [ ] Copy all images from Next.js to `wp-content/uploads/`
- [ ] Organize by year/month (WordPress convention)
- [ ] Update image paths in content
- [ ] Generate WordPress thumbnail sizes
- [ ] Update database references

---

## 6. Essential Plugins

### 6.1 Required Plugins
- [ ] **WordPress Importer** - Content import
- [ ] **Classic Editor** or **Gutenberg** - Content editing
- [ ] **Regenerate Thumbnails** - Image optimization

### 6.2 Recommended Plugins
- [ ] **Yoast SEO** - SEO optimization
- [ ] **Contact Form 7** - Forms
- [ ] **WP Super Cache** - Performance
- [ ] **Wordfence Security** - Security
- [ ] **UpdraftPlus** - Backups
- [ ] **Advanced Custom Fields** - Custom fields (if needed)

### 6.3 Plugin Installation via WP-CLI

```bash
# Install plugins
docker exec -it wordpress_app wp plugin install wordpress-importer --activate
docker exec -it wordpress_app wp plugin install classic-editor --activate
docker exec -it wordpress_app wp plugin install regenerate-thumbnails --activate
docker exec -it wordpress_app wp plugin install yoast-seo --activate
docker exec -it wordpress_app wp plugin install contact-form-7 --activate
docker exec -it wordpress_app wp plugin install wp-super-cache --activate
docker exec -it wordpress_app wp plugin install wordfence --activate
docker exec -it wordpress_app wp plugin install updraftplus --activate
```

---

## 7. Configuration & Optimization

### 7.1 WordPress Configuration

#### 7.1.1 General Settings
- [ ] Set site title and tagline
- [ ] Configure WordPress address and site address
- [ ] Set timezone
- [ ] Set date and time format
- [ ] Configure language

#### 7.1.2 Reading Settings
- [ ] Set homepage display (static page or latest posts)
- [ ] Select homepage and blog page
- [ ] Configure posts per page

#### 7.1.3 Permalink Settings
- [ ] Set permalink structure (Post name recommended)
- [ ] Configure custom structure if needed

#### 7.1.4 Media Settings
- [ ] Configure image sizes
- [ ] Set thumbnail dimensions
- [ ] Set medium dimensions
- [ ] Set large dimensions

### 7.2 Performance Optimization

#### 7.2.1 In functions.php
```php
// Remove unnecessary WordPress features
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');

// Disable emojis
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Defer JavaScript
function defer_scripts($tag, $handle) {
    if (is_admin()) return $tag;
    return str_replace(' src', ' defer src', $tag);
}
add_filter('script_loader_tag', 'defer_scripts', 10, 2);
```

#### 7.2.2 Enable Caching
- [ ] Configure WP Super Cache plugin
- [ ] Enable browser caching
- [ ] Set cache expiration headers

#### 7.2.3 Database Optimization
- [ ] Install WP-Optimize plugin
- [ ] Clean post revisions
- [ ] Remove spam comments
- [ ] Optimize database tables

### 7.3 Security Configuration

#### 7.3.1 File Permissions
```bash
docker exec -it wordpress_app chmod 755 /var/www/html
docker exec -it wordpress_app chmod 644 /var/www/html/wp-config.php
docker exec -it wordpress_app chown -R www-data:www-data /var/www/html
```

#### 7.3.2 Security Headers
Add to functions.php:
```php
function add_security_headers() {
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: SAMEORIGIN');
    header('X-XSS-Protection: 1; mode=block');
}
add_action('send_headers', 'add_security_headers');
```

#### 7.3.3 Disable File Editing
Add to wp-config.php:
```php
define('DISALLOW_FILE_EDIT', true);
```

---

## 8. Testing Requirements

### 8.1 Functional Testing
- [ ] All pages load without errors
- [ ] Navigation menus work correctly
- [ ] Links are not broken
- [ ] Forms submit successfully
- [ ] Search functionality works
- [ ] Comments system (if enabled)
- [ ] Media displays correctly
- [ ] Custom post types (if any)

### 8.2 Visual Testing
- [ ] Layout matches original design
- [ ] Typography is consistent
- [ ] Colors match design
- [ ] Spacing and margins are correct
- [ ] Images scale properly
- [ ] Icons display correctly

### 8.3 Responsive Testing
- [ ] Desktop (1920px, 1440px, 1280px)
- [ ] Tablet (768px, 1024px)
- [ ] Mobile (375px, 414px, 360px)
- [ ] Touch interactions work
- [ ] Menus collapse appropriately

### 8.4 Browser Compatibility
- [ ] Chrome (latest)
- [ ] Firefox (latest)
- [ ] Safari (latest)
- [ ] Edge (latest)

### 8.5 Performance Testing
- [ ] Page load time < 3 seconds
- [ ] Images are optimized
- [ ] CSS/JS are minified
- [ ] Lighthouse score > 80

### 8.6 SEO Testing
- [ ] Meta titles present
- [ ] Meta descriptions present
- [ ] Open Graph tags
- [ ] Structured data (Schema.org)
- [ ] XML sitemap generated
- [ ] Robots.txt configured

### 8.7 Accessibility Testing
- [ ] ARIA labels present
- [ ] Keyboard navigation works
- [ ] Color contrast meets WCAG AA
- [ ] Alt text on images
- [ ] Semantic HTML structure

---

## 9. Backup & Deployment

### 9.1 Backup Strategy

#### 9.1.1 Database Backup
```bash
# Backup database
docker exec wordpress_mariadb mysqldump -u wpuser -pwppassword wordpress > backup-$(date +%Y%m%d).sql

# Restore database
docker exec -i wordpress_mariadb mysql -u wpuser -pwppassword wordpress < backup-20241006.sql
```

#### 9.1.2 Files Backup
```bash
# Backup wp-content
tar -czf wp-content-backup-$(date +%Y%m%d).tar.gz ./wp-content

# Restore wp-content
tar -xzf wp-content-backup-20241006.tar.gz
```

#### 9.1.3 Automated Backups
- [ ] Configure UpdraftPlus for scheduled backups
- [ ] Set backup frequency (daily/weekly)
- [ ] Configure remote backup storage (S3, Dropbox, etc.)

### 9.2 Version Control
- [ ] Initialize git repository
- [ ] Create .gitignore:
```
wp-content/uploads/
wp-content/cache/
mysql-data/
*.sql
.env
```
- [ ] Commit theme files
- [ ] Commit custom plugins
- [ ] Document changes in commits

### 9.3 Production Deployment

#### 9.3.1 Prepare Production docker-compose.yml
```yaml
version: '3.8'

services:
  db:
    image: mariadb:latest
    container_name: wordpress_mariadb_prod
    restart: always
    environment:
      MYSQL_ROOT_PASSWORD: ${DB_ROOT_PASSWORD}
      MYSQL_DATABASE: ${DB_NAME}
      MYSQL_USER: ${DB_USER}
      MYSQL_PASSWORD: ${DB_PASSWORD}
    volumes:
      - db-data:/var/lib/mysql
    networks:
      - wordpress-network

  wordpress:
    depends_on:
      - db
    image: wordpress:latest
    container_name: wordpress_app_prod
    restart: always
    ports:
      - "80:80"
      - "443:443"
    environment:
      WORDPRESS_DB_HOST: db:3306
      WORDPRESS_DB_USER: ${DB_USER}
      WORDPRESS_DB_PASSWORD: ${DB_PASSWORD}
      WORDPRESS_DB_NAME: ${DB_NAME}
      WORDPRESS_CONFIG_EXTRA: |
        define('WP_DEBUG', false);
        define('WP_DEBUG_LOG', false);
        define('WP_DEBUG_DISPLAY', false);
    volumes:
      - ./wp-content:/var/www/html/wp-content
      - ./ssl:/etc/ssl/certs
    networks:
      - wordpress-network

networks:
  wordpress-network:
    driver: bridge

volumes:
  db-data:
```

#### 9.3.2 Environment Variables (.env)
```
DB_ROOT_PASSWORD=secure_root_password
DB_NAME=wordpress_prod
DB_USER=wp_prod_user
DB_PASSWORD=secure_db_password
```

#### 9.3.3 SSL Configuration
- [ ] Obtain SSL certificate (Let's Encrypt)
- [ ] Configure HTTPS in WordPress
- [ ] Force SSL admin area
- [ ] Update site URL to HTTPS

#### 9.3.4 Production Checklist
- [ ] Disable debug mode
- [ ] Remove development plugins
- [ ] Configure caching
- [ ] Set up CDN (optional)
- [ ] Configure firewall rules
- [ ] Set up monitoring
- [ ] Configure automated backups
- [ ] Update DNS records
- [ ] Test production site thoroughly

---

## 10. Documentation Requirements

### 10.1 Technical Documentation
- [ ] Document theme structure
- [ ] Document custom functions
- [ ] Document custom post types/taxonomies
- [ ] Document plugin dependencies
- [ ] Document deployment process
- [ ] Document backup/restore procedures

### 10.2 User Documentation
- [ ] Create content editing guide
- [ ] Document menu management
- [ ] Document widget configuration
- [ ] Document media management
- [ ] Create troubleshooting guide

### 10.3 Code Documentation
- [ ] Add PHPDoc comments to functions
- [ ] Document complex logic
- [ ] Add inline comments where necessary
- [ ] Document custom hooks/filters

---

## 11. Maintenance Plan

### 11.1 Regular Maintenance Tasks
- [ ] Update WordPress core (monthly)
- [ ] Update plugins (monthly)
- [ ] Update themes (as needed)
- [ ] Database optimization (monthly)
- [ ] Backup verification (weekly)
- [ ] Security scan (weekly)
- [ ] Performance monitoring (weekly)

### 11.2 Monitoring
- [ ] Set up uptime monitoring
- [ ] Configure error logging
- [ ] Monitor disk space
- [ ] Monitor database size
- [ ] Track page load times

---

## 12. Troubleshooting Guide

### 12.1 Common Issues

#### Docker Issues
```bash
# Container won't start
docker-compose logs [service-name]
docker-compose down
docker-compose up -d

# Permission issues
docker exec -it wordpress_app chown -R www-data:www-data /var/www/html

# Database connection issues
docker-compose restart db
docker exec -it wordpress_mariadb mysql -u root -p
```

#### WordPress Issues
```bash
# Clear cache
docker exec -it wordpress_app wp cache flush

# Fix permalinks
docker exec -it wordpress_app wp rewrite flush

# Repair database
docker exec -it wordpress_app wp db repair

# Check theme
docker exec -it wordpress_app wp theme list
docker exec -it wordpress_app wp theme activate lovable-theme
```

#### File Permission Issues
```bash
docker exec -it wordpress_app chmod -R 755 /var/www/html
docker exec -it wordpress_app chmod -R 644 /var/www/html/wp-content
```

---

## 13. Success Criteria

### 13.1 Technical Success
- [ ] Docker environment runs without errors
- [ ] WordPress installation is complete
- [ ] Theme matches original Next.js design
- [ ] All content is successfully migrated
- [ ] No broken links or missing images
- [ ] Site loads in < 3 seconds
- [ ] No console errors
- [ ] No PHP errors

### 13.2 Functional Success
- [ ] All pages are accessible
- [ ] Navigation works correctly
- [ ] Forms submit successfully
- [ ] Search functionality works
- [ ] Mobile responsive design works
- [ ] Cross-browser compatibility confirmed

### 13.3 Business Success
- [ ] Site matches design requirements
- [ ] Content is accurate and complete
- [ ] SEO configuration is complete
- [ ] Analytics tracking is set up
- [ ] Site is ready for production launch

---

## 14. Timeline & Milestones

### Phase 1: Setup (Days 1-2)
- [ ] Set up Docker environment
- [ ] Install WordPress
- [ ] Configure database
- [ ] Activate initial plugins

### Phase 2: Theme Development (Days 3-7)
- [ ] Create theme structure
- [ ] Convert Next.js components to PHP
- [ ] Implement styles
- [ ] Add JavaScript functionality
- [ ] Test theme on development environment

### Phase 3: Content Migration (Days 8-10)
- [ ] Export content from Next.js
- [ ] Create import script
- [ ] Import content to WordPress
- [ ] Verify all content
- [ ] Upload and organize media

### Phase 4: Configuration (Days 11-12)
- [ ] Configure WordPress settings
- [ ] Set up menus
- [ ] Configure plugins
- [ ] Optimize performance
- [ ] Implement security measures

### Phase 5: Testing (Days 13-14)
- [ ] Functional testing
- [ ] Visual testing
- [ ] Responsive testing
- [ ] Browser compatibility testing
- [ ] Performance testing
- [ ] SEO testing

### Phase 6: Deployment (Day 15)
- [ ] Create production configuration
- [ ] Deploy to production
- [ ] Configure domain and SSL
- [ ] Final testing
- [ ] Go live

---

## 15. Deliverables

### 15.1 Code Deliverables
- [ ] docker-compose.yml
- [ ] WordPress theme (complete)
- [ ] Custom plugins (if any)
- [ ] Import scripts
- [ ] Configuration files

### 15.2 Documentation Deliverables
- [ ] Technical documentation
- [ ] User guide
- [ ] Deployment guide
- [ ] Maintenance guide
- [ ] Troubleshooting guide

### 15.3 Testing Deliverables
- [ ] Test plan
- [ ] Test results
- [ ] Performance reports
- [ ] Browser compatibility matrix

---

## 16. Command Reference

### Docker Commands
```bash
# Start environment
docker-compose up -d

# Stop environment
docker-compose down

# View logs
docker-compose logs -f

# Restart services
docker-compose restart

# Access WordPress container
docker exec -it wordpress_app bash

# Access database
docker exec -it wordpress_mariadb mysql -u wpuser -pwppassword wordpress
```

### WP-CLI Commands
```bash
# List plugins
docker exec -it wordpress_app wp plugin list

# Activate theme
docker exec -it wordpress_app wp theme activate lovable-theme

# Create user
docker exec -it wordpress_app wp user create username email@example.com --role=administrator

# Export database
docker exec -it wordpress_app wp db export backup.sql

# Import database
docker exec -it wordpress_app wp db import backup.sql

# Search and replace URLs
docker exec -it wordpress_app wp search-replace 'oldurl.com' 'newurl.com'
```

---

## Notes for Claude Code

This PRP is designed to be executed by Claude Code CLI. The plan includes:

1. **Clear Requirements**: Each section has specific, actionable tasks
2. **Checkboxes**: Track progress through the implementation
3. **Code Examples**: Ready-to-use code snippets for implementation
4. **Verification Steps**: Test each component as it's built
5. **Troubleshooting**: Common issues and solutions
6. **Modular Structure**: Can be executed section by section

To use this PRP with Claude Code:
1. Save this as `REQUIREMENTS.md` in your project root
2. Run: `claude-code "Implement the WordPress Docker environment following REQUIREMENTS.md"`
3. Claude Code will work through each section systematically
4. Review and test each phase before proceeding to the next

Expected execution time: 10-15 days (can be compressed with automation)