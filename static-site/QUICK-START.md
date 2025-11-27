# Quick Start Guide

## View the Static Site

### Option 1: Open in Browser (Simple)
Simply double-click `index.html` to open it in your default browser.

### Option 2: Local Server (Recommended)
Run a local web server for the best experience:

```bash
cd static-site
python3 -m http.server 8000
```

Then open: http://localhost:8000

### Option 3: Using PHP
```bash
cd static-site
php -S localhost:8000
```

Then open: http://localhost:8000

## File Locations

- **Homepage**: `index.html`
- **Other Pages**: `features.html`, `gallery.html`, `support.html`
- **Styles**: `css/style.css`
- **Images**: `images/` and `uploads/`
- **Documentation**: `README.md` and `CONVERSION-SUMMARY.md`

## Edit Content

1. Open any `.html` file in a text editor
2. Find the content you want to change (look in the `<div id="postcontent">` sections)
3. Make your changes
4. Save and refresh your browser

## Deploy to Web

### GitHub Pages
1. Create a new GitHub repository
2. Push the static-site folder contents
3. Enable GitHub Pages in repository settings
4. Your site will be live at `https://yourusername.github.io/repo-name`

### Netlify
1. Sign up at netlify.com
2. Drag and drop the `static-site` folder
3. Your site is live instantly!

### Traditional Hosting
1. Connect via FTP to your web host
2. Upload all files in `static-site/` to your `public_html` or `www` folder
3. Visit your domain

## Quick Customization

### Change Header Image
Replace `images/header/timelapse-header.jpg` with your own image (959x130px recommended)

### Update Navigation
Edit the `<div id="navbar">` section in each HTML file

### Change Colors
Edit `css/style.css` and search for color codes (e.g., `#0066FF`)

### Add New Page
1. Copy `index.html` to `newpage.html`
2. Update the content inside `<div id="postcontent">`
3. Add a link to it in all navigation menus

## Support

For questions about:
- **The conversion**: See `CONVERSION-SUMMARY.md`
- **Site structure**: See `README.md`
- **iTimeLapse app**: Visit http://labs.laan.com

## Current Status

✅ Static site is ready to use
✅ All pages are functional
✅ All images are in place
✅ Tested and working locally
✅ Ready for deployment

Enjoy your new static website! 🎉

