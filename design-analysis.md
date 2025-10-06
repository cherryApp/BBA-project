# Design Analysis: Next.js to WordPress Conversion

## Color Palette Analysis

Based on the Next.js app, the key colors used are:

### Primary Colors
- **Blue Gradient**: `from-blue-50 to-white` (light blue to white background)
- **Blue Primary**: `from-blue-900 to-blue-800` (header section)
- **Blue Accent**: `blue-600`, `blue-100` (icons, hover states)

### Semantic Colors
- **Red/Destructive**: `red-100`, `red-600` (threat severity - high)
- **Green**: `green-100`, `green-600`, `green-500`, `green-700` (security tips, moderate threats)
- **Orange**: `orange-100`, `orange-600`, `orange-200` (help section)
- **Purple**: `purple-100`, `purple-600` (target groups)
- **Gray Scale**: `gray-50`, `gray-100`, `gray-400`, `gray-600`, `gray-700`, `gray-900`

### Badge Colors
- **Destructive**: High severity threats
- **Secondary**: Medium severity threats
- **Outline**: General badges

## Typography
- **Headings**: Various sizes from `text-xl` to `text-4xl`
- **Body Text**: `text-base`, `text-sm`
- **Font Weights**: `font-medium`, `font-semibold`, `font-bold`

## Layout Components

### Header Banner
- Full-width image banner
- Contains EU and Széchenyi logos

### Navigation
- Horizontal navigation bar
- Center-aligned menu items
- Hover effects with background color change

### Hero Section
- Large title with gradient background
- Subtitle with project ID
- Background image with overlay

### Target Groups Section
- 4-column grid on desktop
- 2-column on tablet/mobile
- Circular icon containers with different colors
- Icons from Lucide React

### Content Cards
- Shadow on hover
- Rounded corners
- Card headers with icons
- Severity badges
- Tip lists with bullet points

### Emergency Contact
- Orange-themed card
- Two-column layout for contact information

### Footer
- Dark background (`gray-900`)
- Multi-column layout
- Logo and contact information

## Interactive Elements

### Buttons
- Primary buttons with blue theme
- Outline variants
- Hover states

### Icons
- Lucide React icons throughout
- Used for threats, features, navigation
- Consistent sizing (`w-4 h-4`, `w-6 h-6`, `w-8 h-8`, etc.)

## Responsive Design
- Mobile-first approach with Tailwind
- Grid systems that adapt: `grid-cols-2 lg:grid-cols-4`
- Text sizing that scales: `text-3xl md:text-4xl`
- Padding adjustments: `px-4 sm:px-6 lg:px-8`

## Key Design Patterns
1. **Gradient Backgrounds**: Used for visual hierarchy
2. **Card-based Layout**: Information organized in cards
3. **Icon + Text Pattern**: Consistent throughout the app
4. **Color-coded Severity**: Red for high, secondary for medium
5. **Centered Content**: Max-width containers with auto margins
6. **Consistent Spacing**: Using Tailwind's spacing scale

## Images Used
- Header banner: `b7c2651a-4931-45d8-8290-923fa486cbef.png`
- Background image: `72cf8e0c-4371-46b8-a0d1-85d7265a80af.png`
- Additional images in uploads folder

## WordPress Conversion Strategy
1. Convert Tailwind classes to custom CSS
2. Replicate the color system using CSS variables
3. Create card components using WordPress template parts
4. Use WordPress navigation menus for the nav bar
5. Convert the grid layouts to CSS Grid/Flexbox
6. Implement responsive design with media queries
7. Recreate hover effects and transitions