=== Plugin Name ===
Contributors: DvanKooten
Donate link: http://dannyvankooten.com/donate/
Tags: scroll triggered box, cta, social, newsletter, call to action, mailchimp, contact form 7, social media
Requires at least: 3.5
Tested up to: 3.8.1
Stable tag: 1.1.9
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

The best non-obtrusive call-to-action: Scroll Triggered Boxes. Show social media sharing options or sign-up forms in conversion boosting boxes.

== Description ==

= Scroll Triggered Boxes =

Scroll Triggered Boxes are boxes that become visible after visitors have scrolled down far enough. 

The visitors that scroll down far enough have engaged with your content and most likely got some value out of it, making them more receptive to any offer. Also, human eyes react to movement. Having a box "appear" is a sure way to get their attention while staying relatively unobtrusive and certainly less annoying than a pop-up.

**Highly Converting Call To Actions**

This plugin is a sure way to get more visitors to take a certain action, whether this action is..

- .. subscribing to your newsletter
- .. sharing a post
- .. submitting a contact form
- .. or something entirely different, you decide!

Really anything is possible, from social media sharing options to sign-up or contact forms. The plugin is designed to work with *any* other plugin that uses shortcodes.

**Plugin Features**

- Create multiple scroll triggered boxes
- Choose when a box should display: at a certain percentage of the page height or after scrolling past a certain element (like the comments section).
- Control on which pages each box should show up to create extremely relevant boxes (uses conditonal tags)
- Choose between a fading or sliding animation
- Use anything as the box content: text, images, forms, shortcodes, etc. You decide!
- Set the number of days a box should not be shown if a visitor closes it
- Open a box right after loading a page or have it open when clicking a link or button

Have a look at the [frequently asked questions](http://wordpress.org/plugins/scroll-triggered-boxes/faq/) as well, this plugin is really flexible.

**Demo**

I'm using the plugin myself on [the website for one of my other plugins: MailChimp for WordPress](http://dannyvankooten.com/mailchimp-for-wordpress/). Scroll down to the bottom and you'll see a box slide in in the bottom right corner, asking you to sign-up to the plugin newsletter.

**Other Links**

- More information about the [Scroll Triggered Boxes plugin for WordPress](http://dannyvankooten.com/wordpress-plugins/scroll-triggered-boxes/)
- Have a look at some other [WordPress plugins](http://dannyvankooten.com/wordpress-plugins/) by [Danny van Kooten](http://dannyvankooten.com/).

== Frequently Asked Questions ==

= How to display a form in the box? =

The plugin is tested with the plugins below but will work with any plugin that uses shortcodes.

- [MailChimp for WordPress](http://wordpress.org/plugins/mailchimp-for-wp/)
- [Contact Form 7](http://wordpress.org/plugins/contact-form-7/)
- [Newsletter Sign-Up](http://wordpress.org/plugins/newsletter-sign-up/)

= How to display sharing options in the box? =

The plugin is tested with the plugins below but will work with any plugin that uses shortcodes.

- [Social Sharing By Danny](http://wordpress.org/plugins/dvk-social-sharing/)
- [Shareaholic](http://wordpress.org/plugins/shareaholic/)
- [Social Media Feather](http://wordpress.org/plugins/social-media-feather/)
- [WP Socializer](http://wordpress.org/plugins/wp-socializer/)
- [Tweet, Like, Google +1 and Share](http://wordpress.org/plugins/only-tweet-like-share-and-google-1/)

= How do I set more advanced rules for on which pages to show a box? =

You can use [conditional tags](http://codex.wordpress.org/Conditional_Tags) to set super-customized rules.

*Example: only show for posts in category 'cars'*
`
is_single() && in_category('cars')
`

*Example: show everywhere except on pages with slug 'contact' and 'checkout'
`
!is_page( array( 'contact', 'checkout') ) 
`

= Can I have a box to open after clicking a certain link or button? =

Sure, just link to the box element.

*Example (box ID is 94 in this example)*
`
<a href="#stb-94">Open Box</a>
`

= Can I have a box to open right after opening a page? =

Sure, just include `stb-` followed by the box ID in the URL.

*Example (box ID is 94 in this example)*
`
http://your-wordpress-site.com/some-page/#stb-94
`

= How to set more advanced styling rules =

If you want more advanced styling, you can use CSS to further style the boxes. Every box gets its own unique #id as well as various CSS classes.

`
#box-{id} { } /* 1 particular box */
.stb { } /* all boxes */
.stb-content { } /* the contents of the box */
.stb-close{ } /* the close button of the box */
`

= Will a box be shown on mobile devices or small screens? =

If the box width fits on the screen, the box will be shown. If the box width is larger than the screen size, the box will be automatically hidden. To disable automatic hiding of the box, add the following line to your theme its `functions.php` file.

`
add_filter('stb_auto_hide_small_screens', '__return_false');
`

= I want to disable auto-paragraphs in the box content =

All default WordPress filters are added to the `stb_content` filter hook. If you want to remove any of them, add the respectable line to your theme its `functions.php` file.

`
remove_filter( 'stb_content', 'wptexturize') ;
remove_filter( 'stb_content', 'convert_smilies' );
remove_filter( 'stb_content', 'convert_chars' );
remove_filter( 'stb_content', 'wpautop' );
remove_filter( 'stb_content', 'do_shortcode' );
remove_filter( 'stb_content', 'shortcode_unautop' );
`

== Installation ==

= Installing the plugin =

1. In your WordPress admin panel, go to *Plugins > New Plugin*, search for *Scroll Triggered Boxes* and click "Install now"
1. Alternatively, download the plugin and upload the contents of `scroll-triggered-boxes.zip` to your plugins directory, which usually is `/wp-content/plugins/`.
1. Activate the plugin. 

= Creating a Scroll Triggered Box =

1. Go to *Scroll Triggered Boxes > Add New*
1. Add some content to the box
1. (Optional) customize the appearance of the box by changing the *Appearance Settings*

= Additional Customization =

Have a look at the [frequently asked questions](http://wordpress.org/plugins/scroll-triggered-boxes/faq/) section for some examples of additional customization.

== Screenshots ==

1. A scroll triggered box with a newsletter sign-up form.
2. Another scroll triggered box, this time with social media sharing options.
3. A differently styled social triggered box.
4. Configuring and customizing your boxes is easy.

Some more screenshots can be found at the [Scroll Triggered Boxes plugin page on my website](http://dannyvankooten.com/wordpress-plugins/scroll-triggered-boxes/).

== Changelog ==


= 1.1.9 - February 7, 2014 =
* Added: option to auto-hide the box again
* Improved: direct file access security

= 1.1.8 - January 22, 2014 =
* Fixed: Setting a box width is now really optional.
* Fixed: Page height not being calculated correctly for some themes

= 1.1.7 - January 8, 2014 =
* Fixed: Issue with box showing up regardless of whether a cookie had been set
* Improved: Box rules are now deleted when post_status is anything other than "publish"

= 1.1.6 - January 6, 2014 =
* Fixed: Issue with manual conditions where some servers added slashes (to escape quotes)

= 1.1.5 - January 3, 2014 =
* Fixed: JS eror when using a trigger element.
* Added: `stb_auto_hide_small_screens` filter to disable automatically hiding the box on small screens.

= 1.1.4 - December 24, 2013 =
* Added: If page NOT is rule.
* Added: Filter for even more advanced box criteria
* Improved: JavaScript now waits for full page load

= 1.1.3 - December 20, 2013 =
* Fixed: Paragraphs when using shortcodes in the box its content.

= 1.1.2 - December 17, 2013 =
* Fixed: multiple rules not working when last rule returned false
* Fixed: JavaScript error for old WordPress verions, breaking TinyMCE editor.

= 1.1.1 - December 13, 2013 =
* Fixed: box not showing up when test mode is disabled

= 1.1 - December 13, 2013 =
* Added: test mode option to box settings
* Improved: Only published boxes will now be shown
* Improved: Added sanitizing of settings

= 1.0.6 - December 9, 2013 =
* Fixed: Box showing up on devices where it didn't fit.
* Fixed: Box cookie not working.
* Improved: Cookie check now JS only, to make it possible to open box from button.
* Improved: Minified JavaScript file.
* Improved: Settings pages now compatible with WP 3.8 styles
* Improved: Other minor CSS and JS improvements.
* Improved: Prevented search engines indexing plugin files.

= 1.0.5 - December 2, 2013 =
* Improved: Cookie check now both server + client side to work with pages from browser cache.
* Improved: Minor JavaScript and CSS improvements

= 1.0.4 - November 17, 2013 =

* Fixed: element selector input field now appears in box settings
* Fixed: script error when using element selector

= 1.0.3 - November 13, 2013 =

- Fixed: incorrect calculating of page height for some themes, which made the box show up right away
- Improved: better polling for listener to scroll event
- Added: you can now link to a box element to have it open. 

= 1.0.2 - November 12, 2013 =

- Fixed: Script now checks trigger criteria for multiple boxes at once.
- Improved: Script performance.
- Improved: All the default WordPress filters that run on posts do now run on the box content as well, meaning you can use smileys etc. in the box content. Filters are added to the `stb_content` hook, you can remove them from your theme its `functions.php` if you want.
- Added: Option to choose which animation to use: slide or fade.
- Added: Box now automatically shows when an element inside the box is referenced in the browser hash. This is especially useful for forms that do not use AJAX.
- Added: Menu icon in WP Admin

= 1.0.1 - November 11, 2013 =

- Improved: fix that removes unwanted linebreaks from shortcode output

= 1.0 - November 10, 2013 =

- Added: custom trigger points

= 1.0-beta2 - November 8, 2013 =

- Fixed: Box position bottom right is now selectable
- Fixed: Post type filter now works.
- Improved: Box settings on small screens

= 1.0-beta1 - November 6, 2013 =

- Initial release, things like settings might still change without backwards compatibility.

== Upgrade Notice ==

= 1.0.5 =
Improvement to the script to check for the (box closed) cookie as well, to work with pages from browser cache.

= 1.0.4 =
Two important bugfixes for when using an element as the trigger point.

= 1.0.3 =
Fixed incorrect calculation of page height for some themes.