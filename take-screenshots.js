const { chromium } = require('playwright');
const fs = require('fs');
const path = require('path');

async function takeScreenshots() {
  // Create screenshots directory if it doesn't exist
  const screenshotsDir = './screenshots';
  if (!fs.existsSync(screenshotsDir)) {
    fs.mkdirSync(screenshotsDir);
  }

  const browser = await chromium.launch();
  const page = await browser.newPage();
  
  try {
    // Navigate to the Next.js app
    await page.goto('http://localhost:8080/');
    
    // Wait for page to fully load
    await page.waitForLoadState('networkidle');
    
    // Take full page screenshot
    await page.screenshot({ 
      path: './screenshots/nextjs-full-page.png', 
      fullPage: true 
    });
    
    // Take viewport screenshot for above-the-fold
    await page.screenshot({ 
      path: './screenshots/nextjs-viewport.png' 
    });
    
    // Take mobile view screenshot
    await page.setViewportSize({ width: 375, height: 667 });
    await page.screenshot({ 
      path: './screenshots/nextjs-mobile.png', 
      fullPage: true 
    });
    
    // Take tablet view screenshot  
    await page.setViewportSize({ width: 768, height: 1024 });
    await page.screenshot({ 
      path: './screenshots/nextjs-tablet.png', 
      fullPage: true 
    });
    
    console.log('Screenshots taken successfully!');
    
  } catch (error) {
    console.error('Error taking screenshots:', error);
  } finally {
    await browser.close();
  }
}

takeScreenshots();