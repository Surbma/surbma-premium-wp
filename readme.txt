=== Surbma | Premium WP ===
Contributors: Surbma, CherryPickStudios
Donate link: https://surbma.com/donate/
Tags: genesis, widget, google analytics, google tag manager, analytics, shortcodes, share, facebook, google, twitter, pinterest, email, google calendar, google presentation, google forms, google maps
Requires at least: 5.2
Tested up to: 5.4
Stable tag: 6.3
Requires PHP: 7.0
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Useful extensions for your WordPress website.

== Description ==

WordPress is a great platform and a good basis. But it needs plugins to add functions, which is necessary for almost every website. The aim of this plugin is to add very useful extensions to your WordPress website.

**Here is a list of the current functions:**

- Extra fields: It gives a central place, where you can add your basic informations, like name, address, phone or email. Use shortcodes to add these informations to your site. If you ever need to change any of this information, you can change it in one place and all your informations will automatically update. Wow!
- Google Analytics: An easy way to use Google Analytics tracking on your website. You only need to add your UA code and everything is done automatically. You can add your Classic or your Universal Analytics code and you can set display features option, if you want.
- Google Tag Manager: The best way to manage all your 3rd party codes on your website.
- Social share buttons for posts with 5 different styles: Facebook, Twitter, LinkedIn, Pinterest, Email
- Shortcodes: A lot of useful shortcodes.

**Do you want to contribute or help improving this plugin?**

You can find it on GitHub: [https://github.com/Surbma/surbma-premium-wp](https://github.com/Surbma/surbma-premium-wp)

**You can find my other plugins and projects on GitHub:**

[https://github.com/Surbma](https://github.com/Surbma)

Please feel free to contribute, help or recommend any new features for my plugins, themes and other projects.

**Do you want to know more about me?**

Visit my webpage: [Surbma.com](https://surbma.com/)

**Do you like and use my free plugins?**

You can donate me for FREE here: [Surbma.com](https://surbma.com/donate/)

== Installation ==

1. Upload `surbma-premium-wp` folder to the `/wp-content/plugins/` directory
2. Activate the Surbma - Premium WP plugin through the 'Plugins' menu in WordPress
3. That's it. :)

== Frequently Asked Questions ==

= What is this plugin good for? =

I am managing hundreds of client websites. I use only the best and mostly premium plugins for their sites, but their are some missing functions, which are very useful for a lot of websites. This was the original reason for this plugin to born. It can add these missing functions. It means this plugin will have more and more functions in the future.

= What does Surbma mean? =

It is the reverse version of my last name. ;)

== Changelog ==

= 6.3 =

Release date: 2020-04-23

ENHANCEMENTS

- Added style parameters to pwp-youtube and pwp-vimeo shortcodes.

= 6.2 =

Release date: 2020-03-31

ENHANCEMENTS

- The [ga-link] shortcode has a new parameter to use Universal Analytics structure instead of gtag.js.

= 6.1 =

Release date: 2020-03-28

FIX

- The [pwp-social-buttons] shortcode will be displayed even if it is not in the loop. Especially useful, when it is put in Divi Theme Builder.

= 6.0 =

Release date: 2020-03-26

NEW

- Google Docs shortcode: `[google-docs]`

= 5.0 =

Release date: 2020-01-13

NEW

- Facebook Share button shortcode: `[facebook-megosztas-gomb]`

= 4.1 =

Release date: 2020-01-06

FIX

- Google Maps API key removed from code. Can be set with the SURBMA_PREMIUM_WP_GOOGLE_MAPS_API global variable in the wp-config.php file.

= 4.0 =

Release date: 2020-01-06

This release add a new Google Maps shortcode and updated to use a new way to deploy it to wp.org repo.

NEW

- Google Maps shortcode. This shortcode is using Google's embed to add places or views mode maps. Premium WP clients can use it without any API keys.
- New banner images for WP repo.

= 3.2 =

Release date: 2019-08-08

FIXES

- Missing HTML character for span elements.

= 3.1 =

Release date: 2019-07-18

ENHANCEMENTS

- Social Share Buttons CSS is loaded correctly only on pages, where buttons are enabled.

= 3.0 =

Release date: 2019-07-05

- ADD - New shortcode for social buttons, to show them, wherever you want: [pwp-social-buttons]

= 2.18 =

Release date: 2019-06-22

- FIX - Social buttons are not showing on Divi Page Builder pages or pages, that have page template selected.

= 2.17 =

- Release date: 2019-06-15
- REMOVE - Removed Genericons icon font.
- ADD - Added new svg social icons from Automattic's social-logos repository.
- CHANGE - Lot of changes in frontend css.
- REMOVE - Print button removed.
- ENHANCED - Social share buttons css is loading only on urls, where buttons are displayed.

= 2.16 =

- Removed Google+ sharing.
- Minor CSS fix.
- Tested with WordPress 5.1 version.
- Short versioning.

= 2.15.1 =

- Facebook kód frissítése.
- PHP Warning javítások.
- WordPress 4.9 kompatibilitás ellenőrizve.

= 2.15.0 =

- Admin figyelmeztetés szövegének a módosítása, hogy egyértelmű legyen, mi a teendő.
- A Google Analytics követő kód automatikus mentése a beállítások frissítésénél.

= 2.14.0 =

- Admin figyelmeztetés minden oldalon, ha csak a régi Analytics kód van megadva.
- A ga-link shortcode módosítása az új Global Site Tag Analytics kódhoz.

= 2.13.0 =

- Új Global Site Tag Analytics kód használata a Universal Analytics kód helyett.
- Előkészület a régi, hagyományos Analytics kód végleges eltávolítására.
- Analytics kód egyszerűsítése.
- Régi mezők frissítéséért felelős kód törlése.

= 2.12.0 =

- GTM body code inserted in custom action hook for "Divi Plus" and "Extra Plus" themes.
- Phone number shortcodes get phone call links.

= 2.11.1 =

- Fixed ga-link parameters.
- Added more informations for Facebook like button description.

= 2.11.0 =

- Added IP Anonymization option to Google Analytics.

= 2.10.5 =

- Added description for Google Analytics link shortcode.

= 2.10.4 =

- Fixed Facebook Page shortcode to set the tabs also.

= 2.10.3 =

- Fixed some description about shortcodes.

= 2.10.2 =

- Fixed some description about shortcodes.

= 2.10.1 =

- Fixed some PHP warnings.

= 2.10.0 =

- Added more conditions and options to Social Share Buttons.
- Added all options to Facebook Like Button shortcode.
- Fixed Facebook Page Plugin shortcode.

= 2.9.8 =

- Changed local UIkit CSS to cdnjs.com link.
- Removed UIkit library from plugin.

= 2.9.7 =

- Added description for Google Presentation and Google Forms shortcodes.
- Minor fixes in html codes and descriptions.

= 2.9.6 =

- Fixed plugins url path to get the correct path for urls.

= 2.9.5 =

- Fixed urls for domain mapped multisite websites. It is now catching the right domain for subsites.

= 2.9.4 =

- Removed deprecated functions for social widgets.

= 2.9.3 =

- Optimized Google Tag Manager code.
- Checked WordPress 4.7 compatibility.

= 2.9.2 =

- Added help section for Google Tag Manager page.
- Modified some texts and links.
- Checked WordPress 4.5 compatibility.

= 2.9.1 =

- Fixed description about the use of Google Tag Manager and Google Analytics tracking codes.

= 2.9.0 =

- Admin code optimization.
- Removed a deprecated hook for Google Analytics.
- Checked WordPress 4.4 compatibility.
- Checked PHP 7 compatibility.

= 2.8.0 =

- New shortcode for Google forms: `[google-form]`
- Added "Time spent on page" event tracking category to Google Analytics to reduce bounce rate and show more accurate reports for visitors, who actually / potentially does something on the website. There are two time values: 30 seconds, 180 seconds. For more informations about this method read the following post: [Tracking Adjusted Bounce Rate In Google Analytics](http://analytics.blogspot.hu/2012/07/tracking-adjusted-bounce-rate-in-google.html)
- New hooks for Google Analytics code.

= 2.7.0 =

- Code optimization.
- Admin style added to [Surbma - WP Control](https://wordpress.org/plugins/surbma-wp-control/) plugin.
- Minor CSS fixes.

= 2.6.0 =

- New share button styles: simple mono, simple colored, button square, button rounded, button circle.

= 2.5.1 =

- Fixed textdomain path for localization.

= 2.5.0 =

- Added YouTube and Vimeo shortcodes, that can be used in Text Widgets also.
- Code optimizations for shortcodes.
- Minor design changes on admin pages.

= 2.4.1 =

- Optimized codes for Social links.

= 2.4.0 =

- Added Facebook Page Plugin shortcode.
- Added hungarian localization files.
- Some changes in the markup of admin pages.

= 2.3.0 =

- Frontend css moved to separate css file.
- Added Genericons font icon set.
- Social share buttons are now links (not official buttons), so page load time improved a lot.
- Added more social share services: Pinterest, Email, Print
- Removed codes for Widgets.
- Major code optimization and cleanup.

= 2.2.0 =

- Minor CSS changes.
- Social Integration menu is activated to all users with the `manage_options` capability.
- Social share buttons can be displayed both before and after the post content.
- Code optimization.
- Some changes in the admin display.

= 2.1.1 =

- Preparing for localization.
- Minor code optimizations.

= 2.1.0 =

- Tested up to WordPress 4.3 version.
- Code optimization.
- Some texts are prepared for localization.
- New shortcode for links, that can be tracked in Google Analytics.

= 2.0.0 =

- First version to prepare for the official WordPress repo.
- Plugin is renamed.
- All functions are renamed regarding the new plugin name.
