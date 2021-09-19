=== Kleinanzeigen ===
Contributors: DerN3rd (WMS N@W)
Donate link: https://n3rds.work/spendenaktionen/unterstuetze-unsere-psource-free-werke/
Tags: post types, taxonomies, custom fields, kleinanzeigen, ads, paypal, payments
Requires at least: 3.0
Tested up to: 5.8.0
Stable tag: 2.4.3

== Description ==

Füge Kleinanzeigen zu Deinem Blog, Netzwerk oder Deiner BuddyPress-Seite hinzu. Anzeigen erstellen und verwalten.
Lade Bilder hoch, sende E-Mails, berechne Deinen Benutzern das Platzieren von Anzeigen in Deinem Netzwerk oder auf der BuddyPress-Seite.

Kleinanzeigen bieten Benutzern die Möglichkeit, Waren auf Deiner WordPress-Seite zu kaufen und zu verkaufen.
Verwandel Deine Webseite mit Kleinanzeigenfunktionen oder erstelle einfach eine eigenständige Seite. 
Verwandel Deine Webseite oder Dein Netzwerk schnell und einfach in das nächste eBay oder Willhaben.

=== Verdiene Geld mit Deiner Webseite ===

Benutzer können Anzeigen erstellen und verwalten, Bilder hochladen, E-Mails zu ihren Angeboten erhalten und Guthaben kaufen.

Kleinanzeigen ist vollständig Multisite- und BuddyPress-kompatibel, was bedeutet, dass Du ein ganzes Netzwerk lokalisierter Kleinanzeigenseiten erstellen kannst, ähnlich wie Craigslist.

Du kannst auch das Guthabensystem aktivieren und Nutzern für die Platzierung von Anzeigen auf Deiner Webseite Gebühren in Rechnung stellen. 
Dank der vollständigen PayPal-Integration des Plugins legst Du die Preise fest und verdienst Geld für jede auf Deiner Webseite veröffentlichten Anzeige.

=== Die Power von PS CustomPress ===

Kleinanzeigen verwendet einen benutzerdefinierten Beitragstyp, der mit PS CustomPress erstellt wurde. Die Verwendung von PS CustomPress ist keine Voraussetzung für die Verwendung von Kleinanzeigen. 
Es bietet nur einige zusätzliche Funktionen, mit denen Du benutzerdefinierte Felder für Deine Einträge erstellen und den benutzerdefinierten Posttyp für Kleinanzeigen anpassen kannst.

[POWERED BY PSOURCE](https://n3rds.work/psource_kategorien/psource-plugins/)

=== Hilfe und Support ===

[Projektseite](https://n3rds.work/piestingtal_source/kleinanzeigen-plugin/)
[Handbuch](https://n3rds.work/docs/kleinanzeigen-handbuch/)
[Supportforum](https://n3rds.work/forums/forum/psource-support-foren/kleinanzeigen-plugin-supportforum/)
[GitHub](https://github.com/piestingtal-source/kleinanzeigen)

== Mehr PSOURCE ==

Erweitere die Möglichkeiten von Kleinanzeigen mit kompatiblen PSOURCE Plugins und Themes

== Hilf uns ==

Viele, viele Kaffees konsumieren wir während wir an unseren Plugins und Themes arbeiten.
Wie wärs? Möchtest Du uns mit einer Kaffee-Spende bei der Arbeit an unseren Plugins unterstützen?

=== Unterstütze uns ===

Mach eine [Spende per Überweisung oder PayPal](https://n3rds.work/spendenaktionen/unterstuetze-unsere-psource-free-werke/) wir Danken Dir!

[POWERED BY PSOURCE](https://n3rds.work/psource_kategorien/psource-plugins/)

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
