=== Presentation Lite ===

Created by Sean Davis: http://seandavis.co/
Full version: http://buildwpyourself.com/downloads/presentation/
Theme demo: http://demo.sdavismedia.com/presentation-lite/

License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html



== Description ==

A clean and simple theme designed with minimal distractions to make your content the most important element on any given page.



== Installation ==

1. Upload `presentation-lite` to the `/wp-content/themes/` directory
2. Activate the theme through the 'Themes' menu in WordPress
3. Use the Theme Customizer settings under "Appearance -> Customize" to adjust Presentation Lite's settings



== Frequently Asked Questions ==

= Does this theme support child themes? =

Certainly! Here's exactly what you need to do.

1. Through FTP, navigate to `your_website/wp-content/themes/` and in that directory, create a new folder as the name of your child theme. Something like `presentation-lite-child` is perfectly fine.

2. Inside of your new folder, create a file called `style.css` (the name is NOT optional).

3. Inside of your new `style.css` file, add the following CSS:

. . . . . . . . . . copy what's below . . . . . . . . . . . .


/*
	Theme Name: your_child_theme_name
	Author: your_name
	Author URI:
	Description: Child theme for Presentation Lite
	Template: presentation-lite
*/

@import url("../presentation-lite/style.css");

/*--------------------------------------------------------------
Theme customization starts here
--------------------------------------------------------------*/


. . . . . . . . . . copy what's above . . . . . . . . . . . .

4. You may edit all of what you pasted EXCEPT for the `Template` line as well as the `@import` line. Leave those two lines alone or the child theme will not work properly.

5. With your new child theme folder in place and the above CSS pasted inside of your `style.css` file, go back to your WordPress dashboard and navigate to "Appearance -> Themes" and locate your new theme (you'll see the name you chose). Activate your theme.

6. With your child theme activated, you can edit its stylesheet all you like. You may also create a `functions.php` file in the root of your child theme to add custom PHP.

7. Enjoy!

= Can I override template files? =

Yup. Any of the template files in the root of Presentation Lite can be copied to the root of your child theme (see above) and WordPress will use the child theme's file's instead. This also applies to template files inside of the `content` folder.



== Changelog ==

= 1.0.6 =
* Fixed: incorrect textdomain (again)
* Tweak: updated language files after textdomain fix (again)

= 1.0.5 =
* Added: theme support for title-tag (since WP 4.4)
* Added: sanitization for the customizer logo uploader
* Removed: outdated theme tags
* Fixed: PHP notices in theme customizer
* Fixed: incorrect textdomain
* Tweak: site title and theme heading line-height
* Tweak: updated language files after textdomain fix

= 1.0.4 =
* Tweak: Improved translation strings
* Tweak: Updated language files

= 1.0.3 =
* Added: custom menu fallback for both theme menus
* Tweak: adjusted admin page CSS file loading method

= 1.0.2 =
* Added: comments support for standard WordPress pages
* Added: admin page

= 1.0.1 =
* Added: license.txt file
* Added: theme and additional resource copyright
* Added: theme customizer option sanitization
* Removed: show comments on Pages option
* Tweaked: nav menu register functions combined
* Tweaked: social profile links placed in custom function and hooked in place
* Tweaked: $content_width setting to 690px
* Fixed: unescaped values throughout theme files
* Fixed: inaccurate text domain

= 1.0.0 =
* first stable version