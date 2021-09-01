=== Kleinanzeigen ===
Contributors: DerN3rd
Donate link:
Tags: post types, taxonomies, custom fields, kleinanzeigen, ads, paypal, payments
Requires at least: 3.0
Tested up to: 5.0.0
Stable tag: 2.1.6

== Description ==

Add Classifieds to your blog, network or BuddyPress site. Create and manage ads,
upload images, send emails, charge your users for placing ads on your network or BuddyPress site.

== Installation ==

1. Extract the plugin archive file.
2. Upload `kleinanzeigen` folder to the `/wp-content/plugins/` directory.
3. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

== Changelog ==

= 2.0.0 =
* Front-end kleinanzeigen management added.
* Front-end kleinanzeigen management added for BuddyPress ( integrated with BP user profiles )
* Improved Admin UI.
* Internal code architecture entirely rewritten for version 2.0 all legacy code removed.
* Custom database tables eliminated. Replaced by core "wp" tables.
* Content Types submodule added.
* Localization available ( You need to generate a PO/MO file )

= 1.1.1 =
* Initial release.

== Upgrade Notice ==

= 2.0.0 =
Due to the fact that the internal architecture of the current version is completly
different from the previous one, the "v1.1.1" release is NOT backward compatible
with the "v2.0.0" release. All data gathered from previous installations of this plugin
will not be available to the "v2.0.0" release.

== Usage Guides ==

= Admin Content Types =

When you first load the Classifieds plugin, some Content Types data will be created,
meaning you will have one custom post type named "kleinanzeigen", two taxonomies
named "kleinanzeigen_tags" and "kleinanzeigen_categories" and two custom fields named
"Duration" and "Cost". Each type comes with all the necessary settings.

You can extend the functionality of your post type "kleinanzeigen" by going to
[Content Types]->[Post Types] and click on the post type title or on the [Edit] link
below it. You will be able to extend your "kleinanzeigen" custom post type from there,
( you will find more information for each of the options on the Edit screen ).

You can add new taxonomy or edit the existing ones by going to [Content Types]->[Taxonomies].
You can click on the titles of "kleinanzeigen_tags" and "kleinanzeigen_categories" or on the [Edit]
links below to edit the taxonomies ( you will find more information for each of the options on the Edit screen ).

You can add new custom field or edit the existing ones by going to [Content Types]->[Custom Fields].
You can click on the titles of "Duration" and "Cost" or on the [Edit]
links below to edit the custom fields ( you will find more information for each of the options on the Edit screen ).

= Admin Settings =

- General -

When you first load the Classifieds plugin, there will be some initial data that
you will have to provide to ensure proper operation of the plugin. Go to
[Settings]->[General]->[Credits] and insert the required data
( you will find more information for each of the options on the options screen )

You will also have to provide general information about the Checkout process. Go to
[Settings]->[General]->[Checkout]. You will find an options screen where you can
insert your business details. This information will be displayed
under the front-end page [yourdomain.com][(if)blog-subdomain][checkout].

- Payments -

The current version integrates the PayPal Express payment gateway. You will have
to set your API Credentials under [Settings]->[Payments]->[PayPal Express] 
( you will find more information for each of the options on the options screen ) .

= Admin Credits =

Under [Credits] Classifieds admin menu you will find a log page where you can
see your current credits balance and basic credits purchasing log. You will also find
a button [Purchase] which will redirect you to the front checkout screen so you can
buy credits or make a subscription.

= Admin Dashboard =

From the admin dashboard you will see all the available kleinanzeigen that you have.
There is a [Create New Ad] button which will redirect you to the [Add New Classified]
admin screen ( more on which in the =  = section ).

On the admin dashboard you will also find quick access to
[Edit Ad]/[End/Renew Ad][Delete Ad] actions. And info about each ad e.g. "Expiration Date"

= Front End Classifieds Managment =

Under [yourdomain.com]/[kleinanzeigen]/[my-kleinanzeigen] you will find a front-end
UI for managing your kleinanzeigen. You can view your available credits, you can
[Edit Ad]/[End/Renew Ad][Delete Ad].

= Display =

Under [yourdomain.com]/[kleinanzeigen] you will find list of all kleinanzeigen published
on the site. When you click on the author links you will get all kleinanzeigen from
that author. When you click on a category/tax custom taxonomy term, you will see all
kleinanzeigen with that term.
