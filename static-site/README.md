# iTimeLapse Static Site

This is a static HTML version of the iTimeLapse WordPress website, converted to remove all PHP/WordPress dependencies.

## Overview

This static site was converted from the original WordPress installation and maintains the original Skinbu theme design. All content is now in plain HTML files that can be hosted on any web server without requiring a database or PHP.

## Structure

```
static-site/
├── index.html          # Homepage
├── features.html       # Features page
├── gallery.html        # Gallery page
├── support.html        # Support & FAQ page
├── css/
│   └── style.css       # Main stylesheet (Skinbu theme)
├── images/             # Theme images and icons
│   └── header/         # Header images (logo, app store badge)
└── uploads/            # User-uploaded media files
    └── 2009/
        ├── 09/         # September 2009 uploads
        └── 11/         # November 2009 uploads
```

## Features

- **Fully Static**: No server-side processing required
- **Original Design**: Maintains the Skinbu theme look and feel
- **Responsive Navigation**: Easy-to-use menu system
- **SEO Friendly**: Clean HTML structure with proper meta tags
- **Fast Loading**: No database queries or PHP processing

## Hosting

You can host this static site on any web server or static hosting service:

- **Local Development**: Simply open `index.html` in a web browser
- **Apache/Nginx**: Upload to any traditional web server
- **GitHub Pages**: Host for free on GitHub
- **Netlify/Vercel**: Deploy with a single command
- **AWS S3**: Use as a static website host
- **Any CDN**: CloudFlare, Fastly, etc.

## Local Testing

To test the site locally, you can use Python's built-in HTTP server:

```bash
cd static-site
python3 -m http.server 8000
```

Then open your browser to `http://localhost:8000`

## Pages

1. **Home (index.html)**: Introduction to iTimeLapse with key features
2. **Features (features.html)**: Detailed feature descriptions
3. **Gallery (gallery.html)**: Example images and user creations
4. **Support (support.html)**: FAQ and support information

## Customization

To customize the site:

1. **Content**: Edit the HTML files directly
2. **Styling**: Modify `css/style.css`
3. **Images**: Replace files in `images/` and `uploads/` directories
4. **Navigation**: Update the menu in each HTML file's navbar section

## Credits

- **Theme**: Skinbu by Alberto Ziveri (http://www.skimbu.it)
- **Application**: iTimeLapse by Laan Labs
- **Conversion**: WordPress to Static HTML

## License

The Skinbu theme is released under the GPL license. See the original theme documentation for more details.

## Notes

- All WordPress PHP functions have been replaced with static HTML
- Dynamic features (comments, search) are non-functional in this static version
- The search form can be connected to a service like Google Custom Search if needed
- Original WordPress database content was not migrated; sample content was created instead

## Migration Details

This site was converted from:
- **Original**: WordPress 2.8+ installation
- **Theme**: Skinbu v1.0.3
- **Database**: MySQL (not included in static version)
- **Converted**: November 27, 2025

All images and assets from the original WordPress installation have been preserved and relocated to appropriate directories in the static structure.

