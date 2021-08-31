<?php if (!defined('ABSPATH')) die('Kein direkter Zugriff erlaubt!'); ?>

<div class="wrap">

	<?php $this->render_admin( 'navigation', array( 'page' => 'classifieds_settings', 'tab' => 'shortcodes' ) ); ?>
	<?php $this->render_admin( 'message' ); ?>

	<h1><?php _e( 'Kleinanzeigen Shortcodes', $this->text_domain ); ?></h1>

	<div class="postbox">
		<h3 class='hndle'><span><?php _e( 'Kleinanzeigen Shortcodes', $this->text_domain ) ?></span></h3>
		<div class="inside">
			<p>
				<?php _e( 'Shortcodes ermöglichen es Dir, dynamische Kleinanzeigen-Inhalte in Beiträge und Seiten auf Deiner Webseite einzubinden. Gib sie einfach ein oder füge sie dort in Deinen Beitrag oder Seiteninhalt ein, wo sie angezeigt werden sollen. Optionale Attribute können in einem Format wie <em>[shortcode attr1="value" attr2="value"]</em> hinzugefügt werden.', $this->text_domain ) ?>
			</p>
			<p>
				<?php _e( 'Attribute: ("|" bedeutet, das eine ODER das andere zu verwenden. Beispiel: style="grid" oder style="list" nicht style="grid | list")', $this->text_domain); ?>
				<br /><?php _e( 'text = <em>Text, der auf einer Schaltfläche angezeigt werden soll</em>', $this->text_domain ) ?>
				<br /><?php _e( 'view = <em>Ob die Schaltfläche sichtbar ist, wenn Du angemeldet (loggedin), abgemeldet (loggedout) oder beides (both) bist</em>', $this->text_domain ) ?>
				<br /><?php _e( 'redirect = <em>Auf der Schaltfläche Abmelden, welche Seite nach dem Abmelden aufgerufen werden soll</em>', $this->text_domain ) ?>
				<br /><?php _e( 'ccats = <em>Eine durch Kommas getrennte Liste von angezeigten Kleinanzeigen-Kategorien-IDs (classifieds_categories)</em>', $this->text_domain ) ?>
			</p>
			<table class="form-table">
				<tr>
					<th scope="row"><?php _e( 'Liste der Kategorien:', $this->text_domain ) ?></th>
					<td>
						<code><strong>[cf_list_categories style="grid | list" ccats="1,2,3" ]</strong></code>
						<br /><span class="description"><?php _e( 'Zeigt eine Liste der Kategorien von Kleinanzeigen an.', $this->text_domain ) ?></span>
					</td>
				</tr>
				<tr>
					<th scope="row"><?php _e( 'Kleinanzeigen-Schaltfläche:', $this->text_domain ) ?></th>
					<td>
						<code><strong>[cf_classifieds_btn text="<?php _e('Kleinanzeigen', $this->text_domain);?>" view="loggedin | loggedout | both"]</strong></code> or
						<br /><code><strong>[cf_classifieds_btn view="loggedin | loggedout | both"]&lt;img src="<?php _e('someimage.jpg', $this->text_domain); ?>" /&gt;<?php _e('Kleinanzeigen', $this->text_domain);?>[/cf_classifieds_btn]</strong></code>
						<br /><span class="description"><?php _e( 'Links zur Seite mit der Kleinanzeigenliste. Erzeugt eine Schaltfläche (&lt;button&gt; &lt;/button&gt;) mit den Inhalten, die Du definierst.', $this->text_domain ) ?></span>
					</td>
				</tr>
				<tr>
					<th scope="row"><?php _e( 'Schaltfläche "Meine Kleinanzeigen":', $this->text_domain ) ?></th>
					<td>
						<code><strong>[cf_my_classifieds_btn text="<?php _e('Meine Kleinanzeigen', $this->text_domain);?>" view="loggedin | loggedout | both"]</strong></code> or
						<br /><code><strong>[cf_my_classifieds_btn view="loggedin | loggedout | both"]&lt;img src="<?php _e('someimage.jpg', $this->text_domain); ?>" /&gt;<?php _e('Meine Kleinanzeigen', $this->text_domain);?>[/cf_my_classifieds_btn]</strong></code>
						<br /><span class="description"><?php _e( 'Links zur Seite „Meine Kleinanzeigen“. Erzeugt eine Schaltfläche (&lt;button&gt; &lt;/button&gt;) mit den Inhalten, die Du definierst.', $this->text_domain ) ?></span>
					</td>
				</tr>
				<tr>
					<th scope="row"><?php _e( 'Schaltfläche "Mein Kleinanzeigen Guthaben":', $this->text_domain ) ?></th>
					<td>
						<code><strong>[cf_my_credits_btn text="<?php _e('Mein Kleinanzeigen Guthaben', $this->text_domain);?>" view="loggedin | loggedout | both"]</strong></code> or
						<br /><code><strong>[cf_my_credits_btn view="loggedin | loggedout | both"]&lt;img src="<?php _e('someimage.jpg', $this->text_domain); ?>" /&gt;<?php _e('Mein Kleinanzeigen Guthaben', $this->text_domain);?>[/cf_my_credits_btn]</strong></code>
						<br /><span class="description"><?php _e( 'Links zur Guthabenmanagement-Seite für Kleinanzeigen. Erzeugt eine Schaltfläche (&lt;button&gt; &lt;/button&gt;) mit den Inhalten, die Du definierst.', $this->text_domain ) ?></span>
					</td>
				</tr>
				<tr>
					<th scope="row"><?php _e( 'Kleinanzeigen Checkout-Button:', $this->text_domain ) ?></th>
					<td>
						<code><strong>[cf_checkout_btn text="<?php _e('Checkout', $this->text_domain);?>" view="loggedin | loggedout | both"]</strong></code> or
						<br /><code><strong>[cf_checkout_btn view="loggedin | loggedout | both"]&lt;img src="<?php _e('someimage.jpg', $this->text_domain); ?>" /&gt;<?php _e('Anmelden', $this->text_domain);?>[/cf_checkout_btn]</strong></code>
						<br /><span class="description"><?php _e( 'Links zur Kleinanzeigen Checkout-Seite. Erzeugt eine Schaltfläche (&lt;button&gt; &lt;/button&gt;) mit den Inhalten, die Du definierst.', $this->text_domain ) ?></span>
					</td>
				</tr>
				<tr>
					<th scope="row"><?php _e( 'Neue Kleinanzeige Schaltfläche:', $this->text_domain ) ?></th>
					<td>
						<code><strong>[cf_add_classified_btn text="<?php _e('Kleinanzeige erstellen', $this->text_domain);?>" view="loggedin | loggedout | both"]</strong></code> or
						<br /><code><strong>[cf_add_classified_btn view="loggedin | loggedout | both"]&lt;img src="<?php _e('someimage.jpg', $this->text_domain); ?>" /&gt;<?php _e('Kleinanzeige erstellen', $this->text_domain);?>[/cf_add_classified_btn]</strong></code>
						<br /><span class="description"><?php _e( 'Links zur Seite Kleinanzeigen hinzufügen. Erzeugt eine Schaltfläche (&lt;button&gt; &lt;/button&gt;) mit den Inhalten, die Du definierst.', $this->text_domain ) ?></span>
					</td>
				</tr>
				<tr>
					<th scope="row"><?php _e( 'Kleinanzeige bearbeiten Schaltfläche:', $this->text_domain ) ?></th>
					<td>
						<code><strong>[cf_edit_classified_btn text="<?php _e('Kleinanzeige bearbeiten', $this->text_domain);?>" post="post_id" view="loggedin | loggedout | both"]</strong></code> or
						<br /><code><strong>[cf_edit_classified_btn post="post_id" view="loggedin | loggedout | both"]&lt;img src="<?php _e('someimage.jpg', $this->text_domain); ?>" /&gt;<?php _e('Kleinanzeige bearbeiten', $this->text_domain);?>[/cf_edit_classified_btn]</strong></code>
						<br /><span class="description"><?php _e( 'Links zur Seite Kleinanzeigen bearbeiten. Erzeugt eine Schaltfläche (&lt;button&gt; &lt;/button&gt;) mit den Inhalten, die Du definierst.', $this->text_domain ) ?></span>
					</td>
				</tr>
				<tr>
					<th scope="row"><?php _e( 'Profil-Schaltfläche:', $this->text_domain ) ?></th>
					<td>
						<code><strong>[cf_profile_btn text="<?php _e('Gehe zu Profil', $this->text_domain);?>" view="loggedin | loggedout | both"]</strong></code> or
						<br /><code><strong>[cf_profile_btn view="loggedin | loggedout | both"]&lt;img src="<?php _e('someimage.jpg', $this->text_domain); ?>" /&gt;<?php _e('Gehe zu Profil', $this->text_domain);?>[/cf_profile_btn]</strong></code>
						<br /><span class="description"><?php _e( 'Links zur Profilseite. Erzeugt eine Schaltfläche (&lt;button&gt; &lt;/button&gt;) mit den Inhalten, die Du definierst.', $this->text_domain ) ?></span>
					</td>
				</tr>
				<tr>
					<th scope="row"><?php _e( 'Anmeldeschaltfläche:', $this->text_domain ) ?></th>
					<td>
						<code><strong>[cf_signin_btn text="<?php _e('Einloggen', $this->text_domain);?>" view="loggedin | loggedout | both"]</strong></code> or
						<br /><code><strong>[cf_signin_btn view="loggedin | loggedout | both"]&lt;img src="<?php _e('someimage.jpg', $this->text_domain); ?>" /&gt;<?php _e('Einloggen', $this->text_domain);?>[/cf_signin_btn]</strong></code>
						<br /><span class="description"><?php _e( 'Links zur Anmeldeseite. Erzeugt eine Schaltfläche (&lt;button&gt; &lt;/button&gt;) mit den Inhalten, die Du definierst.', $this->text_domain ) ?></span>
					</td>
				</tr>
				<tr>
					<th scope="row"><?php _e( 'Checkout-Button:', $this->text_domain ) ?></th>
					<td>
						<code><strong>[cf_checkout_btn text="<?php _e('Checkout', $this->text_domain);?>" view="loggedin | loggedout | both"]</strong></code> or
						<br /><code><strong>[cf_checkout_btn view="loggedin | loggedout | both"]&lt;img src="<?php _e('someimage.jpg', $this->text_domain); ?>" /&gt;<?php _e('Checkout', $this->text_domain);?>[/cf_checkout_btn]</strong></code>
						<br /><span class="description"><?php _e( 'Links zur Checkout-Seite. Erzeugt eine Schaltfläche (&lt;button&gt; &lt;/button&gt;) mit den Inhalten, die Du definierst.', $this->text_domain ) ?></span>
					</td>
				</tr>
				<tr>
					<th scope="row"><?php _e( 'Abmelden-Schaltfläche:', $this->text_domain ) ?></th>
					<td>
						<code><strong>[cf_logout_btn text="<?php _e('Abmelden', $this->text_domain);?>"  view="loggedin | loggedout | both" redirect="http://someurl"]</strong></code> or
						<br /><code><strong>[cf_logout_btn  view="loggedin | loggedout | always" redirect="http://someurl"]&lt;img src="<?php _e('someimage.jpg', $this->text_domain); ?>" /&gt;<?php _e('Abmelden', $this->text_domain);?>[/cf_logout_btn]</strong></code>
						<br /><span class="description"><?php _e( 'Links zur Logout-Seite. Erzeugt eine Schaltfläche (&lt;button&gt; &lt;/button&gt;) mit den Inhalten, die Du definierst. Das Attribut "redirect" ist die URL, zu der Du nach dem Abmelden weiterleitest.', $this->text_domain ) ?></span>
					</td>
				</tr>
			</table>
		</div>
	</div>

</div>
