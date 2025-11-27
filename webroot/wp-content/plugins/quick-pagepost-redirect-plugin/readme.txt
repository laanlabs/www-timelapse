=== Quick Page/Post Redirect ===
Contributors: Don Fischer
Donate link: http://fischercreativemedia.com/
Tags: redirect, 301, 302, meta, post, plugin, page, forward, re-direct, wpmu, WordPress MU
Requires at least: 2.5
Tested up to: 2.8.4
Stable tag: 1.7

Redirect Pages/Posts to another page/post or external URL. Adds edit box to admin edit so user can specify the redirect Location and type.

== Description ==

Quick Page/Post Redirect Plugin redirects WordPress Pages or Posts to another location quickly.
It adds an option box to the edit section where you can specify the redirect location and type of redirect that you want, temporary, permanent, or meta. 

The redirect Location can be to another WordPress page/post or any other website with an external URL. It allows the use of a full URL path, the post or page ID, permalink or page-name.

PLEASE NOTE: At this time, the a new page or post needs to be Published in order for the redirect to happen. It WILL work on a DRAFT Status Post/Page ONLY, and I mean ONLY, if the Post/Page has FIRST been Published and the re-saved as a Draft - WordPress does not set up the post meta for the permalink until after first publish for some reason - will hopefully fix this in the future. 

This plugin is also not compatible with WordPress versions less than 2.5.

Tested in MU 2.8.4a (9/8/2009)

TROUBLESHOOTING:
If your page or post is not redirecting, this is most likely because something else like the theme functions file or another plugin is outputting the header BEFORE the plugin can perform the redirect. This can be tested by turning off all plugins except the Quick Page/Post Redirect Plugin and testing if the redirect works. 9 out of 10 times, a plugin or bad code is the culprit.
We have tested the plugin in dozens of themes and alongside a whole lot more plugins. In our experience, (with exception to a few bugs) most of the time another plugin is the problem. If you do notice a problem, please let us know at plugins@fischercreativemedia.com - along with the WP version, theme you are using and plugins you have installed - and we will try to troubleshoot the problem. 

== Installation ==

= If you downloaded this plugin: =
* Upload `quick_page_post_redirect` folder to the `/wp-content/plugins/` directory
* Activate the plugin through the 'Plugins' menu in WordPress
* Once Activated, you can add a redirect by entering the correct information in the `Quick Page/Post Redirect` box in the edit section of a page or post

= If you install this plugin through WordPress 2.8+ plugin search interface: =
* Click Install `Quick Page/Post Redirect Plugin`
* Activate the plugin through the 'Plugins' menu in WordPress
* Once Activated, you can add a redirect by entering the correct information in the `Quick Page/Post Redirect` box in the edit section of a page or post

== Frequently Asked Questions ==

= Why is my Page/Post not redirecting? =
If your page or post is not redirecting, this is most likely because something else like the theme functions file or another plugin is outputting the header BEFORE the plugin can perform the redirect. This can be tested by turning off all plugins except the Quick Page/Post Redirect Plugin and testing if the redirect works. 9 out of 10 times, a plugin or bad code is the culprit. 

We have tested the plugin in dozens of themes and a whole lot more plugins. In our experience, (with exception to a few bugs) most of the time another plugin is the problem. If you do notice a problem, please let us know at plugins@fischercreativemedia.com - along with the WP version, theme you are using and plugins you have installed - and we will try to troubleshoot the problem. 

= Does the Page/Post need to be Published to redirect? =
YES... and NO... The redirect will always work on a Published Post/Page. For it to work correctly on a Post/Page in DRAFT status, you need to fist publish the page, then re-save it as a draft. If you don't follow that step, you will get a 404 error. 

= Can I do a permanent 301 Redirect? =

Yes. You can perform a 301 Permanent Redirect. Additionally, you can select a 302 Temporary or a 307 Temporary redirect or a Meta redirect. 

= What the heck is a 301 or 302 redirect anyway?  =

Good question! THe number corresponds with the header code that is returned to the browser when the page is first accessed. A good page, meaning something was found, returns a 200 status code and that tells the browser to go ahead and keep loading the content for the page. If nothing is found a 404 error is returned (and we have ALL seen these - usually it is a bad link or a page was moved). There are many other types of codes, but those ore the most common. 

The 300+ range of codes in the header, tells the browser (and search engine spider) that the original page has moved to a new location - this can be just a new file name a new folder or a completely different site.

A 301 code means that you want to tell the browser (or Google, bing, etc.) that your new page has permanently moved to a new location. This is great for search engines because it lets them know that there was a page there once, but now go to the new place to get it - and they update there old link to is so future visitors will not have to go through the same process.

A 302 or 307 code tell the browser that the file was there but TEMPORARILY it can be found at a new location. This will tell the search engines to KEEP the old link in place becasue SOME day it will be back at the same old link. There is only a slight difference between a 302 and a 307 status. Truth is, 302 is more widely used, so unless you know why you need a 307, stick with a 302.

= So, which one do I use? =

Easiest way to decide is this: If you want the page to permanetnly change to a new spot, use 301. If you are editing the page or post and only want it to be down for a few hours, minutes, days or weeks and plan on putting it back with the same link as before, then us 302. If you want to hide the reponse code from the spiders, use the `no code` option, and if you are having trouble with the redirects, use a `meta` redirect. The meta redirect actuall starts to load the page as a 200 good status, then redirects using a meta redirect tag. 

Still not sure? Try 302 for now - at least until you have a little time to read up on the subject.

= Should I use a full URL with http:// or https:// ? =

Yes, you can, but you do not always need to. If you are redirecting to an external URL, then yes. If you are just redirecting to another page or post on your site, then no, it is not needed. When in doubt, use the entire URL.


== Screenshots ==

1. Sample admin Post/Page edit box screenshot.


== Changelog ==
= 1.6.1 =
* Small fix to correct the same problem as 1.6 for Category and Archive pages (9/1/2009) 
= 1.6 =
* Fixed wrongfull redirect when the first blog post on home page (main blog page) has a redirect set up - this was redirecting the entire page incorrectly. This was only an issue with the first post on a page. (9/1/2009)
= 1.5 =
* Major re-Write of the plugin core function to hook WP at a later time to take advantage of the POST function - no sense re-creating the wheel. 
* Removed the 'no code' redirect, as it turns out, many browsers will not redirect properly without a code - sorry guys.
* Can have page/post as draft and still redirect - but ONLY after the post/page has first been published and then re-saved as draft (this will hopefully be a fix for a later version). (8/31/2009)
= 1.4 =
* Add exit script command after header redirect function - needed on some servers and browsers. (8/19/2009)
= 1.3 = 
* Add Meta Re-fresh option (7/26/2009)
= 1.2 = 
* Add easy Post/Page Edit Box (7/25/2009)
= 1.1 = 
* Fix redirect for off site links (7/7/2009)
= 1.0 = 
* Initial Plugin creation (7/1/2009)