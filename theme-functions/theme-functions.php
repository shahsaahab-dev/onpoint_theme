<?php

// Plugin Activation
include(ONPOINT_THEME . '/theme-functions/class-tgm-plugin-activation.php');
include(ONPOINT_THEME . '/theme-functions/plugin-activation.php');
include(ONPOINT_THEME . '/theme-functions/demo-import.php');


// Change OneClick Demo Import Intro Text 

function ocdi_plugin_intro_text( $default_text ) {
    $default_text .= '<div class="ocdi__intro-text">This is a custom text added to this plugin intro text.</div>';

    return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'ocdi_plugin_intro_text' );
// Custom OnPoint Theme Functions 
function pagination_bar( $custom_query ) {

    $total_pages = $custom_query->max_num_pages;
    $big = 999999999; // need an unlikely integer

    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));

        echo paginate_links(array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => $current_page,
            'total' => $total_pages,
        ));
    }
}


add_filter( 'woocommerce_gateway_icon', 'custom_payment_gateway_icons', 10, 2 );
function custom_payment_gateway_icons( $icon, $gateway_id ){

    foreach( WC()->payment_gateways->get_available_payment_gateways() as $gateway )
        if( $gateway->id == $gateway_id ){
            $title = $gateway->get_title();
            break;
        }

    // The path (subfolder name(s) in the active theme)
    $path = get_stylesheet_directory_uri(). '/assets';

    // Setting (or not) a custom icon to the payment IDs
    if($gateway_id == 'bacs')
        $icon = '<img src="' . WC_HTTPS::force_https_url( "$path/bacs.png" ) . '" alt="' . esc_attr( $title ) . '" />';
    elseif( $gateway_id == 'cheque' )
        $icon = '<img src="' . WC_HTTPS::force_https_url( "$path/cheque.png" ) . '" alt="' . esc_attr( $title ) . '" />';
    elseif( $gateway_id == 'cod' )
        $icon = '<img src="' . WC_HTTPS::force_https_url( "$path/cod.png" ) . '" alt="' . esc_attr( $title ) . '" />';
    elseif( $gateway_id == 'ppec_paypal' || 'paypal' )
        return $icon;

    return $icon;
}


add_filter( 'woocommerce_gateway_icon', 'custom_paypal_icons', 10, 2 );
 
function custom_paypal_icons( $icon_html, $gateway_id ) {
if( 'paypal' == $gateway_id ) {
   $icon_html = '<img src="'.get_stylesheet_directory_uri() . '/assets/paypal.png'.'"></img>';
}
return $icon_html;
}


// the ajax function
add_action('wp_ajax_data_fetch' , 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch','data_fetch');
function data_fetch(){

    $the_query = new WP_Query( 
        array(
            'posts_per_page' => 5, 
            's' => esc_attr( $_POST['keyword'] ),
            'post_type' => 'product' 
            ) 
    );
    if( $the_query->have_posts() ) :
        while( $the_query->have_posts() ): $the_query->the_post(); ?>

           <li><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title();?>"><a href="<?php echo esc_url( post_permalink() ); ?>"><?php the_title();?></a></li>

        <?php endwhile;
		wp_reset_postdata();  
	else: 
		echo '<h3>No Results Found</h3>';
    endif;
    die();
}
// add the ajax fetch js
add_action( 'wp_footer', 'ajax_fetch' );
function ajax_fetch() {
?>
<script type="text/javascript">
function fetchResults(){
	var keyword = jQuery('#searchInput').val();
	if(keyword == ""){
		jQuery('#datafetch').html("");
	} else {
		jQuery.ajax({
			url: '<?php echo admin_url('admin-ajax.php'); ?>',
			type: 'post',
			data: { action: 'data_fetch', keyword: keyword  },
			success: function(data) {
				jQuery('#datafetch').html( data );
			}
		});
	}
    
}
</script>

<?php
}
?>