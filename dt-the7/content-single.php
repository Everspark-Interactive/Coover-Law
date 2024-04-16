<?php
/**
 * @package presscore
 * @since presscore 0.1
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

global $post;

// thumbnail visibility
$hide_thumbnail = (bool) get_post_meta($post->ID, '_dt_post_options_hide_thumbnail', true);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php if ( is_single() ) :
				the_title( '<h1>', '</h1>' );
			else :
				the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif; ?>

  <?php if ( has_post_thumbnail() ) { the_post_thumbnail(array(350,200), array( 'class' => 'alignleft' )); } ?>
       

<?php do_action('presscore_before_post_content'); ?>

	<?php if ( !post_password_required() ) : ?>

	<?php

	$img_class = 'alignleft';
	$img_options = array( 'w' => 270, 'z' => 1 );

	$post_format = get_post_format();

	switch ( $post_format ) {

		case 'video':
			// post content
			the_content();

			break;

		case 'gallery':

			// post content
			the_content();

			break;

		case 'aside':
		case 'link':
		case 'quote':
		case 'status':

			// post content
			dt_get_template_part( 'blog/blog-post-content-part', $post_format );
			break;

		case 'image':
		default:
			$img_class = 'alignnone';
			$img_options = false;

		

			// post content
			the_content();

	}
	?>

	<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'the7mk2' ), 'after' => '</div>' ) ); ?>

	<?php
	$post_tags = '';
	$config = presscore_get_config();
	if ( $config->get( 'post.meta.fields.tags' ) ) {
		$post_tags = presscore_get_post_tags_html();
	}

	$share_buttons = presscore_display_share_buttons_for_post('post', array('echo' => false));

	if ( $share_buttons || $post_tags ) {
		printf( '<div class="post-meta wf-mobile-collapsed">%s</div>', $post_tags . $share_buttons );
	}
	?>

	<?php
	// 'theme options' -> 'general' -> 'show author info on blog post pages'
	if ( $config->get( 'post.author_block' ) ) {
		presscore_display_post_author();
	}
	?>

	<?php presscore_display_related_posts(); ?>

	<?php else: ?>

		<?php the_content(); ?>


	<?php endif; // !post_password_required ?>

	<?php do_action('presscore_after_post_content'); ?>

</article><!-- #post-<?php the_ID(); ?> -->
