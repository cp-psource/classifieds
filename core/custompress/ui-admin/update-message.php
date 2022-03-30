<?php if (!defined('ABSPATH')) die('Kein direkter Zugriff erlaubt!'); ?>

<?php if ( isset( $_GET['updated'] ) ): ?>
<div class="updated below-h2" id="message">
	<p><?php esc_html_e( 'Inhaltstyp aktualisiert', 'kleinanzeigen' ); ?></p>
</div>
<?php endif; ?>