<?php

add_filter('http_request_timeout', function(){
	return 10;
});

add_action( 'wp_enqueue_scripts', 'add_style_sheet', 20 );
add_action( 'wp_enqueue_scripts', 'add_font_awesome', 20 );
add_action( 'wp_enqueue_scripts', 'add_zenddesk', 20 );
add_action('wp_footer', 'add_google_tag_manager');
add_action('wp_footer', 'add_pinterest_hover_button');

function add_style_sheet() {
        wp_register_style( 'style-sheet-1', get_stylesheet_directory_uri() . '/style1.css' );
        wp_enqueue_style( 'style-sheet-1' );
}

function add_font_awesome() {
	?><link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"><?php
}

function add_zenddesk() {
	?><!-- Start of gnarlymedia Zendesk Widget script -->
<script>/*<![CDATA[*/window.zEmbed||function(e,t){var n,o,d,i,s,a=[],r=document.createElement("iframe");window.zEmbed=function(){a.push(arguments)},window.zE=window.zE||window.zEmbed,r.src="javascript:false",r.title="",r.role="presentation",(r.frameElement||r).style.cssText="display: none",d=document.getElementsByTagName("script"),d=d[d.length-1],d.parentNode.insertBefore(r,d),i=r.contentWindow,s=i.document;try{o=s}catch(c){n=document.domain,r.src='javascript:var d=document.open();d.domain="'+n+'";void(0);',o=s}o.open()._l=function(){var o=this.createElement("script");n&&(this.domain=n),o.id="js-iframe-async",o.src=e,this.t=+new Date,this.zendeskHost=t,this.zEQueue=a,this.body.appendChild(o)},o.write('<body onload="document._l();">'),o.close()}("//assets.zendesk.com/embeddable_framework/main.js","gnarlymedia.zendesk.com");/*]]>*/</script>
<!-- End of gnarlymedia Zendesk Widget script --><?php
}

function add_google_tag_manager() { ?>

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-TTDR8N"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TTDR8N');</script>
<!-- End Google Tag Manager -->

<?php }

function add_pinterest_hover_button() { ?>

<!-- Please call pinit.js only once per page -->
<script type="text/javascript" async  data-pin-shape="round" data-pin-hover="true" src="//assets.pinterest.com/js/pinit.js"></script>

<?php }

add_filter( 'woo_header_inside', 'woo_custom_social_links', 5 );
 
function woo_custom_social_links () {
 global $woo_options; 
 
    $settings = array(
						'feed_url' => '',
						'connect_rss' => '',
						'connect_twitter' => '',
						'connect_facebook' => '',
						'connect_youtube' => '',
						'connect_flickr' => '',
						'connect_linkedin' => '',
						'connect_delicious' => '',
						'connect_rss' => '',
						'connect_googleplus' => '',
						'connect_dribbble' => '',
						'connect_instagram' => '',
						'connect_vimeo' => '',
						'connect_pinterest' => ''
						);
		$settings = woo_get_dynamic_values( $settings );
 
 ?>
		
			<div class="social">
		   		<?php if ( $settings['connect_rss' ] == "true" ) { ?>
		   		<a href="<?php if ( $settings['feed_url'] ) { echo esc_url( $settings['feed_url'] ); } else { echo get_bloginfo_rss('rss2_url'); } ?>" class="subscribe" title="RSS"></a>
 
		   		<?php } if ( $settings['connect_twitter' ] != "" ) { ?>
		   		<a target="_blank" href="<?php echo esc_url( $settings['connect_twitter'] ); ?>" class="twitter" title="Twitter"></a>
 
		   		<?php } if ( $settings['connect_facebook' ] != "" ) { ?>
		   		<a target="_blank" href="<?php echo esc_url( $settings['connect_facebook'] ); ?>" class="facebook" title="Facebook"></a>
 
		   		<?php } if ( $settings['connect_youtube' ] != "" ) { ?>
		   		<a target="_blank" href="<?php echo esc_url( $settings['connect_youtube'] ); ?>" class="youtube" title="YouTube"></a>
 
		   		<?php } if ( $settings['connect_flickr' ] != "" ) { ?>
		   		<a target="_blank" href="<?php echo esc_url( $settings['connect_flickr'] ); ?>" class="flickr" title="Flickr"></a>
 
		   		<?php } if ( $settings['connect_linkedin' ] != "" ) { ?>
		   		<a target="_blank" href="<?php echo esc_url( $settings['connect_linkedin'] ); ?>" class="linkedin" title="LinkedIn"></a>
 
		   		<?php } if ( $settings['connect_delicious' ] != "" ) { ?>
		   		<a target="_blank" href="<?php echo esc_url( $settings['connect_delicious'] ); ?>" class="delicious" title="Delicious"></a>
 
		   		<?php } if ( $settings['connect_googleplus' ] != "" ) { ?>
		   		<a target="_blank" href="<?php echo esc_url( $settings['connect_googleplus'] ); ?>" class="googleplus" title="Google+"></a>
 
				<?php } if ( $settings['connect_dribbble' ] != "" ) { ?>
		   		<a target="_blank" href="<?php echo esc_url( $settings['connect_dribbble'] ); ?>" class="dribbble" title="Dribbble"></a>
 
				<?php } if ( $settings['connect_instagram' ] != "" ) { ?>
		   		<a target="_blank" href="<?php echo esc_url( $settings['connect_instagram'] ); ?>" class="instagram" title="Instagram"></a>
 
				<?php } if ( $settings['connect_vimeo' ] != "" ) { ?>
		   		<a target="_blank" href="<?php echo esc_url( $settings['connect_vimeo'] ); ?>" class="vimeo" title="Vimeo"></a>
 
				<?php } if ( $settings['connect_pinterest' ] != "" ) { ?>
		   		<a target="_blank" href="<?php echo esc_url( $settings['connect_pinterest'] ); ?>" class="pinterest" title="Pinterest"></a>
 
				<?php } ?>
			</div>
 
<?php } // END woo_custom_social_links ()

add_action('woocommerce_payment_complete', 'custom_process_order', 10, 1);
function custom_process_order($order_id) {
    $order = new WC_Order( $order_id );
    $myuser_id = (int)$order->user_id;
    $user_info = get_userdata($myuser_id);
    $items = $order->get_items();
    foreach ($items as $item) {
        if ($item['product_id']==24) {
          // Do something clever
        }
    }
    return $order_id;
}

add_action( 'wp_footer', 'woocommerce_payment_placeholder' );
function woocommerce_payment_placeholder() {
        if (strpos(current_page_url(), '/contact/') !== false) {
/*                ?><script>alert("Yes");</script><?php*/
                /*wp_enqueue_script( 'adwords_conv_purchase', get_stylesheet_directory_uri() . '/analytics_conv_code_purchase.js', array(), '1.0.0', true );*/
        }
}

function current_page_url() {
        $pageURL = 'http';
        if( isset($_SERVER["HTTPS"]) ) {
                if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
        }
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
                $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
        } else {
                $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        }
        return $pageURL;
}
