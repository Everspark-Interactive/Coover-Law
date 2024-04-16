<?php
/**
 * Vogue theme.
 *
 * @since 1.0.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since 1.0.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1200; /* pixels */
}
/**
 * Initialize theme.
 *
 * @since 1.0.0
 */
require( trailingslashit( get_template_directory() ) . 'inc/init.php' );

add_action('admin_head', 'coovermy_custom_font11');
function coovermy_custom_font11() {
  echo '<style>
    .notice.notice-error.is-dismissible.jquery-migrate-deprecation-notice.hidden {
      display: none !important;
    } 
    .notice.notice-warning.is-dismissible.jquery-migrate-dashboard-notice {
    display: none;
}
  </style>';
}


// awards
add_shortcode( 'coover_badges', 'badges_shortcode_func' );
function badges_shortcode_func() {
	ob_start();
    if(wp_is_mobile()){
    ?>

<img src="https://www.cooverlaw.com/wp-content/uploads/2020/09/coover-logos.png" alt="Coover Law Badges" usemap="#mobile-map">
<map name="mobile-map">
    <area target="_blank" alt="Fred Luedde Coover AVVO" title="Fred Luedde Coover AVVO" href="https://www.avvo.com/attorneys/21044-md-fred-coover-1540817.html?utm_campaign=avvo_rating&amp;utm_content=1217583&amp;utm_medium=avvo_badge&amp;utm_source=avvo" coords="18,49,150,929" shape="rect">
    <area target="_blank" alt="Fred Luedde Coover Super Lawyers" title="Fred Luedde Coover Super Lawyers" href="https://profiles.superlawyers.com/maryland/columbia/lawyer/fred-l-coover-iii/c8e2855a-95bb-4da4-846b-3fd3686cb0d0.html?utm_source=c8e2855a-95bb-4da4-846b-3fd3686cb0d0&amp;utm_campaign=v1-slbadge-red&amp;utm_content=profile%22%3EFred" coords="11,989,170,1117" shape="rect">
</map>
    <?php }else{?>
    <img src="https://www.cooverlaw.com/wp-content/uploads/2020/09/cooverlaw-bages.png" alt="Coover Law Badges" usemap="#desktop-map">
<map name="desktop-map">
    <area target="_blank" alt="Fred Luedde Coover AVVO" title="Fred Luedde Coover AVVO" href="https://www.avvo.com/attorneys/21044-md-fred-coover-1540817.html?utm_campaign=avvo_rating&amp;utm_content=1217583&amp;utm_medium=avvo_badge&amp;utm_source=avvo" coords="23,5,891,96" shape="rect">
    <area target="_blank" alt="Fred Luedde Coover AVVO" title="Fred Luedde Coover AVVO" href="https://www.avvo.com/attorneys/21044-md-fred-coover-1540817.html?utm_campaign=avvo_rating&amp;utm_content=1217583&amp;utm_medium=avvo_badge&amp;utm_source=avvo" coords="491,146,617,179" shape="rect">
    <area target="_blank" alt="Fred Luedde Coover Super Lawyers" title="Fred Luedde Coover Super Lawyers" href="https://profiles.superlawyers.com/maryland/columbia/lawyer/fred-l-coover-iii/c8e2855a-95bb-4da4-846b-3fd3686cb0d0.html?utm_source=c8e2855a-95bb-4da4-846b-3fd3686cb0d0&amp;utm_campaign=v1-slbadge-red&amp;utm_content=profile%22%3EFred" coords="952,6,1078,104" shape="rect">
</map>
 <?php }
}



//filter for anchor tag
add_filter( 'gform_pre_send_email', 'check_before_email' );
function check_before_email( $email ) {
    $msg = $email['message'];
    $attch ='';
    $attch = $email['attachments'][0];
    if($attch == ''){
    if ($msg)
        {
            $field_value = $msg;
            $pattern = '(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})';
            
            if (preg_match_all($pattern, $field_value))
            {
                 $email['abort_email'] = true;
                 return $email;
            }           
        }
    }
 }
add_filter( 'gform_confirmation', 'custom_confirmation', 10, 4 );
function custom_confirmation( $confirmation, $form, $entry, $ajax ) {
    $field_value='';
    $field_value = rgar( $entry, '4' );
    $pattern = '(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})';
    if (preg_match_all($pattern, $field_value))
    {
        $redirectURL="/thank-you-two/";
        $confirmation = array( 'redirect' => $redirectURL );
                
    }
    return $confirmation;
}

add_filter( 'gform_confirmation_anchor', '__return_false' );