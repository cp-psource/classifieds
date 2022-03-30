<?php if (!defined('ABSPATH')) die('Kein direkter Zugriff erlaubt!'); ?>

<div class="wrap">

	<?php $this->render_admin( 'message' ); ?>

	<h3><?php esc_html_e( 'CustomPress Shortcodes', 'kleinanzeigen' ); ?></h3>


	<div class="postbox">
		<h3 class='hndle'><span><?php esc_html_e( 'CustomPress Shortcodes', 'kleinanzeigen' ) ?></span></h3>
		<div class="inside">
			<table class="form-table">
				<tr>
					<th>
						<?php esc_html_e('Benutzerdefinierter Felder Eingabe', 'kleinanzeigen'); ?>
					</th>
					<td>
						<p><?php esc_html_e('Wird verwendet, um die Eingabefelder einer Reihe von benutzerdefinierten Feldern für den angegebenen Beitrag "ID" einzubetten. Muss innerhalb von &lt;form&gt; verwendet werden und nach dem Absenden muss der empfangende Formularcode das globale aufrufen:', 'kleinanzeigen'); ?>
							<br /><code>global $CustomPress_Core;<br />$CustomPress_Core->save_custom_fields( $post_id );</code><br />
							<?php esc_html_e('um die Eingabe zurück in den Beitrag zu speichern.', 'kleinanzeigen'); ?>
						</p>
						<div class="embed-code-wrap">
							<?php esc_html_e('Basis Shortcode', 'kleinanzeigen'); ?>
							<br /><code>[custom_fields_input post_id="post_id"]</code>
							<br /><span class="description"><?php esc_html_e('Gibt einen vollständigen Satz von Eingabefeldern basierend auf dem Beitragstyp der angegebenen Beitrags-ID zurück.', 'kleinanzeigen'); ?></span>
							<br /><span class="description"><?php esc_html_e('Wenn die post_id weggelassen wird, wird der aktuelle globale $ post als der Post angenommen, an dem gearbeitet wird.', 'kleinanzeigen'); ?></span>

							<br /><br /><?php esc_html_e('oder mit Feldliste', 'kleinanzeigen'); ?><br />
							<code>[custom_fields_input post_id="post_id"] _ct_selectbox_4cf582bd61fa4, _ct_text_4cfeb3eac6f1f,... [/custom_fields_input]</code>
							<br /><span class="description"><?php esc_html_e('Gibt eine Reihe von Eingabefeldern zurück, die von der Feld-ID-Liste im Shortcode bereitgestellt werden. Alle IDs, die nicht mit dem Beitragstyp verknüpft sind, werden ignoriert.', 'kleinanzeigen'); ?></span>

							<br /><br /><?php esc_html_e('oder mit nach Kategorien gefilterter Feldliste', 'kleinanzeigen');?><br />
							<code>[custom_fields_input post_id="post_id"] [ct_filter terms="cat1, cat2,.."] _ct_selectbox_4cf582bd61fa4, _ct_text_4cfeb3eac6f1f,... [/ct_filter] [/custom_fields_input]</code>
							<br /><span class="description"><?php esc_html_e('In einem Eingabeblock können mehrere Filter verwendet werden.', 'kleinanzeigen'); ?></span>

							<br /><br /><?php esc_html_e('oder verwende [ct_in] für einzelne Eingabefelder, um eine bessere Positionierung und Gestaltung zu ermöglichen.', 'kleinanzeigen'); ?><br />
							<code>[ct_in id="_ct_selectbox_4cf582bd61fa4" property="title | description | input" required="true | false" ]</code>
							<br /><span class="description"><?php esc_html_e('Wenn Du das Eigenschaftsattribut weglässt, wird standardmäßig das Eingabefeld HTML verwendet.', 'kleinanzeigen'); ?></span>
							<br /><span class="description"><?php esc_html_e('Wenn Du das erforderliche Attribut weglässt, werden standardmäßig Einstellungen für benutzerdefinierte Felder vorgenommen. Andernfalls überschreibe es.', 'kleinanzeigen'); ?></span>
							<br /><span class="description"><?php esc_html_e('Nimmt den aktuellen globalen $post als den Post an, an dem gearbeitet wird.', 'kleinanzeigen'); ?></span>
							<br /><span class="description"><?php esc_html_e('Die Nomenklatur "title | description | input" bedeutet, eine der Auswahlmöglichkeiten zu verwenden. "title" oder "description oder "input".', 'kleinanzeigen'); ?></span>
						</div>
					</td>
				</tr>
				<tr>
					<th>
						<?php esc_html_e('Benutzerdefinierte Felder validieren', 'kleinanzeigen'); ?>
					</th>
					<td>
						<p>
							<?php esc_html_e('Bei Verwendung der einzelnen benutzerdefinierten Felder [ct_in] sammelt dieser Shortcode das erforderliche Skript und fügt es hinzu, um die Validierung für die Felder auszuführen. ', 'kleinanzeigen'); ?>
							<?php esc_html_e('Der Shortcode [custom_fields_input] enthält dieses Tag automatisch in der Feldgruppe. Es ist nur für [ct_in] -Felder erforderlich.', 'kleinanzeigen'); ?>
						</p>
						<div class="embed-code-wrap">
							<code>[ct_validate]</code>
							<br /><span class="description"><?php esc_html_e('Sollte direkt vor dem schließenden &lt;/form&gt; Tag des Formulars platziert werden, das die zu validierenden Felder enthält.', 'kleinanzeigen'); ?></span>
						</div>
					</td>
				</tr>

				<tr>
					<th>
						<?php esc_html_e('Benutzerdefinierte Felder blockieren', 'kleinanzeigen'); ?>
					</th>
					<td>
						<div>
							<p><?php esc_html_e('Wird verwendet, um die Ausgabe einer Reihe von benutzerdefinierten Feldern für den aktuellen Beitrag einzubetten. Muss innerhalb der Schleife verwendet werden.', 'kleinanzeigen'); ?>
							</p>
							<div class="embed-code-wrap">
								<?php esc_html_e('Basis Shortcode', 'kleinanzeigen'); ?>
								<br /><code>[custom_fields_block]</code>
								<br /><span class="description"><?php esc_html_e('Gibt einen vollständigen Satz von Eingabefeldern basierend auf dem Beitragstyp der angegebenen Beitrags-ID zurück.', 'kleinanzeigen'); ?></span>

								<br /><br /><?php esc_html_e('oder mit Feldliste', 'kleinanzeigen'); ?><br />
								<code>[custom_fields_block] _ct_selectbox_4cf582bd61fa4, _ct_text_4cfeb3eac6f1f,... [/custom_fields_block]</code>
								<br /><span class="description"><?php esc_html_e('Gibt eine Reihe von Eingabefeldern zurück, die von der Feld-ID-Liste im Shortcode bereitgestellt werden. Alle IDs, die nicht mit dem Beitragstyp verknüpft sind, werden ignoriert.', 'kleinanzeigen'); ?></span>

								<br /><br /><?php esc_html_e('oder mit nach Kategorien gefilterter Feldliste', 'kleinanzeigen');?>
								<br /><code>[custom_fields_block] [ct_filter terms="cat1, cat2,.."] _ct_selectbox_4cf582bd61fa4, _ct_text_4cfeb3eac6f1f,... [/ct_filter] [/custom_fields_block]</code>
								<br /><span class="description"><?php esc_html_e('In einem Eingabeblock können mehrere Filter verwendet werden.', 'kleinanzeigen'); ?></span>
							</div>
							<p>
								<strong><?php esc_html_e('Attribute für [custom_fields_block]', 'kleinanzeigen'); ?></strong>
								<br /><span class="description"><?php esc_html_e( 'property = So formatieren Sie die Ausgabe des Upload-Felds. Akzeptierte Werte sind "value" (Standard), "link" oder "image". Dies wird nur für Upload-Feldwerte berücksichtigt.', 'kleinanzeigen' ) ?></span>
								<br /><span class="description"><?php esc_html_e( 'wrap = Wickel die Felder entweder in eine "table", eine "ul" oder eine "div" -Struktur.', 'kleinanzeigen' ) ?></span>
								<br /><strong><?php esc_html_e( 'Die Standard-Wrap-Attribute können mithilfe der folgenden Einzelattribute überschrieben werden:', 'kleinanzeigen'); ?></strong>
								<br /><span class="description"><?php esc_html_e( 'open = HTML, mit dem der Block beginnt', 'kleinanzeigen' ) ?></span>
								<br /><span class="description"><?php esc_html_e( 'close = HTML zum Beenden des Blocks', 'kleinanzeigen' ) ?></span>
								<br /><span class="description"><?php esc_html_e( 'open_line = HTML, mit dem eine Zeile beginnen soll', 'kleinanzeigen' ) ?></span>
								<br /><span class="description"><?php esc_html_e( 'close_line = HTML zum Beenden einer Zeile', 'kleinanzeigen' ) ?></span>
								<br /><span class="description"><?php esc_html_e( 'open_title = HTML, mit dem der Titel beginnt', 'kleinanzeigen' ) ?></span>
								<br /><span class="description"><?php esc_html_e( 'close_title = HTML, mit dem der Titel beendet werden soll', 'kleinanzeigen' ) ?></span>
								<br /><span class="description"><?php esc_html_e( 'open_value = HTML, mit dem der Wert beginnt', 'kleinanzeigen' ) ?></span>
								<br /><span class="description"><?php esc_html_e( 'close_value = HTML, mit dem der Wert beendet werden soll', 'kleinanzeigen' ) ?></span>
							</p>
						</div>
					</td>
				</tr>
				<tr>
					<th>
						<?php esc_html_e('Benutzerdefinierter Feldfilter', 'kleinanzeigen'); ?>
					</th>
					<td>
						<p><?php esc_html_e('Wird verwendet, um die Liste der zurückgegebenen Felder abhängig von den Kategorien des Beitrags einzuschränken. Einem [custom_field_input] oder [custom_field_block] Shortcode können mehrere [ct_filter] Shortcodes hinzugefügt werden.', 'kleinanzeigen'); ?></p>
						<code>[ct_filter terms="cat1, cat2,.." not="true | false"] _ct_selectbox_4cf582bd61fa4, _ct_text_4cfeb3eac6f1f,... [/ct_filter]</code>
						<br /><strong><?php esc_html_e('Attribute für [custom_field_filter]', 'kleinanzeigen'); ?></strong>
						<br /><span class="description"><?php esc_html_e('terms= Durch Kommas getrennte Kategorieliste zum Filtern. Kategorien, die nicht dem Beitragstyp des aktuellen Beitrags zugeordnet sind, werden ignoriert.', 'kleinanzeigen'); ?></span>
						<br /><span class="description"><?php esc_html_e('not= Wenn true, wird der Filter invertiert und alle nicht ausgewählten Felder zurückgegeben. Der Standardwert ist false.', 'kleinanzeigen'); ?></span>
						<br /><span class="description"><?php esc_html_e('Die durch Kommas getrennte Liste der Felder zwischen dem öffnenden und dem schließenden Tag wird zurückgegeben, wenn die Kategorien übereinstimmen. Felder, die nicht dem Beitragstyp des aktuellen Beitrags zugeordnet sind, werden ignoriert.', 'kleinanzeigen'); ?></span>
					</td>
				</tr>
			</table>
		</div>
	</div>

</div>
