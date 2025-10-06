const { chromium } = require('playwright');

/**
 * Automated WordPress Setup Script
 * This script completes the WordPress installation and activates our theme
 */

class WordPressSetup {
    constructor() {
        this.browser = null;
        this.page = null;
        this.wordpressUrl = 'http://localhost:8082';
        
        this.config = {
            siteName: 'Kecskemét Digitális Biztonság',
            username: 'admin',
            password: 'admin_password_123',
            email: 'admin@kecskemet-security.hu',
            language: 'hu_HU'
        };
    }

    async initialize() {
        this.browser = await chromium.launch({ headless: false });
        this.page = await this.browser.newPage();
        console.log('WordPress setup initialized');
    }

    async setupWordPress() {
        try {
            console.log('🚀 Starting WordPress installation...');
            
            // Navigate to WordPress
            await this.page.goto(this.wordpressUrl);
            
            // Check if already installed
            const currentUrl = this.page.url();
            if (!currentUrl.includes('install.php')) {
                console.log('✅ WordPress is already installed');
                return true;
            }
            
            // Start installation
            await this.page.click('text=Let\'s go!');
            console.log('✓ Starting installation process');
            
            // Fill database details (these should match our docker-compose.yml)
            await this.page.fill('#dbname', 'wordpress');
            await this.page.fill('#uname', 'wpuser');
            await this.page.fill('#pwd', 'wppassword');
            await this.page.fill('#dbhost', 'db');
            
            await this.page.click('text=Submit');
            console.log('✓ Database configuration submitted');
            
            // Wait for next step and click "Run the installation"
            await this.page.waitForSelector('text=Run the installation');
            await this.page.click('text=Run the installation');
            console.log('✓ Running installation');
            
            // Fill site information
            await this.page.fill('#weblog_title', this.config.siteName);
            await this.page.fill('#user_login', this.config.username);
            await this.page.fill('#pass1', this.config.password);
            await this.page.fill('#admin_email', this.config.email);
            
            // Uncheck search engine visibility for development
            await this.page.uncheck('#blog_public');
            
            await this.page.click('#submit');
            console.log('✓ Site information submitted');
            
            // Wait for success page
            await this.page.waitForSelector('text=Success!');
            console.log('✅ WordPress installation completed successfully!');
            
            return true;
            
        } catch (error) {
            console.error('❌ Error during WordPress setup:', error);
            return false;
        }
    }

    async loginToWordPress() {
        try {
            console.log('🔐 Logging into WordPress admin...');
            
            // Go to login page
            await this.page.goto(`${this.wordpressUrl}/wp-admin/`);
            
            // Fill login credentials
            await this.page.fill('#user_login', this.config.username);
            await this.page.fill('#user_pass', this.config.password);
            
            await this.page.click('#wp-submit');
            
            // Wait for dashboard
            await this.page.waitForSelector('#wpadminbar', { timeout: 10000 });
            console.log('✅ Successfully logged into WordPress admin');
            
            return true;
            
        } catch (error) {
            console.error('❌ Error during login:', error);
            return false;
        }
    }

    async activateTheme() {
        try {
            console.log('🎨 Activating Lovable Theme...');
            
            // Navigate to themes page
            await this.page.goto(`${this.wordpressUrl}/wp-admin/themes.php`);
            
            // Look for our theme and activate it
            const themeSelector = 'div[data-slug="lovable-theme"]';
            
            try {
                await this.page.waitForSelector(themeSelector, { timeout: 5000 });
                
                // Click on the theme
                await this.page.click(`${themeSelector} .theme-screenshot`);
                
                // Wait for theme details and click activate
                await this.page.waitForSelector('.theme-overlay');
                await this.page.click('.activate');
                
                console.log('✅ Lovable Theme activated successfully!');
                return true;
                
            } catch (e) {
                console.log('⚠ Theme not found in themes list. This is expected for a custom theme.');
                console.log('ℹ Theme files are in place, but need to be recognized by WordPress');
                return false;
            }
            
        } catch (error) {
            console.error('❌ Error activating theme:', error);
            return false;
        }
    }

    async createSampleContent() {
        try {
            console.log('📝 Creating sample content...');
            
            // Create a test page
            await this.page.goto(`${this.wordpressUrl}/wp-admin/post-new.php?post_type=page`);
            
            // Wait for editor
            await this.page.waitForSelector('#title');
            
            // Fill page title
            await this.page.fill('#title', 'Digitális Biztonság Kezdőlap');
            
            // Add some content
            const content = `
<h2>Üdvözöljük a Kecskemét Digitális Biztonság oldalon!</h2>

<p>Ez a weboldal a kiberbűnözés elleni fellépést célzó megelőzési programok keretében jött létre.</p>

<h3>Célcsoportjaink</h3>
<ul>
<li>Általános és középiskolák</li>
<li>Felnőttek</li>
<li>Idősek (65+ korosztály)</li>
<li>Vállalatok és intézmények</li>
</ul>

<h3>Fő témáink</h3>
<ul>
<li>Adathalászat (Phishing) elleni védelem</li>
<li>Biztonságos jelszóhasználat</li>
<li>WiFi biztonsági tippek</li>
<li>Kártékony alkalmazások felismerése</li>
</ul>
            `;
            
            // Switch to HTML mode and add content
            await this.page.click('#content-html');
            await this.page.fill('#content', content);
            
            // Publish the page
            await this.page.click('#publish');
            
            console.log('✅ Sample content created');
            return true;
            
        } catch (error) {
            console.error('❌ Error creating content:', error);
            return false;
        }
    }

    async configureHomepage() {
        try {
            console.log('🏠 Configuring homepage...');
            
            // Go to reading settings
            await this.page.goto(`${this.wordpressUrl}/wp-admin/options-reading.php`);
            
            // Set homepage to show a static page (our theme handles this)
            await this.page.check('#show_on_front_page');
            
            // Save settings
            await this.page.click('#submit');
            
            console.log('✅ Homepage configured');
            return true;
            
        } catch (error) {
            console.error('❌ Error configuring homepage:', error);
            return false;
        }
    }

    async runFullSetup() {
        try {
            await this.initialize();
            
            const setupSuccess = await this.setupWordPress();
            if (!setupSuccess) {
                throw new Error('WordPress installation failed');
            }
            
            const loginSuccess = await this.loginToWordPress();
            if (!loginSuccess) {
                throw new Error('WordPress login failed');
            }
            
            await this.activateTheme();
            await this.createSampleContent();
            await this.configureHomepage();
            
            console.log('\n🎉 WordPress setup completed successfully!');
            console.log(`📍 Visit your site: ${this.wordpressUrl}`);
            console.log(`🔧 Admin panel: ${this.wordpressUrl}/wp-admin/`);
            console.log(`👤 Username: ${this.config.username}`);
            console.log(`🔑 Password: ${this.config.password}`);
            
            return true;
            
        } catch (error) {
            console.error('❌ Setup failed:', error);
            return false;
        } finally {
            if (this.browser) {
                await this.browser.close();
            }
        }
    }
}

// Run setup if called directly
if (require.main === module) {
    const setup = new WordPressSetup();
    setup.runFullSetup();
}

module.exports = WordPressSetup;