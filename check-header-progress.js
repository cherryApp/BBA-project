const { chromium } = require('playwright');

async function checkHeaderProgress() {
  const browser = await chromium.launch();
  const page = await browser.newPage();
  
  try {
    await page.goto('http://localhost:8082/');
    await page.waitForLoadState('networkidle');
    
    await page.setViewportSize({ width: 1920, height: 1080 });
    await page.screenshot({ 
      path: './design-comparison/wordpress-header-updated.png' 
    });
    
    console.log('Header progress screenshot captured!');
    
  } catch (error) {
    console.error('Error:', error);
  } finally {
    await browser.close();
  }
}

checkHeaderProgress();