<?php if (!defined('ABSPATH')) die('Kein direkter Zugriff erlaubt!'); ?>

<h3><?php esc_html_e('Beitragstyp hinzufügen', 'kleinanzeigen'); ?></h3>
<form action="#" method="post" class="ct-post-type">
	<div class="ct-wrap-left">
		<div class="ct-table-wrap">
			<div class="ct-arrow"><br></div>
			<h3 class="ct-toggle"><?php esc_html_e('Beitragstyp', 'kleinanzeigen') ?></h3>
			<table class="form-table <?php do_action('ct_invalid_field_post_type'); ?>">
				<tr>
					<th>
						<label><?php esc_html_e('Beitragstyp', 'kleinanzeigen') ?> <span class="ct-required">( <?php esc_html_e('required', 'kleinanzeigen'); ?> )</span></label>
					</th>
					<td>
						<input type="text" name="post_type" value="<?php if ( isset( $_POST['post_type'] ) ) echo esc_attr( $_POST['post_type'] ); elseif ( isset( $_GET['ct_edit_post_type'] ) ) echo esc_attr( $_GET['ct_edit_post_type'] ); ?>" />
						<br /><span class="description"><?php esc_html_e('Der neue Systemtyp des Posttyps (max. 20 Zeichen). Nur alphanumerische Kleinbuchstaben und Unterstriche. Min 2 Buchstaben. Nach dem Hinzufügen kann der Systemtyp des Post-Typs nicht mehr geändert werden.', 'kleinanzeigen'); ?></span>
					</td>
				</tr>
			</table>
		</div>
		<div class="ct-table-wrap">
			<div class="ct-arrow"><br></div>
			<h3 class="ct-toggle"><?php esc_html_e('Unterstützt', 'kleinanzeigen') ?></h3>
			<table class="form-table supports">
				<tr>
					<th>
						<label><?php esc_html_e('Unterstützt', 'kleinanzeigen') ?></label>
					</th>
					<td>
						<p><span class="description"><?php esc_html_e('Registriere die Unterstützung bestimmter Funktionen für einen Beitragstyp.', 'kleinanzeigen'); ?></span></p>
						<label>
							<input type="checkbox" name="supports[title]" value="title" <?php checked(empty($_POST['supports']) || ! empty($_POST['supports']) && in_array('title', $_POST['supports']) ); ?> />
							<span class="description"><strong><?php esc_html_e('Titel', 'kleinanzeigen') ?></strong></span>
						</label>
						<br />
						<label>
							<input type="checkbox" name="supports[editor]" value="editor" <?php checked(empty($_POST['supports']) || ! empty($_POST['supports']) && in_array('editor', $_POST['supports']) ); ?> />
							<span class="description"><strong><?php esc_html_e('Editor', 'kleinanzeigen') ?></strong> - <?php esc_html_e('Content', 'kleinanzeigen') ?></span>
						</label>
						<br />
						<label>
							<input type="checkbox" name="supports[author]" value="author" <?php checked( ! empty($_POST['supports']) && in_array('author', $_POST['supports']) ); ?> />
							<span class="description"><strong><?php esc_html_e('Autor', 'kleinanzeigen') ?></strong></span>
						</label>
						<br />
						<label>
							<input type="checkbox" name="supports[thumbnail]" value="thumbnail" <?php checked( ! empty($_POST['supports']) && in_array('thumbnail', $_POST['supports']) ); ?> />
							<span class="description"><strong><?php esc_html_e('Thumbnail', 'kleinanzeigen') ?></strong> - <?php esc_html_e('Ausgewähltes Bild - Das aktuelle Theme muss auch Post-Thumbnails unterstützen.', 'kleinanzeigen') ?></span>
						</label>
						<br />
						<label>
							<input type="checkbox" name="supports[excerpt]" value="excerpt" <?php checked( ! empty($_POST['supports']) && in_array('excerpt', $_POST['supports']) ); ?> />
							<span class="description"><strong><?php esc_html_e('Auszug', 'kleinanzeigen') ?></strong></span>
						</label>
						<br />
						<label>
							<input type="checkbox" name="supports[trackbacks]" value="trackbacks" <?php checked( ! empty($_POST['supports']) && in_array('trackbacks', $_POST['supports']) ); ?> />
							<span class="description"><strong><?php esc_html_e('Trackbacks', 'kleinanzeigen') ?></strong></span>
						</label>
						<br />
						<label>
							<input type="checkbox" name="supports[custom_fields]" value="custom-fields" <?php checked( ! empty($_POST['supports']) && in_array('custom-fields', $_POST['supports']) ); ?> />
							<span class="description"><strong><?php esc_html_e('Benutzerdefinierte Felder', 'kleinanzeigen') ?></strong></span>
						</label>
						<br />
						<label>
							<input type="checkbox" name="supports[comments]" value="comments" <?php checked( ! empty($_POST['supports']) && in_array('comments', $_POST['supports']) ); ?> />
							<span class="description"><strong><?php esc_html_e('Kommentare', 'kleinanzeigen') ?></strong> - <?php esc_html_e('Außerdem wird auf dem Bearbeitungsbildschirm eine Sprechblase für die Anzahl der Kommentare angezeigt.', 'kleinanzeigen') ?></span>
						</label>
						<br />
						<label>
							<input type="checkbox" name="supports[revisions]" value="revisions" <?php checked( ! empty($_POST['supports']) && in_array('revisions', $_POST['supports']) ); ?> />
							<span class="description"><strong><?php esc_html_e('Revisionen', 'kleinanzeigen') ?></strong> - <?php esc_html_e('Speichert Revisionen.', 'kleinanzeigen') ?></span>
						</label>
						<br />
						<label>
							<input type="checkbox" name="supports[page_attributes]" value="page-attributes" <?php checked( ! empty($_POST['supports']) && in_array('page-attributes', $_POST['supports']) ); ?> />
							<span class="description"><strong><?php esc_html_e('Seitenattribute', 'kleinanzeigen') ?></strong> - <?php esc_html_e('Vorlagen- und Menüreihenfolge - Hierarchisch muss wahr sein!', 'kleinanzeigen') ?></span>
						</label>
						<br />
						<label>
							<input type="checkbox" name="supports[post_formats]" value="post-formats" <?php checked( ! empty($_POST['supports']) && in_array('post-formats', $_POST['supports']) ); ?> />
							<span class="description"><strong><?php esc_html_e('Beitrags-Formate', 'kleinanzeigen') ?></strong> - <?php esc_html_e('Beitragsformate hinzufügen.', 'kleinanzeigen') ?></span>
						</label>
					</td>
				</tr>
			</table>
		</div>
		<div class="ct-table-wrap">
			<div class="ct-arrow"><br></div>
			<h3 class="ct-toggle"><?php esc_html_e('Unterstützung regulärer Taxonomien', 'kleinanzeigen') ?></h3>
			<table class="form-table supports">
				<tr>
					<th>
						<label><?php esc_html_e('Unterstützung regulärer Taxonomien', 'kleinanzeigen') ?></label>
					</th>
					<td>
						<p><span class="description"><?php esc_html_e('Weise diesem Beitragstyp reguläre Taxonomien zu.', 'kleinanzeigen'); ?></span></p>
						<?php if ( taxonomy_exists( 'category' ) ): ?>
						<label>
							<input type="checkbox" name="supports_reg_tax[category]" value="1" <?php checked(empty($_POST['supports_reg_tax']['category']), false); ?> />
							<span class="description"><strong><?php esc_html_e( 'Kategorien', 'kleinanzeigen' ) ?></strong></span>
						</label>
						<?php endif; ?>
						<br />
						<?php if ( taxonomy_exists( 'post_tag' ) ): ?>
						<label>
							<input type="checkbox" name="supports_reg_tax[post_tag]" value="1" <?php checked(empty($_POST['supports_reg_tax']['post_tag']), false); ?> />
							<span class="description"><strong><?php esc_html_e( 'Tags', 'kleinanzeigen' ) ?></strong></span>
						</label>
						<?php endif; ?>
					</td>
				</tr>
			</table>
		</div>
		<div class="ct-table-wrap">
			<div class="ct-arrow"><br></div>
			<h3 class="ct-toggle"><?php esc_html_e('Berechtigungstyp', 'kleinanzeigen') ?></h3>
			<table class="form-table">
				<tr>
					<th>
						<label><?php esc_html_e('Berechtigungstyp', 'kleinanzeigen') ?></label>
					</th>
					<td>
						<input type="text" name="capability_type" value="post">
						<label>
							<input type="checkbox" name="capability_type_edit" value="1" />
							<span class="description ct-capability-type-edit"><strong><?php esc_html_e('Bearbeiten' , 'kleinanzeigen'); ?></strong> (<?php esc_html_e('erweitert' , 'kleinanzeigen'); ?>)</span>
						</label>
						<br /><span class="description"><?php esc_html_e('Der Beitragstyp, der zum Überprüfen der Lese-, Bearbeitungs- und Löschfunktionen verwendet werden soll. Voreinstellung: "post".' , 'kleinanzeigen'); ?></span>
					</td>
				</tr>
			</table>
		</div>

		<div class="ct-table-wrap">
			<div class="ct-arrow"><br></div>
			<h3 class="ct-toggle"><?php esc_html_e('Meta-Funktionen zuordnen', 'kleinanzeigen') ?></h3>
			<table class="form-table">
				<tr>
					<th>
						<label><?php esc_html_e('Meta-Funktionen zuordnen', 'kleinanzeigen') ?></label>
					</th>
					<td>
						<p><span class="description"><?php esc_html_e('Verwende die interne Standardbehandlung für Metafunktionen.', 'kleinanzeigen'); ?></span></p>
						<label>
							<input type="radio" name="map_meta_cap" value="1" <?php checked(! isset($post_type['map_meta_cap']) || $_POST['map_meta_cap'] === true); ?> />
							<span class="description"><strong><?php esc_html_e('WAHR', 'kleinanzeigen'); ?></strong></span>
						</label>
						<br />
						<label>
							<input type="radio" name="map_meta_cap" value="0" <?php checked( isset($post_type['map_meta_cap']) && $_POST['map_meta_cap'] === false); ?> />
							<span class="description"><strong><?php esc_html_e('FALSCH', 'kleinanzeigen'); ?></strong> (default)</span>
						</label>
					</td>
				</tr>
			</table>
		</div>

		<div class="ct-table-wrap">
			<div class="ct-arrow"><br></div>
			<h3 class="ct-toggle"><?php esc_html_e('Labels', 'kleinanzeigen') ?></h3>
			<table class="form-table">
				<tr>
					<th>
						<label><?php esc_html_e('Name', 'kleinanzeigen') ?></label>
					</th>
					<td>
						<input type="text" name="labels[name]" value="<?php if ( isset( $_POST['labels']['name'] ) ) echo esc_attr( $_POST['labels']['name'] ); ?>" />
						<br /><span class="description"><?php esc_html_e('Allgemeiner Name für den Beitragstyp, normalerweise Plural.', 'kleinanzeigen'); ?></span>
					</td>
				</tr>
				<tr>
					<th>
						<label><?php esc_html_e('Singular Name', 'kleinanzeigen') ?></label>
					</th>
					<td>
						<input type="text" name="labels[singular_name]" value="<?php if ( isset( $_POST['labels']['singular_name'] ) ) echo esc_attr( $_POST['labels']['singular_name'] ); ?>" />
						<br /><span class="description"><?php esc_html_e('Name für ein Objekt dieses Beitragstyps. Der Standardwert ist der Wert des Namens.', 'kleinanzeigen'); ?></span>
					</td>
				</tr>
				<tr>
					<th>
						<label><?php esc_html_e('Neu hinzufügen', 'kleinanzeigen') ?></label>
					</th>
					<td>
						<input type="text" name="labels[add_new]" value="<?php if ( isset( $_POST['labels']['add_new'] ) ) echo esc_attr( $_POST['labels']['add_new'] ); ?>" />
						<br /><span class="description"><?php esc_html_e('Das Hinzufügen von neuem Text. Die Standardeinstellung ist Neu hinzufügen für hierarchische und nicht hierarchische Typen.', 'kleinanzeigen'); ?></span>
					</td>
				</tr>
				<tr>
					<th>
						<label><?php esc_html_e('Füge neues Element hinzu', 'kleinanzeigen') ?></label>
					</th>
					<td>
						<input type="text" name="labels[add_new_item]" value="<?php if ( isset( $_POST['labels']['add_new_item'] ) ) echo esc_attr( $_POST['labels']['add_new_item'] ); ?>" />
						<br /><span class="description"><?php esc_html_e('Text für neues Element hinzufügen. Standard ist "Neuen Beitrag hinzufügen/Neue Seite hinzufügen".', 'kleinanzeigen'); ?></span>
					</td>
				</tr>
				<tr>
					<th>
						<label><?php esc_html_e('Element bearbeiten', 'kleinanzeigen') ?></label>
					</th>
					<td>
						<input type="text" name="labels[edit_item]" value="<?php if ( isset( $_POST['labels']['edit_item'] ) ) echo esc_attr( $_POST['labels']['edit_item'] ); ?>" />
						<br /><span class="description"><?php esc_html_e('Text für Bearbeitung des Elements. Standard ist Beitrag bearbeiten/Seite bearbeiten.', 'kleinanzeigen'); ?></span>
					</td>
				</tr>
				<tr>
					<th>
						<label><?php esc_html_e('Neues Element', 'kleinanzeigen') ?></label>
					</th>
					<td>
						<input type="text" name="labels[new_item]" value="<?php if ( isset( $_POST['labels']['new_item'] ) ) echo esc_attr( $_POST['labels']['new_item'] ); ?>" />
						<br /><span class="description"><?php esc_html_e('Text für neues Element. Standard ist Neuer Beitrag/Neue Seite.', 'kleinanzeigen'); ?></span>
					</td>
				</tr>
				<tr>
					<th>
						<label><?php esc_html_e('Element anzeigen', 'kleinanzeigen') ?></label>
					</th>
					<td>
						<input type="text" name="labels[view_item]" value="<?php if ( isset( $_POST['labels']['view_item'] ) ) echo esc_attr( $_POST['labels']['view_item'] ); ?>" />
						<br /><span class="description"><?php esc_html_e('Text für Ansicht des Elements. Die Standardeinstellung ist Beitrag anzeigen/Seite anzeigen.', 'kleinanzeigen'); ?></span>
					</td>
				</tr>
				<tr>
					<th>
						<label><?php esc_html_e('Element suchen', 'kleinanzeigen') ?></label>
					</th>
					<td>
						<input type="text" name="labels[search_items]" value="<?php if ( isset( $_POST['labels']['search_items'] ) ) echo esc_attr( $_POST['labels']['search_items'] ); ?>" />
						<br /><span class="description"><?php esc_html_e('Text für SElementsuche. Standard ist Suche Beiträge/Suche Seiten.', 'kleinanzeigen'); ?></span>
					</td>
				</tr>
				<tr>
					<th>
						<label><?php esc_html_e('Nicht gefunden', 'kleinanzeigen') ?></label>
					</th>
					<td>
						<input type="text" name="labels[not_found]" value="<?php if ( isset( $_POST['labels']['not_found'] ) ) echo esc_attr( $_POST['labels']['not_found'] ); ?>" />
						<br /><span class="description"><?php esc_html_e('Text für nicht gefundene Elemente. Standard ist Keine Beiträge gefunden/Keine Seiten gefunden.', 'kleinanzeigen'); ?></span>
					</td>
				</tr>
				<tr>
					<th>
						<label><?php esc_html_e('Nicht im Papierkorb gefunden', 'kleinanzeigen') ?></label>
					</th>
					<td>
						<input type="text" name="labels[not_found_in_trash]" value="<?php if ( isset( $_POST['labels']['not_found_in_trash'] ) ) echo esc_attr( $_POST['labels']['not_found_in_trash'] ); ?>" />
						<br /><span class="description"><?php esc_html_e('Der nicht im Papierkorb gefunden Text. Standard ist Keine Beiträge im Papierkorb gefunden/Keine Seiten im Papierkorb gefunden.', 'kleinanzeigen'); ?></span>
					</td>
				</tr>
				<tr>
					<th>
						<label><?php esc_html_e('Übergeordnetes Element Doppelpunkt', 'kleinanzeigen') ?></label>
					</th>
					<td>
						<input type="text" name="labels[parent_item_colon]" value="<?php if ( isset( $_POST['labels']['parent_item_colon'] ) ) echo esc_attr( $_POST['labels']['parent_item_colon'] ); ?>" />
						<br /><span class="description"><?php esc_html_e('Der übergeordnete Text. Diese Zeichenfolge wird bei nicht hierarchischen Typen nicht verwendet. In hierarchischen Fällen ist die Standardeinstellung die übergeordnete Seite', 'kleinanzeigen'); ?></span>
					</td>
				</tr>
				<tr>
					<th>
						<label><?php esc_html_e('Benutzerdefinierte Block Felder', 'kleinanzeigen') ?></label>
					</th>
					<td>
						<input type="text" name="labels[custom_fields_block]" value="<?php if ( isset( $_POST['labels']['custom_fields_block'] ) ) echo esc_attr( $_POST['labels']['custom_fields_block'] ); ?>" />
						<br /><span class="description"><?php esc_html_e('Titel des Blocks "Benutzerdefinierte Felder".', 'kleinanzeigen'); ?></span>
					</td>
				</tr>
			</table>
		</div>
		<div class="ct-table-wrap">
			<div class="ct-arrow"><br></div>
			<h3 class="ct-toggle"><?php esc_html_e('Beschreibung', 'kleinanzeigen') ?></h3>
			<table class="form-table">
				<tr>
					<th>
						<label><?php esc_html_e('Beschreibung', 'kleinanzeigen') ?></label>
					</th>
					<td>
						<textarea class="ct-field-description" name="description" rows="3"><?php if ( isset( $_POST['description'] ) ) echo esc_textarea( $_POST['description'] ); ?></textarea>
						<br /><span class="description"><?php esc_html_e('Eine kurze beschreibende Zusammenfassung des Beitragstyps.', 'kleinanzeigen'); ?></span>
					</td>
				</tr>
			</table>
		</div>
		<div class="ct-table-wrap">
			<div class="ct-arrow"><br></div>
			<h3 class="ct-toggle"><?php esc_html_e('Menüposition', 'kleinanzeigen') ?></h3>
			<table class="form-table">
				<tr>
					<th>
						<label><?php esc_html_e('Menüposition', 'kleinanzeigen') ?></label>
					</th>
					<td>
						<input type="text" name="menu_position" value="<?php if ( isset( $_POST['menu_position'] ) ) echo esc_attr( $_POST['menu_position'] ); elseif ( !isset( $_POST['menu_position'] ) ) echo ''; ?>" />
						<br /><span class="description"><?php esc_html_e('5 - unter Beiträge; 10 - unter Medien; 20 - unter Seiten; 60 - unter dem ersten Abscheider; 100 - unter dem zweiten Separator', 'kleinanzeigen'); ?></span>
					</td>
				</tr>
			</table>
		</div>
		<div class="ct-table-wrap">
			<div class="ct-arrow"><br></div>
			<h3 class="ct-toggle"><?php esc_html_e('Menü Icon', 'kleinanzeigen') ?></h3>
			<table class="form-table">
				<tr>
					<th>
						<label><?php esc_html_e('Menü Icon', 'kleinanzeigen') ?></label>
					</th>
					<td>
						<input type="text" name="menu_icon" value="<?php if ( isset( $_POST['menu_icon'] ) ) echo esc_attr( $_POST['menu_icon'] ); ?>" />
						<br /><span class="description"><?php esc_html_e('Die URL zu dem Symbol, das für dieses Menü verwendet werden soll.', 'kleinanzeigen'); ?></span>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="ct-wrap-right">
		<div class="ct-table-wrap">
			<div class="ct-arrow"><br></div>
			<h3 class="ct-toggle"><?php esc_html_e('Öffentlich', 'kleinanzeigen') ?></h3>
			<table class="form-table publica">
				<tr>
					<th>
						<label><?php esc_html_e('Öffentlich', 'kleinanzeigen') ?></label>
					</th>
					<td>
						<span class="description"><?php esc_html_e('Meta-Argument zum Definieren von Standardwerten für public_queriable, show_ui, show_in_nav_menus und exclude_from_search.', 'kleinanzeigen'); ?></span>
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
						<label>
							<input type="radio" name="public" value="1"  <?php checked( ! isset($_POST['public']) ||  (isset($_POST['public']) && $_POST['public'] === '1')); ?> />
							<span class="description"><strong><?php esc_html_e('WAHR', 'kleinanzeigen'); ?></strong>
								<br />
								<?php esc_html_e('Zeige eine Benutzeroberfläche für diesen "post_type" an', 'kleinanzeigen');?><br /><code>( show_ui = TRUE )</code><br /><br />
								<?php esc_html_e('Zeige "post_type" zur Auswahl in den Navigationsmenüs an', 'kleinanzeigen'); ?><br /><code>( show_in_nav_menus = TRUE )</code><br /><br />
								<?php esc_html_e('"post_type" -Abfragen können vom Frontend aus ausgeführt werden', 'kleinanzeigen'); ?><br /><code>( publicly_queryable = TRUE )</code><br /><br />
								<?php esc_html_e('Schließe Beiträge mit diesem Beitragstyp aus den Suchergebnissen aus', 'kleinanzeigen'); ?><br /> <code>( exclude_from_search = FALSE )</code>
							</span>
						</label>
						<br /><br />
						<label>
							<input type="radio" name="public" value="0" <?php checked( isset($_POST['public'])  && $_POST['public'] === '0'); ?> />
							<span class="description"><strong><?php esc_html_e('FALSCH', 'kleinanzeigen'); ?></strong>
								<br />
								<?php esc_html_e('Zeige für diesen "post_type" keine Benutzeroberfläche an', 'kleinanzeigen');?><br /><code>( show_ui = FALSE )</code><br /><br />
								<?php esc_html_e('Blende "post_type" zur Auswahl in den Navigationsmenüs au', 'kleinanzeigen'); ?><br /><code>( show_in_nav_menus = FALSE )</code><br /><br />
								<?php esc_html_e('"post_type" -Abfragen können nicht über das Front-End ausgeführt werden', 'kleinanzeigen'); ?><br /><code>( publicly_queryable = FALSE )</code><br /><br />
								<?php esc_html_e('Schließe Beiträge mit diesem Beitragstyp aus den Suchergebnissen aus', 'kleinanzeigen'); ?><br /> <code>( exclude_from_search = TRUE )</code>
							</span>
						</label>
						<br /><br />
						<label>
							<input type="radio" name="public" value="advanced" <?php checked(isset($_POST['public']) && $_POST['public'] =='advanced'); ?> />
							<span class="description"><strong><?php esc_html_e('Erweitert', 'kleinanzeigen'); ?></strong>
								<br />
							<?php esc_html_e('Du kannst jede Komponente manuell einstellen.', 'kleinanzeigen'); ?></span>
						</label>
					</td>
				</tr>
			</table>
		</div>
		<div class="ct-table-wrap">
			<div class="ct-arrow"><br></div>
			<h3 class="ct-toggle"><?php esc_html_e('Zeige UI', 'kleinanzeigen') ?></h3>
			<table class="form-table show-ui">
				<tr>
					<th>
						<label><?php esc_html_e('Zeige UI', 'kleinanzeigen') ?></label>
					</th>
					<td>
						<span class="description"><?php esc_html_e('Gibt an, ob eine Standardbenutzeroberfläche zum Verwalten dieses Beitragstyps generiert werden soll. Beachte, dass integrierte Beitragstypen wie Beitrag und Seite absichtlich auf falsch gesetzt sind.', 'kleinanzeigen'); ?></span>
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
						<label>
							<input type="radio" name="show_ui" value="1" <?php checked( isset( $_POST['public'] ) && $_POST['public'] == 'advanced' && isset( $_POST['show_ui'] ) && $_POST['show_ui'] === '1'); ?> />
							<span class="description"><strong><?php esc_html_e('WAHR', 'kleinanzeigen'); ?></strong>
								<br />
							<?php esc_html_e('Zeige eine Benutzeroberfläche (Admin-Bereich) für diesen Beitragstyp an.', 'kleinanzeigen'); ?></span>
						</label>
						<br />
						<label>
							<input type="radio" name="show_ui" value="0" <?php checked( isset( $_POST['public'] ) && $_POST['public'] == 'advanced' && isset( $_POST['show_ui'] ) && $_POST['show_ui'] === '0' ); ?> />
							<span class="description"><strong><?php esc_html_e('FALSCH', 'kleinanzeigen'); ?></strong>
								<br />
							<?php esc_html_e('Zeige für diesen Beitragstyp keine Benutzeroberfläche an.', 'kleinanzeigen'); ?></span>
						</label>
					</td>
				</tr>
			</table>
		</div>
		<div class="ct-table-wrap">
			<div class="ct-arrow"><br></div>
			<h3 class="ct-toggle"><?php esc_html_e('In Navigationsmenüs anzeigen ', 'kleinanzeigen') ?></h3>
			<table class="form-table show-in-nav-menus">
				<tr>
					<th>
						<label><?php esc_html_e('In Navigationsmenüs anzeigen', 'kleinanzeigen') ?></label>
					</th>
					<td>
						<span class="description"><?php esc_html_e('Gibt an, ob post_type in Navigationsmenüs zur Auswahl steht.', 'kleinanzeigen'); ?></span>
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
						<label>
							<input type="radio" name="show_in_nav_menus" value="1" <?php checked( isset( $_POST['public'] ) && $_POST['public'] == 'advanced' && isset( $_POST['show_in_nav_menus'] ) && $_POST['show_in_nav_menus'] === '1' ); ?> />
							<span class="description"><strong><?php esc_html_e('WAHR', 'kleinanzeigen'); ?></strong></span>
						</label>
						<br />
						<label>
							<input type="radio" name="show_in_nav_menus" value="0" <?php checked( isset( $_POST['public'] ) && $_POST['public'] == 'advanced' && isset( $_POST['show_in_nav_menus'] ) && $_POST['show_in_nav_menus'] === '0' ); ?> />
							<span class="description"><strong><?php esc_html_e('FALSCH', 'kleinanzeigen'); ?></strong></span>
						</label>
					</td>
				</tr>
			</table>
		</div>
		<div class="ct-table-wrap">
			<div class="ct-arrow"><br></div>
			<h3 class="ct-toggle"><?php esc_html_e('Öffentlich abfragbar', 'kleinanzeigen') ?></h3>
			<table class="form-table public-queryable">
				<tr>
					<th>
						<label><?php esc_html_e('Öffentlich abfragbar', 'kleinanzeigen' ) ?></label>
					</th>
					<td>
						<span class="description"><?php esc_html_e('Ob post_type-Abfragen vom Frontend aus ausgeführt werden können.', 'kleinanzeigen'); ?></span>
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
						<label>
							<input type="radio" name="publicly_queryable" value="1" <?php checked( isset( $_POST['public'] ) && $_POST['public'] == 'advanced' && isset( $_POST['publicly_queryable'] ) && $_POST['publicly_queryable'] === '1' ); ?> />
							<span class="description"><strong><?php esc_html_e('WAHR', 'kleinanzeigen'); ?></strong></span>
						</label>
						<br />
						<label>
							<input type="radio" name="publicly_queryable" value="0" <?php checked( isset( $_POST['public'] ) && $_POST['public'] == 'advanced' && isset( $_POST['publicly_queryable'] ) && $_POST['publicly_queryable'] === '0' ); ?> />
							<span class="description"><strong><?php esc_html_e('FALSCH', 'kleinanzeigen'); ?></strong></span>
						</label>
					</td>
				</tr>
			</table>
		</div>
		<div class="ct-table-wrap">
			<div class="ct-arrow"><br></div>
			<h3 class="ct-toggle"><?php esc_html_e('Von der Suche ausschließen', 'kleinanzeigen') ?></h3>
			<table class="form-table exclude-from-search">
				<tr>
					<th>
						<label><?php esc_html_e('Von der Suche ausschließen', 'kleinanzeigen') ?></label>
					</th>
					<td>
						<span class="description"><?php esc_html_e('Gibt an, ob Beiträge mit diesem Beitragstyp aus den Suchergebnissen ausgeschlossen werden sollen.', 'kleinanzeigen'); ?></span>
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
						<label>
							<input type="radio" name="exclude_from_search" value="1" <?php checked( isset( $_POST['public'] ) && $_POST['public'] == 'advanced' && isset( $_POST['exclude_from_search'] ) && $_POST['exclude_from_search'] === '1' ); ?> />
							<span class="description"><strong><?php esc_html_e('WAHR', 'kleinanzeigen'); ?></strong></span>
						</label>
						<br />
						<label>
							<input type="radio" name="exclude_from_search" value="0" <?php checked( isset( $_POST['public'] ) && $_POST['public'] == 'advanced' && isset( $_POST['exclude_from_search'] ) && $_POST['exclude_from_search'] === '0' ); ?> />
							<span class="description"><strong><?php esc_html_e('FALSCH', 'kleinanzeigen'); ?></strong></span>
						</label>
					</td>
				</tr>
			</table>
		</div>
		<div class="ct-table-wrap">
			<div class="ct-arrow"><br></div>
			<h3 class="ct-toggle"><?php esc_html_e('Hierarchisch', 'kleinanzeigen') ?></h3>
			<table class="form-table">
				<tr>
					<th>
						<label><?php esc_html_e('Hierarchisch', 'kleinanzeigen') ?></label>
					</th>
					<td>
						<span class="description"><?php esc_html_e('Gibt an, ob der Beitragstyp hierarchisch ist. Ermöglicht die Angabe von Eltern.', 'kleinanzeigen'); ?></span>
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
						<label>
							<input type="radio" name="hierarchical" value="1" <?php checked( ! empty($_POST['hierarchical']) || (isset( $_POST['hierarchical'] ) && $_POST['hierarchical'] === '1') ); ?> />
							<span class="description"><strong><?php esc_html_e('WAHR', 'kleinanzeigen'); ?></strong></span>
						</label>
						<br />
						<label>
							<input type="radio" name="hierarchical" value="0" <?php checked( empty($_POST['hierarchical']) || (isset( $_POST['hierarchical'] ) && $_POST['hierarchical'] === '0') ); ?> />
							<span class="description"><strong><?php esc_html_e('FALSCH', 'kleinanzeigen'); ?></strong></span>
						</label>
					</td>
				</tr>
			</table>
		</div>
		<div class="ct-table-wrap">
			<div class="ct-arrow"><br></div>
			<h3 class="ct-toggle"><?php esc_html_e('Hat Archiv', 'kleinanzeigen') ?></h3>
			<table class="form-table">
				<tr>
					<th>
						<label><?php esc_html_e('Hat Archiv', 'kleinanzeigen') ?></label>
					</th>
					<td>
						<span class="description"><?php esc_html_e('Aktiviert Post-Typ-Archive. Verwendet String als Archiv-Slug. Generiert die richtigen Umschreiberegeln, wenn das Umschreiben aktiviert ist.', 'kleinanzeigen'); ?></span>
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
						<label>
							<input type="radio" name="has_archive" value="1" <?php checked( ! empty($_POST['has_archive']) || (isset( $_POST['has_archive'] ) && $_POST['has_archive'] === '1') ); ?> />
							<span class="description"><strong><?php esc_html_e('WAHR', 'kleinanzeigen'); ?></strong></span>
						</label>
						<br />
						<label>
							<input type="radio" name="has_archive" value="0" <?php checked( empty($_POST['has_archive']) || (isset( $_POST['has_archive'] ) && $_POST['has_archive'] === '0') ); ?> />
							<span class="description"><strong><?php esc_html_e('FALSCH', 'kleinanzeigen'); ?></strong></span>
						</label>
						<br /><br />
						<span class="description"><strong><?php esc_html_e('Benutzerdefinierter Slug', 'kleinanzeigen'); ?></strong></span>
						<br />

						<input type="text" name="has_archive_slug" value="<?php if ( ! empty( $_POST['has_archive_slug'] ) ) echo esc_attr( $_POST['has_archive_slug'] ); ?>" />
						<br />
						<span class="description"><?php esc_html_e('Benutzerdefinierter Slug für das Post-Type-Archiv.', 'kleinanzeigen'); ?></span>
					</td>
				</tr>
			</table>
		</div>
		<div class="ct-table-wrap">
			<div class="ct-arrow"><br></div>
			<h3 class="ct-toggle"><?php esc_html_e('Umschreiben', 'kleinanzeigen') ?></h3>
			<table class="form-table">
				<tr>
					<th>
						<label><?php esc_html_e('Umschreiben', 'kleinanzeigen') ?></label>
					</th>
					<td>
						<span class="description"><?php esc_html_e('Schreibe Permalinks mit diesem Format neu.', 'kleinanzeigen'); ?></span>
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
						<label>
							<input type="radio" name="rewrite" value="1" <?php checked(empty($_POST['rewrite']) || (isset( $_POST['rewrite'] ) && $_POST['rewrite'] === '1') ); ?> />
							<span class="description"><strong><?php esc_html_e('WAHR', 'kleinanzeigen'); ?></strong></span>
						</label>
						<br />
						<span class="description"><?php esc_html_e('Standardmäßig wird der Beitragstyp verwendet.', 'kleinanzeigen'); ?></span>
						<br />
						<label>
							<input type="radio" name="rewrite" value="0" <?php checked( isset( $_POST['rewrite'] ) &&  $_POST['rewrite'] === '0' ); ?> />
							<span class="description"><strong><?php esc_html_e('FALSCH', 'kleinanzeigen'); ?></strong></span>
						</label>
						<br />
						<span class="description"><?php esc_html_e('Umschreiben verhindern.', 'kleinanzeigen'); ?></span>
						<br /><br />

						<span class="description"><strong><?php esc_html_e('Benutzerdefinierter Slug', 'kleinanzeigen'); ?></strong></span>
						<br />
						<input type="text" name="rewrite_slug" value="<?php if ( ! empty($_POST['rewrite_slug'])) echo esc_attr( $_POST['rewrite_slug'] ); ?>" />
						<br />
						<span class="description"><?php esc_html_e('Stelle Beiträge diesen Slug voran. Wenn leer, wird die Standardeinstellung verwendet.', 'kleinanzeigen'); ?></span>
						<br /><br />
						<label>
							<input type="checkbox" name="rewrite_with_front" value="1" <?php checked( ! isset($_POST['rewrite_with_front']) || ! empty( $_POST['rewrite_with_front'] )); ?> />
							<span class="description"><strong><?php esc_html_e('Front Base zulassen', 'kleinanzeigen'); ?></strong></span>
						</label>
						<br />
						<span class="description"><?php esc_html_e('Ermöglichen dass Permalinks mit der Front Base vorangestellt werden.', 'kleinanzeigen'); ?></span>
						<br /><br />
						<label>
							<input type="checkbox" name="rewrite_feeds" value="1" <?php checked( ! empty( $_POST['rewrite_feeds'] ) ); ?> />
							<span class="description"><strong><?php esc_html_e('Feeds', 'kleinanzeigen'); ?></strong></span>
						</label>
						<br />
						<span class="description"><?php esc_html_e('Standardmäßig wird has_archive verwendet.', 'kleinanzeigen'); ?></span>
						<br />
						<label>
							<input type="checkbox" name="rewrite_pages" value="1" <?php checked( ! isset($_POST['rewrite_pages']) || ! empty( $_POST['rewrite_pages'] ) ); ?> />
							<span class="description"><strong><?php esc_html_e('Seiten', 'kleinanzeigen'); ?></strong></span>
						</label>
						<br />
						<span class="description"><?php esc_html_e('Der Standardwert ist wahr.', 'kleinanzeigen'); ?></span>
					</td>
				</tr>
			</table>
		</div>


		<div class="ct-table-wrap">
			<div class="ct-arrow"><br></div>
			<h3 class="ct-toggle"><?php esc_html_e('EP Maske', 'kleinanzeigen') ?></h3>
			<table class="form-table">
				<tr>
					<th>
						<label><?php esc_html_e('EP Maske', 'kleinanzeigen') ?></label>
					</th>
					<td>
						<span class="description"><?php esc_html_e('Endpunktmaske, die die Orte beschreibt, an denen der Endpunkt hinzugefügt werden soll.', 'kleinanzeigen'); ?></span>
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
						<input type="hidden" name="ep_mask[EP_NONE]" value="0" />
						<label>
							<input type="checkbox" name="ep_mask[EP_NONE]" value="<?php echo EP_NONE; ?>" <?php checked( isset( $_POST['ep_mask']['EP_NONE'] ) && $_POST['ep_mask']['EP_NONE'] & EP_NONE, EP_NONE); ?> />
							<span class="description"><strong><?php esc_html_e('EP_NONE: Standardmäßig nichts.', 'kleinanzeigen'); ?></strong></span>
						</label>
						<br />
						<input type="hidden" name="ep_mask[EP_PERMALINK]" value="0" />
						<label>
							<input type="checkbox" name="ep_mask[EP_PERMALINK]" value="<?php echo EP_PERMALINK; ?>" <?php checked( isset( $_POST['ep_mask']['EP_PERMALINK'] ) && $_POST['ep_mask']['EP_PERMALINK'] & EP_PERMALINK, EP_PERMALINK ); ?> />
							<span class="description"><strong><?php esc_html_e('EP_PERMALINK: für Permalink.', 'kleinanzeigen'); ?></strong></span>
						</label>
						<br />
						<input type="hidden" name="ep_mask[EP_ATTACHMENT]" value="0" />
						<label>
							<input type="checkbox" name="ep_mask[EP_ATTACHMENT]" value="<?php echo EP_ATTACHMENT; ?>" <?php checked( isset( $_POST['ep_mask']['EP_ATTACHMENT'] ) && $_POST['ep_mask']['EP_ATTACHMENT'] & EP_ATTACHMENT, EP_ATTACHMENT); ?> />
							<span class="description"><strong><?php esc_html_e('EP_ATTACHMENT: für Anhang.', 'kleinanzeigen'); ?></strong></span>
						</label>
						<br />
						<input type="hidden" name="ep_mask[EP_DATE]" value="0" />
						<label>
							<input type="checkbox" name="ep_mask[EP_DATE]" value="<?php echo EP_DATE; ?>" <?php checked( isset( $_POST['ep_mask']['EP_DATE'] ) && $_POST['ep_mask']['EP_DATE'] & EP_DATE, EP_DATE); ?> />
							<span class="description"><strong><?php esc_html_e('EP_DATE: für Datum.', 'kleinanzeigen'); ?></strong></span>
						</label>
						<br />
						<input type="hidden" name="ep_mask[EP_YEAR]" value="0" />
						<label>
							<input type="checkbox" name="ep_mask[EP_YEAR]" value="<?php echo EP_YEAR; ?>" <?php checked( isset( $_POST['ep_mask']['EP_YEAR'] ) && $_POST['ep_mask']['EP_YEAR'] & EP_YEAR, EP_YEAR); ?> />
							<span class="description"><strong><?php esc_html_e('EP_YEAR: für Jahr.', 'kleinanzeigen'); ?></strong></span>
						</label>
						<br />
						<input type="hidden" name="ep_mask[EP_MONTH]" value="0" />
						<label>
							<input type="checkbox" name="ep_mask[EP_MONTH]" value="<?php echo EP_MONTH; ?>" <?php checked( isset( $_POST['ep_mask']['EP_MONTH'] ) && $_POST['ep_mask']['EP_MONTH'] & EP_MONTH, EP_MONTH); ?> />
							<span class="description"><strong><?php esc_html_e('EP_MONTH: für Monat.', 'kleinanzeigen'); ?></strong></span>
						</label>
						<br />
						<input type="hidden" name="ep_mask[EP_DAY]" value="0" />
						<label>
							<input type="checkbox" name="ep_mask[EP_DAY]" value="<?php echo EP_DAY; ?>" <?php checked( isset( $_POST['ep_mask']['EP_DAY'] ) && $_POST['ep_mask']['EP_DAY'] & EP_DAY, EP_DAY); ?> />
							<span class="description"><strong><?php esc_html_e('EP_DAY: für Tag.', 'kleinanzeigen'); ?></strong></span>
						</label>
						<br />
						<input type="hidden" name="ep_mask[EP_ROOT]" value="0" />
						<label>
							<input type="checkbox" name="ep_mask[EP_ROOT]" value="<?php echo EP_ROOT; ?>" <?php checked( isset( $_POST['ep_mask']['EP_ROOT'] ) && $_POST['ep_mask']['EP_ROOT'] & EP_ROOT, EP_ROOT); ?> />
							<span class="description"><strong><?php esc_html_e('EP_ROOT: für Root.', 'kleinanzeigen'); ?></strong></span>
						</label>
						<br />
						<input type="hidden" name="ep_mask[EP_COMMENTS]" value="0" />
						<label>
							<input type="checkbox" name="ep_mask[EP_COMMENTS]" value="<?php echo EP_COMMENTS; ?>" <?php checked( isset( $_POST['ep_mask']['EP_COMMENTS'] ) && $_POST['ep_mask']['EP_COMMENTS'] & EP_COMMENTS, EP_COMMENTS); ?> />
							<span class="description"><strong><?php esc_html_e('EP_COMMENTS: für CKommentare.', 'kleinanzeigen'); ?></strong></span>
						</label>
						<br />
						<input type="hidden" name="ep_mask[EP_SEARCH]" value="0" />
						<label>
							<input type="checkbox" name="ep_mask[EP_SEARCH]" value="<?php echo EP_SEARCH; ?>" <?php checked( isset( $_POST['ep_mask']['EP_SEARCH'] ) && $_POST['ep_mask']['EP_SEARCH'] & EP_SEARCH, EP_SEARCH); ?> />
							<span class="description"><strong><?php esc_html_e('EP_SEARCH: für Suche.', 'kleinanzeigen'); ?></strong></span>
						</label>
						<br />
						<input type="hidden" name="ep_mask[EP_CATEGORIES]" value="0" />
						<label>
							<input type="checkbox" name="ep_mask[EP_CATEGORIES]" value="<?php echo EP_CATEGORIES; ?>" <?php checked( isset( $_POST['ep_mask']['EP_CATEGORIES'] ) && $_POST['ep_mask']['EP_CATEGORIES'] & EP_CATEGORIES, EP_CATEGORIES); ?> />
							<span class="description"><strong><?php esc_html_e('EP_CATEGORIES: für Kategorien.', 'kleinanzeigen'); ?></strong></span>
						</label>
						<br />
						<input type="hidden" name="ep_mask[EP_TAGS]" value="0" />
						<label>
							<input type="checkbox" name="ep_mask[EPEP_TAGS_DAY]" value="<?php echo EP_TAGS; ?>" <?php checked( isset( $_POST['ep_mask']['EP_TAGS'] ) && $_POST['ep_mask']['EP_TAGS'] & EP_TAGS, EP_TAGS); ?> />
							<span class="description"><strong><?php esc_html_e('EP_TAGS: für Tags.', 'kleinanzeigen'); ?></strong></span>
						</label>
						<br />
						<input type="hidden" name="ep_mask[EP_AUTHORS]" value="0" />
						<label>
							<input type="checkbox" name="ep_mask[EP_AUTHORS]" value="<?php echo EP_AUTHORS; ?>" <?php checked( isset( $_POST['ep_mask']['EP_AUTHORS'] ) && $_POST['ep_mask']['EP_AUTHORS'] & EP_AUTHORS, EP_AUTHORS); ?> />
							<span class="description"><strong><?php esc_html_e('EP_AUTHORS: für Autoren.', 'kleinanzeigen'); ?></strong></span>
						</label>
						<br />
						<input type="hidden" name="ep_mask[EP_PAGES]" value="0" />
						<label>
							<input type="checkbox" name="ep_mask[EP_PAGES]" value="<?php echo EP_PAGES; ?>" <?php checked( isset( $_POST['ep_mask']['EP_PAGES'] ) && $_POST['ep_mask']['EP_PAGES'] & EP_PAGES, EP_PAGES); ?> />
							<span class="description"><strong><?php esc_html_e('EP_PAGES: für Seiten.', 'kleinanzeigen'); ?></strong></span>
						</label>
						<br />
						<input type="hidden" name="ep_mask[EP_ALL]" value="0" />
						<label>
							<input type="checkbox" name="ep_mask[EP_ALL]" value="<?php echo EP_ALL; ?>" <?php checked( isset( $_POST['ep_mask']['EP_ALL'] ) && $_POST['ep_mask']['EP_ALL'] & EP_ALL, EP_ALL); ?> />
							<span class="description"><strong><?php esc_html_e('EP_ALL: für alles.', 'kleinanzeigen'); ?></strong></span>
						</label>
					</td>
				</tr>
			</table>
		</div>

		<div class="ct-table-wrap">
			<div class="ct-arrow"><br></div>
			<h3 class="ct-toggle"><?php esc_html_e('Abfrage var', 'kleinanzeigen') ?></h3>
			<table class="form-table">
				<tr>
					<th>
						<label><?php esc_html_e('Abfrage var', 'kleinanzeigen') ?></label>
					</th>
					<td>
						<p><span class="description"><?php esc_html_e('Name der Abfragevariablen, die für diesen Beitragstyp verwendet werden soll. Der Standardwert ist der Name des Beitragstyps.', 'kleinanzeigen'); ?></span></p>
						<label>
							<input type="radio" name="query_var" value="1" <?php checked( empty($_POST['query_var']) || (isset( $_POST['query_var'] ) && $_POST['query_var'] === '1')); ?> />
							<span class="description"><strong><?php esc_html_e('WAHR', 'kleinanzeigen'); ?></strong></span>
						</label>
						<br />
						<label>
							<input type="radio" name="query_var" value="0" <?php checked( ! empty($_POST['query_var']) || (isset( $_POST['query_var'] ) && $_POST['query_var'] === '0')); ?> />
							<span class="description"><strong><?php esc_html_e('FALSCH', 'kleinanzeigen'); ?></strong></span>
						</label>
						<br /><br />
						<span class="description"><strong><?php esc_html_e('Benutzerdefinierter Abfrageschlüssel', 'kleinanzeigen'); ?></strong></span>
						<br />
						<input type="text" name="query_var_key" value="<?php if ( !empty( $_POST['query_var_key'] ) ) echo esc_attr( $_POST['query_var_key'] ); ?>" />
						<br />
						<span class="description"><?php esc_html_e('Benutzerdefinierter Abfrage-Var-Schlüssel.', 'kleinanzeigen'); ?></span>
					</td>
				</tr>
			</table>
		</div>



		<div class="ct-table-wrap">
			<div class="ct-arrow"><br></div>
			<h3 class="ct-toggle"><?php esc_html_e('Kann exportieren', 'kleinanzeigen') ?></h3>
			<table class="form-table">
				<tr>
					<th>
						<label><?php esc_html_e('Kann exportieren', 'kleinanzeigen') ?></label>
					</th>
					<td>
						<span class="description"><?php esc_html_e('Kann dieser post_type exportiert werden?.', 'kleinanzeigen'); ?></span>
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
						<label>
							<input type="radio" name="can_export" value="1" <?php checked( !isset($_POST['can_export']) || ! empty($_POST['can_export'])); ?> />
							<span class="description"><strong><?php esc_html_e('WAHR', 'kleinanzeigen'); ?></strong></span>
						</label>
						<br />
						<label>
							<input type="radio" name="can_export" value="0" <?php checked(isset($_POST['can_export']) && empty($_POST['can_export'])); ?> />
							<span class="description"><strong><?php esc_html_e('FALSCH', 'kleinanzeigen'); ?></strong></span>
						</label>
					</td>
				</tr>
			</table>
		</div>

		<div class="ct-table-wrap">
			<div class="ct-arrow"><br></div>
			<h3 class="ct-toggle"><?php esc_html_e('REST API', 'kleinanzeigen') ?></h3>
			<table class="form-table">
				<tr>
					<th>
						<label><?php esc_html_e('REST API', 'kleinanzeigen') ?></label>
					</th>
					<td>
						<span class="description"><?php esc_html_e('Aktiviere die REST-API-Unterstützung für diesen Beitragstyp.', 'kleinanzeigen'); ?></span>
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
						<label>
							<input type="radio" name="show_in_rest" value="1" <?php checked( !isset($_POST['show_in_rest']) || ! empty($_POST['show_in_rest'])); ?> />
							<span class="description"><strong><?php esc_html_e('WAHR', 'kleinanzeigen'); ?></strong></span>
						</label>
						<br />
						<label>
							<input type="radio" name="show_in_rest" value="0" <?php checked(isset($_POST['show_in_rest']) && empty($_POST['show_in_rest'])); ?> />
							<span class="description"><strong><?php esc_html_e('FALSCH', 'kleinanzeigen'); ?></strong></span>
						</label>
						<br /><br />
						<span class="description"><strong><?php esc_html_e('REST API Base', 'kleinanzeigen'); ?></strong></span>
						<br />
						<input type="text" name="rest_base" value="<?php if ( !empty( $_POST['rest_base'] ) ) echo esc_attr( $_POST['rest_base'] ); ?>" />
						<br />
						<span class="description"><?php esc_html_e('Benutzerdefinierter Abfrage-Var-Schlüssel.', 'kleinanzeigen'); ?></span>
					</td>
				</tr>
			</table>
		</div>


	</div>
	<p class="submit">
		<?php wp_nonce_field('submit_post_type'); ?>
		<input type="submit" class="button-primary" name="submit" value="<?php esc_html_e('Beitragstyp hinzufügen', 'kleinanzeigen'); ?>" />
	</p>
	<br /><br /><br /><br />
</form>
