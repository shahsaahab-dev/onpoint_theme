<?php

// Contact Blocks Shortcode 
add_shortcode('onpoint_heading','onpoint_heading_function');
function onpoint_heading_function($atts , $content = null){
   extract(shortcode_atts(array(
    'heading_text' => '',
   ), $atts));

   ?>
   <style>
h3.onpoint-heading {
    text-align: center;
    font-family: PlayFair Display;
    font-size: 3em;
}
   </style>
   <?php
   ob_start(); ?>
   <h3 class="onpoint-heading"><?php echo esc_attr($heading_text); ?></h3>

<?php
   return ob_get_clean();
}


// Register Wpbakery Element Now
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__('OnPoint Heading','onpoint'),
        'base' => 'onpoint_heading',
        'class' => '',
        'category' => 'OnPoint Elements',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Heading Text','onpoint'),
                'class' => '',
                'param_name' => 'heading_text',
                'value' => '',
                'description' => esc_html__('Type Text For Heading','onpoint'),

            ),
            
        ),
    ));
}
?>