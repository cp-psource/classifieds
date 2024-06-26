<?php

global $wp_query;

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$pages = $wp_query->max_num_pages;

if( ! $pages) $pages = 1;
$range = 4;
$showitems = ($range * 2) + 1;

?>
<div class="cf-navigation"><!--begin .cf-navigation-->

	<?php if ( $pages > 1 ) : ?>

	<div class="cf-pagination"><!--begin .cf-pagination-->

		<span><?php echo sprintf( __('Seite %1$d von %2$d',$this->text_domain), $paged, $pages); ?></span>

		<?php if($paged > 2 && $paged > $range+1 && $showitems < $pages): ?>
		<a href="<?php echo get_pagenum_link(1); ?>">&laquo;<?php _e('Erste',$this->text_domain); ?></a>
		<?php endif; ?>

		<?php if($paged > 1 && $showitems < $pages) : ?>
		<a href="<?php echo get_pagenum_link($paged - 1); ?>">&lsaquo;<?php _e('Vorherige',$this->text_domain); ?></a>
		<?php endif; ?>

		<?php for ($i=1;$i <= $pages;$i++) :
		if (1 != $pages && ( !($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems )):
		echo ($paged == $i) ? '<span class="current">' . $i . '</span>' : '<a href="' . get_pagenum_link($i) . '" class="inactive">' . $i . '</a>';
		endif;
		endfor;

		if ($paged < $pages && $showitems < $pages) : ?>
		<a href="<?php echo get_pagenum_link($paged + 1); ?>"><?php _e('Nächste',$this->text_domain); ?>&rsaquo;</a>
		<?php endif; ?>

		<?php if ($paged < $pages - 1 &&  $paged + $range - 1 < $pages && $showitems < $pages): ?>
		<a href="<?php echo get_pagenum_link($pages); ?>"><?php _e('Letzte', $this->text_domain); ?>&raquo;</a>
		<?php endif; ?>

	</div> <!--end .cf-pagination-->

	<?php endif; ?>

</div><!--end .cf-navigation-->
