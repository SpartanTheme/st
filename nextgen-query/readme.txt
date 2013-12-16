=== NextGEN Query ===
Contributors: ryan.burnette, Jonathan-Garber
Donate link: http://bit.ly/ngqDonate
Tags: NextGEN Gallery
Requires at least: 3.1
Tested up to: 3.5.1
Stable tag: 1.2.0
License: GPL2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Remove everything NextGEN Gallery adds to the header and footer. Add functions which allow developers to get NGG objects from the database.

== Description ==

NextGEN Query is a companion plugin for NextGEN Gallery. We created it so developers could utilize NGG's awesome back-end interface while removing all front-end traces of the plugin. Two simple functions are added to allow developers to query galleries and images, returning objects for custom development.

== Installation ==

# Upload the `nextgen-query` directory to the `/wp-content/plugins/` directory
# Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= How can I use this plugin to remove scripts and styles that NextGEN Gallery adds to the header? =

Install the plugin, activate it. Go to Gallery > Query then check the appropriate boxes to remove scripts and styles from the header. Click save.

= What does the ngq_query() function do? =

Use the ngq_query() function by passing it the ID or Slug of the gallery you want details for. The function will return an ngg object which can be used by a developer.

= What does the ngq_query_singlepic() function do? =

Use the ngq_query_singlepic() function by passing the ID of a single picture from an ngg gallery. You'll be back an array of that image's attributes.

= How can I control what users see the NextGEN Query options page? =

Set any capability for who can see the options page, just apply a filter to tag 'ngqOptionsPageCapability'.

== Screenshots ==

== Changelog ==

= 1.2.0 =
* Plugin now gracefully disables itself if NGG is not installed and active
* Improved documentation
* Cleaned up and organized code
* Options page now appears only if user has 'manage_options' capability
* Change which users see options page using 'ngqOptionsPageCapability' filter

= 1.1.0 =
* Added ngq_query_singlepic($image_id) function
* Tested up to WordPress 3.5.1

= 1.0.4 =
* Fixed a bug that broke a bunch of back-end functions. Yikes.

= 1.0.3 =
* Added a bunch more info to the array returned by ngq_query()

= 1.0.2 =
* Renamed public function once more to prevent function conflicts
* Function can now accept Gallery ID or Gallery Slug
* Fixed bug which prevented the shutter and thickbox sheets from being removed from the header

= 1.0.1 =

* Updated options page and documentation
* Updated interface placement
* Renamed main public function

= 1.0.0 =

* Initial release

== Upgrade Notice ==
