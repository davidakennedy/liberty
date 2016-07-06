=== Liberty ===

Contributors: automattic
Tags: light, black, white, right-sidebar, two-columns, custom-background, custom-colors, custom-menu, custom-header, editor-style, full-width-template, responsive-layout, accessibility-ready
Requires at least: 4.0
Tested up to: 4.2.2
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


== Description ==

A stylish, classic look for your personal blog or longform writing site. The main navigation bar stays fixed to the top while your visitors read, keeping your most important content at hand, while three footer widget areas give your secondary content a comfortable home.


== Installation ==
	
1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Frequently Asked Questions ==

= Does this theme support any plugins? =

Libre includes support for Infinite Scroll and Site Logos in Jetpack.

= Does this theme support widgets? =

Yes, a sidebar on single posts and pages, and three widget areas in the site footer throughout. Configure under Customize -> Widgets.

= Does this theme support custom menus? =

Yes, a main navigation area appears in the header, and "floats" over your content as you scroll, keeping your most important content at hand.

= Does this theme have any page templates? =

Libre has two page templates for displaying your content in an alternate format. View them in action on the demo site: http://libredemo.wordpress.com

* The Full Width, No Sidebar template is a wide page template, giving your content plenty of space to spread out.
* The Right Content, No Sidebar template mimics the look of the blog, with the page title on the left and the content on the right.

= Does this theme have any special features? =

Libre includes styles for introductory text and pull quotes. See how these work on the demo site: https://libredemo.wordpress.com/text-formatting/

Quick Specs (all measurements in pixels)
* The main column width is 739, except on the full-width page template, where it's 1088.
* The main sidebar width is 272.
* The footer widget areas vary in size depending on the number of active areas.
* The site logo appears at a maximum width of 150 and height of 50 in the floating header, and a maximum width of 300 and height of 300 elsewhere.

== Changelog ==

= 14 June 2016 =
* Make sure we're only targeting the first level of span tags in entry meta and footer areas.

= 12 May 2016 =
* Add new classic-menu tag.

= 5 May 2016 =
* Move annotations into the `inc` directory.

= 4 May 2016 =
* Move existing annotations into their respective theme directories.

= 10 August 2015 =
* Make sure content doesn't break when long words are being used

= 2 July 2015 =
* Add photo credit to readme
* Remove errant POT file
* Add readme in preparation for submission to .org

= 1 July 2015 =
* Fix for archives and categories widgets styles where dotted line between post count and link was not appearing
* Add new screenshot

= 30 June 2015 =
* Make sure site header matches site width when using a custom background
* Increase max width of .site when custom background is active
* Fix for site content padding when sticky header is active
* Additional improvements to layout when custom background images are activ
* Ending comments for some DIVs were missing; improve styles for users who want to apply a background image
* Increase space between related posts
* Pipe test fix for widgets
* Accessibility fixes, adding focus and active styles to sharing buttons; adjusting headings arrangement across templates; add aria-hidden attribute to meta nav; add POT file; fix placement of skip to content link
* Add focus and active styles to all hover styles

= 29 June 2015 =
* Add a description
* Add -wpcom to version number, correct Theme URI
* Add RTL styles
* Smoother transition on site logo for floating menu
* Make sure .sticking styles only apply to larger screens where the menu floats
* Improvements to logo sizes on mobile

= 26 June 2015 =
* Improvements to WP.com-specific styles to work around !importants for sharing links and custom colors
* Style checkbox notifications in comment form for self-hosted users
* Style form fields for comments area for self-hosted users
* Improvements to menu/submenu styles
* Adjust styles for image captions to better match the theme; adjust position and size of gravatars next to comments

= 25 June 2015 =
* Add tags to style.css
* Simplify border styles for easier color annotations
* Fix for Older Posts button to avoid shifting on hover
* Tweaks to avoid shifting when borders on form fields and buttons are changed on hover/focus
* Add page template to display page styled like blog index/archives; remove unused layouts folder and styles; change placement of edit link on pages depending on page template
* Adjust font sizes for accuracy; original REM calculations were off
* Convert to use REMs for font sizes
* Add editor styles; re-add 1rem to body font size to make sure ems work properly
* Remove REM font sizing, just using pixels for now; add bottom margin to entry titles/h1s
* Remove widont filter from post titles on the blog index/archives since they're displayed in a narrow column
* Small text styling to better match theme
* Style PRE tags to work better for poetry/writing that requires preserved whitespace
* Adjust full-width page title; tweak for Leave a reply headline on WP.com; style full-width page template and adjust content width
* Additional spacing improvements for submenus on multiple screen sizes
* Improvements to navigation drop-downs
* Workingon main navigation dropdowns; add full-width page template; styles for WP.com sharing/audio/slideshow to better match theme; load WP.com styles latest to override WP.com styles by calling in wp_head; load Google Fonts over https
* Delete unused readme; more styles for related posts
* Improvements to main navigation styles; improvements to line height on mobile devices

= 24 June 2015 =
* Workingon styles for menus/submenus
* Styling for Jetpack Related Posts
* Add bottom margins to widgets, style social links widget
* Improvements to styles for long site title/description combination
* Better styling for infinite handle on mobile, add margins to site footer
* Add correct $themecolors, add WP.com-specific styles
* Tweaks to main navigation submenus and site title line height
* Initial commit to pub

== Credits ==

* Photo in the screenshot is from unsplash.com, licensed CC0
* Based on Underscores http://underscores.me/, (C) 2012-2015 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* normalize.css http://necolas.github.io/normalize.css/, (C) 2012-2015 Nicolas Gallagher and Jonathan Neal, [MIT](http://opensource.org/licenses/MIT)
