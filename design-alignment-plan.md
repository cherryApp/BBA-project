# Design Alignment Plan: Template vs WordPress Site

## Overview
This document outlines the detailed plan to align the WordPress site (http://localhost:8082/) with the template design (https://kecskemet-digital-shield.lovable.app/).

## Critical Differences Identified

### 1. Header Section
**Current Issues:**
- Missing EU funding logos (Széchenyi 2020, Magyar Kormány, EU logo)
- Missing distinctive blue zigzag pattern background
- Basic navigation without proper styling
- Missing project branding elements

**Required Changes:**
- Add EU funding logos to header
- Implement blue zigzag pattern background CSS
- Style navigation bar to match template
- Add proper typography and spacing

### 2. Hero Section
**Current Issues:**
- Content is similar but styling differs
- Missing project reference number formatting
- Typography and spacing don't match

**Required Changes:**
- Update hero section styling to match blue background
- Add proper typography for project reference
- Adjust text spacing and alignment

### 3. Target Groups Section (Célcsoportjaink)
**Current Issues:**
- Icons are different style/design
- Layout and spacing differ
- Card design doesn't match template

**Required Changes:**
- Replace current icons with template-style icons
- Update card layout and styling
- Implement proper grid system
- Add hover effects if present in template

### 4. Digital Protection Section
**Current Issues:**
- Basic styling compared to template
- Missing visual hierarchy
- Different button/link styling

**Required Changes:**
- Update section styling to match template
- Implement proper visual hierarchy
- Style buttons/links to match template design

### 5. Digital Threats Section
**Current Issues:**
- Card design differs significantly
- Missing threat level indicators (New, Active badges)
- Layout and spacing issues
- Different color scheme for threat cards

**Required Changes:**
- Redesign threat cards to match template
- Add threat level badges (New, Active, etc.)
- Implement proper card shadows and spacing
- Update color scheme for consistency

### 6. Security Recommendations Section
**Current Issues:**
- Basic card design
- Missing icons and visual elements
- Different layout structure

**Required Changes:**
- Add appropriate icons to each recommendation
- Update card design with proper styling
- Implement consistent spacing and layout

### 7. Missing Elements
**Current Issues:**
- Missing contact/help section with question mark icon
- Footer styling doesn't match template

**Required Changes:**
- Add contact/help section before footer
- Update footer styling and content organization
- Add proper branding elements

### 8. Global Design Issues
**Current Issues:**
- Color scheme inconsistencies
- Typography system differs
- Missing proper visual hierarchy
- Card shadows and spacing inconsistent

**Required Changes:**
- Implement consistent color scheme
- Update typography to match template
- Add proper visual hierarchy throughout
- Standardize card designs and spacing

## Implementation Priority

### Phase 1: Header and Navigation (High Priority)
1. Add EU funding logos
2. Implement blue zigzag pattern
3. Style navigation bar
4. Update header layout

### Phase 2: Content Structure (High Priority)
1. Update Target Groups section
2. Redesign Digital Threats cards
3. Update Security Recommendations
4. Add missing contact section

### Phase 3: Styling and Polish (Medium Priority)
1. Implement consistent color scheme
2. Update typography system
3. Add proper spacing and shadows
4. Update footer styling

### Phase 4: Final Verification (Low Priority)
1. Take comparison screenshots
2. Fine-tune any remaining differences
3. Test responsive design
4. Verify all content alignment

## Technical Approach

### WordPress Theme Modifications
- Update `style.css` for global styling
- Modify template files for structure changes
- Add custom CSS for specific components
- Update header.php and footer.php files

### Asset Requirements
- EU funding logos (PNG/SVG format)
- Custom icons for sections
- Background patterns/images
- Typography fonts if needed

### Testing Strategy
- Use Playwright for automated screenshot comparison
- Test across different viewport sizes
- Verify functionality remains intact
- Check loading performance

## Success Criteria
- Visual design matches template design ≥95%
- All content sections properly styled
- Responsive design maintained
- Site functionality preserved
- Loading performance not degraded

## Timeline Estimate
- Phase 1: 2-3 hours
- Phase 2: 3-4 hours  
- Phase 3: 2-3 hours
- Phase 4: 1-2 hours
- **Total: 8-12 hours**