const { chromium } = require('playwright');

/**
 * Simple WordPress Setup Script - Manual Installation Guide
 */

async function checkWordPressStatus() {
    const browser = await chromium.launch({ headless: false });
    const page = await browser.newPage();
    
    try {
        console.log('🔍 Checking WordPress status...');
        
        await page.goto('http://localhost:8082', { waitUntil: 'networkidle' });
        
        const currentUrl = page.url();
        console.log('Current URL:', currentUrl);
        
        // Take a screenshot of current state
        await page.screenshot({ path: './wordpress-status.png' });
        console.log('📸 Screenshot saved as wordpress-status.png');
        
        // Check if it's the installation page
        if (currentUrl.includes('install.php')) {
            console.log('🔧 WordPress installation required');
            console.log('📋 Please complete the installation manually:');
            console.log('   1. Site Title: Kecskemét Digitális Biztonság');
            console.log('   2. Username: admin');
            console.log('   3. Password: admin_password_123');
            console.log('   4. Email: admin@kecskemet-security.hu');
            
            // Wait for user to complete installation
            console.log('\n⏳ Waiting for installation to complete...');
            console.log('💡 Complete the installation in your browser, then press Enter');
            
        } else {
            console.log('✅ WordPress appears to be installed');
            
            // Try to access the admin
            await page.goto('http://localhost:8082/wp-admin/', { waitUntil: 'networkidle' });
            await page.screenshot({ path: './wordpress-admin.png' });
            console.log('📸 Admin screenshot saved as wordpress-admin.png');
        }
        
        console.log('\n🎯 Once WordPress is set up, the theme files are ready at:');
        console.log('   /wp-content/themes/lovable-theme/');
        
    } catch (error) {
        console.error('❌ Error checking WordPress:', error.message);
    } finally {
        await browser.close();
    }
}

// Run the check
checkWordPressStatus();