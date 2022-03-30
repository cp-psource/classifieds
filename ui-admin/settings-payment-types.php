<?php if (!defined('ABSPATH')) die('Kein direkter Zugriff erlaubt!'); ?>

<?php

$options = $this->get_options('payment_types');

//PayPal gateway
$paypal = (empty($options['paypal']) ) ? array() : $options['paypal'];

//Authorizenet gateway
$authorizenet = (empty($options['authorizenet']) ) ? array() : $options['authorizenet'];

?>
<script language="JavaScript">
	(function($) {
		$(document).ready(function() {
			$("#gateways input[type='checkbox']" ).change( function () {
				if ('use_free' == $(this).attr( 'id' ) ) {
					checked = $(this).prop('checked');
					$("#gateways input[type='checkbox']" ).prop( 'checked', false );
					$(this).prop('checked', checked );
				} else {
					$("#use_free").prop( 'checked', false );
				}
				$("#save").click();
				return false;
			});
		});
	}) (jQuery);
</script>

<div class="wrap">

	<?php $this->render_admin( 'navigation', array( 'page' => 'kleinanzeigen_settings','tab' => 'payment-types' ) ); ?>
	<?php $this->render_admin( 'message' ); ?>
	<h1><?php _e( 'Payment Types', 'kleinanzeigen' ); ?></h1>

	<form id="payment_type" action="#" method="post" class="dp-payments">

		<div id="gateways" class="postbox">
			<h3 class='hndle'><span><?php _e( 'Zahlungs-Gateway-Einstellungen', 'kleinanzeigen' ) ?></span></h3>
			<div class="inside">

				<table class="form-table">
					<tr>
						<th scope="row"><?php _e( 'Zahlungsgateway(s) auswählen', 'kleinanzeigen' ) ?></th>
						<td>
							<p>
								<label>
									<input type="checkbox" class="cf_allowed_gateways" name="use_free" id="use_free" value="1" <?php checked( ! empty($options['use_free']) ); ?> />
									<?php _e( 'Kostenlose Kleinanzeigen', 'kleinanzeigen' ) ?>
									<span class="description"><?php _e( '(angemeldete Benutzer können kostenlos Inserate erstellen).', 'kleinanzeigen' ); ?></span>
								</label>
							</p>
							<p>
								<label>
									<input type="checkbox" class="cf_allowed_gateways" name="use_paypal" id="use_paypal" value="1" <?php checked( ! empty($options['use_paypal']) ); ?> />
									<?php _e( 'PayPal', 'kleinanzeigen' ) ?>
								</label>
							</p>

							<p>
								<label>
									<input type="checkbox" class="cf_allowed_gateways" name="use_authorizenet" id="use_authorizenet" value="1" <?php echo checked( ! empty($options['use_authorizenet']) ); ?> />
									<?php _e( 'AuthorizeNet', 'kleinanzeigen' ) ?>
								</label>
							</p>

						</td>
					</tr>
				</table>
			</div>
		</div>

		<?php
		if( empty( $options['use_paypal']) ):
		//Remember if prevoously set.
		foreach($paypal as $key => $value){
			echo '<input type="hidden" name="paypal[' . $key . ']" value="' . esc_attr($value) .'" />';
		}
		else:
		?>
		<div id="pane_paypal" class="postbox" >
			<h3 class='hndle'><span><?php _e( 'PayPal Einstellungen', 'kleinanzeigen' ) ?></span></h3>
			<div class="inside">
				<p class="description">
					<?php _e( "Express Checkout ist die führende Checkout-Lösung von PayPal, die den Checkout-Prozess für Käufer optimiert und sie nach dem Kauf auf Deiner Webseite hält. Im Gegensatz zu PayPal Pro fallen für die Nutzung von Express Checkout keine zusätzlichen Gebühren an, obwohl Du möglicherweise ein kostenloses Upgrade auf ein Geschäftskonto durchführen musst.", 'kleinanzeigen' ) ?>
					<a href="https://cms.paypal.com/us/cgi-bin/?&amp;cmd=_render-content&amp;content_ID=developer/e_howto_api_ECGettingStarted" target="_blank"><?php _e( 'Mehr Info', 'kleinanzeigen' ) ?></a>
				</p>

				<table class="form-table">
					<tr>
						<th>
							<label for="api_url"><?php _e('URL für PayPal-API-Aufrufe', 'kleinanzeigen' ) ?></label>
						</th>
						<td>
							<?php $api_url = (empty($paypal['api_url']) ? 'sandbox' : $paypal['api_url'] )?>
							<select id="api_url" name="paypal[api_url]" style="width:100px" >
								<option value="sandbox" <?php selected($api_url == 'sandbox' ); ?>><?php _e( 'Sandbox', 'kleinanzeigen' ); ?></option>
								<option value="live"    <?php selected($api_url == 'live' ); ?>><?php _e( 'Live', 'kleinanzeigen' ); ?></option>
							</select>
							<br /><span class="description"><?php _e( 'Wähle zwischen PayPal Sandbox und PayPal Live.', 'kleinanzeigen' ); ?></span>
						</td>
					</tr>
					<tr>
						<th>
							<label for="business_email"><?php _e( 'PayPal Business Email', 'kleinanzeigen' ) ?></label>
						</th>
						<td>
							<input type="text" id="business_email" name="paypal[business_email]" value="<?php echo ( empty( $paypal['business_email'] ) ) ? '' : $paypal['business_email']; ?>" size="50" />
							<br /><span class="description"><?php _e( 'Deine PayPal-Geschäfts-E-Mail für wiederkehrende Zahlungen.', 'kleinanzeigen' ); ?></span>
						</td>
					</tr>
					<tr>
						<th>
							<label for="api_username"><?php _e( 'API-Benutzername', 'kleinanzeigen' ) ?></label>
						</th>
						<td>
							<p>
								<span class="description">
									<?php _e( 'Du musst Dich bei PayPal anmelden und eine API-Signatur erstellen, um Deine Zugangsdaten zu erhalten. ', 'kleinanzeigen' ) ?>
									<a href="https://cms.paypal.com/us/cgi-bin/?cmd=_render-content&amp;content_ID=developer/e_howto_api_ECAPICredentials" target="_blank"><?php _e( 'Anweisungen', 'kleinanzeigen' ) ?></a>
								</span>
							</p>
							<input type="text" id="api_username" name="paypal[api_username]" value="<?php echo (empty($paypal['api_username']) ) ? '' : $paypal['api_username']; ?>" size="50"/>
							<br /><span class="description"><?php _e( 'Dein PayPal-API-Benutzername.', 'kleinanzeigen' ); ?></span>
						</td>
					</tr>
					<tr>
						<th>
							<label for="api_password"><?php _e( 'API Passwort', 'kleinanzeigen' ) ?></label>
						</th>
						<td>
							<input type="text" id="api_password" name="paypal[api_password]" value="<?php echo (empty($paypal['api_password']) ) ? '' : $paypal['api_password']; ?>" size="50" />
							<br /><span class="description"><?php _e( 'Dein PayPal-API-Passwort.', 'kleinanzeigen' ); ?></span>
						</td>
					</tr>
					<tr>
						<th>
							<label for="api_signature"><?php _e( 'API Signatur', 'kleinanzeigen' ) ?></label>
						</th>
						<td>
							<textarea rows="1" cols="55" id="api_signature" name="paypal[api_signature]"><?php echo (empty($paypal['api_signature']) ) ? '' : $paypal['api_signature']; ?></textarea>
							<br /><span class="description"><?php _e( 'Deine PayPal API-Signatur.', 'kleinanzeigen' ); ?></span>
						</td>
					</tr>
					<tr>
						<th>
							<label for="currency"><?php _e( 'Währung', 'kleinanzeigen' ) ?></label>
						</th>
						<td>
							<?php $currency = (empty($paypal['currency']) ? 'EUR' : $paypal['currency']); ?>
							<select id="currency" name="paypal[currency]" style="width:100px">
								<option value="USD" <?php selected( $currency == 'USD' ); ?>><?php _e( 'U.S. Dollar', 'kleinanzeigen' ) ?></option>
								<option value="EUR" <?php selected( $currency == 'EUR' ); ?>><?php _e( 'Euro', 'kleinanzeigen' ) ?></option>
								<option value="GBP" <?php selected( $currency == 'GBP' ); ?>><?php _e( 'Pound Sterling', 'kleinanzeigen' ) ?></option>
								<option value="CAD" <?php selected( $currency == 'CAD' ); ?>><?php _e( 'Canadian Dollar', 'kleinanzeigen' ) ?></option>
								<option value="AUD" <?php selected( $currency == 'AUD' ); ?>><?php _e( 'Australian Dollar', 'kleinanzeigen' ) ?></option>
								<option value="JPY" <?php selected( $currency == 'JPY' ); ?>><?php _e( 'Japanese Yen', 'kleinanzeigen' ) ?></option>
								<option value="CHF" <?php selected( $currency == 'CHF' ); ?>><?php _e( 'Swiss Franc', 'kleinanzeigen' ) ?></option>
								<option value="SGD" <?php selected( $currency == 'SGD' ); ?>><?php _e( 'Singapore Dollar', 'kleinanzeigen' ) ?></option>
								<option value="NZD" <?php selected( $currency == 'NZD' ); ?>><?php _e( 'New Zealand Dollar', 'kleinanzeigen' ) ?></option>
								<option value="SEK" <?php selected( $currency == 'SEK' ); ?>><?php _e( 'Swedish Krona', 'kleinanzeigen' ) ?></option>
								<option value="DKK" <?php selected( $currency == 'DKK' ); ?>><?php _e( 'Danish Krone', 'kleinanzeigen' ) ?></option>
								<option value="NOK" <?php selected( $currency == 'NOK' ); ?>><?php _e( 'Norwegian Krone', 'kleinanzeigen' ) ?></option>
								<option value="CZK" <?php selected( $currency == 'CZK' ); ?>><?php _e( 'Czech Koruna', 'kleinanzeigen' ) ?></option>
								<option value="HUF" <?php selected( $currency == 'HUF' ); ?>><?php _e( 'Hungarian Forint', 'kleinanzeigen' ) ?></option>
								<option value="PLN" <?php selected( $currency == 'PLN' ); ?>><?php _e( 'Polish Zloty', 'kleinanzeigen' ) ?></option>
							</select>
							<br /><span class="description"><?php _e( 'Die Währung, in der Du Zahlungen abwickeln möchtest.', 'kleinanzeigen' ); ?></span>
						</td>
					</tr>
					<tr>
						<th>
							<label for="pp_payment_url"><?php _e( 'Weiterleitungs-URL bei Erfolg:', 'kleinanzeigen' ) ?></label>
						</th>
						<td>
							<input type="text" name="paypal[payment_url]" id="pp_payment_url" value="<?php echo (empty($paypal['payment_url']) ) ? '' : $paypal['payment_url']; ?>" size="50" />
							<br /><span class="description"><?php _e( 'standardmäßig zur internen Erfolgsseite', 'kleinanzeigen' ) ?></span>
						</td>
					</tr>
					<tr>
						<th>
							<label for="pp_cancel_url"><?php _e( 'Weiterleitungs-URL bei Abbrechen:', 'kleinanzeigen' ) ?></label>
						</th>
						<td>
							<input type="text" name="paypal[cancel_url]" id="pp_cancel_url" value="<?php echo (empty($paypal['cancel_url']) ) ? '' : $paypal['cancel_url']; ?>" size="50" />
							<br /><span class="description"><?php _e( 'standardmäßig zur Startseite', 'kleinanzeigen' ) ?></span>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<?php endif; ?>

		<?php
		if( empty( $options['use_authorizenet']) ):
		//Remember if previously set.
		foreach($authorizenet as $key => $value){
			echo '<input type="hidden" name="authorizenet[' . $key . ']" value="' . esc_attr($value) .'" />';
		}
		else:
		?>
		<!-- **Authorize.Net** -->
		<div id="pane_authorizenet" class="postbox" <?php if( empty($options['use_authorizenet']) ) echo 'style="display: none;"'; ?>>
			<h3 class='hndle'><span><?php _e('Authorize.net AIM-Einstellungen', 'kleinanzeigen'); ?></span></h3>
			<div class="inside">
				<span class="description"><?php _e('Authorize.net AIM ist eine anpassbare Zahlungsabwicklungslösung, die dem Händler die Kontrolle über alle Schritte bei der Verarbeitung einer Transaktion gibt. Zur Verwendung dieses Gateways ist ein SSL-Zertifikat erforderlich. USD ist die einzige Währung, die von diesem Gateway unterstützt wird.', 'kleinanzeigen') ?></span>
				<table class="form-table">
					<tr>
						<th scope="row"><?php _e('Modus', 'kleinanzeigen') ?></th>
						<td>
							<p>
								<?php $mode = (empty($authorizenet['mode']) ? 'sandbox' : $authorizenet['mode']); ?>
								<select name="authorizenet[mode]"  style="width:100px">
									<option value="sandbox" <?php selected( $mode == 'sandbox') ?>><?php _e('Sandbox', 'kleinanzeigen') ?></option>
									<option value="live" <?php selected( $mode == 'live') ?>><?php _e('Live', 'kleinanzeigen') ?></option>
								</select>
							</p>
						</td>
					</tr>
					<tr>
						<th scope="row"><?php _e('Gateway Credentials', 'kleinanzeigen') ?></th>
						<td>
							<span class="description"><?php print sprintf(__('Du musst Dich beim Authorize.net-Händler-Dashboard anmelden, um die API-Login-ID und den API-Transaktionsschlüssel zu erhalten. <a target="_blank" href="%s">Anweisungen &raquo;</a>', 'kleinanzeigen'), "http://www.authorize.net/support/merchant/Integration_Settings/Access_Settings.htm"); ?></span>
							<p>
								<label><?php _e('Login ID', 'kleinanzeigen') ?><br />
									<input value="<?php echo (empty($authorizenet['api_user']) ) ? '' : esc_attr($authorizenet['api_user']); ?>" size="50" name="authorizenet[api_user]" type="text" />
								</label>
							</p>
							<p>
								<label><?php _e('Transaktionsschlüssel', 'kleinanzeigen') ?><br />
									<input value="<?php echo (empty($authorizenet['api_key']) ) ? '' : esc_attr($authorizenet['api_key']); ?>" size="50" name="authorizenet[api_key]" type="text" />
								</label>
							</p>
						</td>
					</tr>
					<tr>
						<th>
							<label for="an_payment_url"><?php _e( 'Weiterleitungs-URL bei Erfolg:', 'kleinanzeigen' ) ?></label>
						</th>
						<td>
							<input type="text" name="authorizenet[payment_url]" id="an_payment_url" value="<?php echo (empty($authorizenet['payment_url']) ) ? '' : $authorizenet['payment_url']; ?>" size="50" />
							<br /><span class="description"><?php _e( 'standardmäßig zur internen Erfolgsseite', 'kleinanzeigen' ) ?></span>
						</td>
					</tr>
					<tr>
						<th>
							<label for="an_cancel_url"><?php _e( 'Weiterleitungs-URL bei Abbrechen:', 'kleinanzeigen' ) ?></label>
						</th>
						<td>
							<input type="text" name="authorizenet[cancel_url]" id="an_cancel_url" value="<?php echo (empty($authorizenet['cancel_url']) ) ? '' : $authorizenet['cancel_url']; ?>" size="50" />
							<br /><span class="description"><?php _e( 'standardmäßig zur Startseite', 'kleinanzeigen' ) ?></span>
						</td>
					</tr>
					<tr>
						<th scope="row"><?php _e('Erweiterte Einstellungen', 'kleinanzeigen') ?></th>
						<td>
							<span class="description"><?php _e('Optionale Einstellungen zur Steuerung erweiterter Optionen', 'kleinanzeigen') ?></span>
							<!--
							<p>
							<label><a title="<?php _e('Authorize.net default is \',\'. Otherwise, get this from your credit card processor. If the transactions are not going through, this character is most likely wrong.', 'kleinanzeigen'); ?>"><?php _e('Delimiter Character', 'kleinanzeigen'); ?></a><br />
							<input value="<?php echo (empty($authorizenet['delim_char']))?",":esc_attr($authorizenet['delim_char']); ?>" size="2" name="authorizenet[delim_char]" type="text" />
							</label>
							</p>

							<p>
							<label><a title="<?php _e('Authorize.net default is blank. Otherwise, get this from your credit card processor. If the transactions are going through, but getting strange responses, this character is most likely wrong.', 'kleinanzeigen'); ?>"><?php _e('Encapsulation Character', 'kleinanzeigen'); ?></a><br />
							<input value="<?php echo (empty($authorizenet['encap_char']) ) ? '' : esc_attr($authorizenet['encap_char']); ?>" size="2" name="authorizenet[encap_char]" type="text" />
							</label>
							</p>
							-->
							<p>
								<label><?php _e('Email Customer (on success):', 'kleinanzeigen'); ?><br />
									<?php $email_customer = (empty($authorizenet['email_customer']) ? '' : $authorizenet['email_customer']); ?>
									<select name="authorizenet[email_customer]" style="width:100px">
										<option value="yes" <?php selected($email_customer == 'yes') ?>><?php _e('Yes', 'kleinanzeigen') ?></option>
										<option value="no" <?php selected($email_customer == 'no') ?>><?php _e('No', 'kleinanzeigen') ?></option>
									</select>
								</label>
							</p>

							<p>
								<label><a title="<?php _e('This text will appear as the header of the email receipt sent to the customer.', 'kleinanzeigen'); ?>"><?php _e('Customer Receipt Email Header', 'kleinanzeigen'); ?></a><br/>
									<input value="<?php echo empty($authorizenet['header_email_receipt'])?__('Thanks for your payment!', 'kleinanzeigen'):esc_attr($authorizenet['header_email_receipt']); ?>" size="50" name="authorizenet[header_email_receipt]" type="text" />
								</label>
							</p>

							<p>
								<label><a title="<?php _e('This text will appear as the footer on the email receipt sent to the customer.', 'kleinanzeigen'); ?>"><?php _e('Customer Receipt Email Footer', 'kleinanzeigen'); ?></a><br/>
									<input value="<?php echo empty($authorizenet['footer_email_receipt']) ? '' : esc_attr($authorizenet['footer_email_receipt']); ?>" size="50" name="authorizenet[footer_email_receipt]" type="text" />
								</label>
							</p>

							<p>
								<label><a title="<?php _e('The payment gateway generated MD5 hash value that can be used to authenticate the transaction response. Not needed because responses are returned using an SSL connection.', 'kleinanzeigen'); ?>"><?php _e('Security: MD5 Hash', 'kleinanzeigen'); ?></a><br/>
									<input value="<?php echo (empty($authorizenet['md5_hash']) ) ? '' : esc_attr($authorizenet['md5_hash']); ?>" size="50" name="authorizenet[md5_hash]" type="text" />
								</label>
							</p>

							<p>
								<label><a title="<?php _e('Fordere eine abgegrenzte Antwort vom Zahlungsgateway an.', 'kleinanzeigen'); ?>"><?php _e('Delim-Daten:', 'kleinanzeigen'); ?></a><br/>
									<?php $delim_data = (empty($authorizenet['delim_data']) ? '' : $authorizenet['delim_data']); ?>
									<select name="authorizenet[delim_data]" style="width:100px">
										<option value="yes" <?php selected($delim_data == 'yes') ?>><?php _e('Ja', 'kleinanzeigen') ?></option>
										<option value="no" <?php selected($delim_data == 'no') ?>><?php _e('Nein', 'kleinanzeigen') ?></option>
									</select>
								</label>
							</p>
							<!--
							<p>
							<label><a title="<?php _e('Viele andere Gateways verfügen über Authorize.net-API-Emulatoren. Um eines dieser Gateways zu verwenden, gib hier seine API-Post-URL ein.', 'kleinanzeigen'); ?>"><?php _e('Custom API URL', 'kleinanzeigen') ?></a><br />
							<input value="<?php echo (empty($authorizenet['custom_api']) ) ? '' : esc_attr($authorizenet['custom_api']); ?>" size="50" name="authorizenet[custom_api]" type="text" />
							</label>
							</p>
							-->
						</td>
					</tr>
				</table>
			</div>
		</div>
		<?php endif; ?>

		<?php wp_nonce_field('verify'); ?>
		<input type="hidden" name="key" value="payment_types" />
		<p class="submit">
			<input type="submit" class="button-primary" id="save" name="save" value="<?php _e( 'Änderungen speichern', 'kleinanzeigen' ); ?>">
		</p>


	</form>
</div>
