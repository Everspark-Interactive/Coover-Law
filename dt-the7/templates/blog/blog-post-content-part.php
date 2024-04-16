<?php
/**
 * Blog standard post format content part
 *
 * @package vogue
 * @since 1.0.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

?>
<span class="pub"><?php echo get_the_date( 'd M Y' ); ?></span>
	<h2 class="entry-title tt">
		<a href="<?php the_permalink(); ?>" title="<?php echo the_title_attribute( 'echo=0' ); ?>" rel="bookmark"><?php the_title(); ?></a>
	</h2>

	<?php
	if ( presscore_get_config()->get( 'show_excerpts' ) ) {
		presscore_the_excerpt();
	}
	?>