# Samariesi Med4U Website

## Overview

This is a responsive medical/healthcare website for Samariesi Med4U built with vanilla HTML, CSS, and JavaScript. The project features a modern design with smooth animations, responsive navigation, and an interactive image gallery. The codebase emphasizes accessibility, mobile-first design, and performance optimization.

## User Preferences

Preferred communication style: Simple, everyday language.

## System Architecture

### Frontend Architecture
- **Pure JavaScript**: No frameworks or libraries, using vanilla JavaScript for all interactions
- **CSS-first Design**: Custom CSS with CSS variables for theming and responsive design
- **Progressive Enhancement**: Core functionality works without JavaScript, enhanced with interactive features
- **Mobile-first Responsive**: Designed primarily for mobile devices with desktop enhancements

### Design System
- **CSS Custom Properties**: Centralized theme variables for colors, fonts, spacing, and animations
- **Font Loading**: Custom web fonts (Aptos and EB Garamond) with fallbacks and optimized loading
- **Dark Mode Support**: Built-in dark theme with CSS variable overrides
- **Consistent Animations**: Standardized transition durations and easing functions

## Key Components

### Navigation System
- **Responsive Navigation**: Hamburger menu for mobile, full navigation for desktop
- **Dual Implementation**: Both basic (script.js) and enhanced (mobile-menu.js) versions
- **Smooth Scrolling**: In-page anchor navigation with smooth scroll behavior
- **Accessibility**: Proper ARIA labels and keyboard navigation support

### Interactive Gallery
- **Auto-advancing Slideshow**: 5-second intervals with manual navigation controls
- **Touch Support**: Swipe gestures for mobile interaction
- **Transition Management**: Smooth opacity transitions with animation state management
- **Navigation Controls**: Previous/next buttons with circular navigation

### User Experience Features
- **External Link Warnings**: Confirmation dialogs before navigating to external sites
- **Hover Effects**: Interactive text elements with color changes
- **Loading States**: Animation management to prevent interaction conflicts

## Data Flow

### Event-Driven Architecture
1. **DOM Ready**: All JavaScript initializes after DOM content loads
2. **User Interactions**: Click, touch, and scroll events trigger responsive behaviors
3. **State Management**: JavaScript objects maintain component state (menu open/closed, current slide)
4. **Visual Feedback**: CSS classes and inline styles provide immediate user feedback

### Component Lifecycle
1. **Initialization**: DOM elements are queried and event listeners attached
2. **Interaction Handling**: User actions trigger state changes and visual updates
3. **Animation Management**: Transition states prevent conflicting animations
4. **Cleanup**: Timers and event listeners are properly managed

## External Dependencies

### Fonts
- **EB Garamond**: Serif font for elegant typography
- **Aptos**: Sans-serif font for modern readability
- **Format Support**: WOFF2 and WOFF formats with font-display: swap for performance

### Assets
- **Local Font Files**: Self-hosted fonts in `/fonts/` directory
- **No External CDNs**: All assets are locally hosted for reliability and performance
- **Image Assets**: Gallery images and other media assets (structure suggests local hosting)

## Deployment Strategy

### WordPress Theme with Database Support
- **WordPress Compatibility**: Theme works with WordPress core via compatibility layer
- **PostgreSQL Database**: Available with connection variables (DATABASE_URL, PGPORT, etc.)
- **PHP Server**: Runs on PHP development server for WordPress functionality
- **Asset Management**: Images and fonts need to be added to /imgs/ and /fonts/ directories

### Performance Considerations
- **Minimal JavaScript**: Lightweight vanilla JS for fast loading
- **Optimized Fonts**: Modern font formats with swap display strategy
- **CSS Optimization**: Efficient selectors and minimal unused styles
- **Progressive Loading**: Core content loads first, enhancements layer on top

### Browser Compatibility
- **Modern JavaScript**: Uses ES6+ features (const, let, arrow functions)
- **CSS Grid/Flexbox**: Modern layout techniques
- **Graceful Degradation**: Core functionality works in older browsers
- **Touch Events**: Mobile-specific interaction support

## Current Status (August 2025)

### Completed Features
- **WordPress Compatibility Layer**: wp-config.php provides standalone functionality
- **Modern Team Interface**: Full-screen collapsible team organization bars
- **Full-Screen Design**: Three bars covering entire viewport height (1/3 each)
- **Interactive Team Cards**: Smooth expand/collapse animations between bars
- **Hover Effects**: Shadow and lift animations for better UX
- **Responsive Design**: Mobile-first approach with desktop enhancements
- **Asset Management**: Created default-avatar.svg to resolve 404 errors

### Technical Implementation
- **JavaScript Event Listeners**: Proper DOM-ready initialization for team functionality
- **CSS Full-Width**: Uses 100vw positioning to break out of container constraints
- **Color Variations**: Different red shades for each team bar (#a90230, #b91c47, #c9355c)
- **Standalone Version**: Created team-test.html for VSCode testing without WordPress dependencies

### Known Issues for VSCode Transfer
- **MIME Type Errors**: External JS files served as HTML in some local environments
- **WordPress Dependencies**: get_theme_file_uri() functions need replacement for standalone use
- **Server Configuration**: Requires proper .htaccess or server setup for JS files

### Deployment Notes
- **For WordPress**: Use page-komanda-riga.php and page-komanda-vidzeme.php with script.js
- **For Standalone**: Use team-test.html (complete self-contained solution)
- **VSCode Testing**: Copy content from team-test.html to avoid MIME type issues

### Technical Debt Notes
- **Duplicate Functionality**: Both script.js and mobile-menu.js contain similar navigation logic  
- **Version Control**: Multiple versions of files in attached_assets suggest iteration
- **Asset Management**: Need systematic approach to image and font asset organization