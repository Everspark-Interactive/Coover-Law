<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package presscore
 * @since presscore 1.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

$config = Presscore_Config::get_instance();
$config->set('template', 'page');
presscore_config_base_init();
get_header(); ?>
 <?php if(is_page(1930)){ ?>
	 <style type="text/css">
    @media screen and (max-width: 767px) {
 #main {
    padding: 0px 0px 50px 0px !important;
}

}
@media screen and (max-width: 567px) {
.vc_row.wpb_row.wf-container.zkmob.custnewhomesldr{margin-top:0px !important;}
div#slide-17-layer-2 {
    padding-top: 11px !important;
}    
div#slide-17-layer-3{margin:-1px 0 0 10px !important;}    
div#slide-17-layer-1 {
    margin: -5px 0 0 0px !important;
}
}
     </style>
 <?php } ?>

		<?php if ( presscore_is_content_visible() ): ?>

			<div id="content" class="content" role="main">


            <?php if(is_page(1930)){
                if ( wp_is_mobile() ) { ?> <div class="vc_row wpb_row wf-container zkmob custnewhomesldr" style="margin-top: -50px; margin-bottom: 0px; min-height: 0px;margin-left:0px;margin-right:0;"><?php echo do_shortcode('[rev_slider alias="mobile-slider"]'); }else{?>
                <div class="vc_row wpb_row wf-container custnewhomesldr" style="margin-top: -50px; margin-bottom: 0px; min-height: 0px;margin-left:0px;margin-right:0;">
<?php echo do_shortcode('[rev_slider alias="new-home"]'); ?><?php } } ?>



			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<?php do_action('presscore_before_loop'); ?>

					<?php the_content(); ?>

					<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'the7mk2' ), 'after' => '</div>' ) ); ?>

					<?php presscore_display_share_buttons_for_post( 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; ?>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'page' ); ?>

			<?php endif; ?>

			</div><!-- #content -->

			<?php do_action('presscore_after_content'); ?>

		<?php endif; // if content visible ?>

<?php get_footer(); ?>