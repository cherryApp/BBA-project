const { chromium } = require('playwright');
const fs = require('fs');
const path = require('path');

async function captureDesignComparison() {
  // Create screenshots directory if it doesn't exist
  const screenshotsDir = './design-comparison';
  if (!fs.existsSync(screenshotsDir)) {
    fs.mkdirSync(screenshotsDir);
  }

  const browser = await chromium.launch();
  
  try {
    console.log('Starting design comparison capture...');
    
    // Capture template design screenshots
    await captureTemplateDesign(browser);
    
    // Capture WordPress site screenshots
    await captureWordPressSite(browser);
    
    console.log('Design comparison screenshots captured successfully!');
    
  } catch (error) {
    console.error('Error capturing screenshots:', error);
  } finally {
    await browser.close();
  }
}

async function captureTemplateDesign(browser) {
  const page = await browser.newPage();
  
  try {
    console.log('Capturing template design screenshots...');
    
    // Navigate to template
    await page.goto('https://kecskemet-digital-shield.lovable.app/');
    await page.waitForLoadState('networkidle');
    
    // Desktop view - full page
    await page.setViewportSize({ width: 1920, height: 1080 });
    await page.screenshot({ 
      path: './design-comparison/template-desktop-full.png', 
      fullPage: true 
    });
    
    // Desktop view - above the fold
    await page.screenshot({ 
      path: './design-comparison/template-desktop-viewport.png' 
    });
    
    // Tablet view
    await page.setViewportSize({ width: 768, height: 1024 });
    await page.screenshot({ 
      path: './design-comparison/template-tablet.png', 
      fullPage: true 
    });
    
    // Mobile view
    await page.setViewportSize({ width: 375, height: 667 });
    await page.screenshot({ 
      path: './design-comparison/template-mobile.png', 
      fullPage: true 
    });
    
    console.log('Template screenshots captured successfully!');
    
  } catch (error) {
    console.error('Error capturing template screenshots:', error);
  } finally {
    await page.close();
  }
}

async function captureWordPressSite(browser) {
  const page = await browser.newPage();
  
  try {
    console.log('Capturing WordPress site screenshots...');
    
    // Navigate to WordPress site
    await page.goto('http://localhost:8082/');
    await page.waitForLoadState('networkidle');
    
    // Desktop view - full page
    await page.setViewportSize({ width: 1920, height: 1080 });
    await page.screenshot({ 
      path: './design-comparison/wordpress-desktop-full.png', 
      fullPage: true 
    });
    
    // Desktop view - above the fold
    await page.screenshot({ 
      path: './design-comparison/wordpress-desktop-viewport.png' 
    });
    
    // Tablet view
    await page.setViewportSize({ width: 768, height: 1024 });
    await page.screenshot({ 
      path: './design-comparison/wordpress-tablet.png', 
      fullPage: true 
    });
    
    // Mobile view
    await page.setViewportSize({ width: 375, height: 667 });
    await page.screenshot({ 
      path: './design-comparison/wordpress-mobile.png', 
      fullPage: true 
    });
    
    console.log('WordPress screenshots captured successfully!');
    
  } catch (error) {
    console.error('Error capturing WordPress screenshots:', error);
  } finally {
    await page.close();
  }
}

// Run the capture
captureDesignComparison();