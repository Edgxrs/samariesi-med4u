# VSCode Setup Instructions

## The Problem
When copying WordPress files to VSCode, you may encounter MIME type errors where JavaScript files are served as HTML instead of proper JavaScript.

## The Solution
Use the standalone HTML version that has all CSS and JavaScript embedded.

## Steps:

1. **Copy the complete team-test.html file** - this contains everything you need
2. **Replace WordPress functions** in your copied PHP files:
   - Change `get_theme_file_uri("/imgs/...")` to just `"imgs/..."`
   - Remove `<?php` tags and replace with static HTML content
3. **Create proper folder structure**:
   ```
   your-project/
   ├── imgs/
   │   └── default-avatar.svg
   ├── team-page.html (from team-test.html)
   └── style.css (extract from team-test.html if needed)
   ```

## Working JavaScript Code
The team-test.html file contains the complete working solution with:
- Full-screen team bars (1/3 viewport height each)
- Smooth expand/collapse animations
- Hover effects with shadows
- Responsive design
- Complete debugging console output

## Debugging
Open browser console to see:
- "DOM loaded, initializing team functionality"
- "Found 3 subteam headers"
- Click events logging when bars are clicked
- Expand/collapse state changes

If you don't see these logs, the JavaScript isn't loading properly.