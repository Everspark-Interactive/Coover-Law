<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the <div class="wf-container wf-clearfix"> and all content after
 *
 * @package vogue
 * @since 1.0.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

$config = Presscore_Config::get_instance();

if ( presscore_is_content_visible() ): ?>

			</div><!-- .wf-container -->
		</div><!-- .wf-wrap -->
	</div><!-- #main -->

	<?php
	if ( $config->get( 'template.footer.background.slideout_mode' ) ) {
		echo '</div>';
	}

	do_action( 'presscore_after_main_container' );
	?>

<?php endif; // presscore_is_content_visible ?>

	<a href="#" class="scroll-top"></a>

</div><!-- #page -->
<?php wp_footer(); ?>

<script type="text/javascript">
    jQuery.browser = {};
    (function () {
        jQuery.browser.msie = false;
        jQuery.browser.version = 0;
        if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
            jQuery.browser.msie = true;
            jQuery.browser.version = RegExp.$1;
        }
    })();
</script>
<script>
jQuery(window).load(function() {
//fix for non ssl retina images
jQuery(".retinized").each(function(){
var src = jQuery(this).attr("srcset").replace(/http:/g, "https:");
jQuery(this).attr("srcset", src);
});

});


</script>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>
<script>
( function( $ ) {
    $( document ).ready( function(){
      jQuery('.st-accordion ul li:first-child').removeClass('st-open');
        jQuery('.st-accordion li:first-child').css("max-height", "0px");
        jQuery('.st-accordion li:first-child .st-content').css("display", "none");
 
    });
})( jQuery );
</script>
</body>
</html>