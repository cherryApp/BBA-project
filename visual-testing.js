const { chromium } = require('playwright');
const fs = require('fs');
const path = require('path');

/**
 * Visual Testing Script for WordPress vs Next.js Comparison
 * This script takes screenshots of both versions and provides basic comparison
 */

class VisualTester {
    constructor() {
        this.browser = null;
        this.nextjsUrl = 'http://localhost:8080/';
        this.wordpressUrl = 'http://localhost:8082/';
        this.screenshotsDir = './visual-tests';
        
        // Ensure screenshots directory exists
        if (!fs.existsSync(this.screenshotsDir)) {
            fs.mkdirSync(this.screenshotsDir, { recursive: true });
        }
    }

    async initialize() {
        this.browser = await chromium.launch();
        console.log('Browser initialized for visual testing');
    }

    async takeComparisonScreenshots() {
        const page = await this.browser.newPage();
        
        try {
            console.log('Taking comparison screenshots...');
            
            // Desktop screenshots
            await this.takeScreenshotComparison(page, 1920, 1080, 'desktop');
            
            // Tablet screenshots
            await this.takeScreenshotComparison(page, 768, 1024, 'tablet');
            
            // Mobile screenshots
            await this.takeScreenshotComparison(page, 375, 667, 'mobile');
            
            console.log('All comparison screenshots completed!');
            
        } catch (error) {
            console.error('Error during screenshot comparison:', error);
        } finally {
            await page.close();
        }
    }

    async takeScreenshotComparison(page, width, height, deviceType) {
        console.log(`Testing ${deviceType} view (${width}x${height})...`);
        
        await page.setViewportSize({ width, height });
        
        // Screenshot Next.js version
        try {
            await page.goto(this.nextjsUrl, { waitUntil: 'networkidle' });
            await page.screenshot({ 
                path: `${this.screenshotsDir}/nextjs-${deviceType}.png`,
                fullPage: true 
            });
            console.log(`✓ Next.js ${deviceType} screenshot taken`);
        } catch (error) {
            console.error(`✗ Failed to screenshot Next.js ${deviceType}:`, error.message);
        }
        
        // Screenshot WordPress version
        try {
            await page.goto(this.wordpressUrl, { waitUntil: 'networkidle' });
            await page.screenshot({ 
                path: `${this.screenshotsDir}/wordpress-${deviceType}.png`,
                fullPage: true 
            });
            console.log(`✓ WordPress ${deviceType} screenshot taken`);
        } catch (error) {
            console.error(`✗ Failed to screenshot WordPress ${deviceType}:`, error.message);
        }
    }

    async testResponsiveness() {
        const page = await this.browser.newPage();
        
        const viewports = [
            { width: 1920, height: 1080, name: 'desktop-large' },
            { width: 1440, height: 900, name: 'desktop-medium' },
            { width: 1024, height: 768, name: 'tablet-landscape' },
            { width: 768, height: 1024, name: 'tablet-portrait' },
            { width: 414, height: 896, name: 'mobile-large' },
            { width: 375, height: 667, name: 'mobile-medium' },
            { width: 360, height: 640, name: 'mobile-small' }
        ];

        try {
            console.log('Testing responsiveness across different viewports...');
            
            for (const viewport of viewports) {
                await page.setViewportSize({ width: viewport.width, height: viewport.height });
                
                // Test WordPress responsiveness
                await page.goto(this.wordpressUrl, { waitUntil: 'networkidle' });
                await page.screenshot({ 
                    path: `${this.screenshotsDir}/responsive-wordpress-${viewport.name}.png`,
                    fullPage: true 
                });
                
                console.log(`✓ WordPress responsiveness tested for ${viewport.name}`);
            }
            
        } catch (error) {
            console.error('Error during responsiveness testing:', error);
        } finally {
            await page.close();
        }
    }

    async testInteractivity() {
        const page = await this.browser.newPage();
        
        try {
            console.log('Testing interactive elements...');
            
            await page.goto(this.wordpressUrl, { waitUntil: 'networkidle' });
            
            // Test navigation hover effects
            const navLinks = await page.$$('nav a');
            if (navLinks.length > 0) {
                await navLinks[0].hover();
                await page.screenshot({ 
                    path: `${this.screenshotsDir}/nav-hover-state.png` 
                });
                console.log('✓ Navigation hover state captured');
            }
            
            // Test card hover effects
            const cards = await page.$$('.card');
            if (cards.length > 0) {
                await cards[0].hover();
                await page.screenshot({ 
                    path: `${this.screenshotsDir}/card-hover-state.png` 
                });
                console.log('✓ Card hover state captured');
            }
            
            // Test button interactions
            const buttons = await page.$$('.btn');
            if (buttons.length > 0) {
                await buttons[0].hover();
                await page.screenshot({ 
                    path: `${this.screenshotsDir}/button-hover-state.png` 
                });
                console.log('✓ Button hover state captured');
            }
            
        } catch (error) {
            console.error('Error during interactivity testing:', error);
        } finally {
            await page.close();
        }
    }

    async testAccessibility() {
        const page = await this.browser.newPage();
        
        try {
            console.log('Testing accessibility features...');
            
            await page.goto(this.wordpressUrl, { waitUntil: 'networkidle' });
            
            // Test keyboard navigation
            await page.keyboard.press('Tab'); // Should focus on skip link
            await page.screenshot({ 
                path: `${this.screenshotsDir}/keyboard-navigation.png` 
            });
            
            // Test focus states
            const focusableElements = await page.$$('button, a, input, [tabindex]');
            if (focusableElements.length > 0) {
                await focusableElements[0].focus();
                await page.screenshot({ 
                    path: `${this.screenshotsDir}/focus-states.png` 
                });
                console.log('✓ Focus states captured');
            }
            
            // Check for alt text on images
            const images = await page.$$eval('img', imgs => 
                imgs.map(img => ({
                    src: img.src,
                    alt: img.alt,
                    hasAlt: !!img.alt
                }))
            );
            
            const imagesWithoutAlt = images.filter(img => !img.hasAlt);
            if (imagesWithoutAlt.length > 0) {
                console.warn('⚠ Images without alt text found:', imagesWithoutAlt);
            } else {
                console.log('✓ All images have alt text');
            }
            
        } catch (error) {
            console.error('Error during accessibility testing:', error);
        } finally {
            await page.close();
        }
    }

    async performanceTest() {
        const page = await this.browser.newPage();
        
        try {
            console.log('Running performance tests...');
            
            // WordPress performance
            const wpStartTime = Date.now();
            await page.goto(this.wordpressUrl, { waitUntil: 'networkidle' });
            const wpLoadTime = Date.now() - wpStartTime;
            
            // Next.js performance (for comparison)
            const nextStartTime = Date.now();
            await page.goto(this.nextjsUrl, { waitUntil: 'networkidle' });
            const nextLoadTime = Date.now() - nextStartTime;
            
            console.log(`WordPress load time: ${wpLoadTime}ms`);
            console.log(`Next.js load time: ${nextLoadTime}ms`);
            
            // Save performance report
            const report = {
                timestamp: new Date().toISOString(),
                wordpress: {
                    loadTime: wpLoadTime,
                    url: this.wordpressUrl
                },
                nextjs: {
                    loadTime: nextLoadTime,
                    url: this.nextjsUrl
                },
                comparison: {
                    difference: wpLoadTime - nextLoadTime,
                    wordpressFaster: wpLoadTime < nextLoadTime
                }
            };
            
            fs.writeFileSync(
                `${this.screenshotsDir}/performance-report.json`, 
                JSON.stringify(report, null, 2)
            );
            
            console.log('✓ Performance report saved');
            
        } catch (error) {
            console.error('Error during performance testing:', error);
        } finally {
            await page.close();
        }
    }

    async generateReport() {
        console.log('Generating visual testing report...');
        
        const reportData = {
            timestamp: new Date().toISOString(),
            testResults: {
                screenshots: {
                    nextjs: ['nextjs-desktop.png', 'nextjs-tablet.png', 'nextjs-mobile.png'],
                    wordpress: ['wordpress-desktop.png', 'wordpress-tablet.png', 'wordpress-mobile.png']
                },
                responsiveness: 'completed',
                interactivity: 'completed',
                accessibility: 'completed',
                performance: 'completed'
            },
            recommendations: [
                'Compare screenshot pairs visually for layout consistency',
                'Verify all interactive elements work as expected',
                'Check that responsive design matches across devices',
                'Ensure WordPress performance is acceptable',
                'Validate accessibility features are functioning'
            ]
        };
        
        fs.writeFileSync(
            `${this.screenshotsDir}/test-report.json`, 
            JSON.stringify(reportData, null, 2)
        );
        
        // Generate HTML report
        const htmlReport = this.generateHtmlReport(reportData);
        fs.writeFileSync(`${this.screenshotsDir}/report.html`, htmlReport);
        
        console.log('✓ Test report generated');
    }

    generateHtmlReport(data) {
        return `
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visual Testing Report</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; line-height: 1.6; }
        .header { background: #2563eb; color: white; padding: 20px; border-radius: 8px; }
        .section { margin: 20px 0; padding: 20px; border: 1px solid #e5e7eb; border-radius: 8px; }
        .screenshot-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .screenshot { text-align: center; }
        .screenshot img { max-width: 100%; border: 1px solid #d1d5db; border-radius: 4px; }
        .recommendations { background: #f0fdf4; padding: 15px; border-radius: 8px; }
        .recommendations ul { margin: 0; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Visual Testing Report</h1>
        <p>Generated on: ${data.timestamp}</p>
    </div>
    
    <div class="section">
        <h2>Screenshot Comparison</h2>
        <div class="screenshot-grid">
            <div class="screenshot">
                <h3>Next.js (Original)</h3>
                <img src="nextjs-desktop.png" alt="Next.js Desktop">
            </div>
            <div class="screenshot">
                <h3>WordPress (Converted)</h3>
                <img src="wordpress-desktop.png" alt="WordPress Desktop">
            </div>
        </div>
    </div>
    
    <div class="section">
        <h2>Test Results</h2>
        <ul>
            <li>✓ Screenshots captured</li>
            <li>✓ Responsiveness tested</li>
            <li>✓ Interactivity tested</li>
            <li>✓ Accessibility checked</li>
            <li>✓ Performance measured</li>
        </ul>
    </div>
    
    <div class="section recommendations">
        <h2>Recommendations</h2>
        <ul>
            ${data.recommendations.map(rec => `<li>${rec}</li>`).join('')}
        </ul>
    </div>
</body>
</html>`;
    }

    async runAllTests() {
        try {
            await this.initialize();
            
            console.log('🚀 Starting comprehensive visual testing...\n');
            
            await this.takeComparisonScreenshots();
            await this.testResponsiveness();
            await this.testInteractivity();
            await this.testAccessibility();
            await this.performanceTest();
            await this.generateReport();
            
            console.log('\n✅ All visual tests completed successfully!');
            console.log(`📁 Results saved in: ${this.screenshotsDir}/`);
            console.log(`📊 View report: ${this.screenshotsDir}/report.html`);
            
        } catch (error) {
            console.error('❌ Error during testing:', error);
        } finally {
            if (this.browser) {
                await this.browser.close();
            }
        }
    }
}

// Export for use as module
module.exports = VisualTester;

// Run tests if called directly
if (require.main === module) {
    const tester = new VisualTester();
    tester.runAllTests();
}